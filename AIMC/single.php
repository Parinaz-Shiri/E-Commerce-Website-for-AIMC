<?php
// Include config file
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/AIMC/";
require_once($path . 'connect.php');

// Escape user inputs for security
$amount = mysqli_real_escape_string($connection,$_POST['amount']);

$sql = "INSERT INTO transaction (Amount) VALUES ('$amount')";
if(mysqli_query($connection , $sql)){
  // header("location: index.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection );
}
 
// Close connection
mysqli_close($connection );
 
// Initialize the session
session_start();

if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {
	$url = 'http://' . $_SERVER['HTTP_HOST']; // Get server
    $url .= "/AIMC/components/user/login.php";
	header('Location: ' . $url, TRUE, 302);
}

?>
<?php require($path . 'templates/header.php') ?>
<div class="transaction" style="background-image: url('img/4.png');box-shadow: 0 12px 15px 0 rgb(0 0 0 / 24%), 0 17px 50px 0 rgb(0 0 0 / 19%);width: 690px;margin: 0 auto;margin-top: 31px;border-radius: 18px;"
>
<div class="wrapper mx-auto" style=" width: 571px;  margin-bottom:0px;">
        <h2 style="text-align: center;">Electronical Pay</h2><i class="fa fa-shopping-basket text-dark"
		style="/* float: right; */color: green !important;margin-left: 241px;font-size: 36px;margin-bottom: 10px;"></i>
        <p style="font-size: 17px;">Please Enter your cards information.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group" style="
     margin-top: 14px;
">
                <label style="font-size: 21px;     margin-top: 7px;">Card Number</label>
                <input class="form-control" type="text">
  
            </div>    
            <div class="form-group" style="
     margin-top: 14px;
" >
                <label style="font-size: 21px;     margin-top: 7px;">Password</label>
                <input type="password" name="" class="form-control" style=" margin-left: 137px; width:50%;text-align: center;">
              
            </div>
			<div class="form-group"  style="
     margin-top: 14px;
">
                <label style="font-size: 21px;     margin-top: 7px;">CVV2</label>
                <input type="password" name="" class="form-control" style=" margin-left: 137px; width:50%;text-align: center;">
            </div>
			<div class="form-group" style="
     margin-top: 14px;
" >
                <label style="font-size: 21px;     margin-top: 7px;">Expiration Date</label>
                <input type="date" name="" class="form-control" style="width:50%;margin-left: 136px;">
 
            </div>
			<div  class="form-group" style="
     margin-top: 14px;
" >
                <label style="font-size: 21px; margin-top: 7px;">CAPTCHA</label>
				<img src="img/6.png" style="float: right;margin-top: 14px;margin-left: 37px;">
            
                <input style ="float: right;width: 34%;text-align: center;margin: 15px;margin-left: 55px;" type="text" name="" class="form-control">
            </div>
			
			<div class="form-group" style="
     margin-top: 14px;
">
                <label style="font-size: 21px;     margin-top: 7px;">Email</label>
                <input type="email" name="email" class="form-control" >
            </div>
			
			<div class="form-group" style="
     margin-top: 14px;
">
                <label style="font-size: 21px;     margin-top: 7px;">Price</label>
                <input type="number" name="amount" class="form-control" style="width:50%;margin-left: 136px;">
           
				</div>
            <div class="form-group">
                <button  onclick="Myfunction()" type="submit" class="btn btn-primary" value="submit" name="submit">submit</button>
            </div>
        </form>
    </div>    

</div>  

<?php require('templates/footer.php') ?>
<script> 
function Myfunction() {
	swal({
  title: "Success",
  text: "The machine added to your cart",
  icon: "success",
});
   
}
</script>