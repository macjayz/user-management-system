<?php 
session_start();
if(isset($_SESSION['user'])){
    header('location: home.php');
}

?>

<!DOCtype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="emjay">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewpoint" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PHP OOP</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css" integrity="sha512-+C1cmvw5D0Pfm6Gt9em3zp3OyebHM4wo05D38a0kXm7C1MRZZ9oPTbSX3KoRxAA0b2oHCqrcJEPikiXjsNXgtw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
</head>
    
<body>
<div class="container"> 
<!--    login form starts -->
    <div class="row justify-content-center wrapper" id="login-box">
        <div class="col-lg-10 my-auto">
            <div class="card-group myShadow">
                <div class="card rounded-left p-4 " style="flex-grow:1.4">
                    <h1 class="text-center font-weight-bold text-primary">Sign in to Account</h1>
                    <hr class="my-3">
                    <form action="#" method="post" class="px-3" id="login-form">
                        <div id="loginAlert"></div>
                        <div class="input-group input-group-xl form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0">
                                    <i class="far fa-envelope fa-xl"></i>
                                </span>
                            </div>
                            <input type="email" name="email" class="form-control rounded-0" id="email" placeholder="E-MAIL" value="<?php if(isset($_COOKIE['email'])) { echo $_COOKIE['email']; } ?>" required >
                        </div>
                        <div class="input-group input-group-xl form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0">
                                    <i class="fas fa-key fa-xl"></i>
                                </span>
                            </div>
                            <input type="password" name="password" class="form-control rounded-0" id="password" placeholder="Password" value="<?php if(isset($_COOKIE['password'])) { echo $_COOKIE['password']; } ?>" required>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox float-left">
                                <input type="checkbox" name="rem" class="custom-control-input" id="customCheck" <?php if(isset($_COOKIE['email'])) {?> checked  <?php } ?> >
                                <label for="customCheck" class="custom-control-label"> Remember Me</label>
                            </div>
                            <div class="forgot float-right" >
                            <a href="#" id="forgot-link">Forgot Password</a>
                            </div>
                        </div>
                        <div class="form-group">
                                <input type="submit" value="Sign In" id="login-btn" class="btn btn-primary btn-lg btn-block myBtn">
                        </div>
                    </form>
                </div>
                <div class="card justify-content-center rounded-right myColor p-4">
                    <h1 class="text-center font-weight-bold text-white">Hello Friends!</h1>
                    <hr class="my-3 bg-light myHr">
                    <p class="text-center font-weight-bolder text-light lead">Enter your personal details and start your journey with us!</p>
                    <button class="btn btn-outline-light btn-lg align-self-center font-weight-bolder mt-4 myLinkBtn" id="register-link">Sign Up</button>
                </div>
            </div>    
        </div>
    </div>
<!--    login form ends -->
    
<!--    register form start -->
<div class="row justify-content-center wrapper" id="register-box" style="display:none">
        <div class="col-lg-10 my-auto">
            <div class="card-group myShadow">
                <div class="card justify-content-center rounded-right myColor p-4">
                    <h1 class="text-center font-weight-bold text-white">Welcome back!</h1>
                    <hr class="my-3 bg-light myHr">
                    <p class="text-center font-weight-bolder text-light lead">To keep connected with us please login!</p>
                    <button class="btn btn-outline-light btn-lg align-self-center font-weight-bolder mt-4 myLinkBtn" id="login-link">Sign In</button>
                </div>
                <div class="card rounded-left p-4 " style="flex-grow:1.4">
                    <h1 class="text-center font-weight-bold text-primary">Create Account</h1>
                    <hr class="my-3">
                    <form action="#" method="post" class="px-3" id="register-form">
                        <div id="regAlert"></div>
                        <div class="input-group input-group-xl form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0">
                                    <i class="far fa-user fa-xl"></i>
                                </span>
                            </div>
                            <input type="text" name="name" class="form-control rounded-0" id="name" placeholder="Full Name" required>
                        </div>
                        <div class="input-group input-group-xl form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0">
                                    <i class="far fa-envelope fa-xl"></i>
                                </span>
                            </div>
                            <input type="remail" name="remail" class="form-control rounded-0" id="remail" placeholder="E-MAIL" required>
                        </div>
                        <div class="input-group input-group-xl form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0">
                                    <i class="fas fa-key fa-xl"></i>
                                </span>
                            </div>
                            <input type="password" name="rpassword" class="form-control rounded-0" id="rpassword" placeholder="Password" required minlength="5">
                        </div>
                        <div class="input-group input-group-xl form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0">
                                    <i class="fas fa-key fa-xl"></i>
                                </span>
                            </div>
                            <input type="password" name="cpassword" class="form-control rounded-0" id="cpassword" placeholder="Confirm Password" required minlength="5">
                        </div> 
                        <div class="form-group">
                            <div id="passError" class="text-danger font-weight-bold">
                            
                            </div>
                        </div>
                        <div class="form-group">
                                <input type="submit" value="Sign Up" id="register-btn" class="btn btn-primary btn-lg btn-block myBtn">
                        </div>
                    </form>
                </div>
                
            </div>    
        </div>
    </div>   
