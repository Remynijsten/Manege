<?php
require(ROOT . "model/ManegeModel.php");

function index(){
    render('index', array(
        'logoTitle' => "MANEGE"
    ));
}

function bezoekers(){
    render('bezoekers', array(
        'logoTitle' => "BEZOEKERS",
        'visitors' => getVisitors()
    ));
}

function paarden(){
    render('paarden', array(
    'logoTitle' => "PAARDEN",
    'horses' => getHorses()
    ));
}

function reserveringen(){
    render('reserveringen', array(
    'logoTitle' => "RESERVERINGEN",
    'reservations' => getReservations(),
    'horses' => getHorses(),
    'visitors' => getVisitors()
    ));
}

function availableVisitors($start, $end, $datum){
    $result = availableCheck($start, $end, $datum);
    echo json_encode($result);
}

function availableHorses($start, $end, $datum){
    $result = availableCheck($start, $end, $datum);
    echo json_encode($result);
}

?>


