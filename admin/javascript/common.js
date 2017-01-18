// JavaScript Document
/*
 * ============================================================================
 * 版权所有 (C) 2010 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2010-07-07
 * $ID: common.js
*/ 
var url = location.href.lastIndexOf("?") == -1 ? location.href.substring((location.href.lastIndexOf("/")) + 1) : location.href.substring((location.href.lastIndexOf("/")) + 1, location.href.lastIndexOf("?"));
url +="?inajax=1";

function checkAll(obj,InputName,cgcss){
	var items = document.getElementsByName(InputName);
	var cgCss = typeof cgcss == 'boolean' ? cgcss : true;
	for (var i=0;i<items.length;i++){
		if(obj.checked==true){
		    items[i].checked = true;
		}else{
			items[i].checked = false;
		}
		if(cgCss)checkThis(items[i]);
	}
}

function selectAll(InputName,cgcss){
	var items = document.getElementsByName(InputName);
	var cgCss = typeof cgcss == 'boolean' ? cgcss : true;
	for (var i=0;i<items.length;i++){
		items[i].checked = true;
		if(cgCss)checkThis(items[i]);
	}
}

function cancelAll(InputName,cgcss){
	var items = document.getElementsByName(InputName);
	var cgCss = typeof cgcss == 'boolean' ? cgcss : true;
	for (var i=0;i<items.length;i++){
		items[i].checked = false;
		if(cgCss)checkThis(items[i]);
	}
}

function reverseAll(InputName,cgcss){
	var items = document.getElementsByName(InputName);
	var cgCss = typeof cgcss == 'boolean' ? cgcss : true;
	for (var i=0;i<items.length;i++){
		items[i].checked = items[i].checked == true ? false : true;
		if(cgCss)checkThis(items[i]);
	}
}

/*下拉菜单*/
function ShowSubMenu(li) { 
	var subMenu = li.getElementsByTagName("ul")[0]; 
	subMenu.style.display = "block"; 
} 
function HideSubMenu(li) { 
	var subMenu = li.getElementsByTagName("ul")[0]; 
	subMenu.style.display = "none";  
} 

function ShowMenu(obj){
    if(obj)obj.style.display='block'; 
}
function HideMenu(obj){
    if(obj)obj.style.display='none'; 
}

//修改内容
function Edit(obj,act,id){
	//var obj = document.getElementById(spanid);
	var tag = obj.firstChild.tagName;
	if(typeof(tag) != "undefined" && tag.toLowerCase() == "input"){
	 return;
	}
    /*保存原始的内容 */
	var org = obj.innerHTML;
	var val = window.ActiveXObject ? obj.innerText : obj.textContent;
	
	/* 创建一个输入框 */
	var txt = document.createElement("INPUT");
	txt.value = (val == 'N/A') ? '' : val;
	txt.style.width = (obj.offsetWidth + 15) + "px" ;
	
	/* 隐藏对象中的内容，并将输入框加入到对象中 */
	obj.innerHTML = "";
	obj.appendChild(txt);
	txt.focus();
	
	/* 编辑区失去焦点的处理函数 */
	txt.onblur = function(e){
		if (txt.value.length > 0 &&txt.value !=org){
		    var x = new Ajax();
		    x.get(url+"&action="+act+"&val="+txt.value+"&id="+id,function(s){
		        obj.innerHTML = s;
		        showMsg();
		    });
		}else{
		    obj.innerHTML = org;
		}
	}
}

//切换状态
function toggle(obj,act,id){
	var tog = new Ajax();
	tog.get(url+"&action="+act+"&id="+id,function(s){
		//alert(s)
        obj.src = parseInt(s) > 0 ? 'images/yes.gif' : 'images/no.gif';
        showMsg();
	});
}

//切换状态
function toggle2(obj,act,id){
	var tog = new Ajax();
	tog.get(url+"&action="+act+"&id="+id,function(s){
		//alert(s)
        obj.src = parseInt(s) == 0 ? 'images/yes.gif' : 'images/no.gif';
        showMsg();
	});
}

function toggle3(div){
	var Div = typeof div=='object' ? div : $(div);
	if(Div.style.display=='block'){
		Div.style.display = 'none';
	}else{
		Div.style.display = 'block';
	}
}

