<?php
//connexion à la bdd
//try
//{
//	$db=new PDO ('mysql:host=164.132.170.24; dbname=occazene_test', 'occazene', '2Yi4Gz(r4T7M*g', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
//}
//catch (Exception $e)
//{
//	die('Erreur : ' . $e->getMessage());
//}


//connexion à la bdd en local
try
{
	$db=new PDO ('mysql:host=localhost; dbname=jobsci', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}
//this code is created by Josué - jose.init.dev@gmail.com
?>