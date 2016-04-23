//添加加载页面完成时的运行函数
function addLoadEvent(func){
	var old_onload=window.onload;
	if(typeof old_onload!='function')  window.onload=func;
	else {
		window.onload=function(){
			old_onload();
			func();
		}
	}
}

// 在元素后面插入新元素
function insertAfter(newElememnt,targetElement){
	var parent=targetElement.parentNode;
	if(parent.lastChild==targetElement){
		parent.appendChild(newElememnt);
	}else{
		parent.insertBefore(newElememnt,targetElement.nextSibling);
	}
}

// 添加只有class,id属性的元素
function addElementClassId(element,className,IdName){
	var element=document.createElement(element);
	element.setAttribute("class",className);
	element.setAttribute("id",IdName);
	return element
}

// 添加p标签
function addP(text,className,IdName){
	var p=document.createElement("p");
	p.setAttribute("class",className);
	p.setAttribute("id",IdName);
	p.innerHTML = text;
	return p;
}
