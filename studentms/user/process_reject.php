<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (isset($_POST['student_id'])) {
    $student_id = $_POST['student_id'];

    try {
        $sql = "UPDATE tblstudent SET status = 'rejected' WHERE ID = :student_id";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':student_id', $student_id, PDO::PARAM_INT);
        $stmt->execute();

        echo "<script>alert('Student rejected');</script>";
        echo "<script>window.location.href = 'manage-students.php'</script>";
    } catch (PDOException $e) {
        echo "Error updating student: " . $e->getMessage();
    }
} else {
    // Handle the case when no student ID is provided in the form
    echo "Invalid request";
}
?>
