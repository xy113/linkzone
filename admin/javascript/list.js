// JavaScript Document
function GoPage(page,curl,waitid){
	var Page = page ? parseInt(page) : 1;
	var Curl = curl ? curl : '';
	var WaitId = waitid ? waitid : 'bodyFrame';
	var x = new Ajax();
	Curl = (Curl && Curl.substring(0,1)!='&') ? '&'+Curl : Curl;
	x.get(url+'&page='+Page+Curl,function(s){
		 if(s){
		     $(WaitId).innerHTML = s;
		     showMsg();
		 }
	});
}

/*批量删除*/
function Drop(inputname,curl,waitid){
	var val = new Array();
	var inputName = inputname ? inputname : 'id[]';
	var Curl = curl ? curl : '';
	var Waitid = waitid ? waitid : 'bodyFrame';
	var items = document.getElementsByName(inputname);
	if(Curl&&(Curl.substring(0,1)!='&')) Curl = '&'+Curl
	for(i=0;i<items.length;i++){
		if(items[i].checked){
			val.push(items[i].value);
		}
	}
	if(val.length>0){
		if(confirm(drop_confirm)){
			var x = new Ajax();
			x.get(url+'&action=drop'+Curl+'&id='+val.join(','),function(s){
				if(s){
					$(Waitid).innerHTML = s;
					showMsg(drop_success);
				}else{
				    return false;
				}
			});
		}
	}else{
		//alert(no_select);
		showError(no_select);
		return false;
	}
}

/*单个删除*/
function DropOne(id,curl,waitid){
	if(!id || parseInt(id)==0)return false;
	var Curl = curl ? curl : '';
	var WaitId = waitid ? waitid : 'bodyFrame';
	Curl = Curl.substring(0,1)!='&' ? '&'+Curl : Curl;
	if(confirm(drop_confirm)){
		var x = new Ajax();
		x.get(url+'&action=drop&id='+id+Curl,function(s){
			if(s){
				$(WaitId).innerHTML = s;
				showMsg(drop_success);
			}else{
				return false;
			}
		});
	}
}

function toggleTable(inputname,curl,waitid){
	var val = new Array();
	var inputName = inputname ? inputname : 'id[]';
	var Curl = curl ? curl : '';
	var WaitId = waitid ? waitid : 'bodyFrame';
	Curl = (Curl && Curl.substring(0,1)!='&') ? '&'+Curl : Curl;
	var items = document.getElementsByName(inputName);
	for(i=0;i<items.length;i++){
		if(items[i].checked){
			val.push(items[i].value);
		}
	}
	
	if(val.length>0){
		var x = new Ajax();
		x.get(url+Curl+'&id='+val.join(','),function(s){
			if(s){
				$(WaitId).innerHTML = s;
				showMsg();
			}
		});		
	}else{
		//alert(no_select);
		showError(no_select);
		return false;
	}
}

function ListTable(curl,waitid){
	var WaitId = waitid ? waitid : 'bodyFrame';
	var Curl = curl ? curl : '';
	Curl = (Curl && Curl.substring(0,1)!='&') ? '&'+Curl : Curl;
	var x = new Ajax();
	x.get(url+Curl,function(s){
		if(s){
			$(WaitId).innerHTML = s;
			showMsg();
		}
	});
}

function Sort(orderby,curl,waitid){
    var Orderby = orderby ? orderby : '';
	var Curl = curl ? curl : '';
	var WaitId = waitid ? waitid : 'bodyFrame';
	Curl = (Curl && Curl.substring(0,1)!='&') ? '&'+Curl : Curl;
	var x = new Ajax();
	x.get(url+'&action=sort&ob='+Orderby+Curl,function(s){
		if(s){
			$(WaitId).innerHTML = s;
			showMsg();
		}
	});
}

function LoadCategory(curl,waitid){
	var WaitId = waitid ? waitid : 'bodyFrame';
	var Curl = curl ? curl : '';
	if(!Curl){
		return false;
	}else{
		var x = new Ajax();
		x.get(url+Curl,function(s){
			if(s){
				$(WaitId).innerHTML = s;
				showMsg();
			}else{
				return false;
			}
		});
	}
}

function DropCategory(cid,waitid){
	var WaitId = waitid ? waitid : 'bodyFrame';
	if(!parseInt(cid)>0)return false;
	if(confirm(drop_confirm)){
		var x = new Ajax();
		x.get(url+'&action=drop&cid='+cid,function(s){
			if(s){
				$(WaitId).innerHTML = s;
				showMsg(drop_success);
			}else{
				return false;
			}
		});
	}
}

function SaveCategory(obj,waitid){
	if(typeof obj != 'object') return false;
	var WaitId = waitid ? waitid : 'bodyFrame';
	var cid = parseInt(obj.cid.value);
	var name = obj.name.value;
	var cup = obj.cup.value;
	var add_to_nav = obj.add_to_nav.value;
	var keywords = obj.keywords.value;
	var description = obj.description.value;
	var directory = ''//obj.directory.value;
	var domain = ''//obj.domain.value;
	if(!trimStr(name)){
		showError(cat_name_empty);
		return false;
	}
	var str = 'cid='+cid+'&name='+name+'&cup='+cup;
	str += '&add_to_nav='+add_to_nav+'&keywords='+keywords+'&description='+description;
	str += '&directory='+directory+'&domain='+domain;
	var x = new Ajax();
	x.post(url+'&action=save',str,function(s){
		$(WaitId).innerHTML = s;
	})
}

function checkDB(op,waitid){
	var val = new Array();
	var WaitId = waitid ? waitid : 'bodyFrame';
	var items = document.getElementsByName('table[]');
	for(var i=0;i<items.length;i++){
		if(items[i].checked){
			val.push(items[i].value);
		}else{
			continue;
		}
	}
	
	if(val.length>0){
		var x = new Ajax();
		op = trimStr(op) ? op : 'optimiz';
		x.get(url+'&action=checkdb&op='+op+'&table='+val.join(','),function(s){
			if(s){
				$(WaitId).innerHTML = s;
				showMsg();
			}
		});
	}else{
		showError(no_select);
		return false;
	}
}

function checkOneDB(table,op,waitid){
	if(!table)return false;
	var WaitId = waitid ? waitid : 'bodyFrame';
	op = trimStr(op) ? op : 'optimiz';
	var x = new Ajax();
	x.get(url+'&action=checkdb&op='+op+'&table='+table,function(s){
		if(s){
			$(WaitId).innerHTML = s;
			showMsg();
		}
	});
}

function ExecuSql(obj){
	var sql_code = obj.sql_code.value;
	if(!trimStr(sql_code)){
		return false;
	}else{
		var x = new Ajax();
		x.post(url+'&action=sqlexecu','sql_code='+sql_code,function(s){
			if(s){
				$('code-div').innerHTML = s;
			}
		});
	}
}

function SaveTeam(data){
	var tname = document.form1.tname.value;
	if(!tname){
		alert('分类名称不能留空!');
		return false;
	}else{
		document.form1.tname.value = '';
		$("formdiv").style.display= 'none';
		ListTable("&action2=saveteam&name="+tname+data,'tid');
	}
}

function DropTeam(data){
	var tid = document.form1.tid.value;
	if(confirm('此操作不能被撤销，您确定要删除吗?')){
		ListTable("&action2=dropteam&tid="+tid+data,'tid');
	}
}