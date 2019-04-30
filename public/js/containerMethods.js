var sortables = function(element, item = '', placeholderClass = '',actionsWhenDone = function(){}){
	jQuery(function($){
		if($(element).length){
			$(".sortablee").sortable({
		        items: item,
		        placeholderClass: placeholderClass
		    }).on("sortupdate",function(e, ui){
		    	actionsWhenDone(e, ui.item);
		    });
		    
		    return true;
		}else{
			return false;
		}
	});
}

var tooltips = function () {
	jQuery('[data-toggle="tooltip"]').tooltip();
};

var iconload = function(whatToDo = function(){}){
	if(typeof siteSettings.viewData.icons !== "object"){
		$.ajax({
			dataType: "json",
			url: siteDir+ 'assets/js/contents/icons.json',
			success: function(data){
				siteSettings.viewData.icons = data;
				if(typeof whatToDo === "function"){
					whatToDo(data);
				}
			}
		});
	}else{
		whatToDo(siteSettings.viewData.icons);
	}
	
}