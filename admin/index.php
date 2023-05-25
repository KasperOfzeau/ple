<?php
include '../backend/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin | Objectives Data</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/admin.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="../js/admin.js"></script>
</head>
<body>
    <div class="container">
		<p id="success"></p>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Manage <b>Objectives</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Objective</span></a>
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
						<th>Thumbnail</th>
                        <th>End time</th>
                        <th>Action</th>
                    </tr>
                </thead>
				<tbody>
				<?php
				$result = mysqli_query($conn,"SELECT * FROM objectives");
				$i=1;
				while($row = mysqli_fetch_array($result)) {
				?>
					<tr id="<?= $row["id"]; ?>">
						<td><?= $i; ?></td>
						<td><?= $row["title"]; ?></td>
						<td><?= $row["description"]; ?></td>
						<td><img src="../gfx/objectives/thumbnails/<?= $row["thumbnail"]; ?>" width="150px" height="auto"/></td>
						<td><?= $row["end_time"]; ?></td>
						<td>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal">
								<i class="material-icons update" data-toggle="tooltip" 
								data-id="<?= $row["id"]; ?>"
								data-title = "<?= $row["title"]; ?>"
								data-description = "<?= $row["description"]; ?>"
								data-instructions = "<?= $row["instructions"]; ?>"
								data-thumbnail = "<?= $row["thumbnail"]; ?>"
								data-example_1 = "<?= $row["example_image1"]; ?>"
								data-example_2 = "<?= $row["example_image2"]; ?>"
								data-example_3 = "<?= $row["example_image3"]; ?>"
								data-example_4 = "<?= $row["example_image4"]; ?>"
								data-end_time = "<?= date('Y-m-d H:i:s', strtotime($row["end_time"])); ?>"
								title="Edit">&#xE254;</i>
							</a>
							<a href="#deleteEmployeeModal" class="delete" data-id="<?= $row["id"]; ?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" 
							title="Delete">&#xE872;</i></a>
						</td>
					</tr>
				<?php
				$i++;
				}
				?>
				</tbody>
			</table>
        </div>
    </div>
	<!-- Add Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="objective_form">
					<div class="modal-header">						
						<h4 class="modal-title">Add Objective</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Title</label>
							<input type="text" id="title" name="title" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Description</label>
							<textarea id="description" name="description" class="form-control" required></textarea>
						</div>
						<div class="form-group">
							<label>Instructions</label>
							<textarea id="instructions" name="instructions" class="form-control" required></textarea>
						</div>
						<div class="form-group">
							<label>Thumbnail</label>
							<img src="" id="thumbnail-img" width="100" height="auto">
							<input type="file" id="thumbnail" name="thumbnail" class="form-control" required>
						</div>
						<div class="form-group">
							<label>End time</label>
							<input type="datetime-local" id="end_time" name="end_time" class="form-control" required>
						</div>
						<div class="form-group example-images"> 
							<div class="example-1">
								<label>Example 1</label>
								<img src="" id="example-img-1" class="example-img" width="100" height="auto">
								<input type="file" id="example-1" name="example-1" class="form-control" required>
							</div>	
							<div class="example-2">
								<label>Example 2</label>
								<img src="" id="example-img-2" class="example-img" width="100" height="auto">
								<input type="file" id="example-2" name="example-2" class="form-control" required>
							</div>
							<div class="example-3">
								<label>Example 3</label>
								<img src="" id="example-img-3" class="example-img" width="100" height="auto">
								<input type="file" id="example-3" name="example-3" class="form-control" required>
							</div>
							<div class="example-4">
								<label>Example 4</label>
								<img src="" id="example-img-4" class="example-img" width="100" height="auto">
								<input type="file" id="example-4" name="example-4" class="form-control" required>
							</div>
						</div>				
					</div>
					<div class="modal-footer">
					    <input type="hidden" value="1" name="type">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-success" id="btn-add">Add</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
	<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="update_form">
					<div class="modal-header">						
						<h4 class="modal-title">Update Objective</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_u" name="id" class="form-control">						
						<div class="form-group">
							<label>Title</label>
							<input type="text" id="title_u" name="title" class="form-control">
						</div>
						<div class="form-group">
							<label>Description</label>
							<textarea id="description_u" name="description" class="form-control"></textarea>
						</div>
						<div class="form-group">
							<label>Instructions</label>
							<textarea id="instructions_u" name="instructions" class="form-control" required></textarea>
						</div>
						<div class="form-group">
							<label>Thumbnail</label>
							<img src="" id="thumbnail-img-u" width="150" height="auto">
							<input type="file" id="thumbnail_u" name="thumbnail" class="form-control">
						</div>
						<div class="form-group">
							<label>End time</label>
							<input type="datetime-local" id="end_time_u" name="end_time" class="form-control">
						</div>
						<div class="form-group example-images"> 
							<div class="example-1">
								<label>Example 1</label>
								<img src="" id="example-img-1-u" class="example-img" width="100" height="auto">
								<input type="file" id="example-1_u" name="example-1" class="form-control" required>
							</div>	
							<div class="example-2">
								<label>Example 2</label>
								<img src="" id="example-img-2-u" class="example-img" width="100" height="auto">
								<input type="file" id="example-2_u" name="example-2" class="form-control" required>
							</div>
							<div class="example-3">
								<label>Example 3</label>
								<img src="" id="example-img-3-u" class="example-img" width="100" height="auto">
								<input type="file" id="example-3_u" name="example-3" class="form-control" required>
							</div>
							<div class="example-4">
								<label>Example 4</label>
								<img src="" id="example-img-4-u" class="example-img" width="100" height="auto">
								<input type="file" id="example-4_u" name="example-4" class="form-control" required>
							</div>
						</div>			
					</div>
					<div class="modal-footer">
						<input type="hidden" value="2" name="type">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-info" id="update">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Delete User</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_d" name="id" class="form-control">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-danger" id="delete">Delete</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>                                		                            