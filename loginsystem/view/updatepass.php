
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
  
 
  <form  class =" solid col-8 offset-2 p-4 px-5" method= "post" action="..\wp-content\plugins\loginsystem\connect.php" name="password" >
  <h2 class = " text-primary  text-center font-weight-bold">Change Password</h2>


    <div class="form-group">
      <label for="pass">New password:</label>
      <input type="password" class="form-control" id="pass" placeholder="Enter new password " name="pass" >
    </div>
    <div class="form-group">
      <label for="pwd">Confirm Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Confirm new password" name="pswd" >
    </div>
    
    <button type="submit" class="btn btn-primary col-4 offset-4 " name= "passchange" > Password Change</button>
   
  </form>
</div>

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
            required:'The email Id is required for password ',
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

