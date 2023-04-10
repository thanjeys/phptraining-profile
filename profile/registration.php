<?php

include 'inc.database.php';

if ($_POST) {

    // Validate Profile Information
    
    // print_r($_POST);
    // exit;

    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $height = $_POST['height'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $hobbies = $_POST['hobbies'];
    $hobbiesJson = json_encode($hobbies);
    $hobbiesEscaped = mysqli_real_escape_string($con, $hobbiesJson);

    if ($_FILES['photo']['size'] > 0)
    {
        $file_name = $_FILES['photo']['name'];
        $folder = 'uploads/';

        if (file_exists($folder.$file_name))
        {
            $file_name = getFileName($folder, $file_name);
        }

        $file_full_path = $folder. $file_name;
        if(!move_uploaded_file($_FILES['photo']['tmp_name'], $file_full_path))
        {
            echo 'Failed to Move File';
        } else 
            echo 'Uploaded Success';
    }

   
    $sql = 'INSERT INTO profiles(name, email, age, height, dob, gender, hobbies, address, city, photo_path) VALUES("'.$name.'", "'.$email.'", "'.$age.'", "'.$height.'", "'.$dob.'", "'.$gender.'", "'.$hobbiesEscaped.'", "'.$address.'", "'.$city.'", "'.$file_full_path.'")';

    $result = $con->query($sql);
    if ($result)
        echo 'Successfully registered';
    else
        echo 'Failed to register'. $con->error;

}



?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="row">
            <h1>New Profile</h1>
            <hr>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" required name="name" class="form-control" id="name" placeholder="Your Name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" required name="email" class="form-control" id="email" placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label for="age" class="form-label">Age</label>
                    <input type="number" name="age" required class="form-control" id="age" placeholder="Your age">
                </div>
                <div class="mb-3">
                    <label for="height" class="form-label">Height (Feets)</label>
                    <input type="number" name="height" required step="any" class="form-control" id="height" placeholder="5.6">
                </div>
                <div class="mb-3">
                    <label for="dob" class="form-label">Date of Birth</label>
                    <input type="date" name="dob" required class="form-control" id="dob" placeholder="Your dob">
                </div>
                <div class="mb-3">
                    <label class="form-label">Gender</label> <br>
                    <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                    <label class="form-check-label" for="male">
                        Male
                    </label>
                    <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                    <label class="form-check-label" for="female">
                        Female
                    </label>
                </div>
                <div class="mb-3">
                    <label for="dob" class="form-label">Hobbies</label> <br>
                    <input class="form-check-input" type="checkbox" name="hobbies[]" id="cricket" value="Playing Cricket">
                    <label class="form-check-label" for="cricket">
                        Playing Cricket
                    </label>
                    <input class="form-check-input" type="checkbox" name="hobbies[]" id="chess" value="Playing Chess">
                    <label class="form-check-label" for="chess">
                        Playing Chess
                    </label>
                    <input class="form-check-input" type="checkbox" name="hobbies[]" id="music" value="Music">
                    <label class="form-check-label" for="music">
                        Music
                    </label>

                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea name="address" id="address" class="form-control" cols="30" rows="4"></textarea>
                </div>
                <div class="mb-3">
                    <label for="age" class="form-label">City</label>
                    <select name="city" class="form-control" id="city">
                        <option selected disabled>Select</option>
                        <option value="chennai">Chennai</option>
                        <option value="hyderabad">Hyderabad</option>
                        <option value="delhi">Delhi</option>
                        <option value="mumbai">Mumbai</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="photo" class="form-label">Your Photo</label>
                    <input type="file" name="photo" required class="form-control" id="photo">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>