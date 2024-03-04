<?php
include_once("sqlConn.php");

//create database
if ($con -> query ("CREATE DATABASE my_db"))
	echo "database created.";
else
	echo "Error creating database:".$con -> error;

//create table
$con -> select_db("my_db");

$sql = "
CREATE TABLE persons
(
personID int NOT NULL AUTO_INCREMENT, PRIMARY KEY(personID),
FirstName varchar(15),
LastName varchar(15),
Age int
)";

//execute query
$con -> query($sql);

$con -> close();


?>