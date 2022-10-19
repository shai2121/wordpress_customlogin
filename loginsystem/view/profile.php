<?php
                                                                                              
if (!is_user_logged_in()) {
  echo "<script type='text/javascript'>alert('Please login again.'); window.location.href='http://localhost/wordpress/';</script>";
  exit;

}
 global  $user_ID;
$user_info = get_userdata($user_ID);

?>

 <head>
  <style>
    
  .container {
    padding: 20px 120px;
   
    
  }
  .xtz{
    padding: 0px 0px 10px;

  }
 
  
   .bg-1 {
    
    background: #2d2d30;
    color: #bdbdbd;
  }
 
  .bg-1 p {font-style: italic;}
  li{
    color: #000;
  }
  </style>
</head>
<body>



<div class="bg-1">
  <div class="container">
  

    <h2 class="text-center text-info font-weight-bold">PROFILE DETAIL</h2>
    <p class="text-center">hii <strong class="font-weight-bold text-info"> <?php print_r($user_info->user_login);?></strong>,wlcome to your profile page .<br> Here below find your profile details!</p>
    
    <div class="text-center xtz">
    <span class="rounded"> 

      <img src=" <?php print_r($user_info->pic) ?>
      " class="rounded-circle   text-center" style="width:160px;height:170px;" alt="">  
      </span>
    </div> 
    <ul class="list-group">
      <li class="list-group-item">You have loged in into system on <?php date_default_timezone_set('Asia/Kolkata'); echo date('d-m-y h:i:s');?></li>
      <li class="list-group-item">User ID:- <?php print_r($user_info->ID) ?></li>
      <li class="list-group-item">Name:- <?php print_r($user_info->display_name) ?></li>
      <li class="list-group-item"> Email Id :-<?php print_r($user_info->user_email) ?></li>
      <li class="list-group-item">Phone No :- <?php print_r($user_info->phone);?></li>
      <li class="list-group-item">
      <form method= "post" action="..\wp-content\plugins\loginsystem\connect.php" >
<button type="submit" name="delete" class="btn btn-primary">Delete</button>
<button type="submit" name="logout" class="btn btn-primary">Logout</button>
<a class="btn btn-primary" href="../update/" role="button">Edit Profile</a>
<a class="btn btn-primary" href="http:/wordpress/change-password-2/" role="button">Update-Password</a>
</form>

</li> 

      
      

    </ul>
  </div>
</div>
</div>

</body>
</html>

