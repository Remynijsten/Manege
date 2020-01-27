<section class="reservations">
	<div class="container">
		<table class="reservationTable">
			<tr>
				<th class="reservationId">ID</th>
				<th class="reservationName">NAAM</th>
				<th class="reservationHorse">PAARD</th>
				<th class="reservationDate">DATUM</th>
				<th class="reservationStart">START</th>
				<th class="reservationEnd">EIND</th>
				<th class="reservationDuration">DUUR</th>
				<th class="reservationPrice">PRIJS</th>
				<th class="reservationButtons"></th>
			</tr>
		</table>
		<div class="buttonContainer">
			<button type="button" class="addReservation" data-toggle="modal" data-target="#addReservationModal">
				<p class="plus"><i class="fas fa-plus"></i></p>
			</button>
		</div>
	</div>

	<div class="modal fade" id="addReservationModal">
	    <div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">

				<div class="modal-header">
					<h4 class="modal-title text-center">Reservering Toevoegen/Bewerken</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

			  <div class="modal-body">
			  	<form class="reservationForm" method="post" action="<?=URL?>reservation/addReservation">
			  		<input name="id" id="reservationIdInput" class="reservationIdInput form-control">

				  	<div class="dateSelect form-group">
						<select name="day" class="day" id="dag">
							<option selected disabled>Dag</option>
						</select>
						<select name="month" class="month">
							<option selected disabled>Maand</option>
						</select>
						<select name="year" class="year">
							<option selected>2020</option>
						</select>
					</div>

					<div class="timeGroup form-group .text-center">
					  	<select name="start" class="start">
					  		<option selected disabled>Start</option>
					  	</select>
					  	<select name="end" class="end">
					  		<option  selected disabled>Eind</option>
					  	</select>
					</div>

					<select name="name" id="reservationNameSelect" class="reservationNameSelect form-control">
						<option value="Bezoeker" selected disabled>Bezoeker</option>
					</select>

					<select name="horse" class="reservationHorseSelect form-control">
						<option selected disabled>Paard</option>
					</select>

					<div class="price">€<span class="priceCalc"></span></div>
					
					<button type="submit" class="addReservationSubmit">Voeg Toe</button>
				</form>
			  </div>
			</div>
		</div>
	</div>
</section>	

<script type="text/javascript">
	// ophalen van rows uit de database
	var reservations = <?php echo json_encode($reservations); ?>;

	// hide de ID input van de form die vereist is voor de back-end $_POST
	$(".hidden").hide();

	// vult de uur selects tm 23
	for (i=1;i<25;i++){
		$(".start").append('<option>' +i+ '</option>');
	}

	// vult de dag selects tm 31
	for (i=1;i<32;i++){
		if(i<10){
			$(".day").append('<option>0'+ i + '</option>');
		}else{
			$(".day").append('<option>'+i+'</option>');
		}
	}

	// vult de maand selects tm 12
	for (i=1;i<13;i++){
		if(i<10){
			$(".month").append('<option>' +"0"+i+ '</option>');
		}else{
			$(".month").append('<option>' +i+ '</option>');
		}
	}

	// dynamisch vullen van de table aan de hand van database rows
	for(i=0;i<reservations.length;i++){
		var ID = reservations[i]['ID'];
	    var bezoeker = reservations[i]['bezoeker'];
	    var paard = reservations[i]['paard'];
	    var datum = reservations[i]['datum'];
	    var start = reservations[i]['start'];
	    var eind = reservations[i]['eind'];
	    var duur = reservations[i]['duur'];
	    var prijs = reservations[i]['prijs'];

	    var markup = "<tr class='tableRow"+ID+"'>\
	    <td>" + ID + "</td>\
	    <td>" + bezoeker + "</td>\
	    <td>" + paard + "</td>\
	    <td>" + datum + "</td>\
	    <td>" + start + "</td>\
	    <td>" + eind + "</td>\
	    <td>" + duur + "</td>\
	    <td>" + prijs + "</td>\
	    <td><i onclick='editReservationModal("+ID+")' data-toggle='modal' data-target='#addReservationModal' class='editRow far fa-edit'></i>  <a href='<?=URL?>reservation/deleteReservation/"+ID+"'><i class='deleteRow far fa-trash-alt'></i></a></td>\
	    </tr>";
	    $(".reservationTable").append(markup);
	}
</script>