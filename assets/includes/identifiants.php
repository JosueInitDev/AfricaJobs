<?php
//connexion à la bdd en ligne
//try
//{
//	$db=new PDO ('mysql:host=localhost; dbname=inconsul_inconsultcase', 'inconsul', '4h42yHk.N*OF6b', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
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
?>