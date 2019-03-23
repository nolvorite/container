
function fetchData(method, url, data, dataType = 'json', whatToDo = ""){
    switch(method){
        case "asObject":
            var jsonToGet = [];
            jQuery.ajax(siteDir + url, {
                method: method,
                headers: {
                    'Access-Control-Allow-Headers': 'Content-Type, Accept, X-Requested-With, Session',
                    'Access-Control-Allow-Methods': 'GET, POST, DELETE, PUT, OPTIONS, HEAD',
                    'Content-Type':'application/json'
                },
                data: data,
                async: false,
                dataType: (method === 'get') ? 'json' : dataType
            }).done(function(data){
                jsonToGet = data;
            });
            return jsonToGet;
        break;
        default:
            jQuery(function($){ //all get requests are JSON here
                $.ajax(siteDir + url, {
                    method: method,
                    data: data,
                    dataType: (method === 'get' && dataType === "json") ? 'json' : dataType
                }).done(function(returned){
                    if(typeof whatToDo === "function"){
                        whatToDo(returned);
                    }else{
                        console.log(returned);
                    }
                }).fail(function(jqXHR, textStatus){
                });
            });
        break;
    }
}


/*
jQuery(function($){
    $(document).ready(function(){
        fetchData('get','dynamic/loaderDataNeedsLogin/notes',{},'json',function(json){
            fetchData('post','dynamic/loaderStaticNeedsLogin/notes',{disp: 'notes',data: json},'html',function(html){
                $("#right_side").html(html);
            });
        });
    });
}); */
