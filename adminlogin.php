<?php


?>

<!DOCTYPE html>

<html>
<head>
<link rel="stylesheet" href="dependencies/bootstrap.min.css">
<script src="dependencies/jquery.min.js"></script>
    <script src="dependencies/popper.min.js"></script>
    <script src="dependencies/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<style>body {
    font-family: "Lato", sans-serif;
}



.main-head{
    height: 150px;
    background: #007bff;
   
}

.sidenav {
    height: 100%;
    background-color: #007bff;
    overflow-x: hidden;
    padding-top: 20px;
}


.main {
    padding: 0px 10px;
}

@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
}

@media screen and (max-width: 450px) {
    .login-form{
        margin-top: 10%;
    }

    .register-form{
        margin-top: 10%;
    }
}

@media screen and (min-width: 768px){
    .main{
        margin-left: 40%; 
    }

    .sidenav{
        width: 40%;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
    }

    .login-form{
        margin-top: 80%;
    }

    .register-form{
        margin-top: 20%;
    }
}


.login-main-text{
    margin-top: 20%;
    padding: 60px;
    color: #fff;
}

.login-main-text h2{
    font-weight: 300;
}

.btn-black{
    background-color: #007bff !important;
    color: #fff;
}</style>
<!------ Include the above in your HEAD tag ---------->
</head>
<body>

<div class="sidenav">
         <div class="login-main-text">
            <h2>Admin<br> Login Page</h2>
            <p>Login from here to access database.</p>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
               <form action = "adminverify.php" method="post">
                  <div class="form-group">
                     <label>Admin</label>
                     <input type="text" class="form-control" placeholder="Admin" name="username">
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" class="form-control" placeholder="Password" name="pass">
                  </div>
                  <button type="submit" class="btn btn-black">Login</button>
                 
               </form>
               <?php if(isset($_GET['login_message'])){

if($_GET['login_message']=="failed"){
echo "<div class=\"alert alert-danger alert-dismissible\"> <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>Wrong username or password</div>";

}

               }?>
            </div>
         </div>
      </div>

      </body>


      </html>