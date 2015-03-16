<script type="text/javascript">
var PORTDialog = {
	local_ed : 'ed',
	init : function(ed) {
		PORTDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertPORT(ed) {
	 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		 
		// set up variables to contain our input values
		var column = jQuery('select#portfolio-column').val();
		var type = 'portfolio'; //jQuery('input#hr-margin-top').val(); 		 
		 
		//set highlighted content variable
		var mceSelected = tinyMCE.activeEditor.selection.getContent();
		
		// setup the output of our shortcode
		var output = '';
		
		output = '&nbsp;';
		output = '[portfolio type=' + type + ' column='+column+']';

		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(PORTDialog.init, PORTDialog);
 
</script>
<form action="/" method="get" accept-charset="utf-8">
	<div class="form-section clearfix">
        <label for="portfolio-column">Portfolio column</label>
        <select name="portfolio-column" id="portfolio-column" size="1">
            <option value="2" selected="selected">2 column</option>
            <option value="3">3 column</option>
			<option value="4">4 column</option>
             
        </select>
    </div>        
	<a href="javascript:PORTDialog.insert(PORTDialog.local_ed)" id="insert" style="display: block; line-height: 24px;">Insert</a>
</form>