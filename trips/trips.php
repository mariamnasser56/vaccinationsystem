<!DOCTYPE html>
<html>

<head>
  <title>Travel Website</title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="trips.css">
</head>

<body>

  <div class="navbar">

    <h1><span class="BB">B</span>OOKING</h1>
  </div>
  

  <div class="body">
  
    <div class="tours">
    
    <?php 
$trips = json_decode(file_get_contents('trips.json'));

foreach ($trips as $trip) :?>
    <div class="places">
        <img src="../images/<?= $trip->photo ?>" style="width: 300px; height: 250px">
        <div class="card-body">
            <h3><?= $trip->name ?></h3>
            <br>
            <p><?= $trip->details ?>.</p>
            <br>
            <h6>Price: <strong>$<?= $trip->price ?></strong></h6>
            <br>
            <button>
                <a href="../hotel/<?= $trip->linkhotels ?>">Book Now</a>
            </button>
            
        </div>
    </div>
<?php endforeach; ?>
<br>
<br>
           
      </div>
        

    </div>
  </div>
</body>

</html>