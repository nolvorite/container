function fetchData(method, url, data, dataType = 'json', whatToDo = ""){
    switch(method){
        case "asObject":
            var jsonToGet = [];
            jQuery.ajax(siteDir + url, {
                method: method,
                headers: {
                    'Access-Control-Allow-Headers': 'Content-Type, Accept, X-Requested-With, Session',
                    'Access-Control-Allow-Methods': 'GET, POST, DELETE, PUT, OPTIONS, HEAD',
                    'Content-Type':'application/json',
                    'cache-control': 'no-cache' 
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
                    if(jqXHR.responseText !== ""){
                        textParsed = $(jqXHR.responseText).text();
                        $("#modal1Title").html("PHP error:");
                        $("#modalBody").html(textParsed);
                        $("#modal1").modal('toggle');
                    }
                });
            });
        break;
    }
}

class dataLoader {
    constructor(table,columns,returns,elem){
        this.table = table;
        this.columns = columns;
        this.returns = returns;
        this.updateQ = "";
        this.data = [];
        this.elem = elem;
    }
    updateq(val){
        this.updateQ = val;
    }
    loadData(whatToDo = function(){}){
        var embed = this;
        fetchData(
            'get',
            'dynamic/loaderDataForBits/',
            {table: this.table, columns: this.columns, query: this.updateQ, returns: this.returns},
            "html",
            whatToDo
        );
    }
    setData(d){
        this.data = d;
    }
    getData(){        
        return this.data;
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
