function addtag(number,message){
	var form_tag = '<!--cart_button'+number+'-->'+"\n";
			self.parent.onMyPluginShortCode(form_tag);
			self.parent.tb_remove();
}
function addtag2(number,url){
	var form_tag = '<img src="'+url+'/wp-content/plugins/wp-olivecart/stock.php?number='+number+'" />'+"\n";
			self.parent.onMyPluginShortCode(form_tag);
			self.parent.tb_remove();
}

