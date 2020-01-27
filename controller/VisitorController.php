<?php 

require(ROOT . "model/VisitorModel.php");

function validateVisitor(){
    checkVisitor($_POST);
}

function addVisitor(){
    postVisitor($_POST);
    header('location: ' . URL . "manege/bezoekers");
}

function readVisitors(){
    print_r(seedVisitors());
}

function deleteVisitor($id, $name){
    destroyVisitor($id, $name);
    header('location: ' . URL . "manege/bezoekers");
}

function editVisitor(){
    updateVisitor($_POST);
    header("Location: ../manege/bezoekers");
}


?>
