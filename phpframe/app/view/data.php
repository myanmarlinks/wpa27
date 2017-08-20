<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Data</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($students as $student) { ?>
						<tr>
							<td><?= $student['id'] ?></td>
							<td><?= $student['name'] ?></td>
							<td><?= $student['email'] ?></td>
						</tr>

						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>