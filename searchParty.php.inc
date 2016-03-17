<?php


class searhParty{
    
    private $db;	
    private $logger;
    public function __construct($iniFile)
    {
	$ini = parse_ini_file($iniFile,true);
        $this->logger = new errorLogger("/var/log/it202.log");
	$this->db = new mysqli(
		$ini['loginDB']['host'],
		$ini['loginDB']["user"],
		$ini['loginDB']["password"],
		$ini['loginDB']["db"]);
	if ($this->db->connect_errno > 0 )
	{
		$this->logger->log(__FILE__.__LINE__."failed to connect to database re: ".$this->db->connect_error);
		exit(0);
	}
	$this->logger->log("testing");
    }
    public function __destruct()
    {
	$this->db->close();
    }
    public function getPartyID($partyName)
    {
	$query = "select partyId from parties where partyName = '$partyName';";
	$results = $this->db->query($query);
	if(!$results)
	{
	  $this->logger->log("error with results: ".$this->db->error);
	  return 0;
	}
	$party = $results->fetch_assoc();
	if(isset($party['partyId']))
	{
	  return $party['partyId'];
	}
	return 0;	
    }
    public function searchByLocation($partyLocation)
    {
	$query = "select partyName, partyLocation, partyTime, partyComments from parties where partyLocation like '%{$partyLocation}%';";
	$results = $this->db->query($query);
	$num = $results->nu
	if(!$results)
	{
	  $this->logger->log("error with results: ".$this->db->error);
	  return 0;
	}
    }









}



?>