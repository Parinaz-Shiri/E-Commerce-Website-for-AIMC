<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/AIMC/";

require_once($path . 'connect.php');

// Initialize the session
session_start();

if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['role'] == 'admin')) {
	echo "Unauthorized Access";
	return;
}

if(isset($_POST) & !empty($_POST)){
	$Name = ($_POST['Name']);
	$Description = ($_POST['Description']);
	$price = ($_POST['price']);
	$thedepth = ($_POST['thedepth']);
	$thespeed = ($_POST['thespeed']);
	$ProduceYear = ($_POST['ProduceYear']);
	// store n upload image
    $image = $_FILES['image']['name']; 
    $dir="../img/machine/";
    $temp_name=$_FILES['image']['tmp_name'];
    if($image!="")
    {
        if(file_exists($dir.$image))
        {
            $image= time().'_'.$image;
        }
        $fdir= $dir.$image;
        move_uploaded_file($temp_name, $fdir);
    }

    // Execute query
	$query = "INSERT INTO `machine` (Name, Description, price, thedepth , thespeed , ProduceYear , image) VALUES ('$Name', '$Description', '$price', '$thedepth', '$thespeed' , '$ProduceYear'  ,'$image')";
	$res = mysqli_query($connection, $query);
	if($res){
		header('location: view.php');
	}else{
		$fmsg = "Failed to Insert data.";
		print_r($res->error_list);
	}
}
?>

<?php require_once($path . 'templates/header.php') ?>

	<div class="container">
	<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
		<h2 class="my-4">Add New machine</h2>
		<form method="post" enctype="multipart/form-data">
			<div class="form-group">
                <label>Name</label>
				<input type="text" id="id" class="form-control" name="Name" value="" required/>
            </div> 
			<div class="form-group">
                <label>Description</label>
				<input type="text" id="id" class="form-control" name="Description" value="" required/>
            </div> 
            <div class="form-group">
                <label>Price</label>
				<input type="number" class="form-control" name="price" value="" required/>
            </div> 
            <div class="form-group">
                <label>Depth</label>
				<input type="number" class="form-control" name="thedepth" value="" required/>
            </div> 
			  <div class="form-group">
                <label>Speed</label>
				<input type="number" class="form-control" name="thespeed" value="" required/>
            </div> 
			<div class="form-group">
                <label>ProduceYear</label>
				<input type="date" class="form-control" name="ProduceYear" value="" required/>
            </div> 
            <div class="form-group">
                <label>Image</label>
				<input type="file" class="form-control" name="image" accept=".png,.gif,.jpg,.webp" required/>
            </div> 
			<input type="submit" class="btn btn-primary" value="Add Product" />
		</form>
	</div>
	
<?php require_once($path . 'templates/footer.php') ?>