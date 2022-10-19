

<?php
if (is_user_logged_in()) {
  ob_start();
  echo "<script type='text/javascript'>alert('you are already loged in;Please logout for new registraton.'); window.location.href='http://localhost/wordpress/';</script>";
  exit;
}



      
?>

  <head>
  <style>
  .border{border-style: solid;
    border-radius: 20px
  }
  .error{
    color:red;
    padding: 10px;
  }
  </style>
</head>
  <body>
  

  
  <div class="container my-4">

  <div class="border p-4 px-5">
  <h2 class="text-primary text-center">Registration form</h2>
  
  <form method= "post" action="..\wp-content\plugins\loginsystem\connect.php" enctype="multipart/form-data" name ="signup" >

  <div class="form-group  ">
      <label for="name">First Name :</label>
      <input type="name" class="form-control" id="name"  placeholder="Enter fist name" name="fname">
    </div>

    <div class="form-group">
      <label for="name">Last Name :</label>
      <input type="name" class="form-control" id="name" placeholder="Enter last name" name="lname">
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" >
    </div>

    <div class="form-group">
      <label for="user">User name:</label>
      <input type="name" class="form-control"   placeholder="user name" name="uname">
    </div>
    <div class="form-group">
      <label for="contect">Phone No:</label>
      <input type="contect-no" class="form-control" titile ="contect no must be only 10digit."  placeholder="contact no" name="contact">
    </div>
    <div class="form-groups">
      <label for="pic">Pofile picture:</label>
      <input type="file"  id="pic" name="pic">
    </div>
   
    <div class="form-group">
      <label for="pswd">Password:</label>
      <input type="password" class="form-control" id="pswd" placeholder="password" name="pswd" >
    </div>
    <div class="form-group">
      <label for="cpswd"> conform Password:</label>
      <input type="password" class="form-control" id="cpswd" placeholder="password" name="cpswd">
    </div>
    <button type="submit" name="submit" class="btn btn-primary col-2 offset-5">Register</button>
    
  </form>
</div>

 
       
  
</div>

<script >
  $(signup).validate({
 rules:{
         email:
           {
            required:true,
            email:true },
           
         pswd: 'required',
         uname: 'required',
         cpswd:{
             required:true,
             equalTo:pswd },

         contact:{
            // phoneUS: true,
              digits:true,
             minlength:10,
            maxlength:10 }
         
        },
        messages:{
         email:
           {
            required:'The email Id is required for signup',
            email:'You must enter a velid email address', },
           
         pswd: {required:'The Password  is required for signup',},
         uname: {required:'Unique User name  is required for signup',},
         cpswd:{
             required:'The Confirm Password is required for signup',
             equalTo: 'Please enter the same value for password and confirm password', },

         contact:{
            // phoneUS: true,
              digits:'Please enter only digits for phone no.',
             minlength:'Please enter exactly 10 digits for phone no.',
            maxlength:'Please enter  exactly 10 digits for phone no.', }
         
        }
      })
</script>

</body>
</html> 


     