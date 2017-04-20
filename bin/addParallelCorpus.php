<?php
/**
 * @author: Sanjib Narzary
 * @email: [san@cit.ac.in, narzary@iitg.ernet.in]
 * @roll: 166155005
 * Program: This program is responsible for adding simple parallel corpora manually translated using the english-bodo-parallel-corpus
 * add program in to Database for future retrieval.
 * 
 */

require_once('../functions.php');
$f = new Functions();

if(isset($_POST['english'])&&isset($_POST['bodo'])){
	$english = $_POST['english'];
	$bodo = $_POST['bodo'];
	if((empty($english)&&empty($bodo))||($english==''&&$bodo='')){
		echo 'Please dont add untranslated text';
	}
	else{
		echo $english.$bodo;
		$str = "INSERT INTO `parallel_sentence`(`english`, `bodo`, `creationDate`, `updationDate`) VALUES ('".$english."','".$bodo."',NOW(),NOW())";
		if($f->insertUpdateQuery($str)){
				header('Location: ../parallel-corpus.php');
		}
	}
}