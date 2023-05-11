let host = "http://localhost/ple/";
let dataResult;

$(document).on('click', '#btn-add', function(e) {
	e.preventDefault();
	let form = $('#objective_form')[0];
	let formData = new FormData(form);
	$.ajax({
		data: formData,
		type: "post",
		url: host + "backend/save.php",
		contentType: false,
		processData: false,
		success: function(dataResult) {
			dataResult = JSON.parse(dataResult);
			if (dataResult.statusCode == 200) {
				$('#addEmployeeModal').modal('hide');
				alert('Data added successfully!');
				location.reload();
			} else if (dataResult.statusCode == 201) {
				alert(dataResult);
			}
		}
	});
});

$(document).on('click','.update',function(e) {
	let id = $(this).attr("data-id");
	let title = $(this).attr("data-title");
	let description = $(this).attr("data-description");
	let thumbnail = $(this).attr("data-thumbnail");
	let end_time = $(this).attr("data-end_time");

	$('#id_u').val(id);
	$('#title_u').val(title);
	$('#description_u').val(description);
	$('#thumbnail_img_u').attr("src", "../gfx/objectives/thumbnails/" + thumbnail);
	$('#end_time_u').val(end_time);
});

$(document).on('click','#update',function(e) {
	e.preventDefault();
	let form = $('#update_form')[0];
	let formData = new FormData(form);
	$.ajax({
		data: formData,
		type: "post",
		url: host + "backend/save.php",
		contentType: false,
		processData: false,
		success: function(dataResult){
				dataResult = JSON.parse(dataResult);
				if(dataResult.statusCode==200){
					$('#editEmployeeModal').modal('hide');
					alert('Data updated successfully !'); 
					location.reload();						
				}
				else if(dataResult.statusCode==201){
					alert(dataResult);
				}
		}
	});
});

$(document).on("click", ".delete", function() { 
	let id=$(this).attr("data-id");
	$('#id_d').val(id);
	
});

$(document).on("click", "#delete", function() { 
	$.ajax({
		url: host + "backend/save.php",
		type: "POST",
		cache: false,
		data:{
			type:3,
			id: $("#id_d").val()
		},
		success: function(dataResult){
				$('#deleteEmployeeModal').modal('hide');
				$("#"+dataResult).remove();
		
		}
	});
});
