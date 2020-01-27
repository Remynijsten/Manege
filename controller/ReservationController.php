<?php 

require(ROOT . "model/ReservationModel.php");

function addReservation(){
    postReservation($_POST);
    header("Location: ../manege/reserveringen");
}

function deleteReservation($id){
	destroyReservation($id);
	header("Location: ../../manege/reserveringen");
}

function editReservation(){
    updateReservation($_POST);
	header('location: ' . URL . "manege/reserveringen");
}

?>