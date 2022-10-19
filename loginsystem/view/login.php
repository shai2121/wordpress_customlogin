<?php
ob_start();
if (is_user_logged_in()) {
  ob_start();
   echo "<script type='text/javascript'>alert('you are already loged in.'); window.location.href=/wordpress/;</script>";
  exit;
}

?>
  
  <head>
    
 
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
  <h2 class = " text-primary text-center font-weight-bold">Welcome to login page</h2>
 
    <div class="form-group ">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" >
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" >
    </div>
    
    <button type="submit" class="btn btn-primary col-4 offset-4" name= "logon" >Login</button>
    
   
  </form>
  </div>
  </body>
  <script >
  $(login).validate({
 rules:{
         email:
           {
            required:true,
            email:true },
           
         pswd: 'required',},
         
        messages:{
         email:
           {
            required:'The email ID is required for Login',
            email:'Please enter only registered EmailId for Login', },
           
         pswd: {required:'The Password  is required for login',},
         
        }


      })
</script>
 
  