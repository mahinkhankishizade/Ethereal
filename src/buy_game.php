<?php

session_start();
require 'database.php';

if( isset($_SESSION['user_id']) ){
	//header("Location: ./player_market.php");
}



$game_name = $_GET['game_name'];
$player_id = $_SESSION['user_id'];

$records2 = $conn->prepare('select balance from player where player_id = :player_id'); // = ' .$_SESSION['company_id'].);
$records2->bindParam(':player_id',$player_id);
$records2->execute();
$results2 = $records2->fetch(PDO::FETCH_ASSOC);


$records1 = $conn->prepare('select price from game where game_name = :game_name'); // = ' .$_SESSION['company_id'].);
$records1->bindParam(':game_name', $game_name);
$records1->execute();
$results1 = $records1->fetch(PDO::FETCH_ASSOC);

$price = $results1['price'];
$date = date("Y-m-d");

echo $game_name;
echo $player_id;
echo $price;
echo $date;
	if($price <= $results2 ['balance']){
		$records = $conn->prepare('insert into bought values( :player_id, :game_name, :date, :price)'); 
		$records->bindParam(':game_name', $game_name);
		$records->bindParam(':player_id', $player_id);
		$records->bindParam(':price', $price);
		$records->bindParam(':date', $date);
		$records->execute();

		$records3 = $conn->prepare('update player set balance = balance - :balance where player_id = :player_id');// into bought values( :player_id, :game_name, :date, :price)'); 
		$records3->bindParam(':player_id', $player_id);
		$records3->bindParam(':balance', $price);
		$records3->execute();

header("Location: ./player_market.php");


	}
	else if($price >  $results2 ['balance']){

		echo '<script language="javascript">';
	    echo 'alert("You dont have enough money!")';
	    echo '</script>';

header("Location: ./player_market.php");
	}


?>