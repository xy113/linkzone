/**
 * ============================================================================
 * ��Ȩ���� (C) 2010 WWW.SONGDEWEI.COM All Rights Reserved��
 * ��վ��ַ: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2010-07-12
 * $ID: image.js
*/ 
var rowID = 1;
function SwitchTab(key){
   if(key==0){
	  //ClearAllSing('URLFrame')
	  $('file_span0').style.display='block';
	  $('file_span1').style.display='none';
	  $('add0').onclick = function(){AddSignFile();};
	  $('add1').onclick = function(){AddSignFile();};
	  //AddSignFile();
   }else{
	  //ClearAllSing('FileFrame')
	  $('file_span0').style.display='none';
	  $('file_span1').style.display='block';
	  $('add0').onclick = function(){ AddSignURL()};
	  $('add1').onclick = function(){ AddSignURL()};
	  //AddSignURL();
   }
}

function SaveFile(obj){
	var val = '';
	var checked = true;
	for(var i=0; i<obj.gtype.length;i++){
		if(obj.gtype[i].checked){
			val = obj.gtype[i].value;
			break;
		}else{
			continue;
		}
	}
	if(val == 0){
		var items = document.getElementsByName('imagefiles[]');
		for(var i=0;i<items.length;i++){
			if(items[i].value){
				continue;
			}else{
				checked = false;
			}
		}
	}else{
		var items = document.getElementsByName('imageurls[]');
		for(var i=0; i<items.length;i++){
			if(items[i].value){
				continue;
			}else{
				checked = false;
			}
		}
	}
	if(checked){
		obj.submit();
	}else{
		showError('��ѡ����Ҫ�ϴ���ͼƬ��');
		return false;
	}
}

function AddSignFile(){ 
	var signFrame = $("FileFrame");
	//�����
	var newTR = signFrame.insertRow(signFrame.rows.length);
	newTR.id = "FileItem" + rowID;
  //�����:���
  var newNameTD=newTR.insertCell(0);
	newNameTD.innerHTML = NewFileInput(rowID);
	//���к��ƽ���һ��
	rowID++;
}

function AddSignURL(){ 
	var signFrame = $("URLFrame");
	//�����
	var newTR = signFrame.insertRow(signFrame.rows.length);
	newTR.id = "URLItem" + rowID;
  //�����:���
  var newNameTD=newTR.insertCell(0);
	newNameTD.innerHTML = NewUrlInput(rowID);
	//���к��ƽ���һ��
	rowID++;
}

//ɾ��ָ����
function DropFile(RowID){
	var signFrame = $('FileFrame');
	//��ȡ��Ҫɾ�����е�Index
	var Row = $('FileItem'+RowID);
	var rowIndex = Row.rowIndex;
	//ɾ��ָ��Index����
	if(rowIndex){
	   signFrame.deleteRow(rowIndex);
	}
}

//ɾ��ָ����
function DropURL(RowID){
	var signFrame = $('URLFrame');
	//��ȡ��Ҫɾ�����е�Index
	var Row = $('URLItem'+RowID);
	var rowIndex = Row.rowIndex;
	//ɾ��ָ��Index����
	if(rowIndex){
	   signFrame.deleteRow(rowIndex);
	}
}

function ClearAll(tbl){
	var signFrame = $(tbl);
	var rowscount = signFrame.rows.length;
	//ѭ��ɾ����,�����һ����ǰɾ��
	for(i=rowscount - 1;i >=0; i--){
	    signFrame.deleteRow(i);
	}
	rowID = 0;
}

function NewFileInput(rowid){
    var Html ='<div class="title-div"><span class="label1">ͼƬ�ļ���</span><span class="label3"><input name="imagefiles[]" type="file" class="fileinput" size="59" /> <span class="drop"  title="ɾ��" onclick="DropFile('+rowid+')"></span></span></div>';
         Html +='<div class="title-div"><span class="label2">ͼƬ˵����</span><span class="label3"><textarea name="description1[]" cols="65" rows="5"></textarea></span></div>';
	return Html;
}

function NewUrlInput(rowid){
	var Html ='<div class="title-div"><span class="label1">ͼƬ��ַ��</span><span class="label3"><input name="imageurls[]" type="text" class="textinput" size="67" /> <span class="drop"  title="ɾ��" onclick="DropURL('+rowid+')"></span></span></div>';
		Html+='<div class="title-div"><span class="label2">ͼƬ˵����</span><span class="label3"><textarea name="description2[]"></textarea></span></div>';
	return Html;
}