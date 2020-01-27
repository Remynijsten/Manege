<section class="paarden">
	<div class="container">
		<table class="paardenTable">
			<tr>
				<th class="paardID">ID</th>
				<th class="paardRS">RAS</th>
				<th class="paardNM">NAAM</th>
				<th class="paardNM">SCHOFT</th>
				<th class="paardNM">SOORT</th>
				<th class="paardRE">RESERVERINGEN</th>
				<th class="paardBT"></th>
			</tr>
		</table>
		<div class="buttonContainer">
			<button type="button" class="addVisitor" data-toggle="modal" data-target="#addHorseModal">
				<p class="plus"><i class="fas fa-plus"></i></p>
			</button>
		</div>
	</div>

	<div class="modal fade" id="addHorseModal">
	    <div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title text-center">Paarden Toevoegen/Bewerken</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

			  <div class="modal-body">
			  	<form class="paardForm" method="post" action="<?=URL?>horse/addHorse">
				  	<input placeholder="ID" type="number" name="id" class="hidden paardIdInput form-control" readonly>
						<input placeholder="ras" name="ras" class="rasInput form-control" required>
						<input placeholder="naam" type="text" name="name" class="paardNameInput form-control" required>
						<input placeholder="schoft" step="any" type="number" name="schoft" class="schoftInput form-control" required>
						<input placeholder="soort" class="paardSoort" type="soort" name="soort" readonly>
					<button type="submit" class="addHorseSubmit">Voeg Toe</button>
				</form>
			  </div>

			</div>
		</div>
	</div>
</section>

<script>
var horses = <?php echo json_encode($horses); ?>;

for(i=0;i<horses.length;i++){
	var ID = horses[i]['ID'];
    var name = horses[i]['naam'];
    var ras = horses[i]['ras'];
    var schoft = horses[i]['schoft'];
    var soort = horses[i]['soort'];
    var markup = "<tr class='row" + (i+1) + "'>\
    <td class='idTable'>" + ID + "</td>\
    <td class='rasTable'>" + ras + "</td>\
    <td class='nameTable'>" + name + "</td>\
    <td class='nameTable'>" + schoft + "</td>\
    <td class='nameTable'>" + soort + "</td>\
    <td><a href='<?=URL?>manege/reserveringen'><i class='viewReservations far fa-eye'></i></a></td>\
    <td><i onclick='editHorseModal("+ ID + ", `" + name + "`, `" + ras +"`)' data-toggle='modal' data-target='#addHorseModal' class='editRow far fa-edit'></i>  <a href='../horse/deleteHorse/"+ID+"'><i class='deleteRow far fa-trash-alt'></i></a></td>\
    </tr>";
    $(".paardenTable").append(markup);
}
</script>