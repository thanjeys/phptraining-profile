<?php
include_once 'inc.database.php';

if (isset($_GET['id']))
{
	$id = $_GET['id'];
	$sql = 'DELETE FROM profiles WHERE id="'.$id.'"';
	$con->query($sql);
}

$sql = 'SELECT * FROM profiles';
$result = $con->query($sql);

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Profiles</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

	<div class="container">


		<h1>Profiles</h1>
		<hr>
		<table class="table">
			<tr>
				<th>S.No</th>
				<th>Name</th>
				<th>Age</th>
				<th>Gender</th>
				<th>City</th>
				<th>Address</th>
				<th>Hobbies</th>
				<th>Picture</th>
				<th>Action</th>
			</tr>

			<?php
			$i = 1;
			if ($result->num_rows > 0)
				while ($row = $result->fetch_assoc()) {
			?>
				<tr>
					<td><?php echo $i++ ?></td>
					<td><?php echo $row['name'] ?></td>
					<td><?php echo $row['age'] ?></td>
					<td><?php echo $row['gender'] ?></td>
					<td><?php echo $row['city'] ?></td>
					<td><?php echo $row['address'] ?></td>
					<td><?php echo $row['hobbies'] ?></td>
					<td><?php echo !empty($row['photo_path']) ? "<img width='100' src='$row[photo_path]'>" : 'No Image' ; ?></td>
					<td>
						<a href="update.php?id=<?php echo $row['id'] ?>">Edit</a>
						<a onclick="return confirm('Are you sure to delete <?php echo $row['name'] ?>\'s profile?')" href="list.php?id=<?php echo $row['id'] ?>">Delete</a>
					</td>
				</tr>
			<?php
				}
			?>
		</table>
	</div>
</body>

</html>