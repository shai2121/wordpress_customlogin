<?php
ob_start();
if (is_user_logged_in()) {
  ob_start();
  echo "<script type='text/javascript'>alert('you are already loged in.'); window.location.href='http://localhost/wordpress/';</script>";
  exit;
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  
 
<style>
  .container{
    border-radius: 30px;
    padding: 20px ;
    
  }
  .solid {border-style: solid;
    border-radius: 20px
  }
  .error{
    color:red;
    padding: 10px;
  }
  

</style>
</head>
<body>

 <div class="container">

 
  <form  class =" solid col-8 offset-2 p-4 px-5" method= "post" action="..\wp-content\plugins\loginsystem\connect.php" name ="login">
  <h2 class = " text-primary text-center font-weight-bold">Forget Password </h2>
 
    <div class="form-group ">
    <p >Please enter your registered email id for reset password</p>
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" >
    </div>
   
    
    <button type="submit" class="btn btn-primary col-4 offset-4" name= "fpassword" >SUBMIT</button>
   
  </form>
  </div>
  </body>
</html>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js'></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <script >
  $(login).validate({
 rules:{
         email:
           {
            required:true,
            email:true },
           
        },
         
        messages:{
         email:
           {
            required:'The email ID is required for reset password',
            email:'Please enter only registered EmailId for Login', },
         
        }


      })
</script>
 
  