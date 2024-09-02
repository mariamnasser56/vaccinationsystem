<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../trips/addtrip.css">
</head>

<body>
    <div class="header">
        <h1>admin-page</h1>
    </div>
    <div class="login-box">
        <div class="admin-box">
            <form method="post">
                <label>destination name</label>
                <input type="text" name="name" required >
                <label>destination photo</label>
                <input type="file" name="photo" required>
                <label>trip details</label>
                <input type="text" name="details" required >
                <label>price</label>
                <input type="number" name="price" required >
                <label>Hotel link </label>
                <input type="text" name="linkhotels" required >
                <a href="../trips/admintable.php"><button type="submit">add trip</button></a>
            </form>
        </div>
    </div>
</body>

</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $trips = json_decode(file_get_contents('trips.json'), true); 
    $trip_id = 0;
        foreach ($trips as $trip) {
            if ($trip['id'] > $trip_id) {
             $trip_id = $trip['id'];
            }
        }
     
    $new_id = $trip_id + 1;  
    $name = $_POST['name'];
    $photo = $_POST['photo'];
    $details = $_POST['details'];
    $price = $_POST['price'];
    $link_hotels = $_POST['linkhotels'];

    $trips[] = array(
        'id' => $new_id,
        'name' => $name,
        'photo' => $photo,
        'details' => $details,
        'price' => $price,
        'linkhotels' => $link_hotels);
    file_put_contents('trips.json', json_encode($trips));
    header('Location: ../trips/admintable.php');
}?>