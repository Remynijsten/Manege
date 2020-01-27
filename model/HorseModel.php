<?php  



function checkHorse($data){
	$db = openDatabaseConnection();
	
	$username = $data['name'];
	
	$sql = $db->prepare("SELECT COUNT(*) as count FROM Paarden where naam = :username ");
	$sql->execute(array(":username" => $data['name']));
	$result = $sql->fetch();

	if($result["count"] >= 1){
		echo 1;
	}else{
		echo 0;
	}
}


function postHorse($data){
	$db = openDatabaseConnection();

	$sql = "INSERT INTO Rassen (ras, naam, schoft, soort) VALUES (:ras, :naam, :schoft, :soort)";
	$db->prepare($sql)->execute(array(
		":ras" => $data['ras'], 
		":naam" => $data['name'],
		":schoft" => $data['schoft'],
		":soort" => $data['soort']
	));
}

function updateHorse($data){
	$db = openDatabaseConnection();

	$sql = "UPDATE Rassen SET ras=:ras, naam=:name, schoft=:schoft, soort=:soort WHERE id=:id";
	$db->prepare($sql)->execute(array(
		"ras" => $data['ras'],
		":name" => $data['name'],
		":schoft" => $data['schoft'],
		":soort" => $data['soort'],
		":id" => $data['id']));
}

function seedHorses(){
	$db = openDatabaseConnection();

	$sql = $db->prepare("SELECT * FROM Rassen");
	$sql->execute();

	$result = $sql->fetchAll();
	echo json_encode($result);
}

function destroyHorse($id){
	$db = openDatabaseConnection();

	$sql = "DELETE FROM Rassen WHERE id=:id";
	$db->prepare($sql)->execute(array("id" => $id));
}


?>