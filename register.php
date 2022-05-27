<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM users WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO users(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:loginpage.php');
      }
   }

};


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sujita Assinment - VIT - ITAP3012
        Developing Web Applications</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>



    <!-- Navigation Bar -->
    <div class="top-nav">
        <div class="include">
            <div class="text-white float-left pt">
                <marquee direction="right">Quality education that extends beyond the classrooms.</marquee>
            </div>
            <div class="social">
                <a href="https://www.facebook.com/VITAustralia"><img src="img/icon/fb.png"></a>
				<a href="https://www.youtube.com/channel/UCPuQJ0kLnbeSudEfocICv8w?view_as=subscriber"><img src="img/icon/yt.png"></a>
				<a href="https://twitter.com/vitaustralia"><img src="img/icon/twitter.png"></a>
				<a href="https://www.linkedin.com/school/vitaustralia/"><img src="img/icon/in.png"></a>
            </div>
        </div>
    </div>



    <nav class="navbar">
        <div class="include">
            <div class="nav-title">
                <div class="nav-brand">
                    <a href="index.html">
                        <img class="logo-img" src="img/logo.png" alt="">
                    </a>
                </div>
            </div>
            <div class="nav-links">
                <a class="active" href="index.html">Home</a>
                <a href="courses.html">courses</a>
                <a href="vit.html">life at vit</a>
                <a href="about.html">about</a>
                <a href="faq.html">faq</a>
                <a href="contact.html">Contact</a>
            </div>
        </div>
    </nav>
<style type="text/css">
   .container{
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    padding-bottom: 60px;
    background: #eee;
   }
   .container form{
    width: 50%;
    padding:  20px;
    border-radius: 5px;
    box-shadow: 0 5px 10px rgba(0,0,0,1);
    text-align: center;
   } 
   .container input{
    width: 100%;
    padding: 10px 15px;
    font-size: 17px;
    margin: 8px 0;
   }
   .container  select{
    width: 80%;
    background: #fff;
    height: 40px;
   }
   .container form .form-btn{
    background: #fbd0d9;
    color: darkred;
    text-transform: uppercase;
    font-size: 18px;
   }
.container form .form-btn:hover{
    background: darkred;
    color: white;
}.container form {
    text-align: left;
}
</style>
    <div class="container">
        
        <form action="" method="POST">
           
<?php 
        if(isset($error)){
            foreach ($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
            };
        };
?>   
<div class="form-container">

   <form  method="post">
   
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="enter your name">
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="password" name="cpassword" required placeholder="confirm your password">
      <select name="user_type">
         <option value="user">user</option>
         <option value="admin">admin</option>
      </select>
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>already have an account? <a href="loginpage.php">login now</a></p>
   </form>

</div>

</body>
</html>
</div>
</body>
</html>