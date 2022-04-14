<!DOCTYPE html>
<html>
<head>

    <title>Caratzone</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="dependencies/bootstrap.min.css">
    <link rel="stylesheet" href="display.css">
    <script src="dependencies/jquery.min.js"></script>
    <script src="dependencies/popper.min.js"></script>
    <script src="dependencies/bootstrap.min.js"></script>
    
 
</head>

<body >
    
<?php

    echo file_get_contents('nav.html');








?>


      <div class="background_container">


          <img  src="resources/accountpage/account.jpg" style="width:100%;">


      </div>








      <div class="form_container">

        <div class="login_form" id="login_form">
        <h2 style="margin-left:2%;">Login</h2>
        <br>

        <?php
        
          if(isset($_GET['signup'])){

            $type = $_GET['signup'];


            if($type=="success"){

              echo "<div class=\"alert alert-success alert-dismissible\"> <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>Account Created Successfully</div>";


            }
            else if($type=="failed"){
              echo "<div class=\"alert alert-danger alert-dismissible\"> <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>Account Creation Failed</div>";




            }




          }

      
        
        
        
        ?>
        <form class="form-horizontal" action="/login.php" method="post">
        <div class="form-group">
      <label class="control-label col-sm-2" for="username">Username:</label>
      <div class="col-sm-10">
        <input  class="form-control" id="username" placeholder="Enter username" name="username">
        
      </div>
      </div>
      <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" id="pass" placeholder="Enter password" name="pass">
      </div>
    </div>

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Log In</button>
        <button type="button" class="btn btn-secondary" onclick="document.getElementById('signup_form').style.display = 'block';document.getElementById('login_form').style.display = 'none';">Sign up</button>
        <?php
        
        if(isset($_GET['loginmessage'])){

          $type = $_GET['loginmessage'];


          if($type=="0"){

            echo "<div class=\"alert alert-danger alert-dismissible\"> <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>Username does not exist</div>";


          }
          else if($type=="1"){
            echo "<div class=\"alert alert-danger alert-dismissible\"> <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>Wrong password</div>";




          }




        }

    
      
      
      
      ?>
    
    </div>
    </div>

        </form>

        </div>
        <div class="signup_form" id="signup_form">
        <h2 style="margin-left:2%;"><button type="button"class="btn btn-secondary" onclick="document.getElementById('signup_form').style.display = 'none';document.getElementById('login_form').style.display = 'block';"><img src="resources/shoppage/returnIcon.png" style="width:25px"></button> Sign up</h2>
        <form class="form-horizontal" action="/signup.php" method="post">
        <div class="form-group">
      <label  class="control-label col-sm-2" for="fname">First Name:</label>
      <div class="col-sm-10">
        <input  class="form-control" id="fname" placeholder="Enter first name" name="fname" onkeyup="checkValidFNameLength()">
        
        <div id="fname_note"></div>
      </div>
      </div>
      <div class="form-group">
      <label  class="control-label col-sm-2" for="lname"> Last Name:</label>
      <div class="col-sm-10">
        <input  class="form-control" id="lname" placeholder="Enter last name" name="lname" onkeyup="checkValidLNameLength()">
        <div id="lname_note"></div>
      </div>
      </div>
      <div class="form-group">
      <label class="control-label col-sm-2" for="susername"> Username:</label>
      
      <div class="col-sm-10">
        <input  class="form-control" id="susername" placeholder="Enter Username" onkeyup="checkUsername(this.value)" name="susername">
        <div id="username_note"></div>
      </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-2" for="spass">Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" id="spass" onkeyup = "checkPassword()"placeholder="Enter password" name="spass">
      </div>
    </div>
    <div class="form-group">
     
      <div class="col-sm-10">          
        <input type="password" class="form-control" id="cspass" onkeyup = "checkPassword()" placeholder="Confirm password" name="cspass">
        <div id="password_note"></div>
      </div>
    </div>



    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" id="submit_sign_up" class="btn btn-outline-primary" disabled>Sign up</button>
      </div>
    </div>





      </form>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br>


      </div>



















      <script>  
      $(document).ready(function(){
       $("body").fadeIn(2000);
      
      });

      </script>
      
      
      <script>

