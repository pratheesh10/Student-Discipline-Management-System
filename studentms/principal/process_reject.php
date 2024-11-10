<?php
session_start();
include('includes/dbconnection.php');

if (isset($_POST['student_id'])) {
    $student_id = $_POST['student_id'];

    try {
        // Update student status to 'rejected'
        $sql = "UPDATE tblstudent SET principalstatus = 'rejected' WHERE ID = :student_id";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':student_id', $student_id, PDO::PARAM_INT);
        $stmt->execute();

        // Return success response
        echo json_encode(['status' => 'success']);
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => "Error updating student: " . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}
?>
