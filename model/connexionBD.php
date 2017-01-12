<?php
try
	{
		$host = '';
		$dbname='';
		$pseudo='root';
		$password='';
		$pdo = new PDO('mysql:host=localhost;dbname=Piscine;charset=utf8',$pseudo,$password);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(Exception $e)
	{
	        die('Erreur : '.$e->getMessage());

	}
