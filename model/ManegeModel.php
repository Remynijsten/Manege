<?php 

function availableCheck($start, $end, $datum){

	$db = openDatabaseConnection();

	$sql=$db->prepare("SELECT * FROM Reserveringen 
			WHERE (datum = :datum)
			AND (((:start > start AND :start < eind) 
				AND (:eind < start && :eind > eind))
				OR (:eind > start && :start < eind) 
				OR (:eind > start AND :eind < eind))");

	$sql->execute(array(
		":datum" => $datum,
		":start" => $start,
		":eind" => $end
		));
	$result = $sql->fetchAll();
	return $result;
}




function getVisitors(){
	$db = openDatabaseConnection();

	$sql = $db->prepare("SELECT * FROM Bezoekers");
	$sql->execute();

	$result = $sql->fetchAll();
	return $result;
}

function getHorses(){
	$db = openDatabaseConnection();

	$sql = $db->prepare("SELECT * FROM Rassen");
	$sql->execute();

	$result = $sql->fetchAll();
	return $result;
}

function getReservations(){
	$db = openDatabaseConnection();

	$sql = $db->prepare("SELECT * FROM Reserveringen");
	$sql->execute();

	$result = $sql->fetchAll();
	return $result;
}






?>