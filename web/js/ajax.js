// 建立XMLHttpRequest对象
function createXHR(){
            if (typeof XMLHttpRequest != "undefined"){
                return new XMLHttpRequest();
            } else if (typeof ActiveXObject != "undefined"){
                if (typeof arguments.callee.activeXString != "string"){
                    var versions = ["MSXML2.XMLHttp.6.0", "MSXML2.XMLHttp.3.0",
                                    "MSXML2.XMLHttp"],
                        i, len;
            
                    for (i=0,len=versions.length; i < len; i++){
                        try {
                            var xhr = new ActiveXObject(versions[i]);
                            arguments.callee.activeXString = versions[i];
                            return xhr;
                        } catch (ex){
                            //skip
                        }
                    }
                }
            
                return new ActiveXObject(arguments.callee.activeXString);
            } else {
                throw new Error("No XHR object available.");
            }
}

function serialize(form){        
var parts = new Array();
var field = null;

for (var i=0, len=form.elements.length; i < len; i++){
    field = form.elements[i];

    switch(field.type){
        case "select-one":
        case "select-multiple":
            for (var j=0, optLen = field.options.length; j < optLen; j++){
                var option = field.options[j];
                if (option.selected){
                    var optValue = "";
                    if (option.hasAttribute){
                        optValue = (option.hasAttribute("value") ? 
                                    option.value : option.text);
                    } else {
                        optValue = (option.attributes["value"].specified ? 
                                    option.value : option.text);
                    }
                    parts.push(encodeURIComponent(field.name) + "=" + 
                               encodeURIComponent(optValue));
                }
            }
            break;
            
        case undefined:     //fieldset
        case "file":        //file input
        case "submit":      //submit button
        case "reset":       //reset button
        case "button":      //custom button
            break;
            
        case "radio":       //radio button
        case "checkbox":    //checkbox
            if (!field.checked){
                break;
            }
            /* falls through */
                        
        default:
            parts.push(encodeURIComponent(field.name) + "=" + 
                encodeURIComponent(field.value));
    }
}        
return parts.join("&");
}

// 通过Ajax发送表单数据
function subFormViaAjax(form,progress,finished){
    var xhr = createXHR(); 
    var received = 0;console.log(form.getAttribute("action"));

    xhr.open("post",form.getAttribute("action"),true);  

    xhr.onreadystatechange = function(event){
        if (xhr.readyState == 3){
            var result;

            result = xhr.responseText.substring(received);
            received += result.length;

            progress(result);
        }
        
        if (xhr.readyState == 4){
            if ((xhr.status >= 200 && xhr.status < 300) || xhr.status == 304){
                finished(xhr.responseText);
            }
        }
    }

    if (form.getAttribute("enctype") == "multipart/form-data"){
        var myFormData = new FormData(form);
    } 
    else {
        var myFormData = serialize(form);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    } 

    xhr.send(myFormData);
    return true;
}

function postDateViaAjax(date,url,progress,finished){
    var xhr = createXHR(); 
    var received = 0;

    xhr.open("post",url,true);  

    xhr.onreadystatechange = function(event){
        if (xhr.readyState == 3){
            var result;

            result = xhr.responseText.substring(received);
            received += result.length;

            progress(result);
        }
        
        if (xhr.readyState == 4){
            if ((xhr.status >= 200 && xhr.status < 300) || xhr.status == 304){
                finished(xhr.responseText);
            }
        }
    }
    
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(date);
    
    return true;
}

// 链接编码
function addUrlParam(url,name,value){
    url += (url.indexOf("?") == -1?"?":"&");
    url += encodeURIComponent(name) + "=" + encodeURIComponent(value);

    return url;
}

function getDateViaAjax(url,progress,finished){
    var xhr = createXHR(); 
    var received = 0;

    xhr.open("get",url,true);  

    xhr.onreadystatechange = function(event){
        if (xhr.readyState == 3){
            var result;

            result = xhr.responseText.substring(received);
            received += result.length;

            progress(result);
        }
        
        if (xhr.readyState == 4){
            if ((xhr.status >= 200 && xhr.status < 300) || xhr.status == 304){
                finished(xhr.responseText);
            }
        }
    }
 
    xhr.send();

    return true;
}
