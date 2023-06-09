let host = "http://localhost/ple/";
let dataResult;

$(document).on('click', '#btn-add', function(e) {
	e.preventDefault();
	let form = $('#objective_form')[0];
	let formData = new FormData(form);
	$.ajax({
		data: formData,
		type: "post",
		url: host + "backend/admin.php",
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

$(document).ready(function() {
	//Get modal input images 
	const inputImages = [
		{
		  input: document.querySelector('#thumbnail'),
		  image: document.querySelector('#thumbnail-img')
		},
		{
		  input: document.querySelector('#example-1'),
		  image: document.querySelector('#example-img-1')
		},
		{
		  input: document.querySelector('#example-2'),
		  image: document.querySelector('#example-img-2')
		},
		{
		  input: document.querySelector('#example-3'),
		  image: document.querySelector('#example-img-3')
		},
		{
		  input: document.querySelector('#example-4'),
		  image: document.querySelector('#example-img-4')
		},
		{
		  input: document.querySelector('#example-1_u'),
		  image: document.querySelector('#example-img-1_u')		
		},
		{
		  input: document.querySelector('#example-2_u'),
		  image: document.querySelector('#example-img-2_u')
		},
		{
		  input: document.querySelector('#example-3_u'),
		  image: document.querySelector('#example-img-3_u')
		},
		{
		  input: document.querySelector('#example-4_u'),
		  image: document.querySelector('#example-img-4_u')
		}
	  ];
	  
	  inputImages.forEach((item, index) => {
		item.image.style.display = 'none';
		item.input.addEventListener('change', (event) => {
			item.image.src = URL.createObjectURL(event.target.files[0]);
			item.image.style.display = 'block';
		});
	  });
});

$(document).on('click','.update',function(e) {
	let id = $(this).attr("data-id");
	let title = $(this).attr("data-title");
	let description = $(this).attr("data-description");
	let instructions = $(this).attr("data-instructions");
	let thumbnail = $(this).attr("data-thumbnail");
	let example_1 = $(this).attr("data-example_1");
	let example_2 = $(this).attr("data-example_2");
	let example_3 = $(this).attr("data-example_3");
	let example_4 = $(this).attr("data-example_4");
	let end_time = $(this).attr("data-end_time");

	$('#id_u').val(id);
	$('#title_u').val(title);
	$('#description_u').val(description);
	$('#instructions_u').val(instructions);
	$('#thumbnail_img-u').attr("src", "../gfx/objectives/thumbnails/" + thumbnail);
	$('#example-img-1-u').attr("src", "../gfx/objectives/examples/" + example_1);
	$('#example-img-2-u').attr("src", "../gfx/objectives/examples/" + example_2);
	$('#example-img-3-u').attr("src", "../gfx/objectives/examples/" + example_3);
	$('#example-img-4-u').attr("src", "../gfx/objectives/examples/" + example_4);
	$('#end_time_u').val(end_time);
});

$(document).on('click','#update',function(e) {
	e.preventDefault();
	let form = $('#update_form')[0];
	let formData = new FormData(form);
	$.ajax({
		data: formData,
		type: "post",
		url: host + "backend/admin.php",
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
		url: host + "backend/admin.php",
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
