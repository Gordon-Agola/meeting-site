<?php 
$title = 'View Record';
require_once "includes/header.php";
require_once "includes/auth_check.php";
require_once "db/conn.php";

//get attendee deatails by id

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $result = $crud->getAttendeeDetails($id);

}
else{
    include 'includes/errormessage.php';
}
?>
<div class="card" style="width: 18rem;">

<img src="<?php echo empty($result['avatar_path'])?"uploads/favor.jpg":$result['avatar_path']; ?>" class="rounded-circle" style="width: 20%; height: 20%;" alt="">
  <div class="card-body">
    <h5 class="card-title">
        <?php echo $result['firstname'].'  '.$result['lastname'] ?>
    </h5>
    <h6 class="card-subtitle mb-2 text-muted">
        <?php echo $result['name'] ?>
</h6>
    <p class="card-text">
        Date of Birth : 
        <?php 
        echo $result['dateofbirth']
        ?>
    </p>
    <p class="card-text">
        Email Address: 
        <?php 
        echo $result['emailaddress']
        ?>
    </p>
    <p class="card-text">
        Phone Number : 
        <?php 
        echo $result['contact']
        ?>
    </p>
    
  </div>
</div>
<br>
<a class="btn btn-info" href="viewrecords.php">Back to List</a>
        <a class="btn btn-warning" href="edit.php?id=<?php echo $result['attendee_id']?>">Edit</a>
        <a onclick="return confirm('Are you sure you want to delete this record??');"
         class="btn btn-danger" href="delete.php?id=<?php echo $result['attendee_id']?>">Delete</a>
<br>
    <br>
    <br>
    <br>
    <br>
<?php require_once "includes/footer.php" ?>