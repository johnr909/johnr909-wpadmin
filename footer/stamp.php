<?php
// custom admin footer
function remove_footer_admin () {
	echo '<p>Built by johnr909</p>';
}

add_filter( 'admin_footer_text', 'remove_footer_admin' );
