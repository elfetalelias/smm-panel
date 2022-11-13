<form method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>" class="searchform fame-form" >
	<p>
		<input type="text" name="s" id="s" placeholder="<?php esc_attr_e('Search...','fame'); ?>" />
		<input type="submit" id="searchsubmit" class="button-primary" value="" />
	</p>
</form>
<?php
