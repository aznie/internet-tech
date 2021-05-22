function getHTML(e){
	var currentForm = $(e).parents('form');

	$.ajax({
	  type: "GET",
	  url: "show_table_for_league.php",
	  data: currentForm.serialize(),
	  success: function(result){
	  	$('#res1').html(result);
	  }
	});
}

function getXML(e){
	var currentForm = $(e).parents('form');

	$.ajax({
	  type: "GET",
	  url: "show_list_for_date.php",
	  data: currentForm.serialize(),
	  dataType: "xml",
	  success: function(result){
	  	var output = "";
	  	$(result).find('game').each(function(){
	  		var date = $(this).find('date').text();
	  		var place = $(this).find('place').text();
	  		var score = $(this).find('score').text();
	  		output += '<tr>' + '<td>' + date + '</td>' + '<td>' + place + '</td>' + '<td>'+ score + '</td>' + '</tr>';
	  	})
  		$('#res2').html(output);
	  }
	});
}

function getJSON(e){
	var currentForm = $(e).parents('form');

	$.ajax({
	  type: "GET",
	  url: "show_list_for_player.php",
	  data: currentForm.serialize(),
	  dataType: "json",
	  success: function(result){
	  	var output = "";
	  	for (var i = 0; i < result.length; i++) {
	  		output += '<tr>' + '<td>' + result[i].date + '</td>' + '<td>' + result[i].place + '</td>' + '<td>' + result[i].score + '</td>' + '</tr>';
	  	}
	  	$('#res3').html(output);
	  }
	});
}