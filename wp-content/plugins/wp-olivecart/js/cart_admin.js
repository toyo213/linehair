
function Mail_reset(action){
		if(action == 's_edit'){
			if(window.confirm("メールの内容を初期状態に戻します。")){
			  document.getElementById('action').value = 's_mail_reset';
			  document.Form.submit();
  			}
		}
		if(action == 'edit'){	
			if(window.confirm("メールの内容を初期状態に戻します。")){
				document.getElementById('action').value = 'mail_reset';
				document.Form.submit();
			}
		}

}


function FormCheck(){
 var ElementsCount=document.form.elements.length;
   for( i=0 ; i<ElementsCount ; i++ ) {var str='';
    if(i<5){continue;}
     str =document.form.elements[i].value;
  /* 入力された値がパターンにマッチするか調べる */
    if(str){
      if(str.match(/[0-9]+/)){
       continue;
      }else{
        alert('送料は半角数字のみで正しく入力してください');
        return false;
      } 
    }
  }
}
function checkForm2(){
	if(!document.Form.name.value ){
		alert('名前を入力してください。');
		document.Form.name.focus();
		return false;
	}
	if(!document.Form.zip.value ){
		alert('郵便番号を入力してください。');
		document.Form.zip.focus();
		return false;
	}
	if(document.Form.pref.value == 0 ){
		alert('都道府県を選択してください。');
		return false;
	}
	if(!document.Form.address.value ){
		alert('住所を入力してください。');
		document.Form.address.focus();
		return false;
	}
	if(!document.Form.tel.value ){
		alert('電話番号を入力してください。');
		document.Form.tel.focus();
		return false;
	}
	if(!document.Form.mailaddress1.value ){
		alert('メールアドレスを入力してください。');
		document.Form.mailaddress1.focus();
		return false;
	}
	if(!document.Form.password1.value ){
		alert('パスワードを入力してください。');
		document.Form.password1.focus();
		return false;
	}
	if(document.Form.name2.value ){
		if(!document.Form.zip2.value ){
			alert('お届け先郵便番号を入力してください。');
			document.Form.zip2.focus();
			return false;
		}
		if(document.Form.pref2.value == 0 ){
			alert('お届け先都道府県を選択してください。');
			return false;
		}
		if(!document.Form.address2.value ){
			alert('お届け先住所を入力してください。');
			document.Form.address2.focus();
			return false;
		}
		if(!document.Form.tel2.value ){
			alert('お届け先電話番号を入力してください。');
			document.Form.tel2.focus();
			return false;
		}
	}
	return true;
}
function NameCheck( str ,message){
    var Seiki=/^[*-_,a-z\d]+$/i;
    if(str.match(Seiki)){
      return true;
    }else{
      alert(message);
      return false;
    } 
}

 
