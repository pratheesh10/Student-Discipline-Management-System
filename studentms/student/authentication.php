<?php      
    include('connection.php');  
    $username = $_POST['user'];  
    $password = $_POST['pass'];  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($dbh, $username);  
        $password = mysqli_real_escape_string($dbh, $password);  
      
        $sql = "select *from tblstudent where Stuid = '$username' and password = '$password'";  
        $result = mysqli_query($dbh, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
       
        if($count == 1){  
            
            header('Location: dashboard.php');
        }  
        else{  
            echo '<script>alert("Invalid username or Password")</script>';
            echo "<script>window.location.href = 'login.php'</script>";
        }     
?>  