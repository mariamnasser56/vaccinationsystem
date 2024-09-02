 
 
 <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $data = json_decode(file_get_contents('users.json'), true);
        $id = 0;
        foreach ($data as $user) {
            if ($user['id'] > $id) {
             $id = $user['id'];
            }
        }

        $new_id = $id + 1;
        $firstn = $_POST['firstn'];
        $lastn = $_POST['lastn'];
        $phone= $_POST['phone'];
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $passwc = password_hash($_POST['passwc'], PASSWORD_DEFAULT);
        $gend = isset($_POST ['gender']) ? $_POST['gender'] : 'no';
        $booking = ' ';

        if (empty($firstn) || empty($lastn) || empty($email) || empty($_POST['password']) || empty($_POST['passwc']) || empty($phone) || $gend == 'no') {
          die("<h1>Please fill out all fields.</h1>");
            echo $gend;
        }
        if ($_POST['password'] != $_POST['passwc']) {
            die("invalid password");
        }

        foreach ($data as $user) {
            if ($user['email'] == $email) {
                echo 'Email already exists';
                exit();
            }
        }

        $data[] = array(
            'id' => $new_id,
            'firstn' => $firstn,
            'lastn' => $lastn,
            'email' => $email,
            'gender' => $gend,
            'phone' => $phone,
            'password' => $password,
            'booking' => $booking
            );

        file_put_contents('users.json', json_encode($data));

        echo 'Registration successful!';

        header('Location: ../home-page/home-page.html'); 
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration page</title>
    <link rel="stylesheet" href="reg.css">
</head>
<body>
    <div class="container">
        <div class="form">
            <form method="post" action="<?php $_SERVER['PHP_SELF']?>" class="form-content">
                <!-- first -->
                <div class="first">
                    <label>first name</label>
                    <input type="text" name="firstn" placeholder="input your first name" >
                </div> <br>
                <!-- last -->
                <div class="last">
                    <label>last name</label>
                    <input type="text" name="lastn" placeholder="input your last name" >
                </div> <br>
                <!-- email -->
                <div class="email">
                    <label>email</label>
                    <input type="email" name="email" placeholder="input your email" >
                </div> <br>
                <!-- pass -->
                <div class="pass">
                    <label>password</label>
                    <input type="password" name="password" placeholder="password must be included @Az"  minlength="8">
                </div> <br>
                <!-- passc -->
                <div class="passc">
                    <label>confirm password</label>
                    <input type="password" name="passwc" placeholder="confirm your password" >
                </div> <br>
                <!-- phone -->
                <div class="phone">
                    <label>phone number</label>
                    <input type="tel" name="phone" placeholder="input your phone number" >
                </div> <br>
                <!-- gender -->
                <div class="gender">
                    <input type="radio" value="male" id="male" name="gender">
                    <label for="male">male</label>
                    <input type="radio" value="female" id="female" name="gender">
                    <label for="female">female</label>
                </div>
                <!-- submit -->
                <div class="submit">
                    <input type="submit" value="sign-up">
                </div>
            </form>
        </div>
    </div>
</body>
</html>