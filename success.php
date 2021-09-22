
<?php 
$title = 'Success';
require_once "includes/header.php";
require_once 'db/conn.php';
if(isset($_POST['submit'])){
    //extract values from POST array
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $contact = $_POST['phone'];
    $specialty = $_POST['specialty'];

    $original_file = $_FILES["avatar"]['tmp_name'];
    $ext = pathinfo($_FILES['avatar']['name'],PATHINFO_EXTENSION);
    $target_dir = 'uploads/';
    $destination = $target_dir.$contact.".".$ext;
    move_uploaded_file($original_file,$destination);
    

    $isSuccess = $crud->insertAttendees($fname,$lname,$dob,$email,$contact,$specialty,$destination);

    if($isSuccess){
        include 'includes/successmessage.php';

    }
    else{
        include 'includes/errormessage.php';
    }
}
?>


<div class="card" style="width: 18rem;">
  <div class="card-body">
  <img src="<?php echo $destination ?>" class="rounded-circle" style="width: 16%; height: 20%;" alt="">
    <h5 class="card-title">
        <?php echo $_POST['firstname'].'  '.$_POST['lastname'] ?>
    </h5>
    <h6 class="card-subtitle mb-2 text-muted">
        <?php echo $_POST['specialty'] ?>
</h6>
    <p class="card-text">
        Date of Birth : 
        <?php 
        echo $_POST['dob']
        ?>
    </p>
    <p class="card-text">
        Email Address: 
        <?php 
        echo $_POST['email']
        ?>
    </p>
    <p class="card-text">
        Phone Number : 
        <?php 
        echo $_POST['phone']
        ?>
    </p>
   
  </div>
</div>
<?php
 
?>
<br>
<br>
<br>
<br>
<br>
<?php require_once "includes/footer.php" ?>  