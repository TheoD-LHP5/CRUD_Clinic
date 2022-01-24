<?php

require_once '../controllers/controller-listAppointments.php';

?>

<!doctype html>
<html lang="fr">

<head>
	<title>CRUD | Appointments list</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../assets/css/style.css">
	<script src="https://kit.fontawesome.com/3437dc2c72.js" crossorigin="anonymous"></script>
</head>

<body>

	<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light justify-content-center">
		<div class="collapse navbar-collapse d-flex flex-column" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item active">
					<a class="nav-link" href="../index.php">home</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="view-addPatients.php">add patient</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="view-listPatients.php">patient list</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="view-addAppointments.php">add appointment</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="view-listAppointments.php">appointments list</a>
				</li>
			</ul>
		</div>
	</nav>

	<div class="container-fluid">

		<div class="row">
			<div class="col-12">
				<p class="d-flex justify-content-center font-weight-bold text-uppercase mt-4 titleWelcolme">appointments list</p>
			</div>
		</div>

		<div class="text-center mb-3">
			<span class="text-primary"><?= $messages['delete'] ?? '' ?></span>
		</div>

		<div class="row justify-content-center">

			<form action="view-detailsAppointment.php" class="col-6" method="GET">
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">Date</th>
							<th scope="col">Time</th>
							<th scope="col">Patient</th>
							<th scope="col"></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($allAppointmentsArray as $appointment) {?>
						<tr>
							<td><?= $appointment['date'] ?></td>
							<td><?= $appointment['hour'] ?></td>
							<td><?= $appointment['patient'] ?></td>
							<td><button type="submit" class="btn btn-info" name="idAppointment" value="<?= $appointment['id'] ?>">Show +</button></td>
							<td><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal<?= $appointment['id'] ?>"><i class="far fa-trash-alt"></i></button></td>
							<td></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</form>

		</div>

		<!-- Ternaire pour permettre d'afficher un message si jamais le tableau est vide -->
		<?= count($allAppointmentsArray) == 0 ? '<p class="h6 mt-3 text-center">There is no appointment registred<p>' : '' ?>

		<div class="mt-3 mb-3 d-flex justify-content-center">
			<a type="button" href="view-addAppointments.php" class="btn btnConnexion mr-1">add new appointment</a>
		</div>

		<footer class="fixed-bottom">
			<div class="row">
				<div class="col-12">
					<div class="d-flex justify-content-center pt-5 pb-4">
						<p class="textFoot"><i class="fas fa-question-circle logo"></i>Assistance</p>
						<p class="textFoot"><i class="fas fa-info-circle logo"></i>Terms and Conditions</p>
						<p class="textFoot"><i class="far fa-user-circle logo"></i>TheoWebDev</p>
					</div>
				</div>
			</div>
		</footer>

	</div>

	<?php foreach($allAppointmentsArray as $appointment) { ?>
	<div class="modal" id="deleteModal<?= $appointment['id'] ?>" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Are you sur to delete this appointment ?</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Date : <?= $appointment['date'] ?> at <?= $appointment['hour'] ?></p>
					<p>For the patient : <?= $appointment['patient'] ?></p>
				</div>
				<div class="modal-footer">
					<form action="" method="POST">
						<button type="submit" id="deleteBtnModal" name="deleteBtn" value="<?= $appointment['id'] ?>"
							class="btn btn-danger">DELETE</button>
					</form>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>