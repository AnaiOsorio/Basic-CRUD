<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>test</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="row">
		<h1 class="text-center">Te amo Amor</h1>
	</div>
	<div class="container-fluid">
		<div class="btn-group" role="group" aria-label="...">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create_modal">Crear</button>
		</div>
	</div>
	<?php
		require "php/class/database.php";
		$db = new Database();
		$db->connectDB();

		if (isset($_POST['Save'])){
			include("php/class/users.php");
			extract($_POST);
			$user = new Users();
			$user->Create($name, $last_name, $email, $password, $db);
		}
		if (isset($_POST['delete'])){
			include("php/class/users.php");
			extract($_POST);
			$user = new Users();
			$user->Delete($id, $db);
		}
	?>
	<?php 
		$sql = 'SELECT * FROM users ORDER BY name';
		echo "<div class='container-fluid'><table style='margin-top:3%;' class='table table-bordered'>";
		echo "<tr>
			<th>Name</th>
			<th>Last Name</th>
			<th>email</th>
			<th>Password</th>
			<th>Action</th>
		</tr>";
    	foreach ($db->select($sql) as $row) {
	        echo "
	        <form action='index.php' method='post'>
	        <tr>
	        	<td>". $row['name']."<input type='hidden' name='id' value='". $row["id"]. "'/></td>
	        	<td>". $row['last_name']."</td>
	        	<td>'". $row['email']."</td>
	        	<td>". $row['password']."</td>	
	        	<td><button type='submit' name='delete' class='btn btn-danger'>Borrar</button></td>
	        </tr></form>";
        }
        echo "</table></div>";
        $db->disconnectDB();
	?>
	<div class="modal fade" tabindex="-1" id="create_modal" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form action="index.php" method="post">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Crear Usuario</h4>
					</div>
					<div class="modal-body">
						<div class="container-fluid">
							<div class="form-group row">
								<label for="name" class="col-2 col-form-label">Name</label>
								<div class="col-10">
									<input class="form-control" type="text" name="name" required="required" placeholder="Name"/>
								</div>
							</div>
							<div class="form-group row">
								<label for="name" class="col-2 col-form-label">Last Name</label>
								<div class="col-10">
									<input class="form-control" type="text" name="last_name" required="required" placeholder="Lastname"/>
								</div>
							</div>
							<div class="form-group row">
								<label for="name" class="col-2 col-form-label">Email</label>
								<div class="col-10">
									<input class="form-control" type="email" name="email" required="required" placeholder="Email"/>
								</div>
							</div>
							<div class="form-group row">
								<label for="name" class="col-2 col-form-label">Password</label>
								<div class="col-10">
									<input class="form-control" type="password" name="password" required="required" placeholder="Password"/>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<input type="submit" name="Save" class="btn btn-primary"></input>
					</div>
				</form>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>