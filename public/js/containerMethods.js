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

var initDatepick = function(){
	jQuery(function($) {
		$(".datepicker").each(function(){$(this).datetimepicker({
			formatTime: "h:i A"
		})});
	});
}
//<input type="text" class="form-control ch23 keyboard" ttype="dbsearchinput" name="id5" id="id5" placeholder="Select from database" table="db_columns" columns="/all" returns="/array" data-toggle="dropdown">

var iconload = function(whatToDo = function(){}){
	if(typeof siteSettings.viewData.icons !== "object"){
		$.ajax({
			dataType: "json",
			url: siteDir + 'assets/js/contents/icons.json',
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

var loadDataTable = function(json){
	for(i = 0; i < json[1].contents.length; i++){
		dtHTML = "";
		oneData = json[1].contents[i];
		for(j = 0; j < oneData.length; j++){
			if((j === 0) || (j > 0 && oneData[j].ad_ref !== oneData[j-1].ad_ref)){
				if(j > 0){
					dtHTML += "</tr>\n";
				}
				dtHTML += "<tr><th width='1%' class='centr'>"+oneData[j].ad_ref+"</th>";
				
			}
			dtHTML += "<td ad_id='"+oneData[j].ad_id+"' ad_ref='"+oneData[j].ad_ref+"'  dbc_ref='"+oneData[j].dbc_ref+"'  dbf_ref='"+oneData[j].dbf_ref+"' timestamp='"+oneData[j].timestamp+"'>";

			dtHTML += oneData[j].row_value;
			dtHTML += "</td>";
			if(j === oneData.length - 1){
				dtHTML += "</tr>\n";
			}
		}
		$("#tableLoader table[index='"+i+"']").find(".loadings").empty().detach().end().append(dtHTML);
	}
}