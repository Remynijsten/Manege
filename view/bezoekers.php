<section class="bezoekers">
	<div class="container">
		<table class="bezoekersTable">
			<tr>
				<th class="bzkrID">ID</th>
				<th class="bzkrNM">NAAM</th>
				<th class="bzkrRE">TELEFOON</th>
				<th class="bzkrRE">ADRES</th>
				<th class="bzkrRE">RESERVERINGEN</th>
				<th class="bzkrBT"></th>
			</tr>
		</table>
		<div class="buttonContainer">
			<button type="button" onclick="addModal()" class="addVisitor" data-toggle="modal" data-target="#addVisitorModal">
				<p class="plus"><i class="fas fa-plus"></i></p>
			</button>
		</div>
	</div>

	<div class="modal fade" id="addVisitorModal">
	    <div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">

				<div class="modal-header">
					<h4 class="modal-title text-center">Bezoeker Toevoegen/Bewerken</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<div class="modal-body">
					<form class="bezoekerForm" method="post" action="<?=URL?>visitor/addVisitor">
					  	<input placeholder="ID" type="text" name="id" class="bezoekerIdInput hidden form-control" readonly>
					  	<input placeholder="Naam" type="text" name="name" class="bezoekerNameInput form-control" required>
					  	<input placeholder="Telefoon" type="text" name="phone" class="bezoekerNameInput form-control" required>
					  	<input placeholder="Adres" type="text" name="adres" class="bezoekerNameInput form-control" required> 
						<button  type="submit" class="addVisitorSubmit">Voeg Toe</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<script>

var visitors = <?php echo json_encode($visitors); ?>;

$(".hidden").hide();

for(i=0;i<visitors.length;i++){
	var ID = visitors[i]['ID'];
    var name = visitors[i]['naam'];
    var phone = visitors[i]['telefoon'];
var adres = visitors[i]['adres'];
    var markup = "<tr class='row" + (i+1) + "'>\
    <td class='idTable'>" + ID + "</td>\
    <td class='nameTable'>" + name + "</td>\
    <td class='phoneTable'>" + phone + "</td>\
    <td class='adresTable'>" + adres + "</td>\
    <td><a href='<?=URL?>manege/reserveringen'><i class='viewReservations far fa-eye'></i></a></td>\
    <td><i onclick='editModal("+ ID +")' data-toggle='modal' data-target='#addVisitorModal' class='editRow far fa-edit'></i>  <a href='../visitor/deleteVisitor/"+ID+"/"+name+"'><i class='deleteRow far fa-trash-alt'></i></a></td>\
    </tr>";
    $(".bezoekersTable").append(markup);
}
</script>