<?php
require_once "includes/auth_check.php";
require_once "db/conn.php";
if(!$_GET['id']){
    include "includes/errormessage.php";
    header("Location: viewrecords.php");
}
else{
    //get id value
    $id = $_GET['id'];
    //Call Delete Function
    $result = $crud->deleteAttendee($id);

    //Redirect to list
    if($result){
        header("Location: viewrecords.php");
    }

}
?>