function OpenDialog(obj){
	var sw=Math.floor((window.screen.width/2-300));
  var sh=Math.floor((window.screen.height/2-280));
	window.open('select_image.php?f='+obj,'dialog','Width=600,Height=400,toolbar=no,menubar=no,directories=no,top='+sh+',left='+sw+',resizable=yes,scrollbars=yes,center=yes,help=no,alwaysRaised=yes,location=no, status=no',false);
}

//检查标题是否已存在
function checkValue(val,curl,msg,waitid){
	if(val=='' || trimStr(val)==''){
		return false;
	}
	var Msg = msg ? msg : 'The same content already exists.';
	var WaitId = waitid ? waitid : 'msg';
	curl = curl&curl.substring(0,1)!='&' ? '&'+curl : curl;
	var x = new Ajax();
	x.get(url+'&val='+val+curl,function(s){
		//alert(s);
		//alert(s.toUpperCase());
		if(parseInt(s) == 1){
			$(WaitId).style.display= 'block';
			$(WaitId).innerHTML = '<span>'+Msg+'</span><b id="close" title="Close" onclick="this.parentNode.style.display=\'none\'"></b>';
			return true;
		}else{
			$(WaitId).style.display= 'none';
			$(WaitId).innerHTML = Msg;				
			return false;
		}
	});	
}

function showMsg(msg,waitid){
	var Msg = msg ? msg : request_completed;
	var WaitId = waitid ? $(waitId) : window.parent.document.getElementById("load-div");
	WaitId = typeof WaitId == 'object' ? WaitId : $(WaitId);
	WaitId.style.display = 'block';
	WaitId.innerHTML = Msg;
	setTimeout(function(){
		WaitId.style.display = 'none';
		WaitId.innerHTML = Msg;
	},3000);
}

function showError(msg,waitid){
	var Msg = msg ? msg : request_completed;
	var WaitId = waitid ? $(waitId) : $('msg');
	WaitId = typeof WaitId == 'object' ? WaitId : $(WaitId);
	WaitId.style.display = 'block';
	WaitId.innerHTML = '<span>'+Msg+'</span><b id="close" title="Close" onclick="this.parentNode.style.display=\'none\'"></b>';
}

function showMenuBox(cid){
	$('box_'+cid).style.display='inline';
}

function hideMenuBox(cid){
	$('box_'+cid).style.display='none';
}

function checkThis(obj){
	if(!obj || typeof obj!='object') return false;
	if(obj.checked){
		obj.parentNode.parentNode.className='active';
		obj.parentNode.parentNode.onmouseover = function(){}
		obj.parentNode.parentNode.onmouseout = function(){}
	}else{
		obj.parentNode.parentNode.className='';
		obj.parentNode.parentNode.onmouseover = function(){
			this.className = 'active';
		}
		obj.parentNode.parentNode.onmouseout = function(){
			this.className = '';
		}		
	}
}

function $(objectId) {
    if(document.getElementById && document.getElementById(objectId)) {
		//W3C DOM
		return document.getElementById(objectId);
    } else if (document.all && document.all(objectId)) {
		//MSIE 4 DOM
		return document.all(objectId);
    } else if (document.layers && document.layers[objectId]) {
		//NN 4 DOM.. note: this won't find nested layers
		return document.layers[objectId];
    } else {
		return false;
    }
}

function trimStr(str) { 
	var reg = /\s{2,}/g;
	var str = str.replace(reg,'');	
	var re = /\s*(\S[^\0]*\S)\s*/; 
	re.exec(str); 
	return RegExp.$1; 
}


