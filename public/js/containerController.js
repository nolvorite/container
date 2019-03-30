var siteSettings = {
	'inMenu': 'none',
	'initSet': false,
	'currentView': '',
	'userData' : fetchData('asObject','dynamic/loaderDataNeedsLogin/userDataForController',{},'json')[1],
	'contentData' : [],
	'viewData': []
};

function updateData(init = false){
	parseUrl = String(window.location.hash).replace(/^\#\/(.+)$/,"$1").replace(/\/$/,"").split("/");
	switch(parseUrl.length){
		case 0:
		break;
		default:

			if(parseUrl.length >= 1){
				//all one-slashes only

				//two or more
				switch(parseUrl[0]){
					case "admin":
						data = fetchData('asObject','dynamic/loaderDataNeedsLogin/admin',{},'json');
						siteSettings.currentView = data[0];	
						siteSettings.contentData = data[1];
						siteSettings.viewData = data[2];

						//console.log(siteSettings.contentData.menu);

						$("#list_container a").removeClass("selected");
						$("#list_container a[to='"+parseUrl[0]+"']").addClass("selected");					
					break;
				}
				if(parseUrl.length >= 2){
					switch(parseUrl[0]){
						case "panel":
							switch(parseUrl[1]){
								case "notes":
								case "forms":
								case "users":
									//console.log("a");
									$("#list_container a").removeClass("selected");
									$("#list_container a[to='"+ parseUrl[1] +"']").addClass("selected");
									////
									data = fetchData('asObject','dynamic/loaderDataNeedsLogin/'+parseUrl[1],{},'json');
									///
									siteSettings.currentView = data[0];	
									siteSettings.contentData = typeof data[1] !== "undefined" ? data[1] : [];
									siteSettings.viewData = typeof data[2] !== "undefined" ? data[2] : [];
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
		case "notes":
		case "forms":
		case "users":
		case "admin":
			fetchData('post','dynamic/loaderStaticNeedsLogin/'+siteSettings.currentView,{disp: siteSettings.currentView, data: siteSettings.contentData},'html',function(html){
				$("#right_side").html(html);

				switch(siteSettings.currentView){
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
							fetchData('post','dynamic/loaderStatic/tableDisplay',{data:arrays[1], disp: 'tableDisplay'},'html',function(html){
								$("#tableLoader").html(html);
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
		fetchData('get','dynamic/loaderDataNeedsLogin/userDataForController',{},'json',function(json){
			parseUrl = String(window.location.hash).replace(/^\#\//,"").split("/");
			passToNext = "";
			if(init){
				window.location.hash = json[1].redirUrl;
				siteSettings.currentView = json[1].defaultView;
			}
			else{
				window.location.hash = url;
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

