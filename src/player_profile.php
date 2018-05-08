<?php

session_start();
require 'database.php';

if( isset($_SESSION['company_id'])) {
	header("Location: ");
}

?>

<!DOCTYPE html>
<html>
<style>
body {
    background-color: lightblue;
}

h1 {
    color: white;
    text-align: center;
}
p {
    font-family: verdana;
    font-size: 20px;
}
th,td {
    border: 1px solid black;
	   padding: 15px;
}
.btn_name{
    margin-right:10px;
	margin-left:10px;
}
.btn-group button {
    background-color: #4CAF50; /* Green background */
    border: 1px solid green; /* Green border */
    margin-top:10px;
	margin-bottom:10px;
    color: white; /* White text */
    padding: 10px 24px; /* Some padding */
    cursor: pointer; /* Pointer/hand icon */
    width: 10%; /* Set a width if needed */
    display: block; /* Make the buttons appear below each other */
}
.topright {
    position: absolute;
    top: 8px;
    right: 16px;
    font-size: 18px;
}

.topright1 {
    position: absolute;
    top: 30px;
    right: 16px;
    font-size: 18px;
}


.name-group label {
    margin-top:10px;
	margin-bottom:10px;
    color: black; /* White text */
}

.btn-group button:not(:last-child) {
    border-bottom: none; /* Prevent double borders */
}

/* Add a background color on hover */
.btn-group button:hover {
    background-color: #3e8e41;
}
</style>
<head>
	<title>Ethereal</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
</head>
<body>
	<h1>Player Profile</h1>
    <table align = "center">
            <thead>
				<tr>
                    <td><a href="player_market.php"><button type="button" style="float: right;" class="btn_name">Market Place</button></td>
	                <td><a href="player_games.php"><button type="button" style="float: right;" class="btn_name">Games</button></td>
	                <td><a href="player_profile.php"><button type="button" style="float: right;" class="btn_name">Profile</button></td>
				</tr>
			</thead>
	</table>

    <div class="btn-group">
    	<td><a href="player_profile_information.php"><button type="button">Information</button></td>
        <td><a href="player_profile_gameHistory.php"><button type="button">Game History</button></td>
        <td><a href="player_profile_addFund.php"><button type="button">Add Funds to Wallet</button></td>
        <td><a href="player_profile_accountSettings.php"><button type="button">Account Settings</button></td>
    </div>

      <span style="float:top" class = "topright"

      <label>Player ID: </label>
      <label><?php echo $_SESSION['user_id'];?></label> </span>

      <span style="float:right" class = "topright1"
      <?php
			
            $records = $conn->prepare('select balance from player where player_id = :player_id'); // = ' .$_SESSION['company_id'].);
            $records->bindParam(':player_id', $_SESSION['user_id']);
            $records->execute();
            $results = $records->fetch(PDO::FETCH_ASSOC);
      ?>
      <label>Balance: $</label>
      <label><?php echo $results['balance'];?></label>
      </span>



</body>
</html>