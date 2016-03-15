<?php

require_once "partyPost.php.inc";
require_once "clientDB.php.inc";


$request = $_POST['request'];
$response = "FUCK<p>";
switch($request)
{
    case "login":
	$username = $_POST['username'];
	$password = $_POST['password'];
	$login = new clientDB("connect.ini");
	$response = $login->validateClient($username,$password);
	if ($response['success']===true)
	{
		$response = "Login Successful!<p>";
	}
	else
	{
		$response = "Login Failed:".$response['message']."<p>";
	}
	break;
    case "register":
	$username = $_POST['username'];
	$password = $_POST['password'];
	//echo $password;
	$register = new clientDB("connect.ini");
	$register->addNewClient($username, $password);
	$response = $register->validateClient($username,$password);
	if ($response['success']===true)
	{
		$response = "Register Successful!<p>";
	}
	else
	{
		$response = "Register Failed:".$response['message']."<p>";
	}
	
	break;
    case "Post Party":
	$username = $_POST["username"];
	$password = $_POST["password"];
	$partyName= $_POST["partyName"];
	$partyLocation = $_POST["partyLocation"];
	$partyTime = $_POST["partyTime"];
	$comment = $_POST["comment"];
	
	$day = $_POST['day'];
	$month = $_POST['month'];
	$year = $_POST['year'];
	$minute = $_POST['minute'];
	$hour = $_POST['hour'];
	$ampm = $_POST['ampm'];
	$date = date('Y-m-d H:i:s',strtotime($year."-".$month."-".$day." ".$hour.":".$minute." ".$ampm));
	//$date = date('Y-m-d H:i:s',strtotime($month.' '.$day.','.$year.' '.$hour.':'.$minute.' '.$ampm)); 
	//$date = date('Y-m-d H:i:s',strtotime($hour.':'.$minute.$ampm.' '.$month.' '.$day.' '.$year)); 
	
	


	$login = new clientDB("connect.ini");
	$response = $login->validateClient($username,$password);
	if ($response['success']===true)
	{
		$response = "Login Successful!<p>";
		$post = new partyPost("connect.ini");
		$response = $post->addNewParty($username, $partyName, $partyLocation, $date, $comment);
		if ($response['success']===true)
		{
			$response = "Party Positng Successful!<p>";
		}
		else
		{
			$response = "Party Posting Failed:".$response['message']."<p>";
		}
		}
	else
	{
		$response = "Login Failed:".$response['message']."<p>";
	}
	//$response = "Post Party Success!". $partyName. " " .$username. " " . $password. " ". $partyLocation. " ". $partyTime. "<p>";
	break;
	
}
echo $partyTime;
echo $response;
?>





