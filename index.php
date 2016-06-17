<?php
include 'cart_db.php';
include 'cart_application.php';
include 'cart_validate.php';

const TEMPLATE_EXTENSION = '.phtml';
const TEMPLATE_FOLDER = 'templates/';
const TEMPLATE_PREFIX = 'cart_view_';


function display($template, $variables, $extension = TEMPLATE_EXTENSION) {
	extract($variables);
	
	ob_start();
	include TEMPLATE_FOLDER . TEMPLATE_PREFIX . $template . $extension;
	return ob_get_clean();
}

$view_vars = \Cart\App\add_item($cart);

?>


<!doctype html>
<html>
<head><title>Shopping Cart</title></head>
<body>

<h1>Shopping Cart</h1>

<?php echo display('user', ['users' => $users, 'cart' => $cart]); ?>
<?php echo display('item', ['new_item' => $view_vars['new_item']]); ?>
<?php echo display('items', ['cart' => $cart] + $view_vars); ?>

<h1>All Users</h1>
<?php foreach($users as $username => $user) {
	printf("<li>%s</li>\n", $username);
}
?>

</body>
</html>
