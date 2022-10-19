<?php
require_once("../../../wp-load.php");

// logic for login :-
global $wpdb,$current_user, $PasswordHash, $user_ID;
if(isset($_POST['logon'])){

      $email = $wpdb->escape(trim($_POST['email']));
     $password= $wpdb->escape(trim($_POST['pswd']));
       $exist= $wpdb->get_var("SELECT `user_email` FROM `wp_users` WHERE `user_email`='$email'");
         if ($exist==$email){
          $user= $wpdb->get_var("SELECT `user_login` FROM `wp_users` WHERE `user_email`='$email'");
                $userarray=array();
                $userarray['user_login']=$user;
                $userarray['user_password']= $password;
                $logedin= wp_signon( $userarray,true );
               if(!is_wp_error($logedin)){
                
                echo "<script type='text/javascript'>alert('You are logedin into system successfully.'); window.location.href='http:/wordpress/'</script>";
                  exit; 
               }
               else{
                 echo "<script type='text/javascript'>alert('Please enter correct password for login.'); window.location.href='http:/wordpress/login/'</script>";
                  
                
                //  echo "<script type='text/javascript'>alert('Please enter correct password for login.'); window.location=".site_url().";</script>";
                exit;
                 }
           }
       else{
        echo "<script type='text/javascript'>alert('Please login with registered emailID.'); window.location.href='http:/wordpress/login/';</script>";
          exit;
        }
         }

 //  logic for new registration 
         if($_SERVER["REQUEST_METHOD"]=="POST"){
          if(isset($_POST['submit'])){
           
            global $wpdb, $PasswordHash, $current_user, $user_ID;
             $password1 = $wpdb->escape(trim($_POST['pswd']));
            $password2 = $wpdb->escape(trim($_POST['cpswd']));
            $first_name = $wpdb->escape(trim($_POST['fname']));
            $last_name = $wpdb->escape(trim($_POST['lname']));
            $email = $wpdb->escape(trim($_POST['email']));
            $username = $wpdb->escape(trim($_POST['uname']));
             $contact=$wpdb->escape(trim($_POST['contact']));
             $rp= wp_rand( $min = 000000, $max = 999999 );
            $meta_key1='phone';
            $meta_key3='vcode';
            $meta_key2='pic';
        
        
             
             if($_FILES['pic']['error'] == 0){
              $password2 = $wpdb->escape(trim($_POST['cpswd']));
              $pic=$_FILES['pic']['name'];
              $tmp_loc=$_FILES['pic']['tmp_name'];
              $image= wp_upload_bits($pic,null,file_get_contents($tmp_loc));
              $img_url=($image['url']);
           }
          else{
            $img_url="http://localhost/wordpress/wp-content/uploads/2022/10/default.png";
          
          }
          $exist= $wpdb->get_var("SELECT `user_email` FROM `wp_users` WHERE `user_email`='$email'");
                 if ($exist==$email){
                  echo "<script type='text/javascript'>alert('Email id already exist in system.'); window.location.href='http:/wordpress/631-2/';</script>";
          exit;
                 }

                 $user= $wpdb->get_var("SELECT `user_login` FROM `wp_users` WHERE `user_login`='$username'");
                 if($user==$username){
                  echo "<script type='text/javascript'>alert('User name Already exist in system please try with different user name .'); window.location.href='http:/wordpress/631-2/';</script>";
                  exit;
                         }
                   else{
                    
            $user_id = wp_insert_user( array ('first_name' => apply_filters('pre_user_first_name', $first_name), 
            'last_name' => apply_filters('pre_user_last_name', $last_name), 'user_pass' => apply_filters('pre_user_user_pass', $password1), 
            'user_login' => apply_filters('pre_user_user_login', $username), 
            'user_email' => apply_filters('pre_user_user_email', $email), 'role' => 'subscriber' ) );
        
            do_action('user_register', $user_id);
             add_user_meta(  $user_id, $meta_key1, $contact,  );
             add_user_meta(  $user_id, $meta_key2, $img_url,  );
             add_user_meta( $user_id , $meta_key3, $rp,  );
             echo "<script type='text/javascript'>alert('You have successfully register into wordpress please Login now.'); window.location.href='http:/wordpress/login/';</script>";
          exit;
                   }
          }
        }
        if(isset($_POST['logout'])){
          global $user_id;
          $user_id= get_current_user_ID();
           wp_logout();
           wp_die();
          do_action( 'wp_logout',  $user_id );
          echo "<script type='text/javascript'>alert('you are already loged in.'); window.location.href='http:/wordpress/';</script>";
  exit;
         
      }
  
        
              

