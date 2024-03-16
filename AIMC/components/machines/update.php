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

$id = $_GET['id'];

$SelSql = "SELECT * FROM `machine` WHERE id=$id";
$res = mysqli_query($connection, $SelSql);
$r = mysqli_fetch_assoc($res);


if(isset($_POST) & !empty($_POST)){
	$Name = ($_POST['Name']);
	$ProduceYear = ($_POST['ProduceYear']);
	$Description = ($_POST['Description']);
	$price = ($_POST['price']);
	$thedepth = ($_POST['thedepth']);
	$thespeed = ($_POST['thespeed']);
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
    }else {
    	$image = $r['image'];
    }

    // Execute query
	$query = "UPDATE `machine` SET Name='$Name', ProduceYear='$ProduceYear' , Description='$Description' , price='$price', thedepth='$thedepth' ,  thespeed='$thespeed' , image='$image' WHERE id='$id'";
	
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
		<h2 class="my-4">Add New machines</h2>
		<form method="post" enctype="multipart/form-data">
			<div class="form-group">
                <label>Name</label>
				<input type="text" class="form-control" name="Name" value="<?php echo $r['Name'];?>" required/>
            </div> 
			<div class="form-group">
			<label>Updated ProduceYear</label>
				<input type="date" class="form-control" name="ProduceYear" value="<?php echo $r['ProduceYear'];?>" required/>
            </div> 
			<div class="form-group">
			  <label>Updated Description</label>
				<input type="text" class="form-control" name="Description" value="<?php echo $r['Description'];?>"/ >
            </div> 
            <div class="form-group">
                <label>New Price</label>
				<input type="number" class="form-control" name="price" value="<?php echo $r['price'];?>" required/>
            </div> 
			 <div class="form-group">
                <label>Updated Depth</label>
				<input type="number" class="form-control" name="thedepth" value="<?php echo $r['thedepth'];?>" required/>
            </div> 
			 <div class="form-group">
                <label>Updated Speed</label>
				<input type="number" class="form-control" name="thespeed" value="<?php echo $r['thespeed'];?>"  />
            </div> 
           
            <div class="form-group">
                <label>New Image</label>
				<input type="file" class="form-control" name="image" accept=".png,.gif,.jpg,.webp"/>
            </div> 
			<input type="submit" class="btn btn-primary" value="Update" />
		</form>
	</div>
	
<?php require_once($path . 'templates/footer.php') ?>