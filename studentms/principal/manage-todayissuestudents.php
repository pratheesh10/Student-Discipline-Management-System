<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Student Management System|||Manage Students</title>
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
        <?php include_once('includes/header.php'); ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <?php include_once('includes/sidebar.php'); ?>
            <!-- partial -->

            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title"> Today Students </h3>
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
                                <form method="post" action="manage-todayissuestudents.php">
                                    <label for="class">Select Class:</label>
                                    <select name="class" id="class">
                                        <option value="cse">CSE</option>
                                        <option value="ece">ECE</option>
                                        <option value="eee">EEE</option>
                                        <option value="mech">MECH</option>
                                        <option value="aids">AIDS</option>
                                    </select>
                                    <button type="submit">Filter</button>
                                </form>

                                <div id="student-list">
                                    <!-- Student list will be displayed here -->
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

                                            <?php
                                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                $class = $_POST["class"];
                                                $sql = "SELECT * FROM tblstudent WHERE DateofAdmission = CURDATE() AND StudentClass = ?";
                                                $stmt = $dbh->prepare($sql);
                                                $stmt->execute([$class]);
                                            } else {
                                                $sql = "SELECT * FROM tblstudent WHERE DateofAdmission = CURDATE()";
                                                $stmt = $dbh->query($sql);
                                            }

                                            if ($stmt->rowCount() > 0) {
                                                while ($rows = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                    echo "<tr>";
                                                    echo "<th class='font-weight-bold'>" . $rows["StuID"] . "</th>";
                                                    echo "<th>";
                                                    if ($rows['StudentClass'] == 'cse') {
                                                        echo "CSE";
                                                    } elseif ($rows['StudentClass'] == 'ece') {
                                                        echo "ECE";
                                                    } elseif ($rows['StudentClass'] == 'eee') {
                                                        echo "EEE";
                                                    }
                                                    elseif ($rows['StudentClass'] == 'mech') {
                                                        echo "MECH";
                                                    }
                                                    elseif ($rows['StudentClass'] == 'aids') {
                                                        echo "AIDS";
                                                    }
                                                    echo "</th>";
                                                    echo "<th>" . $rows["StudentName"] . "</th>";
                                                    echo "<th>" . $rows["StudentEmail"] . "</th>";
                                                    echo "<th>" . $rows["DateofAdmission"] . "</th>";
                                                    echo "<th>" . $rows["status"] . "</th>";
                                                    echo "<th>" . $rows["principalstatus"] . "</th>";
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "No students found.";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
</body>

<?php include_once('includes/footer.php');?>
          <!-- partial -->
       
        <!-- main-panel ends -->
     
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="vendors/select2/select2.min.js"></script>
    <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="js/typeahead.js"></script>
    <script src="js/select2.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>
