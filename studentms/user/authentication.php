<?php      
    include('connection.php');  
    $username = $_POST['user'];  
    $password = $_POST['pass'];  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($dbh, $username);  
        $password = mysqli_real_escape_string($dbh, $password);  
      
        $sql = "select *from tlbhodlogin where username = '$username' and password = '$password'";  
        $result = mysqli_query($dbh, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        $role = $row["role"]; 
        if($count == 1){  
            

    if ($role === "hod cse") {
        header("Location: dashboard.php");
        exit;
    }
    elseif ($role === "hod ece") {
        header("Location: ../principal/dashboard.php");
        exit;
    }
    elseif ($role === "principal") {
        header("Location: ../principal/dashboard.php");
        exit;
    } 
    else {
        // Handle other roles or provide an error message.
        echo "Invalid role";
    }
            header('Location: dashboard.php');
        }  
        else{  
            echo '<script>alert("Invalid username or Password")</script>';
            echo "<script>window.location.href = 'login.php'</script>";
        }     
?>  