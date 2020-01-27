<?php

require(ROOT . "model/HorseModel.php");

function validateHorse(){
    checkHorse($_POST);
}

function addHorse(){
    postHorse($_POST);
    header('location: ' . URL . "manege/paarden");
}

function readHorses(){
    print_r(seedHorses());
}

function editHorse(){
    updateHorse($_POST);
    header('location: ' . URL . "manege/paarden");
}

function deleteHorse($id){
    destroyHorse($id);
    header('location: ' . URL . "manege/paarden");
}

?>

