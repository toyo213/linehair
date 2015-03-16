<script type="text/javascript">
var HRDialog = {
	local_ed : 'ed',
	init : function(ed) {
		HRDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertHR(ed) {
	 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		 
		// set up variables to contain our input values
		var title = jQuery('input#heading-title').val();
		var heading_style = jQuery('select#headingstyle').val();
	
		 
		 
		//set highlighted content variable
		var mceSelected = tinyMCE.activeEditor.selection.getContent();
		
		// setup the output of our shortcode
		var output = '';
		
		output = '&nbsp;';
		output = '[heading title="' + title + '"';
		
		if(headingstyle) {
			output += ' heading_style="'+ heading_style +'" ';
		}
		
		output += ']';

		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(HRDialog.init, HRDialog);
 
</script>
<form action="/" method="get" accept-charset="utf-8">
	<table class="table table-bordered table-condensed">
    	<tbody>
			<tr><td class="lable-all">Style</td>
				<td><select class="select-medium" size="1" id="headingstyle" name="headingstyle">
						<option selected="selected" value="h1">h1</option>
						<option value="h2">h2</option>
						<option value="h3">h3</option>
						<option value="h4">h4</option>
						<option value="h5">h5</option>
						<option value="h6">h6</option>
					</select>
				</td></tr>     
			<tr><td class="lable-all">Title</td>
				<td><input class="input-medium" type="text" name="heading-title" value="" id="heading-title" /></td></tr>
			<tr> <td>&nbsp;</td>
				<td><a href="javascript:HRDialog.insert(HRDialog.local_ed)" id="insert" style="display: block; line-height: 24px;">Insert</a></td></tr>
		</tbody>
	</table>
</form>