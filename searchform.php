<form method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
	<div id="search-inputs">
		<input type="text" name="s" id="s" value="<?php esc_attr_e("Enter Search Term...", "justlanded"); ?>" onfocus="if (this.value == '<?php esc_attr_e("Enter Search Term...", "justlanded"); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php esc_attr_e("Enter Search Term...", "justlanded"); ?>';}"/>
		<input id="button_search" type="submit" value=" "/>
	</div>
</form>