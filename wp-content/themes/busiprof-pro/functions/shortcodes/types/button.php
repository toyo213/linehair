<script type="text/javascript">
/*button script*/
var BUTTONDialog = {
	local_ed : 'ed',
	init : function(ed) {
		BUTTONDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertBUTTON(ed) {
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		var style = jQuery('select#buttonstyle').val();
		var size = jQuery('select#size').val();
		var btn_disable = jQuery('input#btn_disable').attr('checked') ? 1 : 0;
		
		var target = jQuery('select#target').val();
		var buttonlink = jQuery('input#button-link').val();
		var textdata = jQuery('input#button-text').val();

		var mceSelected = tinyMCE.activeEditor.selection.getContent();
		var output = '';
		output = '&nbsp;';
		
		outputbutton = '[button ';
		outputbutton += ' style="' + style + '" ';
		outputbutton += ' size="' + size + '" ';
		outputbutton += ' btn_disable="' + btn_disable + '" ';
		
		if(target == 'blank')
		{
			outputbutton += ' target="blank"';
		}
		if(buttonlink && textdata)
		{
			
			 outputbutton += ' url="' + buttonlink + '" ]' + textdata + '[/button]';
		
		}
		else
		{
			if(buttonlink)
			{
				outputbutton = outputbutton + ' url="' + buttonlink + '" ]Button[/button]';
			}
			if(textdata)
			{
				outputbutton = outputbutton + ']'+ textdata + '[/button]';
			}
		}
		if(!buttonlink && !textdata)
		{
			outputbutton = outputbutton + ']' + mceSelected + '[/button]';
		}		
	
		tinyMCEPopup.execCommand('mceReplaceContent', false, outputbutton);
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(BUTTONDialog.init, BUTTONDialog);
 
</script>
<form action="/" method="get" accept-charset="utf-8">
	<table class="table table-bordered table-condensed">
    	<tbody>
			<tr><td>&nbsp;</td><td class="lable-all">Select Setting </td></tr>
    		<tr><td class="lable-all">Style</td>
    			<td><select class="select-medium" size="1" id="buttonstyle" name="buttonstyle">
                      	<option selected="selected" value="btn btn-primary">Blue</option>
						<option value="btn btn-success">Green</option>
					    <option value="btn btn-inverse">Black</option>
						<option value="btn">Sliver</option>
						<option value="btn btn-danger">Red</option>
						<option value="btn btn-warning">Orange</option>
                        <option value="btn btn-info">ocean blue</option>
						<option value="spa-btn yellow">Yellow</option>
						<option value="spa-btn magenta">Magenta</option>
                        <option value="spa-btn aqua">Aqua</option>
                        <option value="spa-btn grey">Grey</option>
						
					</select>
				</td>
    		</tr>
			<tr><td class="lable-all">Size</td>
    			<td><select class="select-medium" size="1" id="size" name="size">
            			<option selected="selected" value="btn-large">Large</option>
						<option value="">Default</option>
            			<option value="btn-mini">Mini</option>
        			</select>				
				</td>
    		</tr>
			<tr><td class="lable-all">Target</td>
				<td><select class="select-medium" name="target" id="target" size="1">
						<option value="self" selected="selected">Self</option>
						<option value="blank">Blank</option>
					</select>			
				</td>
			</tr>
			<tr><td class="lable-all">Link</td>
    			<td><input class="input-medium" placeholder="http://facebook.com" type="text" id="button-link" value="" name="button-link"></td>
    		</tr>
			<tr><td class="lable-all">Text</td>
    			<td><input class="input-medium" placeholder="Button Name" type="text" id="button-text" value="Button Here" name="button-text"></td>
    		</tr>
			<tr><td>&nbsp;</td>
    			<td><a href="javascript:BUTTONDialog.insert(BUTTONDialog.local_ed)" id="insert" style="display: block; line-height: 24px;">Insert</a></td>
    		</tr>
    	</tbody>
    </table>
</form>