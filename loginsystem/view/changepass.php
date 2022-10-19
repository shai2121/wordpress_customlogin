

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
  
 
  <form  class =" solid col-8 offset-2 p-4 px-5" method= "post" action="..\wp-content\plugins\loginsystem\connect.php" name="password" >
  <h2 class = " text-primary  text-center font-weight-bold">Reset Password</h2>

  <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" >
    </div>

  <div class="form-group">
      <label for="vcode">Verification code:</label>
      <input type="text" class="form-control" id="vcode" placeholder="Enter verification code. " name="vcode" >
    </div>

    <div class="form-group">
      <label for="pass">New password:</label>
      <input type="password" class="form-control" id="pass" placeholder="Enter new password " name="pass" >
    </div>
    <div class="form-group">
      <label for="pwd">Confirm Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Confirm new password" name="pswd" >
    </div>
    
    <button type="submit" class="btn btn-primary col-4 offset-4 " name= "changepass" >Reset Password</button>
   
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js'></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
 
<script >
   $(password).validate({
 rules:{  
  email:
           {
            required:true,
            email:true },
         pass: 'required',
         vcode:'required',
         pswd:{
             required:true,
             equalTo:pass ,
            }},
         messages:{
          email:
          {
            required:'The email Id is required for password reset',
            email:'You must enter a velid email address' },
           
         pass: {required:'The new Password  is required for Password change'},
         vcode:{required:'The verification code  is required for set new password'},
         pswd:{
             required:'The Confirm Password is required for Password change ',
             equalTo: 'Please enter the same value for password and confirm password' }, 
      },
        

      })
  
</script>

</body>
</html>
