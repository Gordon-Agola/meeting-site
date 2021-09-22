<?php
//This includes the session file. This file contain a code that start and resume a session
//by having it in the header file. It will be included in every page
require_once "includes/session.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="css/site.css">
    <title>Attendance - <?php echo $title ?></title>
  </head>
  <body>
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
          <a class="navbar-brand" href="index.php">IT Conference</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="viewrecords.php">View Attendee</a>
              </li>
             
            </ul>
            <ul class="navbar-nav ml-auto">
              <?php if(!isset($_SESSION['username'])){?>
              <li class="nav-item">
                <a class="nav-link" href="login.php">Login <span class="sr-only">(current)</span></a>
              </li>
              <?php }else {?>
                
                <li class="nav-item">
                <a class="nav-link" href="#"><span>Hello <?php echo $_SESSION['username']?>!</span><span class="sr-only">(current)</span></a>
              </li>
                <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout<span class="sr-only">(current)</span></a>
              </li>
              <?php }?>
             
            </ul>
          </div>
        </nav>
        <br/>