//validity attributes
      var validusernamelength = false;
      var usernameExist = false;
      var passwordmatch = false;
      var validpasswordlength = false
      var validfnamelength = false;
      var validlnamelength = false;







      function checkIfUsernameExist(namestring){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {

      if (this.readyState == 4 && this.status == 200) {
       
        var message = JSON.parse(this.responseText);

        if(message.exist == "true"){
          
          usernameExist = true;
          document.getElementById('username_note').innerHTML = "<p class='text-warning'>Username already exist</p>";

        }

        else if(message.exist == "false" && validusernamelength){

         
          usernameExist = false;
          document.getElementById('username_note').innerHTML = "";

        }
      }
    };


    
    var sendstring = "susername="+namestring.toString();


xhttp.open("POST", "cuser.php", true);
xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhttp.send(sendstring);
submitCheck();

      }
      
    


    function checkUsernameLengthIfValid(namestring){
      var usernametextbox = document.getElementById("susername");
        if(usernametextbox.value.length <4){

            validusernamelength = false
           
        }
        else{

          validusernamelength = true
        
        }

       


    }



    //checks the username
    function checkUsername(namestring){
      submitCheck();
      checkUsernameLengthIfValid(namestring);
      checkIfUsernameExist(namestring);



        if(validusernamelength == false){
          document.getElementById('username_note').innerHTML = "<p class='text-warning'>Username should contain atleast 4 characters</p>";




        }

        else if(usernameExist){

          document.getElementById('username_note').innerHTML = "<p class='text-warning'>Username already exist</p>";

        }

        else{

          document.getElementById('username_note').innerHTML = "";

        }
        submitCheck();

    }



      function checkPassword(){



        var pass1 = document.getElementById('spass').value;
        var pass2 = document.getElementById('cspass').value;

        if(pass1.length <=8){

            validpasswordlength = false
            document.getElementById('password_note').innerHTML = "<p class='text-warning'>Password should have atleast 8 characters </p>";


        }
        else{

          validpasswordlength = true


        }
       

        if (pass1 == pass2 && validpasswordlength){
          passwordmatch = true;
          document.getElementById('password_note').innerHTML = "<p class='text-success'>Password Match</p>";


        }

        else if (pass1 != pass2 && validpasswordlength){

          passwordmatch = false;
          document.getElementById('password_note').innerHTML = "<p class='text-danger'>Password not match</p>";
         }

         submitCheck();

      }




      function checkValidFNameLength(){

        var fname = document.getElementById('fname').value;

        if(fname.length <=1){

          validfnamelength = false;
          document.getElementById('fname_note').innerHTML = "<p class='text-warning'>please enter a valid name</p>";


        }


        else{

          validfnamelength = true;

          
          document.getElementById('fname_note').innerHTML = "";


        }

        submitCheck();









      }
  function checkValidLNameLength(){

        var lname = document.getElementById('lname').value;

        if(lname.length <=1){

          validlnamelength = false;
          document.getElementById('lname_note').innerHTML = "<p class='text-warning'>please enter a valid last name</p>";


        }


        else{

          validlnamelength = true;

          document.getElementById('lname_note').innerHTML = "";
          

        }

        submitCheck();



      }



      function submitCheck(){

        if(validusernamelength && usernameExist == false && passwordmatch &&validpasswordlength &&validfnamelength&&validlnamelength){

          document.getElementById('submit_sign_up').disabled = false;



        }
    else{

      document.getElementById('submit_sign_up').disabled = true;


      }








      }






















      </script>










<div class="foot bg-dark" >

<h3>CARATZONE</h3>
<p>2021</p>
</div>

      </body>
      </html>