/*Ajax类*/
function Ajax(recvType,waitId) {
	var aj = new Object();
	aj.loading = '正在处理您的请求...';//public
	aj.recvType = recvType ? recvType : 'HTML';//public
	aj.waitId = waitId ? $(waitId) : window.parent.$("load-div");
	aj.resultHandle = null;//private
	aj.sendString = '';//private
	aj.targetUrl = '';//private

	aj.setLoading = function(loading) {
		if(typeof loading !== 'undefined' && loading !== null) aj.loading = loading;
	};

	aj.setRecvType = function(recvtype) {
		aj.recvType = recvtype;
	};

	aj.setWaitId = function(waitid) {
		aj.waitId = typeof waitid == 'object' ? waitid : $(waitid);
	};

	aj.createXMLHttpRequest = function() {
		var request = false;
		if(window.XMLHttpRequest) {
			request = new XMLHttpRequest();
			if(request.overrideMimeType) {
				request.overrideMimeType('text/xml');
			}
		} else if(window.ActiveXObject) {
			var versions = ['Microsoft.XMLHTTP', 'MSXML.XMLHTTP', 'Microsoft.XMLHTTP', 'Msxml2.XMLHTTP.7.0', 'Msxml2.XMLHTTP.6.0', 'Msxml2.XMLHTTP.5.0', 'Msxml2.XMLHTTP.4.0', 'MSXML2.XMLHTTP.3.0', 'MSXML2.XMLHTTP'];
			for(var i=0; i<versions.length; i++) {
				try {
					request = new ActiveXObject(versions[i]);
					if(request) {
						return request;
					}
				} catch(e) {}
			}
		}
		return request;
	};

	aj.XMLHttpRequest = aj.createXMLHttpRequest();
	aj.showLoading = function() {
		if(aj.waitId && (aj.XMLHttpRequest.readyState != 4 || aj.XMLHttpRequest.status != 200)) { 
			aj.waitId.style.display = 'block';
			aj.waitId.innerHTML = '<span><img src="images/loading.gif"> ' + aj.loading + '</span>';
		}
	};

	aj.processHandle = function() {
		if(aj.XMLHttpRequest.readyState == 4) {
            switch (aj.XMLHttpRequest.status)
            {
              case 0:
              case 200://OK!
                /*
                 * If the request was to create a new resource
                 * (such as post an item to the database)
                 * You could instead return a status code of '201 Created'
                 */

					if(aj.waitId) {
						aj.waitId.style.display = 'none';
					}
					if(aj.recvType == 'HTML') {
						aj.resultHandle(aj.XMLHttpRequest.responseText, aj);
					} else if(aj.recvType == 'XML') {
						if(aj.XMLHttpRequest.responseXML.lastChild) {
							aj.resultHandle(aj.XMLHttpRequest.responseXML.lastChild.firstChild.nodeValue, aj);
						} else {
							if(ajaxdebug) {
								var error = mb_cutstr(aj.XMLHttpRequest.responseText.replace(/\r?\n/g, '\\n').replace(/"/g, '\\\"'), 200);
								aj.resultHandle('<root>ajaxerror<script type="text/javascript" reload="1">alert(\'Ajax Error: \\n' + error + '\');</script></root>', aj);
							}
						}
					}
              break;

              case 304: //Not Modified
              break;

              case 400: //Bad Request
                 alert("XmlHttpRequest status: [400] Bad Request");
              break;

              case 404: // Not Found
                alert("XmlHttpRequest status: [404] \nThe requested URL "+url+" was not found on this server.");
              break;

              case 409: //Conflict
              break;

              case 503: //Service Unavailable
                 alert("XmlHttpRequest status: [503] Service Unavailable");
              break;

              default:
                alert("XmlHttpRequest status: [" + xhr.status + "] Unknow status.");
            }
		}
	};

	aj.get = function(targetUrl, resultHandle) {
		//setTimeout(function(){aj.showLoading()}, 1000);
		aj.showLoading();
		aj.targetUrl = targetUrl;
		aj.XMLHttpRequest.onreadystatechange = aj.processHandle;
		aj.resultHandle = resultHandle;
		if(window.XMLHttpRequest) {
			aj.XMLHttpRequest.open('GET', aj.targetUrl);
			aj.XMLHttpRequest.send(null);
		} else {
			aj.XMLHttpRequest.open("GET", targetUrl, true);
			aj.XMLHttpRequest.send();
		}

	};
	aj.post = function(targetUrl, sendString, resultHandle) {
		//setTimeout(function(){aj.showLoading()}, 1000);
		aj.showLoading();
		aj.targetUrl = targetUrl;
		aj.sendString = sendString;
		aj.XMLHttpRequest.onreadystatechange = aj.processHandle;
		aj.resultHandle = resultHandle;
		aj.XMLHttpRequest.open('POST', targetUrl);
		aj.XMLHttpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		aj.XMLHttpRequest.send(aj.sendString);
	};
	return aj;
}

function mb_cutstr(str, maxlen, dot) {
	var len = 0;
	var ret = '';
	var dot = !dot ? '...' : '';
	maxlen = maxlen - dot.length;
	for(var i = 0; i < str.length; i++) {
		len += str.charCodeAt(i) < 0 || str.charCodeAt(i) > 255 ? (charset == 'utf-8' ? 3 : 2) : 1;
		if(len > maxlen) {
			ret += dot;
			break;
		}
		ret += str.substr(i, 1);
	}
	return ret;
}


function Location(murl){
	if(!murl)return false;
	window.location.href = murl;
}