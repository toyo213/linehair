<script type="text/javascript">
/* Unorder list   script js*/
var ListuDialog = {
	local_ed : 'ed',
	init : function(ed) {
		ListuDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertListu(ed) {
	 	tinyMCEPopup.execCommand('mceRemoveNode', false, null);
	    var style = jQuery('select#list-style').val();
		var list_text = jQuery('textarea#list-text').val(); 
		    var wrap = jQuery('select#tabs-wrap').val();
		var mceSelected = tinyMCE.activeEditor.selection.getContent();
		var output = '';
		//output = '&nbsp;';
	     if(wrap == 'yes') {
			output += '[list ';
			output += '&nbsp;list_type=unorder';
			output += '&nbsp;list_style=\"' + style +'\"]';
		     }
		output += '[list_item';
		if(list_text) 
		{	
			output += ' list_text=\"' + list_text +'\"';
		}
		output += '/]';
		
		if(wrap == 'yes') {
			output += '[/list]';
		}
		
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(ListuDialog.init, ListuDialog);
</script>
<form action="/" method="get" accept-charset="utf-8">
    <table class="table table-bordered table-condensed">
		<tbody>
			<tr><td>&nbsp;</td><td class="lable-all">Select Setting </td> </tr>
			<tr><td class="lable-all" >Select List Style</td>
				<td class="lable-all"> 
					<select name="list-style" id="list-style" size="1">
					  <option value="redarrow" selected="selected">Red arrow</option>
					   <option value="arrow">Arrow</option>
					</select>  
				</td></tr>
			<tr><td class="lable-all" >New List Group?<br/ ><small>Select yes if you want to select new list st</small></td>
				<td class="lable-all"> 
					<select name="tabs-wrap" id="tabs-wrap" size="1">
					   <option value="no" selected="selected">No</option>
					   <option value="yes">Yes</option>
					</select>  
				 </td>          
			</tr>
			<tr><td class="lable-all">List Content</td>
				<td class="text-box"><textarea class="input-xlarge" placeholder="This text area show all text" id="list-text" value="This text area show all text....." name="list-text" type="text">This text area show all text.....</textarea></td>
			</tr>
			<tr><td>&nbsp;</td><td><a href="javascript:ListuDialog.insert(ListuDialog.local_ed)" id="insert" style="display: block; line-height: 24px;">Insert</a></td></tr>
		</tbody>
	</table>    
</form>