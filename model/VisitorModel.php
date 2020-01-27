<?php  

function checkVisitor($data){
	$db = openDatabaseConnection();
	
	$username = $data['name'];
	
	$sql = $db->prepare("SELECT COUNT(*) as count FROM Bezoekers where naam = :username ");
	$sql->execute(array(":username" => $data['name']));
	$result = $sql->fetch();

	if($result["count"] >= 1){
		echo 1;
	}else{
		echo 0;
	}
}

function postVisitor($data){
	$db = openDatabaseConnection();

	$sql = "INSERT INTO Bezoekers (naam, telefoon, adres) VALUES (:naam, :telefoon, :adres)";
	$db->prepare($sql)->execute(array(
		":naam" => $data['name'],
		":telefoon" => $data['phone'],
		":adres" => $data['adres'],
	));
}

function updateVisitor($data){
	$db = openDatabaseConnection();

	$name = "'" . $data['name'] . "'";
	$id = $data['id'];

	// Inner Join Query
	$sql = "UPDATE Bezoekers INNER JOIN Reserveringen ON Reserveringen.bezoeker = Bezoekers.naam SET bezoeker = $name, naam = $name WHERE Bezoekers.ID='$id'";
	$db->prepare($sql)->execute();

	// Query voor wanneer de bezoeker nog geen reservering heeft maar wel aangepast dient te worden
	$sql2 = "UPDATE Bezoekers SET naam=:name, telefoon=:phone, adres=:adres WHERE ID=:id";
	$db->prepare($sql2)->execute(array(
		":name" => $data['name'],
		":id" => $data['id'],
		":phone" => $data['phone'],
		":adres" => $data['adres']
	));
}

function seedVisitors(){
	$db = openDatabaseConnection();

	$sql = $db->prepare("SELECT * FROM Bezoekers");
	$sql->execute();

	$result = $sql->fetchAll();
	echo json_encode($result);
}

function destroyVisitor($id, $name){
	$db = openDatabaseConnection();

	$sql = "DELETE FROM Bezoekers WHERE id=:id";
	$db->prepare($sql)->execute(array("id" => $id));

	$sql2 = "DELETE FROM Reserveringen WHERE bezoeker=:name";
	$db->prepare($sql2)->execute(array(":name" => $name));


}
function destroyHorse($id){
	$db = openDatabaseConnection();

	$sql = "DELETE FROM Paarden WHERE id=:id";
	$db->prepare($sql)->execute(array("id" => $id));
}


?>