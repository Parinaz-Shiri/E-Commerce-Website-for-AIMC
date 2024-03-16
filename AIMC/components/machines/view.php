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

$ReadSql = "SELECT * FROM `machine`";
$res = mysqli_query($connection, $ReadSql);


?>
	
<?php require($path . 'templates/header.php') ?>
	<div class="container-fluid my-4">
		<div class="row my-2">
			<h2>OnlineAIMC(Agricultural_Industrial_Machinery_Company) "Shop - machines"</h2>	
			<a href="add.php"><button type="button" class="btn btn-primary ml-4 pl-2">Add New</button></a>
		</div>
		<table class="table "> 
		<thead> 
			<tr> 
				<th>Prod No.</th> 
				<th>Name</th> 
				<th>Price</th> 
				<th>Description</th>
				<th>Produce Year </th> 
				<th>Depth</th>
				<th>Speed</th>
				<th> Image </th> 
				<th>Action</th>
			</tr> 
		</thead> 
		<tbody> 
		<?php 
		while($r = mysqli_fetch_assoc($res)){
		?>
			<tr> 
				<th scope="row"><?php echo $r['id']; ?></th> 
				<td><?php echo $r['Name']; ?></td> 
				<td>$ <?php echo $r['price']; ?></td> 
				<td><?php echo $r['Description']; ?></td> 
				<td><?php echo $r['ProduceYear']; ?></td> 
				<td><?php echo $r['thedepth']; ?></td> 
				<td><?php echo $r['thespeed']; ?></td> 
				<td><img src="<?php echo $server; ?>img/machine/<?php echo $r['image'];?> ?>" style= " width:50px; height:50px;" </th> 
				<td>
					<a href="update.php?id=<?php echo $r['id']; ?>"><button type="button" class="btn btn-info">Edit</button></a>

					<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal<?php echo $r['id']; ?>">Delete</button>

					<!-- Modal -->
					  <div class="modal fade" id="myModal<?php echo $r['id']; ?>" role="dialog">
					    <div class="modal-dialog">
					    
					      <!-- Modal content-->
					      <div class="modal-content">
					        <div class="modal-header">
                            <h5 class="modal-title">Delete machine</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
					        </button>
					        </div>
					        <div class="modal-body">
					          <p>Are you sure?</p>
					        </div>
					        <div class="modal-footer">
					          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					          <a href="delete.php?id=<?php echo $r['id']; ?>"><button type="button" class="btn btn-danger"> Yes, Delete</button></a>
					        </div>
					      </div>
					      
					    </div>
					  </div>

				</td>
			</tr> 
		<?php } ?>
		</tbody> 
		</table>
	</div>

  


<div id="confirm" class="modal hide fade">
  <div class="modal-body">
    Are you sure?
  </div>
  <div class="modal-footer">
    
    <button type="button" data-dismiss="modal" class="btn">Cancel</button>
  </div>
</div>

<?php require($path . 'templates/footer.php') ?>