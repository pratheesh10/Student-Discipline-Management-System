

<html>  
<head>  
    <title>PHP login system</title>  
    
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="css/style.css">
</head>  
<body>  
<div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="images/logo.svg">
    <div id = "frm">  
    <h4>Hello! let's get started</h4>
                <h6 class="font-weight-light">Sign in to continue.</h6>
        <form name="f1" action = "authentication.php" onsubmit = "return validation()" method = "POST">  
            <div class="form-group">
                
                <input  class="form-control form-control-lg" type = "text" id ="user" name  = "user" />  
</div> 
            <div class="form-group">  
               
                <input  class="form-control form-control-lg" type = "password" id ="pass" name  = "pass" />  
</div> 
            <div class="mt-3">     
                <input  class="btn btn-success btn-block loginbtn" type =  "submit" id = "btn" value = "Login" />  
</div> 

   <div class="mb-2">
                    <a href="../index.php" class="btn btn-block btn-facebook auth-form-btn">
                      <i class="icon-social-home mr-2"></i>Back Home </a>
                  </div>
                  
        </form>  
    </div>  
    </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
     
    <script>  
            function validation()  
            {  
                var id=document.f1.user.value;  
                var ps=document.f1.pass.value;  
                if(id.length=="" && ps.length=="") {  
                    alert("User Name and Password fields are empty");  
                    return false;  
                }  
                else  
                {  
                    if(id.length=="") {  
                        alert("User Name is empty");  
                        return false;  
                    }   
                    if (ps.length=="") {  
                    alert("Password field is empty");  
                    return false;  
                    }  
                }                             
            }  
        </script>  
</body>     
</html>  