//  logic for forget password
        if(isset($_POST['fpassword'])){
          $email = $wpdb->escape(trim($_POST['email']));
          $rp= wp_rand( $min = 000000, $max = 999999 );
       $message = 'varification code :-'.$rp;
      $adm=get_option('admin_email');
      $exist= $wpdb->get_var("SELECT `user_email` FROM `wp_users` WHERE `user_email`='$email'");
      if ($exist==$email){

       $to = $email;
   
       $subject = "verification code from Login system";
   
       $headers = 'From: '. $adm . "\r\n" .
   
         'Reply-To: ' . $adm . "\r\n";

    //Here put your Validation and send mail
   
     $sent = wp_mail($to, $subject, strip_tags($message), $headers);
   
           if($sent) {
            $user_id= $wpdb->get_var("SELECT `ID` FROM `wp_users` WHERE `user_email`='$email'");
            $meta_key3='vcode';
          update_user_meta(  $user_id, $meta_key3, $rp,  );
          echo "<script type='text/javascript'>alert('Verification code sent to your Email id for password changing.'); window.location.href='/wordpress/change-password/';</script>";
          exit;
           }//message sent!
   
           else  {
   
            echo "<script type='text/javascript'>alert('Something went wrong please try again.'); window.location.href='http:/wordpress/forgetpassword/';</script>";
          exit;
   
           }
           }
         else{
          echo "<script type='text/javascript'>alert('Password will reset only for registered emailID.'); window.location.href='http:/wordpress/forgetpassword/';</script>";
          exit;
          
           }
          }

//  logic for password change
          if(isset($_POST['changepass'])){
            global $wpdb;
            $password1 = $wpdb->escape(trim($_POST['pass']));
            $password2 = $wpdb->escape(trim($_POST['pswd']));
            $vcode = $wpdb->escape(trim($_POST['vcode']));
            $email = $wpdb->escape(trim($_POST['email']));
              $exist= $wpdb->get_var("SELECT `user_email` FROM `wp_users` WHERE `user_email`='$email'");
              
              if ($exist==$email){
                $user_id= $wpdb->get_var("SELECT `ID` FROM `wp_users` WHERE `user_email`='$email'"); 
                  $user_info = get_userdata($user_id);
               $vcode1 = $user_info->vcode;
               if ($vcode1== $vcode){
                wp_set_password($password1,  $user_id);
          
              
                $rp= wp_rand( $min = 111111, $max = 999999 );
              $meta_key3='vcode';
                    update_user_meta(  $user_id, $meta_key3, $rp,  );
                    echo "<script type='text/javascript'>alert('Password changed successfully;now you can login with new password.'); window.location.href='http:/wordpress/login/';</script>";
                   exit;
             }
             else{
              echo "<script type='text/javascript'>alert('You have entered wrong verification code.'); window.location.href='http:/wordpress/change-password/';</script>";
          exit;
              }
              }
                  else{
                    echo "<script type='text/javascript'>alert('Please enter correct email id.'); window.location.href='/wordpress/change-password/';</script>";
                      exit;
                   } 
            }

            //  logic for password update


          if(isset($_POST['passchange'])){
            global $wpdb;
            $password1 = $wpdb->escape(trim($_POST['pass']));
            $password2 = $wpdb->escape(trim($_POST['pswd']));

            global $user_id;
          $user_id= get_current_user_ID();
          wp_set_password($password1,  $user_id);
          echo "<script type='text/javascript'>alert('Password changed successfully.Please login again ;'); window.location.href='http:/wordpress/login/';</script>";
                   exit;
          }
              
          ?>


          
          
          

          




