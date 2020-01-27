<?php  

function postReservation($data){
	$data['date'] = $_POST['year'] . $_POST['month'] . $_POST['day'];
	$price = ($data['end'] - $data['start']) * 55;
	$duration = $data['end'] - $data['start'];


	$db = openDatabaseConnection();

	$sql = "INSERT INTO Reserveringen (bezoeker, paard, datum, start, eind, duur, prijs) VALUES (:name, :horse, :datum, :start, :eind, :duur, :prijs)";
	$db->prepare($sql)->execute(array(
		":name" => $data['name'], 
		":horse" => $data['horse'],
		":datum" => $data['date'],
		":start" => $data['start'],
		":eind" => $data['end'],
		":duur" => $duration,
		":prijs" => $price
	));
}

function destroyReservation($id){
	$db = openDatabaseConnection();

	$sql = "DELETE FROM Reserveringen WHERE id=:id";
	$db->prepare($sql)->execute(array("id" => $id));
}

function updateReservation($data){
	$db = openDatabaseConnection();

	$data['date'] = $_POST['year'] . $_POST['month'] . $_POST['day'];
	$price = ($data['end'] - $data['start']) * 55;
	$duration = $data['end'] - $data['start'];

	$sql = "UPDATE Reserveringen SET datum=:datum, bezoeker=:name, paard=:horse, start=:start, eind=:eind, duur=:duur, prijs=:prijs WHERE id=:id";
	$db->prepare($sql)->execute(array(
		":id" => $data['id'],
		":name" => $data['name'], 
		":horse" => $data['horse'],
		":datum" => $data['date'],
		":start" => $data['start'],
		":eind" => $data['end'],
		":duur" => $duration,
		":prijs" => $price));

	echo $_POST['name'] . $_POST['horse'];
}



















?>