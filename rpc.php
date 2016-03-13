<?php
require_once("clientDB.php.inc");
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
	$partyName= $_POST["partyName"];
	$partyLocation = $_POST["partyLocation"];
	$partyTime = $_POST["partyTime"];
	$response = "Post Party Success!". $partyName. " " .$username. " ". $partyLocation. " ". $partyTime. "<p>";
	break;
	
}
echo $response;
?>





