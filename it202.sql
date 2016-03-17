drop table if exists clients;
create table clients
  (
    clientId INT(11) primary key auto_increment,
    clientName varchar(32),
    clientPW varchar(64),
    activeSession varchar(128),
    firstLogin datetime,
    lastLogin datetime,
    clientRating INT(11) 
    
  );
  
 drop table if exists parties;
 create table parties
  (
    partyId INT(11) primary key auto_increment,
    clientName varchar(32),
    partyName varchar(32),    
    partyLocation varchar(32),
    partyTime dateTime,
    partyComments varchar(128)
  
  );
  
  CREATE TABLE Address (
    addrID      int(11)     NOT NULL   auto_increment,
    addrStreet  varchar(50) NOT NULL   default '',
    addrCity    varchar(25) NOT NULL   default '',
    addrState   char(2)     NOT NULL   default '',
    addrZIP     char(10)    NOT NULL   default '',
    PRIMARY KEY (addrID)
);
  