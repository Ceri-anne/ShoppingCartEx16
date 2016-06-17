<?php

namespace Cart\App;

use function Cart\Db\create_item, 
			 Cart\Db\save_cart,
			 Cart\Db\read_item_name;
			 
use function Cart\Db\delete_user,
			 Cart\Validation\postcode_valid;

function add_item(&$cart) {

	$new_id = create_item($cart, [
		'name' => 'HTC m8',
		'price' => 500
	]);
	
	save_cart($cart);

	return ['new_item' => read_item_name($cart, 'HTC m8')];
}


?>