//auto-delegated event hand`lers go here
$(document).ready(function(){
	$("body").on("click",".toggleDrag",function(e){
		if(typeof $(this).attr("control") === "string"){
			control = $(this).attr("control");
			control = "#"+control;

			if($(control).length){
				if($(this).text() === $(this).attr("disable")){
					$(this).text($(this).attr("enable")).removeClass("badge-warning").addClass("badge-success");
					$(control).find("[draggable]").each(function(){$(this).removeAttr("draggable")}).attr("nodrag",true);
				}else{
					$(this).text($(this).attr("disable")).addClass("badge-warning").removeClass("badge-success");
					$(control).find("[nodrag]").each(function(){$(this).attr("draggable","true").removeAttr("nodrag")});
				}
				
			}
		}
	});
	$("body").on("click keyup",".keyboard",function(e){
		if(typeof $(this).attr("type") !== "undefined"){
			width = $(this).outerWidth();
			val = $(this).val();
			switch($(this).attr("ttype")){
				case "iconchange":
					$(this).next(".dropdown-menu").css("width",width+"px");

					var $currentE = $(this);
						switch(e.type){
							case "click":
								iconload(function(data){
									randoms = Array.from({length: 100}, () => Math.floor(Math.random() * Object.keys(data).length));
									$currentE.next(".dropdown-menu").find(".iconlist").html("");
									for(i = 0; i < randoms.length; i++){
										$currentE.next(".dropdown-menu").find(".iconlist").prepend("<div class='tab' label='"+data["a"+randoms[i]]+"'><i class='"+data["a"+randoms[i]]+"'></i></div>");
									}
								});
							break;
							case "keyup":
								var vall = $(this).val();
								iconload(function(data){
									$currentE.next(".dropdown-menu").find(".iconlist").html("");
									limit = 0;
									for(i = 0; i < Object.keys(data).length; i++){
										label = data["a"+i].replace(/-/g,"");
										classN = data["a"+i];
										if((label.indexOf(vall) > 0 || classN.indexOf(vall) > 0 || /^[ \t]+$/.test(vall)) && limit <= 100){
											$currentE.next(".dropdown-menu").find(".iconlist").prepend("<div class='tab' label='"+data["a"+i]+"'><i class='"+data["a"+i]+"'></i></div>");
											limit++;
										}
									}
								});
								$(this).next(".dropdown-menu").find(".iconnn").html("<i class='"+val+" iconnn' />");
							break;
						}
				break;
			}
		}
	});
	$("body").on("click","#menusortadmin .nav-link[nodrag]",function(e){
		contentId = $(this).attr("contentid");
		for(i = 0; i < siteSettings.contentData.menu.length; i++){

			if(contentId === siteSettings.contentData.menu[i].content_id + ""){
				props = siteSettings.contentData.menu[i];
				$("#modal1Title").html("Editing: " + props.text);
				fetchData('post','dynamic/loaderStaticNeedsLogin/template',{disp: 'template', view: 'menuitem', data: props},'html',function(data){
					$("#modalBody").html(data);
				});
			}
		}
		$('#modal1').modal('toggle');

	});
	$("body").on("mouseover click",".iconlist .tab",function(event){
		label = $(this).attr("label");
		switch(event.type){
			case "mouseover":
				$(this).parent().prev(".displayer").text(label);
			break;
			case "click":
				$(this).parents(".dropdown-menu").prev("[ttype='iconchange']").val(label);
				$(this).parent().find(".selected").each(function(){$(this).removeClass("selected")});
				$(this).parent().prevAll(".desc").find(".iconnn").html("<i class='"+label+"'></i>");
				$(this).addClass("selected");
			break;
		}
		

	});
});