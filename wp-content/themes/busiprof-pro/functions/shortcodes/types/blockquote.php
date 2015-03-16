<script type="text/javascript">
var ColumnDialog = {
	local_ed : 'ed',
	init : function(ed) {
		ColumnDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertColumn(ed) {
	 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		
		//set highlighted content variable
		var mceSelected = tinyMCE.activeEditor.selection.getContent();
		var style = jQuery('select#buttonstyle').val();
		 
		// set up variables to contain our input values
		var content = jQuery('textarea#blockquote-content').val();
		
		 
		var output = '';
		
		// setup the output of our shortcode
		output = '[blockquote ';
	
		output += ' style="' + style + '" ';
		// check to see if the content field is blank
		if(content) {	
			output += ']'+ content + '[/blockquote]';
		}
		
		// if it is blank use selected text
		else {
			output += ']' + mceSelected + '[/blockquote]';
		}
		
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(ColumnDialog.init, ColumnDialog);
 
</script>
<form action="/" method="get" accept-charset="utf-8">
	<div class="form-section clearfix">
		<select class="select-medium" size="1" id="buttonstyle" name="buttonstyle">
			<option selected="selected" value="style1">style1</option>
			<option value="style2">style2</option>
		</select><br /><br />
		
        <label for="blockquote-content">Blockquote</label>
 		<textarea type="text" name="testimonial-content" value="" id="blockquote-content" rows="5"></textarea>
    </div>	
    <a href="javascript:ColumnDialog.insert(ColumnDialog.local_ed)" id="insert" style="display: block; line-height: 24px;">Insert</a>
</form>