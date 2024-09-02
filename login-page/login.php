<?php
 session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST'&&isset($_POST['email']))  {
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    if (empty($email) || empty($password)){
        echo "Please enter a valid email and password.";
        
           
        
    } else {
        $json = file_get_contents('users.json');
        $users = json_decode($json, true);

     
        foreach ($users as $user) {
            if ($user['email'] == $email){
            if ( password_verify($password, $user['password'])){
            $_SESSION['username'] = $user['firstn'] . ' ' . $user['lastn'];
            //password: #Cn@11/eer
            if($user['role']=="Admin"  ){
                header('Location: ../login-page/users.php');
            }
            else{
                header('Location: ../home-page/home-page.html');
            }

            exit();

    }    echo"email or password is not valid";
    
}
        }
    }
}      
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- link file css -->
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="contanier">
        <div class="login">
            <img class="user" src="user.jpg" alt="">
            <h1>Welcome</h1>
            <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">

                <label for="">Email</label>
                <input type="email" name="email" placeholder="Enter EMail" required>

                <label for="">Password</label>
                <input type="password" name="password" placeholder="Enter Password" required>
                <input type="submit" value="login">
            </form>

            <div class="bottom-div">
                <div class="line-or">
                    <span>OR</span>
                </div>

                <div class="btns">
                    <a href="#" class="btn"><img class="fb" src="facebook.png" alt=""></a>
                    <a href="#" class="btn"><img class="google" src="google.png" alt=""></a>
                </div>
                <p class="signup">Don't have account? <a href="./registration.php">Signup Now</a></p>
            </div>
        </div>
    </div>
</body>

</html>