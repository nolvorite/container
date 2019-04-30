var siteSettings = {
	'inMenu': 'none',
	'initSet': false,
	'currentView': '',
	'userData' : fetchData('asObject','dynamic/loaderDataNeedsLogin/userDataForController',{},'json')[1],
	'contentData' : [],
	'viewData': []
};

function updateData(init = false){

	//////
	parsedUrl = String(window.location.hash).replace(/^\#\/(.+)$/,"$1").replace(/\/$/,"").split("/");
	//////


	switch(parsedUrl.length){
		case 0:
		break;
		default:
			if(parsedUrl.length >= 1){
				//all one-slashes only

				//two or more
				switch(parsedUrl[0]){
					case "admin":
						data = fetchData('asObject','dynamic/loaderDataNeedsLogin/admin',{},'json');
						siteSettings.currentView = data[0];	
						siteSettings.contentData = data[1];
						siteSettings.viewData = data[2];

						//console.log(siteSettings.contentData.menu);

						$("#list_container a").removeClass("selected");
						$("#list_container a[to='"+parsedUrl[0]+"']").addClass("selected");		
						console.log("Data set to: " + parsedUrl[0]);			
					break;
				}
				if(parsedUrl.length >= 2){
					switch(parsedUrl[0]){
						case "panel":
							switch(parsedUrl[1]){
								case "notes":
								case "forms":
								case "users":
									//console.log("a");
									$("#list_container a").removeClass("selected");
									$("#list_container a[to='"+ parsedUrl[1] +"']").addClass("selected");
									////
									data = fetchData('asObject','dynamic/loaderDataNeedsLogin/'+parsedUrl[1],{},'json');
									///
									siteSettings.currentView = data[0];	
									siteSettings.contentData = typeof data[1] !== "undefined" ? data[1] : [];
									siteSettings.viewData = typeof data[2] !== "undefined" ? data[2] : [];
									console.log("Data set to: " + parsedUrl[1]);
								break;
								case "settings":
									if(typeof parsedUrl[2] !== "undefined"){
										$("#list_container a").removeClass("selected");
										$("#list_container a[to='"+ parsedUrl[1] + "/" + parsedUrl[2] + "']").addClass("selected");
										data = fetchData('asObject','dynamic/loaderDataNeedsLogin/'+parsedUrl[1]+'/'+parsedUrl[2],{},'json');
										siteSettings.currentView = "settings";
										siteSettings.viewData = data[1];
										siteSettings.contentData = [];
										console.log("Data set to: " + parsedUrl[1]);
									}
								break;
							}
						break;
					}
				}
			}
		break;
	}
}

function updateView(init = false){
	if(siteSettings.viewData.length > 0){
		document.title = siteSettings.viewData[1];
	}
	switch(siteSettings.currentView){
		case "settings":
		case "notes":
		case "forms":
		case "users":
		case "admin":
			//console.log(siteSettings.contentData);
			disp = siteSettings.currentView;
			if(siteSettings.currentView === "settings"){
				disp = siteSettings.viewData.type;
			}
			fetchData('post','dynamic/loaderStaticNeedsLogin/'+siteSettings.currentView,{disp: disp, data: siteSettings.contentData},'html',function(html){
				$("#right_side").html(html);
				console.log("View set to: " + siteSettings.currentView);
				switch(siteSettings.currentView){
					case "settings":
						initDatepick();
						searchers = [];
						$("#settings-disp *[ttype='dbsearchinput']").each(function(i){
							searcher = {
								tableN : $(this).attr("table"),
								columnN : $(this).attr("columns") !== undefined ? $(this).attr("columns") : "*",
								returns : $(this).attr("returns") !== undefined ? $(this).attr("returns") : "assoc"
							};

							$(this).attr("dl_index",searchers.length);

							searchers[searchers.length] = new dataLoader(searcher.tableN,searcher.columnN,searcher.returns,$(this));
						});
					break;
					case "admin":
						sortables("#menus .sortablee",".nav-link","nav-link",function(e, ui){
							$("#menus .nav-link").each(function(event){
								for(i = 0; i < siteSettings.contentData.menu.length; i++){
									if(siteSettings.contentData.menu[i].content_id+"" === $(this).attr("contentId")){
										siteSettings.contentData.menu[i].properties.order = $(this).index()+1;
									}
								}
								
							});

						});
						tooltips();

					break;
					case "forms":
						fetchData('post','dynamic/loaderDataNeedsLogin/tableData',{data: {tables: siteSettings.contentData.tables, columns: siteSettings.contentData.columns}},'json',function(arrays){
							fetchData('post','dynamic/loaderStatic/tableDisplay',{data:arrays[1], disp: 'tableDisplay'},'html',function(html2){
								
								$("#tableLoader").html(html2);
								console.log("Loading data tables on " + siteSettings.currentView);

								fetchData('post','dynamic/loaderDataNeedsLogin/dataFetch',{data: arrays[1]},'json', function(contents){

									loadDataTable(contents);

									console.log("Finished loading data tables on " + siteSettings.currentView);
									

								});
							});
						});
					break;
				}
			});
		break;
	}
}
		


function updateHash(init = false,url = false){
	update = ((init && window.location.hash === "") || !init);
	if(update){
		console.log("Hash initialization");
		fetchData('get','dynamic/loaderDataNeedsLogin/userDataForController',{},'json',function(json){
			parsedUrl = String(window.location.hash).replace(/^\#\//,"").split("/");
			passToNext = "";
			if(init){
				window.location.hash = json[1].redirUrl;
				siteSettings.currentView = json[1].defaultView;
			}
			else{
				window.location.hash = url;
				console.log("Hash URL set to: " + siteSettings.currentView);
			}
		});
	}
}

jQuery(function($){
	$(window).on('hashchange', function() {
		updateData();
		updateView();
	});
	$(document).ready(function(){
		updateHash(true);
		updateData(true);
		updateView(true);
		$("body").on("click",".selected,.active",function(event){
			event.preventDefault();
			event.stopPropagation();
			return false;
		});
	});
});

