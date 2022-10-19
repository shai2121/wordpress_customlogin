<?php
global $wpdb, $PasswordHash, $current_user, $user_ID;

$user_id= get_current_user_ID();
$user_info = get_userdata($user_id);

?>

<?php

if(isset($_POST['update'])){
  
  $contact=$wpdb->escape(trim($_POST['contact']));
  $cn = $_POST['contact'];
  $meta_key1='phone';
  $meta_key2='pic';
        
  
  
  

  if($_FILES['pic']['error'] == 0){
    $pic=$_FILES['pic']['name'];
              $tmp_loc=$_FILES['pic']['tmp_name'];
              $image= wp_upload_bits($pic,null,file_get_contents($tmp_loc));
              $img_url=($image['url']);
    
    update_user_meta(  $user_id, $meta_key1, $contact,  );
    update_user_meta(  $user_id, $meta_key2, $img_url,  );
    echo "<script type='text/javascript'>alert('User data update successfully.'); window.location.href='/wordpress/services/';</script>";
    exit;


 }
else{
  update_user_meta(  $user_id, $meta_key1, $contact,  );
  echo "<script type='text/javascript'>alert('User data update successfully.'); window.location.href='/wordpress/services/';</script>";
          exit;
 
}


 }
?>


  
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
  <div class="container solid col-8 offset-2 p-4 px-5">
    <div  class="border  p-4 px-5">
  <h3 class = "text-center text-primary font-weight-bold">Update Data</h3>
     <form method= "post" action="#" name= "update" enctype="multipart/form-data" >
   

    
         <div class="form-group">
      <label for="contect">Update contact no:</label>
      <input type="contect-no" class="form-control"  id="contect" value= "<?php print_r($user_info->phone);?>" placeholder="contect no" name="contact">
    </div>

  <div class="form-group">
      <label for="pic">Change Pofile picture:</label>
      <input type="file"  id="pic" name="pic">
    </div>
   
    
    
    <button type="submit" name="update" class="btn btn-primary col-4 offset-4">change</button>
  
  </div> 
 </div>


  

 <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
 <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js'></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
   <script >
  $(update).validate({
 rules:{
         contact:{
            // phoneUS: true,
              digits:true,
             minlength:10,
            maxlength:10, },
         },
        messages:{
         contact:{
              digits:'Please enter only digits for phone no.',
             minlength:'Please enter exactly 10 digits for phone no.',
            maxlength:'Please enter  exactly 10 digits for phone no.', }
         
        },
        
      })
    
 </script>
</body>
 </html>