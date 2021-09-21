
<?php 
$title = 'index';
require_once "includes/header.php";
require_once "db/conn.php";

$results = $crud->getSpecialties();

if(!isset($_GET['id'])){
    include 'includes/errormessage.php';
    header("Location: viewrecords.php");
}
else{
    $id = $_GET['id'];
    $attendee =  $crud->getAttendeeDetails($id);

?>
    <h1 class="text-center">Edit Records</h1>
    <form method="post" action="editpost.php">
        <input type="hidden" name="id" value="<?php echo $attendee['attendee_id']?>"/>
        <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $attendee['firstname']?>">
            
        </div>
        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $attendee['lastname']?>">
            
        </div>
        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="text" class="form-control" id="dob" name="dob" value="<?php echo $attendee['dateofbirth']?>" >
            
        </div>
        <div class="form-group">
            <label for="specialty">Area of Expertise</label>
            <select class="form-control" id="specialty" name="specialty">
               <?php while($r = $results->fetch(PDO::FETCH_ASSOC)){?>
                <option value="<?php echo $r['specialty_id'] ?>" <?php if($r['specialty_id'] == $attendee['specialty_id']) echo "selected"?>>
                <?php echo $r['name']?></option>

                <?php }?>
                
            </select>
            
        </div>
        <div class="form-group">
            <label for="phone">Contact Number</label>
            <input type="text" class="form-control" id="phone" aria-describedby="phoneHelp" name="phone" value="<?php echo $attendee['contact']?>">
            <small id="phoneHelp" class="form-text text-muted">We'll never share your phone number with anyone else.</small>
        </div>
       
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" value="<?php echo $attendee['emailaddress']?>">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        
        <button type="submit" name="submit" class="btn btn-success btn-block">Save Changes</button>
</form>
<?php }?>
    <br>
    <br>
    <br>
    <br>
    <br>
<?php require_once "includes/footer.php" ?>    