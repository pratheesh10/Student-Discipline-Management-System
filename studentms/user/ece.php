<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

   

?>



<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>Student  Management System|||Manage Students</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="./vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="./vendors/chartist/chartist.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- End layout styles -->
   
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <?php include_once('includes/header.php');?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php include_once('includes/sidebar.php');?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
             <div class="page-header">
              <h3 class="page-title"> ECE Students </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Manage Students</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                      <h4 class="card-title mb-sm-0">ECE Students</h4>
                      <a href="#" class="text-dark ml-auto mb-3 mb-sm-0"> View all Students</a>
                    </div>
                    <div class="table-responsive border rounded p-1">
                      <table class="table">
                        <thead>
                          <tr>
                            
                            <th class="font-weight-bold">Student ID</th>
                            <th class="font-weight-bold">Student Class</th>
                            <th class="font-weight-bold">Student Name</th>
                            <th class="font-weight-bold">Student Issue</th>
                            <th class="font-weight-bold">Issue Date</th>
                            <th class="font-weight-bold">HOD Status</th>
                            <th class="font-weight-bold">Principal Status</th>
                            
                          </tr>
                        </thead>
                        <tbody>
</div>
                  </div>
                </div>
<?php
     include('includes/dbconnection.php');
$sql = "SELECT * FROM tblstudent WHERE StudentClass = '4'";

$result = $dbh->query($sql);

if ($result->rowCount() > 0) {
    
   
    
    // Fetch results using a while loop
    while ($rows = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<th class='font-weight-bold'>" . $rows["StuID"] . "</th>";?>
        <th>
        <?php if ($rows['StudentClass'] == '4') { 
                              
          echo"ECE";
        }?></th>
        <?php
        echo "<th class='font-weight-bold'>" . $rows["StudentName"] . "</th>";
        echo "<th class='font-weight-bold'>" . $rows["StudentEmail"] . "</th>";
        echo "<th class='font-weight-bold'>" . $rows["DateofAdmission"] . "</th>";
        echo "<th class='font-weight-bold'>" . $rows["status"] . "</th>";
        echo "<th class='font-weight-bold'>" . $rows["principalstatus"] . "</th>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No ECE students found.";
}
?></div>
