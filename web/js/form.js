// 格式化表单数据
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

// 表单palceholder属性支持
function palceholderByJs(whichForm){
    for(var i = 0; i < whichForm.elements.length; i++){
        var element = whichForm.elements[i];

        if (!element.getAttribute("palceholder")){
            continue;
        }

        if (element.type == "submit") {
            continue;
        }

        element.onfocus = function(){
            if (this.value === element.getAttribute("palceholder")){
                this.value = "";
            }
        }
        
        element.onbulr = function(){
            if (this.value === ""){
                this.value = element.getAttribute("palceholder");
            }
        }

    }
}

// 表单填写的内容验证
function validFormData(whichForm){
    for(var i = 0; i < whichForm.elements.length ; i++){
        var element = whichForm.elements[i];

        if(element.getAttribute("required") == "required" ){
            if(!isFilled(element)){
                alert("请填写"&element.name&"!");
                return false;
            }
        }

        if (element.getAttribute("type") == "email"){
            if(!isEmail(element)){
                alert("请输入正确的email地址");
                return false;
            }
        }

        if (element.getAttribute("name") ==  "phoNum" || element.getAttribute("name") ==  "phoneNum"){
            if(!isPhoNum(element)){
                alert("请输入正确的11位手机号");
                return false;
            }
        }
    }
    return true;
}

// 是否填写表单
function isFilled(whichElement){
    return (whichElement.value.length > 1　&& whichElement.value != whichElement.getAttribute("palceholder"));
}

// 判断email格式
function isEmail(filed){
    var reMail = /^([a-zA-Z0-9]+[_\-\+\.]?)*[a-zA-Z0-9]+@(([a-zA-Z0-9]+[_\-]?)*[a-zA-Z0-9]+\.)+([a-zA-Z]{2,})+$/;
    if (!(reMail.test(filed.value))) {
        return false;
    }
    return true;
}
// 判断电话号码格式
function isPhoNum(filed){
    var rePhone = /^1[3|4|5|8][0-9]\d{8,8}/;
    if(!(rePhone.test(filed.value))){ 
        return false; 
    } 
    return true;
}
// 
function formCheck(form){

        form.onsubmit = function(){

             // if (!validFormData(form)){
                
             //     return false;
             // }

            return true;
        }
}

// 
function loadEvent(){
    for (var i =0; i < document.forms.length; i++){
        var whichForm = document.forms[i];
        
        palceholderByJs(whichForm);
        formCheck(whichForm);
    }
}
addLoadEvent(loadEvent);