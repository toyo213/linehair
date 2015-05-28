/*
 * Shopping Cart System WP Olive-Cart.
 */
function zip_list_search(){
 		document.Form.zip_search.value=1;
		document.Form.submit();
}
function mypageIn(Mypageurl,sid){
		var frm = new postSubmit();
		frm.add('sid',sid);
		frm.submit(Mypageurl, '_self');
}
function get_cartstep2(){
		var frm = new postSubmit();
		frm.add('step','2');
		frm.add('page_id',page_id);
		frm.submit(Url, '_self');
}
function postIn(ButtonId,Number){
	var option1 ='';
	var option_id1 = 'option1_'+ButtonId;
	//var option_id2 = 'option2_'+ButtonId;

		//if(document.getElementById(option_id2)){
			//	var option2 = document.getElementById(option_id2).value;
		//		Number+=':'+option2;
		//	}
		//else 
		if(document.getElementById(option_id1)){
			var option1 = document.getElementById(option_id1).value;
		//	Number+= ':'+option1;
			//if(document.getElementById(option_id2)){
				//var option2 = document.getElementById(option_id2).value;
			//	Number+=':'+option2;
		 }
	//	}
		var count_id = 'count_'+ButtonId;
		if(document.getElementById(count_id)){ 
			var Count = document.getElementById(count_id).value;

		}
		else{
			Count='1';
		}
	if(document.getElementById("maincart")){
		var frm = new postSubmit();
		frm.add('number',Number);
		frm.add('count',Count);
		if(document.getElementById(option_id1)){ frm.add('option',option1); }
		frm.submit('', '_self');
	}
	else if(document.getElementById("maincart_ajax")){

		var Post_data="step=1&number="+Number+"&count="+Count+"&option="+option1;
		CartIn(Post_data);　
	}
	else{
			var Get_data  = Url+"wp-content/plugins/wp-olivecart/cart.php?step=2&count="+Count+"&number="+Number+"&option="+option1;
		location.href = Get_data;
	}
}
function postSubmit() {
    this.frmObject = document.createElement("form");
    this.frmObject.method = "get";
    
    this.add = function(elementname, elementvalue) {
       var input = document.createElement("input");
	     input.type = "hidden";
	     input.name = elementname;
	     input.value = elementvalue;
       this.frmObject.appendChild(input);
       this.frmObject.method = "post";
    };
    
    this.submit = function(url, targetFrame) {
      try {
        if (targetFrame) {
          this.frmObject.target = targetFrame;
        }
      } catch (e) { }
      
      try {
      //  if (url) {
         this.frmObject.action = url;
          document.body.appendChild(this.frmObject);
          this.frmObject.submit();
          return true;
       // } else { return false; }
      } catch (e) {
         return false;
      }
    };
}

function CartIn(Post_data){
  httpObj = createXMLHttpRequest(displayData);
  if (httpObj){
    httpObj.open("POST",CartUrl,true);
    httpObj.setRequestHeader("content-type","application/x-www-form-urlencoded;charset=UTF-8");
    httpObj.send(Post_data);
  }
}

window.onload = function (){
	if(document.getElementById("maincart_ajax")){
		var postdata='step=1';
		CartUrl=Url+'wp-content/plugins/wp-olivecart/cart.php';
		httpObj = createXMLHttpRequest(displayData);
		if (httpObj){
			httpObj.open("POST",CartUrl,true);
			httpObj.setRequestHeader("content-type","application/x-www-form-urlencoded;charset=UTF-8");
			httpObj.send(postdata);
		}
 // if (httpObj2){
  //  httpObj2.open("POST",MypageUrl,true);
  //  httpObj2.setRequestHeader("content-type","application/x-www-form-urlencoded;charset=UTF-8");
  //  httpObj2.send(postdata2);
 // }
	}
}

function displayData()
{
	var ajax_img='<img src="'+Url+'wp-content/plugins/wp-olivecart/gif/ajax-loader.gif" />';
	if(document.getElementById("maincart_ajax").innerHTML='<table id="minicart"><tr><th class="thitem">商品名</th><th class="thcount">個数</th></tr><tr><td colspan="2" class="total">'+ajax_img+'</td></tr></table>');
  if ((httpObj.readyState == 4) && (httpObj.status == 200)){
    document.getElementById("maincart_ajax").innerHTML= httpObj.responseText;
  }

//  if ((httpObj2.readyState == 4) && (httpObj2.status == 200)){
 //   document.getElementById("userlogin").innerHTML= httpObj2.responseText;
 // }
}


function createXMLHttpRequest(object)
{
  var XMLhttpObject = null;
  try{
    XMLhttpObject = new XMLHttpRequest();
  }catch(e){
    try{
      XMLhttpObject = new ActiveXObject("Msxml2.XMLHTTP");
    }catch(e){
      try{
        XMLhttpObject = new ActiveXObject("Microsoft.XMLHTTP");
      }catch(e){
        return null;
      }
    }
  }
  if (XMLhttpObject){
     XMLhttpObject.onreadystatechange = object;
     return XMLhttpObject;
  }
}


function addSelOption( selObj, myValue, myText ){
   selObj.length++;
   selObj.options[ selObj.length - 1].value = myValue ;
   selObj.options[ selObj.length - 1].text  = myText;
 
 }

function createSelection( selObj, midashi, aryValue, aryText )
    {
        selObj.length = 0;
        addSelOption( selObj, midashi, midashi);
        for( var i=0; i < aryValue.length; i++)
        {
            addSelOption ( selObj , aryValue[i], aryText[i]);
        }
    }
function createSelection2( selObj, midashi, aryValue, aryText )
    {
        selObj.length = 0;
        addSelOption( selObj, midashi, midashi);
        // 初期化
        for( var i=0; i < aryValue.length; i++)
        {
        var option2 = aryText[i].split(":");
            addSelOption ( selObj , aryValue[i], option2[1]);
        }
    }

