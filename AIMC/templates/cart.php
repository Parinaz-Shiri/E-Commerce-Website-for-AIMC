<?php 
// Include config file

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/AIMC/";
require_once($path . 'connect.php');
 
// Initialize the session
session_start();

if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {
	$url = 'http://' . $_SERVER['HTTP_HOST']; // Get server
    $url .= "/AIMC/components/user/login.php";
	header('Location: ' . $url, TRUE, 302);
}

?>
<?php require($path . 'templates/header.php') ?>

    <div class="wrapper mx-auto">
        <h2>Cart</h2>
        <div class="cart-products">
        	<table class="table "> 
				<thead> 
					<tr> 
						<th>Prod No.</th> 
						<th>Title</th> 
						<th>Price</th> 
					</tr> 
				</thead> 
				<tbody> 
					<!-- fill using script -->
				</tbody>
			</table>
        </div> 
        <a class="btn btn-danger btn-checkout" href="<?php echo '../single.php'; ?>"><span>
				<i class="fa fa-shopping-cart"></i> 
				Order
			</span></a>

    </div>    

<?php require($path . 'templates/footer.php') ?>