<!--    register form ends -->
    
<!--    forgot password form start -->
    <div class="row justify-content-center wrapper" id="forgot-box" style="display:none">
        <div class="col-lg-10 my-auto">
            <div class="card-group myShadow">
                <div class="card justify-content-center rounded-right myColor p-4">
                    <h1 class="text-center font-weight-bold text-white">Reset Password</h1>
                    <hr class="my-3 bg-light myHr">
                    
                    <button class="btn btn-outline-light btn-lg align-self-center font-weight-bolder mt-4 myLinkBtn" id="back-link">Back</button>
                </div>
                <div class="card rounded-left p-4 " style="flex-grow:1.4">
                    <h1 class="text-center font-weight-bold text-primary">Forgot Your Password</h1>
                    <hr class="my-3">
                    <p class="lead text-center text-secondary"> To reset your password, enter the register e-mail address  and we will send you the reset instructions in your mailbox </p>
                    <form action="#" method="post" class="px-3" id="forgot-form">
                        <div class="input-group input-group-xl form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0">
                                    <i class="far fa-envelope fa-xl"></i>
                                </span>
                            </div>
                            <input type="email" name="remail" class="form-control rounded-0" id="femail" placeholder="E-MAIL" required>
                        </div>
                        
                        <div class="form-group">
                                <input type="submit" value="Reset Password" id="forgot-btn" class="btn btn-primary btn-lg btn-block myBtn">
                        </div>
                    </form>
                </div>
                
            </div>    
        </div>
    </div>
<!--    forgot password form ends -->
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>    
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha512-c4wThPPCMmu4xsVufJHokogA9X4ka58cy9cEYf5t147wSw0Zo43fwdTy/IC0k1oLxXcUlPvWZMnD8be61swW7g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#register-link").click(function(){
            $("#login-box").hide();
            $("#register-box").show();
        }); 
        $("#login-link").click(function(){
            $("#register-box").hide();
            $("#login-box").show();
        });
        $("#forgot-link").click(function(){
            $("#login-box").hide();
            $("#register-box").hide();
            $("#forgot-box").show();
        });
        $("#back-link").click(function(){
            $("#register-box").hide();
            $("#login-box").show();
        });
        
        //Register Ajax Request 
        $("#register-btn").click(function(e){
           if($("#register-form")[0].checkValidity()){
             e.preventDefault(); //stop page from reloading after clicking of btn
             $("#register-btn").val('Please wait...');
               if($("#rpassword").val() != $("#cpassword").val()){
                   $("#passError").text('* Password did not match!');
                   $("#register-btn").val('Sign Up');
               }else{
                   $("#passError").text('');
                   $.ajax({
                       url: 'php/action.php',
                       method: 'post',
                       //sending a post request of action=register to action.php
                       data: $('#register-form').serialize()+'&action=register',
                       success:function(response){
                           $("#register-btn").val('Sign Up'); //change the btn to default value
                           if(response === 'register'){
                               window.location = 'home.php';
                           }else{
                               $("#regAlert").html(response);
                           }
                       }
                   })
               }
           } 
        });
        
        $("#login-btn").click(function(e){
           if($("#login-form")[0].checkValidity()){
             e.preventDefault(); //stop page from reloading after clicking of btn
             $("#logion-btn").val('Please wait...');
                $.ajax({
                       url: 'php/action.php',
                       method: 'post',
                       //sending a post request of action=register to action.php
                       data: $('#login-form').serialize()+'&action=login',
                       success:function(response){
                           $("#login-btn").val('Sign In'); //change the btn to default value
                           if(response === 'login'){
                               window.location = 'home.php';
                           }else{
                               $("#loginAlert").html(response);
                           }
                       }
                   });
           } 
        });
    });
</script>
</body>


</html>