//setInterval("aa.innerHTML=new Date().toLocaleString()+' 星期'+'日一二三四五六'.charAt(new Date().getDay());",1000);
function $$(a){
	return document.getElementById(a);
}

/*下拉菜单*/
function ShowSubMenu(li) { 
	var subMenu = li.getElementsByTagName("ul")[0]; 
	li.className = "selected";
	subMenu.style.display = "block"; 
} 
function HideSubMenu(li) { 
	var subMenu = li.getElementsByTagName("ul")[0]; 
	li.className = "";
	subMenu.style.display = "none";  
} 

function ShowMenu(obj){
    if(obj)obj.style.display='block'; 
}
function HideMenu(obj){
    if(obj)obj.style.display='none'; 
}
function bookmark(){
	var title=document.title
	var url=document.location.href
	if (window.sidebar) window.sidebar.addPanel(title, url,"");
	else if( window.opera && window.print ){
	var mbm = document.createElement('a');
	mbm.setAttribute('rel','sidebar');
	mbm.setAttribute('href',url);
	mbm.setAttribute('title',title);
	mbm.click();}
	else if( document.all ) window.external.AddFavorite( url, title);
}

function copy_clip(copy){
	if (window.clipboardData){
	window.clipboardData.setData("Text", copy);}
	else if (window.netscape){
	netscape.security.PrivilegeManager.enablePrivilege('UniversalXPConnect');
	var clip = Components.classes['@mozilla.org/widget/clipboard;1'].createInstance(Components.interfaces.nsIClipboard);
	if (!clip) return;
	var trans = Components.classes['@mozilla.org/widget/transferable;1'].createInstance(Components.interfaces.nsITransferable);
	if (!trans) return;
	trans.addDataFlavor('text/unicode');
	var str = new Object();
	var len = new Object();
	var str = Components.classes["@mozilla.org/supports-string;1"].createInstance(Components.interfaces.nsISupportsString);
	var copytext=copy;
	str.data=copytext;
	trans.setTransferData("text/unicode",str,copytext.length*2);
	var clipid=Components.interfaces.nsIClipboard;
	if (!clip) return false;
	clip.setData(trans,null,clipid.kGlobalClipboard);}
	alert("已复制"+copy)
	return false;
}

function addBookmark(title) {
	var url=parent.location.href;
	if (window.sidebar) { 
		window.sidebar.addPanel(title, url,""); 
	} else if( document.all ) {
		window.external.AddFavorite( url, title);
	} else if( window.opera && window.print ) {
	}
}
function SetHome(obj,vrl){
	try{
		obj.style.behavior='url(#default#homepage)';obj.setHomePage(vrl);
	}
	catch(e){
		if(window.netscape) {
			try {
				netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");  
			}  
			catch (e) 
			{ 
				alert("抱歉！您的浏览器不支持直接设为首页。请在浏览器地址栏输入“about:config”并回车然后将[signed.applets.codebase_principal_support]设置为“true”，点击“加入收藏”后忽略安全提示，即可设置成功。");  
			}
			var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components.interfaces.nsIPrefBranch);
			prefs.setCharPref('browser.startup.homepage',vrl);
		}
	}
}