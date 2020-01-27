$("#menu-toggle").click(function(e) {
	e.preventDefault();
	$("#wrapper").toggleClass("toggled");
});

//verberg de ID input
$(".reservationIdInput").hide();

// Veranderd de form action naar add
function addModal(){
	$(".bezoekerForm").attr("action", "../visitor/addVisitor");
}

// Veranderd de form action naar edit
function editModal(rowNumber){
	$(".bezoekerForm").attr("action", "../visitor/editVisitor");
	$(".bezoekerIdInput").attr("value", rowNumber);
}

// Veranderd de form action naar edit
function editReservationModal(rowNumber){
	$(".reservationForm").attr("action", "../reservation/editReservation");
	$(".reservationIdInput").attr("value", rowNumber);
	$(".day, .month").prop('selectedIndex',0);
	$(".start, .end").prop('selectedIndex',0);
	$(".reservationNameSelect, .reservationHorseSelect, .price").hide().val("");
	$(".addReservationSubmit, .start, .end").hide();
}

// Veranderd de form action naar add
function addHorseModal(){
	$(".paardForm").attr("action", "../horse/addHorse");
}

// Veranderd de form action naar edit
function editHorseModal(id, name, ras){
	$(".paardIdInput").css("display", "block").val(id);
	$(".rasInput").val(ras);
	$(".paardNameInput").val(name);
	$(".paardForm").attr("action", "../horse/editHorse");
}

//initialiseert de form waardes wanneer de plus knop word geklikt
$(".addReservation").on("click", function(){
	$(".day, .month").prop('selectedIndex',0);
	$(".start, .end").prop('selectedIndex',0);
	$(".reservationNameSelect, .reservationHorseSelect, .price").hide().val("");
	$(".addReservationSubmit, .start, .end").hide();
});

//veranderd de paard/pony waarde dynamisch op basis van de input
$(".schoftInput").on("change", function(){
	if ($(".schoftInput").val() > 1.47){
		$(".paardSoort").val("Paard");
	}else{
		$(".paardSoort").val("Pony");
	}
});

//controleert of de naam al ingebruik is
$(".bezoekerForm").on("submit", function(e){
	e.preventDefault();
	$.post("../visitor/validateVisitor",$(".bezoekerForm").serialize() ,function(data){
		if (data == 1){
			errorDisplay("Naam is al in gebruik!");
		}else{
			$(".bezoekerForm").unbind("submit");
			$(".bezoekerForm").submit();
		}
	});
});

//controleert of de naam al ingebruik is
$(".paardForm").on("submit", function(e){
	e.preventDefault();
	$.post("../horse/validateHorse",$(".paardForm").serialize() ,function(data){
		if (data == 1){
			errorDisplay("Naam is al in gebruik!");
		}else{
			$(".paardForm").unbind("submit");
			$(".paardForm").submit();
		}
	});
});

//dynamisch vullen van de end hours tov de start tijd
function seedHours(start){
	begin = +start + 1
	for (i=begin;i<25;i++){
		$(".end").append('<option>' +i+ '</option>');
	}
}

//veranderd variabelen en data wanneer de datum word aangepast
$(".dateSelect select").on("change", function(){
	id = $(".reservationForm :first-child").val();
	tablerow = ".tableRow" + id + " :first-child";
	saveName = $(tablerow).next().text();
	saveHorse = $(tablerow).next().next().text();

	if($(".day option:selected").text() != "Dag" && $(".month option:selected").text() != "Maand"){
		$(".start ").show();
		if($(".end option:selected").text() != "Eind" && $(".start option:selected").text() != "Start"){
			var datum = $(".year").val() +"-"+ $(".month").val() +"-"+ $(".day").val();
			
			$.ajax({
				url: '../manege/availableVisitors/' + $(".start").val()+"/"+$(".end").val()+"/"+ datum,
				success: function(response){
					parseResponse = (JSON.parse(response));
					removeNames = [];
					for(i=0;i<parseResponse.length;i++){
						removeNames.push(parseResponse[i]['bezoeker']);
					}
					seedVisitors(removeNames, saveName);
				}
			});
			$.ajax({
				url: '../manege/availableHorses/' + $(".start").val()+"/"+$(".end").val()+"/"+ datum,
				success: function(response){
					parseResponse = (JSON.parse(response));
					removeHorses = [];
					for(i=0;i<parseResponse.length;i++){
						removeHorses.push(parseResponse[i]['paard']);
					}
					seedHorses(removeHorses, saveHorse);
				}
			});
		}
	}
});

