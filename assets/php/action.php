<?php 
    session_start();

    require_once 'auth.php';
    $user = new Auth();
    
    //checking if the post request name is action and is equals to register as initialized in index.php ajax request
    if(isset($_POST['action'])&& $_POST['action'] == 'register'){
        $name = $user->test_input($_POST['name']);
        $email = $user->test_input($_POST['remail']);
        $pass = $user->test_input($_POST['rpassword']);
        
        $hpass = password_hash($pass, PASSWORD_DEFAULT);
        
        if($user->user_exist($email)){
            //sending a response of the message below to the ajax request in index.php
            echo $user->showMessage('warning','This E-mail is already registered!');
        }
        else{
            if($user->register($name,$email,$hpass)){
            echo 'register'; //sending a response of 'register' to the ajax request in index.php
            $_SESSION['user'] = $email;
        }else{
            echo $user->showMessage('danger','Something went wrong! try again later');
    }
    }
    }

//checking if the post request name is action and is equals to register as initialized in index.php ajax request
    if(isset($_POST['action'])&& $_POST['action'] == 'login'){
        $email = $user->test_input($_POST['email']);
        $pass = $user->test_input($_POST['password']);
        $loggedInUser = $user->login($email);
        if(!empty($loggedInUser)&& $loggedInUser != null){
            if(password_verify($pass, $loggedInUser['password'])){ //password_verify(string $password, string $hash)
                if(!empty($_POST['rem'])){
                    setcookie("email", $email, time() + (86400 * 30), '/'); // 86400sec =  1 day
                    setcookie("password", $pass, time() + (86400 * 30), '/'); // 86400sec =  1 day
                }else {
                    setcookie("email","",1,'/');
                    setcookie("password","",1,'/');
                }
                echo 'login';
                $_SESSION['user'] = $email;
            }
            else
                echo $user->showMessage('danger','Password is incorrect');
        }
        else{
            echo $user->showMessage('danger', 'User not registered');
        }
    }
    
?>