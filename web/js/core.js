function ajaxRet_confirm(i){

	var type = document.getElementById('type-'+i).firstChild.nodeValue;
	var retNum = document.getElementById('retNum-'+i).value;
	var retId = document.getElementById('retId-'+i).value;
	
	var info = "<div class='oneInfo alert'><p>type:</p>" + type + "</div>" +
               "<div class='oneInfo alert'><p>Number:</p>" + retNum + "</div>" +
               "<div class='oneInfo alert'><p>engineer ID:</p>" + retId + "</div>";

    layer.confirm(info, {icon: 3, title:'confirm'}, function(index){

    	retTool(i);
        layer.close(index);
});          
}

function retTool(i){
	var No = document.getElementById('No-'+i).firstChild.nodeValue;
	var type = document.getElementById('type-'+i).firstChild.nodeValue;
	var retNum = document.getElementById('retNum-'+i).value;
	var retId = document.getElementById('retId-'+i).value;

	var date = "No=" + No + "&" +
	           "type=" + type + "&" +
	           "retNum=" + retNum + "&" +
	           "retId=" + retId;

    var url = "toolReturn_.php";

    var load = layer.load(1);
	postDateViaAjax(date,url,function(){},function(text){

		layer.close(load);
		alert(text);	
		$("#record-" + i).remove();

	});       
}

function ajaxLoan(form){
	
	var form = document.getElementById('loanForm');
	var tool = document.getElementById('type').value;
	var loanNum = document.getElementById('loanNum').value;
	var loanId = document.getElementById('loanId').value;

	var info = "<div class='oneInfo alert'><p>tool type:</p> " + tool + "</div>" +
	           "<div class='oneInfo alert'><p>number:</p> " + loanNum + "</div>" +
	           "<div class='oneInfo alert'><p>engineer ID:</p> " + loanId + "</div>";

    layer.confirm(info, {icon: 3, title:'confirm'}, function(index){

        var load = layer.load(1);
    	 subFormViaAjax(form,function(){},function(text){

    	 	layer.close(load);
    	 	alert(text);
    	 	document.getElementById('loanNum').value = "";
    	 	document.getElementById('loanId').value = "";

    	});

        layer.close(index);
}); 	            

    return false;
}

function ajaxDel(No){

	var info = "Delete?";

	layer.confirm(info, {icon: 3, title:'confirm'}, function(index){

		var load = layer.load(1);
		var url = "toolDelete.php";

		url = addUrlParam(url,"No",No);

		getDateViaAjax(url,function(){},function(text){

			layer.close(load);
			alert(text);
			$("#tool-" + No).remove();

		});

		layer.close(index);

	});
    
    return false; 
}

function setBox(centerId){

	var url = "retBoxInfo.php";
    url = addUrlParam(url,"centerId",centerId);

    getDateViaAjax(url,function(){},function(text){
    	document.getElementById('boxId').innerHTML = text;
    });
}

function defaultBox(){
	var firstCenter = $("#centerId").val();

	var url = "retBoxInfo.php";
    url = addUrlParam(url,"centerId",firstCenter);

    getDateViaAjax(url,function(){},function(text){
    	document.getElementById('boxId').innerHTML = text;
    });
} 

function navCurrent(){

    var filename = location.href;
    var nav = document.getElementById('nav');
    var a = nav.getElementsByTagName('a');

    filename = filename.substr(filename.lastIndexOf('/')+1); 

    for (var i = a.length - 1; i >= 0; i--) {

    	if(a[i].getAttribute('href') == filename){
    		a[i].setAttribute('class', "current");
    	}
    }
}

function loadEvent(){

    navCurrent();
	if($("#centerId").length > 0){
		defaultBox();
	}
}
addLoadEvent(loadEvent);