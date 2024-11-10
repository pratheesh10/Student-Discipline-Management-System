<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sturecmsaid']==0)) {
  header('location:logout.php');
  } else{}
   // Code for deletion
if(isset($_GET['delid']))
{
$rid=intval($_GET['delid']);
$sql="delete from tblstudent where ID=:rid";
$query=$dbh->prepare($sql);
$query->bindParam(':rid',$rid,PDO::PARAM_STR);
$query->execute();
 echo "<script>alert('Data deleted');</script>"; 
  echo "<script>window.location.href = 'manage-students.php'</script>";     


}
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
              <h3 class="page-title">  Students </h3>
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
                      <h4 class="card-title mb-sm-0"> Students</h4>
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
                        
                        

<?php
include('includes/dbconnection.php'); // Include the database connection script

// Get the selected date from the user
$searchDate = $_POST['search_date']; // You can use POST or GET method based on your needs

// Prepare and execute a SQL query to retrieve student issues for the selected date
$sql = "SELECT * FROM tblstudent WHERE DateofAdmission = :searchDate";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(":searchDate", $searchDate);
$stmt->execute();

// Fetch and print student issues for the selected date
if ($stmt->rowCount() > 0) {
    
  
    
    while ($rows = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<th class='font-weight-bold'>" . $rows["StuID"] . "</th>";?>
        <th>
        <?php if ($rows['StudentClass'] == '1') { 
                               echo"cse";}
              elseif($rows['StudentClass']=='4')  
                             echo'ECE'; 
              elseif($rows['StudentClass']=='5')  
                         echo'EEE';  
                         elseif($rows['StudentClass']=='6')  
                         echo'MECH';              
        ?></th>
        <?php
        echo "<th class='font-weight-bold'>" . $rows["StudentName"] . "</th>";
        echo "<th class='font-weight-bold'>" . $rows["StudentEmail"] . "</th>";
        echo "<th class='font-weight-bold'>" . $rows["DateofAdmission"] . "</th>";
        echo "<th class='font-weight-bold'>" . $rows["status"] . "</th>";
        echo "<th class='font-weight-bold'>" . $rows["principalstatus"] . "</th>";
        echo "</tr>";
    }
} else {
    echo "No student issues found for the selected date.";
}
?></div>
