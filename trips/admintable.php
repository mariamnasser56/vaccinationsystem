

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">

  <style>
    #tbstyle {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
      margin: auto;
    }

    #tbstyle td,
    #tbstyle th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    #tbstyle tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    #tbstyle th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: black;
      color: white;
      /* 'White' should be lowercase */
    }

    .container {
      width: 70%;
      /* Adjust the width as needed */
      margin: auto;
      /* Center the content horizontally */
      text-align: center;
    }

.search-container {
  text-align: left;
  margin-bottom: 20px;
}

.search-input {
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 6px;
  margin-right: 5px;
  width: 200px; /* Adjust the width as needed */
}

.search-button {
  background-color: #1ac6ff;
  color: white;
  border: none;
  padding: 8px 12px;
  border-radius: 4px;
  cursor: pointer;
}

.search-button:hover {
  background-color: #00ace6;
}

#tbstyle tr:hover {
  background-color: #d9d9d9
; 
}

    .dbutton {
      background-color: red;
      color: white;
      border: whitesmoke;
      padding: 10px 20px;
      font-size: 18px;
      cursor: pointer;
      border-radius: 10%;
    }

    .dbutton:hover {
      background-color: darkred;
    }

    .ebutton {
      background-color: blue;
      color: white;
      border: whitesmoke;
      padding: 10px 20px;
      font-size: 18px;
      cursor: pointer;
    }

    .ebutton:hover {
      background-color: darkblue;
    }

    .addbutton {
      background-color: green;
      color: white;
      border: none;
      padding: 5px 5px;
      font-size: 18px;
      cursor: pointer;
      border-radius: 10%;
    }

    .addbutton:hover {
      background-color: darkgreen;
    }

		.navbar {
			width: 100%;
			height: 80px;
			background-color: wheat;
			display: flex;
			justify-content: space-around;
			align-items: center;
			color: #000;
			transition: 0.4s;
			list-style: none;
      
		}

		* {
			margin: 0;
			padding: 0;
		}

		.menu ul {
			list-style: none;
			display: flex;
			align-items: center;
			transition: 0.4s;
		}

		.menu ul li a {
			text-decoration: none;
			color: #000;
			padding: 5px 12px;
			letter-spacing: 2px;
			font-size: 20px;
			transition: 0.4s;
		}

		.menu ul li a:hover {
			border-bottom: 4px solid #000;
			transition: 0.4s;
		}

		.center-container {
			display: flex;
			justify-content: center;
			align-items: center;
			height: 10;
		}

		.container {
			width: 91%;
		}


		.signup a {
			display: inline-block;
			padding: 10px 20px;
			background-color: #f44336;
			/* Red color */
			color: white;
			text-decoration: none;
			border-radius: 5px;
			transition: background-color 0.3s;
			display: flex;
			justify-content: space-between;
			/* Distribute items along the main axis */
		}

		.signup a:hover {
			background-color: #d32f2f;
			/* Darker red color on hover */
		}
	



	



  </style>

</head>

<body>
<header>
		<div class="navbar">
			<div class="menu">
				<ul>
					<li><a href="../login-page/users.php">users</a></li>
					<li><a href="../trips/admintable.php">trips</a></li>
					<li><a href="../trips/addtrip.php">add trip</a></li>
					<div class="signup">
						<a href="../login-page/logout.php">Logout</a>
					</div>
				</ul>

			</div>
		</div>
		
	</header>

  <div class="container">
    <div class="table-container">

      <table id="tbstyle">
        <tr>
          <th>ID</th>
          <th>destination name</th>
          <th>destination photo</th>
          <th>trip details</th>
          <th>price</th>
          <th>action</th>
        </tr>

        <div class="search-container">
          <form method="GET">
            <input type="text" name="search" placeholder="Search by destination..." class="search-input">
            <button type="submit" class="search-button">Search</button>
          </form>
        </div>


        <?php
        $trips = json_decode(file_get_contents('trips.json'), true);
        if (isset($_GET['search'])) {
          $search_query = $_GET['search'];
          $filtered_data = array_filter($trips, function ($item) use ($search_query) {
            return strpos(strtolower($item['name']), strtolower($search_query)) !== false;
          });
        } else {
          $filtered_data = $trips;
        }
        foreach ($filtered_data as $trip) {
        ?>
          <tr>
            <td><?= $trip['id']; ?></td>
            <td> <?= $trip['name']; ?> </td>
            <td> <?= $trip['photo']; ?> </td>
            <td> <?= $trip['details']; ?> </td>
            <td> <?= $trip['price']; ?> </td>
            <td>
              <form action="" method="POST">
                <input type="hidden" name="id" value="<?php echo $trip['id']; ?>">
                <button class="dbutton" type="submit" name="delete">Delete</button>
              </form>
            </td>
          </tr>

        <?php } ?>
      </table>
      <a href="../trips/addtrip.php"><button class="addbutton" type="submit" name="add">Add Trip</button></a>
    </div>
  </div>
</body>

</html>

<?php
if (isset($_POST['delete'])) {
  $trips = json_decode(file_get_contents('trips.json'), true);
  $trip_id = $_POST['id'];
  foreach ($trips as $key => $trip) {
    if ($trip['id'] == $trip_id) {
      unset($trips[$key]);
    }
  }
  file_put_contents('trips.json', json_encode($trips));
  exit();
}
?>

