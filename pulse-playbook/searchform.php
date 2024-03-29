<form role="search" method="get" action="<?php echo home_url('/'); ?>">
	<input type="text" placeholder="<?php esc_attr_e("Rechercher", 'wami'); ?>" value="<?php echo get_search_query(); ?>" name="s" autocomplete="off" />
	<button type="submit"><?php _e("Rechercher", 'wami'); ?></button>
</form>