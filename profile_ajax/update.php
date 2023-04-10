<?php
include_once 'inc.database.php';

if (!isset($_GET['id'])) {
	die('Sorry, No user selected');
}

$id = $_GET['id'];
$sql = 'SELECT * FROM profiles WHERE id="'.$id.'"';
$result = $con->query($sql);
if ($result->num_rows > 0) {
	$row = $result->fetch_array();
	$hobbies = json_decode($row['hobbies'], true);
}
else 
	die('Sorry, Invalid User');

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="row">
            <h1>Update Profile</h1>
            <hr>
            <form action="" id="update_profile" method="POST" enctype="multipart/form-data">
								<input type="hidden" name="id" value="<?php echo $id ?> ">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" required name="name" class="form-control" id="name" placeholder="Your Name" value="<?php echo $row['name'] ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" required name="email" class="form-control" id="email" placeholder="name@example.com" value="<?php echo $row['email'] ?>">
                </div>
                <div class="mb-3">
                    <label for="age" class="form-label">Age</label>
                    <input type="number" name="age" required class="form-control" id="age" placeholder="Your age" value="<?php echo $row['age'] ?>">
                </div>
                <div class="mb-3">
                    <label for="height" class="form-label">Height (Feet)</label>
                    <input type="number" name="height" required step="any" class="form-control" id="height" placeholder="5.6" value="<?php echo $row['height'] ?>">
                </div>
                <div class="mb-3">
                    <label for="dob" class="form-label">Date of Birth</label>
                    <input type="date" name="dob" required class="form-control" id="dob" placeholder="Your dob" value="<?php echo $row['dob'] ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Gender</label> <br>
                    <input class="form-check-input" type="radio" name="gender" id="male" value="male" <?php echo ($row['gender']== 'male') ? 'checked' : NULL ?>>
                    <label class="form-check-label" for="male">
                        Male
                    </label>
                    <input class="form-check-input" type="radio" name="gender" id="female" value="female" <?php echo ($row['gender']== 'female') ? 'checked' : NULL ?>>
                    <label class="form-check-label" for="female">
                        Female
                    </label>
                </div>
                <div class="mb-3">
                    <label for="dob" class="form-label">Hobbies</label> <br>
                    <input class="form-check-input" type="checkbox" <?php echo in_array('Playing Cricket', $hobbies) ? 'checked' : NULL ?> name="hobbies[]" id="cricket" value="Playing Cricket">
                    <label class="form-check-label" for="cricket">
                        Playing Cricket
                    </label>
                    <input class="form-check-input" type="checkbox" <?php echo in_array('Playing Chess', $hobbies) ? 'checked' : NULL ?> name="hobbies[]" id="chess" value="Playing Chess">
                    <label class="form-check-label" for="chess">
                        Playing Chess
                    </label>
                    <input class="form-check-input" type="checkbox" <?php echo in_array('Music', $hobbies) ? 'checked' : NULL ?> name="hobbies[]" id="music" value="Music">
                    <label class="form-check-label" for="music">
                        Music
                    </label>

                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea name="address" id="address" class="form-control" cols="30" rows="4"><?php echo $row['address'] ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="age" class="form-label">City</label>
                    <select name="city" class="form-control" id="city">
                        <option selected disabled>Select</option>
                        <option <?php echo ($row['city']== 'chennai') ? 'selected' : NULL ?> value="chennai">Chennai</option>
                        <option <?php echo ($row['city']== 'hyderabad') ? 'selected' : NULL ?> value="hyderabad">Hyderabad</option>
                        <option <?php echo ($row['city']== 'delhi') ? 'selected' : NULL ?> value="delhi">Delhi</option>
                        <option <?php echo ($row['city']== 'mumbai') ? 'selected' : NULL ?> value="mumbai">Mumbai</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="photo" class="form-label">Your Photo</label>
                    <input type="file" name="photo" class="form-control" id="photo"> <br />
                    <img src="<?php echo $row['photo_path'] ?>" width="100">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
	<script>
		const form = document.querySelector('#update_profile');
		
		form.addEventListener('submit', (event) => {
			event.preventDefault();
			
			const formData = new FormData(form);
			
			fetch('api/update_profile.php', {
				method: 'POST',
				body: formData
			})
			.then(res => res.json())
			.then(data => console.log(data))
			.catch(error => console.log('Error', error));
		
		})
	</script>
</body>
</html>