<!doctype html>
<html lang="fr">

<head>
	<title>CRUD Health</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/style.css">
</head>

<body>


	<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light justify-content-center">
		<div class="collapse navbar-collapse d-flex flex-column" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item active">
					<a class="nav-link" href="index.php">home</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="views/view-listPatients.php">patient list</a>
				</li>
			</ul>
		</div>
	</nav>

	<div class="container-fluid">

		<div class="row">
			<div class="col-12">
				<p class="d-flex justify-content-center font-weight-bold text-uppercase mt-4 titleWelcolme">crud health
				</p>
			</div>
		</div>

		<div class="col-12">
			<div class="row">
				<div class="col-sm-3 p-3 d-flex justify-content-center">
					<div class="card" style="width: 18rem;">
						<img class="card-img-top" src="assets/img/addnewpatient1.jpg" alt="Card image cap">
						<div class="card-body">
							<h5 class="card-title text-uppercase">new patient</h5>
							<p class="card-text"></p>
							<a href="views/view-addPatients.php" class="btn btn-primary text-uppercase">add</a>
						</div>
					</div>
				</div>
				<div class="col-sm-3 p-3 d-flex justify-content-center">
					<div class="card" style="width: 18rem;">
						<img class="card-img-top" src="assets/img/listpatients.png" alt="Card image cap">
						<div class="card-body">
							<h5 class="card-title text-uppercase">current patient list</h5>
							<p class="card-text"></p>
							<a href="views/view-listPatients.php" class="btn btn-primary text-uppercase">show</a>
						</div>
					</div>
				</div>
				<div class="col-sm-3 p-3 d-flex justify-content-center">
					<div class="card" style="width: 18rem;">
						<img class="card-img-top" src="assets/img/addnewrdv1.jpg" alt="Card image cap">
						<div class="card-body">
							<h5 class="card-title text-uppercase">new appointment</h5>
							<p class="card-text"></p>
							<a href="views/view-addAppointments.php" class="btn btn-primary text-uppercase">add</a>
						</div>
					</div>
				</div>
				<div class="col-sm-3 p-3 d-flex justify-content-center">
					<div class="card" style="width: 18rem;">
						<img class="card-img-top" src="assets/img/listrdv.png" alt="Card image cap">
						<div class="card-body">
							<h5 class="card-title text-uppercase">appointments list</h5>
							<p class="card-text"></p>
							<a href="views/view-listAppointments.php" class="btn btn-primary text-uppercase">show</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<footer class="fixed-bottom mt-5">
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

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/3437dc2c72.js" crossorigin="anonymous"></script>
</body>

</html>