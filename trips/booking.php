<?php
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

//     $jsonFile = 'users.json';
//     $jsonData = file_get_contents($jsonFile);
//     $data = json_decode($jsonData, true);

//     if (!empty($data)) {
//         foreach ($data as &$user) {
//             if ($user['email'] == $email) {
//                 // Update user information as needed
//                 $user['booking'] = 'booked';
//                 // You can update other fields if needed (e.g., time, date, etc.)
//             }
//         }

//         $updatedJsonData = json_encode($data, JSON_PRETTY_PRINT);
//         file_put_contents($jsonFile, $updatedJsonData);
//         echo "Booking status updated for email: " . $email;
//     } else {
//         echo "No users found in the database.";
//     }
// }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>booking signup</title>
    <link rel="stylesheet" href="../trips/booking.css">
</head>

<body>
    <div class="container">
        <div class="main-form">
            <div class="form-text">
                <span><i>book now</i></span>
            </div>
            <div class="form-content">
                <form class="form" method="post">
                    <div class="name">
                        <span>name</span> <input type="text" name="name" placeholder="write your name here..." required>
                    </div>
                    <div class="email">
                        <span>email</span> <input type="email" name="email" placeholder="enter your email here..."
                            required>
                    </div>
                    <div class="people">
                        <label for="peop">
                            <p>how many people?</p>
                        </label>
                        <select name="number" id="peop">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    <div class="time">
                        <span>time</span> <input type="time" name="time" placeholder="time" required>
                    </div>
                    <div class="date">
                        <span>date</span> <input type="date" name="date" placeholder="date" required>
                    </div>
                    <div class="phone">
                        <span>phone</span> <input type="tel" name="phone" placeholder="contact number..." required>
                    </div>
                    <div class="submit">
                        <input type="submit" name="submit" value="book">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