//Wanneer de starttijd veranderd, word de naamselect gevuld met beschikbare namen
$(".start").on("change", function(){
	seedHours($(this).val())
	$(".end").show();
	id = $(".reservationForm :first-child").val();
	tablerow = ".tableRow" + id + " :first-child";
	saveName = $(tablerow).next().text();
	saveHorse = $(tablerow).next().next().text();

	if($(".end option:selected").text() != "Eind"){
		$(".price").show();
		$(".reservationNameSelect, .reservationHorseSelect").show();
		$(".addReservationSubmit").show();

		start = $(".start").val();
		end = $(".end").val();
		price = calc(start, end);
		duration = start - end;
		$(".priceCalc").text(" " + price);

		var datum = $(".year").val() +"-"+ $(".month").val() +"-"+ $(".day").val();


		$.ajax({
			url: '../manege/availableVisitors/' + $(".start").val()+"/"+$(".end").val()+"/"+ datum,
			success: function(response){
				parseResponse = (JSON.parse(response));
				removeNames = [];
				for(i=0;i<parseResponse.length;i++){
					removeNames.push(parseResponse[i]['bezoeker']);
				}
				seedVisitors(removeNames, saveName);
			}
		});
		$.ajax({
			url: '../manege/availableHorses/' + $(".start").val()+"/"+$(".end").val()+"/"+ datum,
			success: function(response){
				parseResponse = (JSON.parse(response));
				removeHorses = [];
				for(i=0;i<parseResponse.length;i++){
					removeHorses.push(parseResponse[i]['paard']);
				}
				seedHorses(removeHorses, saveHorse);
			}
		});
	}
});

//Wanneer de eindtijd veranderd, word de naamselect gevuld met beschikbare namen
$(".end").on("change", function(){
	id = $(".reservationForm :first-child").val();
	tablerow = ".tableRow" + id + " :first-child";
	saveName = $(tablerow).next().text();
	saveHorse = $(tablerow).next().next().text();

	if($(".start option:selected").text() != "Start"){
		$(".price").show();
		$(".reservationNameSelect, .reservationHorseSelect").show();
		$(".addReservationSubmit").show();

		start = $(".start").val();
		end = $(".end").val();
		price = calc(start, end);
		duration = start - end;
		$(".priceCalc").text(" " + price);

		var datum = $(".year").val() +"-"+ $(".month").val() +"-"+ $(".day").val();

		$.ajax({
			url: '../manege/availableVisitors/' + $(".start").val()+"/"+$(".end").val()+"/"+ datum,
			success: function(response){
				parseResponse = (JSON.parse(response));
				removeNames = [];
				for(i=0;i<parseResponse.length;i++){
					removeNames.push(parseResponse[i]['bezoeker']);
				}
				seedVisitors(removeNames, saveName);
			}
		});
		$.ajax({
			url: '../manege/availableHorses/' + $(".start").val()+"/"+$(".end").val()+"/"+ datum,
			success: function(response){
				parseResponse = (JSON.parse(response));
				removeHorses = [];
				for(i=0;i<parseResponse.length;i++){
					removeHorses.push(parseResponse[i]['paard']);
				}
				seedHorses(removeHorses, saveHorse);
			}
		});
	}
});

//Filtert database namen en vult de selects met opties
function seedVisitors(faultyNames, saveName){
	$.ajax({
		url: '../visitor/readVisitors',
		success: function(visitors){
			parsedVisitors = JSON.parse(visitors);
			var newVisitors = [];

			for(let i=0;i<parsedVisitors.length;i++){
				newVisitors.push(parsedVisitors[i]['naam']);
			}

			for (let i=0;i<faultyNames.length;i++){
				var removeIndex = newVisitors.indexOf(faultyNames[i]);
				newVisitors.splice(removeIndex, 1);
			}

			//Initialiseer de name select
			$(".reservationNameSelect").empty();

			//Seed de name select met de beschikbare namen
			for(let i=0;i<newVisitors.length;i++){
				$(".reservationNameSelect").append("<option>"+newVisitors[i]+"</option>");
			}

			// Voorkom dubbel toevoegen van de save name
			if(newVisitors.indexOf(saveName) > -1){
			}
			else{
				if (saveName != ""){
					$(".reservationHorseSelect").append("<option>"+saveName+"</option>");
				}
			}
		}
	});
}

//Filtert database namen en vult de selects met opties
function seedHorses(faultyHorses, saveHorse){
	$.ajax({
		url: '../horse/readHorses',
		success: function(horses){
			parsedHorses = JSON.parse(horses);

			var newHorses = [];

			for(let i=0;i<parsedHorses.length;i++){
				newHorses.push(parsedHorses[i]['naam']);
			}

			for (let i=0;i<faultyHorses.length;i++){
				var removeIndex = newHorses.indexOf(faultyHorses[i]);
				newHorses.splice(removeIndex, 1);
			}
			console.log(newHorses);
			//Initialiseer de name select
			$(".reservationHorseSelect").empty();

			//Seed de name select met de beschikbare namen
			for(let i=0;i<newHorses.length;i++){
				$(".reservationHorseSelect").append("<option>"+newHorses[i]+"</option>");
			}

			// Voorkom dubbel toevoegen van de save horse
			if(newHorses.indexOf(saveHorse) > -1){
			}
			else{
				if (saveHorse != ""){
					$(".reservationHorseSelect").append("<option>"+saveHorse+"</option>");
				}
			}
		}
	});
}

//berekent uur * uurprijs
function calc(start, end){
    return (end - start) * 55;
}

//Toont foutmeldingen in de forms
function errorDisplay(message){
	errorDiv = document.createElement("div");
	errorDiv.setAttribute("class", "error alert alert-danger");
	errorDiv.innerHTML = message;
	errorDiv.style.textAlign = "center";
	errorDiv.style.marginTop = "1em";
	$(".modal-body").append(errorDiv);
	
	$(".error").fadeOut(3000);

	setTimeout(function(){
		$(".error").remove();
	}, 2500);
}