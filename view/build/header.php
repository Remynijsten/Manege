<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Medewerker</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src="https://kit.fontawesome.com/970adb2e15.js" crossorigin="anonymous"></script>
	<script src="<?= URL ?>public/js/jquery-3.4.1.min.js"></script>	
	<link rel="stylesheet" href="<?= URL ?>public/css/style.css">
</head>
<body>
	<section class="header">
		<h1 class="logo">-<?php echo $logoTitle; ?></h1>
	</section>

	<div class="d-flex" id="wrapper">
	    <div class=" border-right" id="sidebar-wrapper">
			<div class="sidebar-heading">Manege</div>
			<div class="list-group list-group-flush">
			<a href="<?=URL?>manege/index" class="list-group-item list-group-item-action">Home</a>
			<a href="<?=URL?>manege/bezoekers" class="list-group-item list-group-item-action ">Bezoekers</a>
			<a href="<?=URL?>manege/paarden" class="list-group-item list-group-item-action">Paarden</a>
			<a href="<?=URL?>manege/reserveringen" class="list-group-item list-group-item-action">Reserveringen</a>
			</div>
	    </div>
		<i id="menu-toggle" class="fas fa-bars"></i>



