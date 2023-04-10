<?php

include '../inc.database.php';
$jsonResponse = [];
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
        $upload_dir = '../uploads/';

        if (file_exists($upload_dir.$file_name))
        {
            $file_name = getFileName($upload_dir, $file_name);
        }

        $file_full_path = $upload_dir. $file_name;
        if(!move_uploaded_file($_FILES['photo']['tmp_name'], $file_full_path))
        {
            // echo 'Failed to Move File';
        } else 
        {
        
            //  echo 'Uploaded Success';
        }
    }
	
   
    $sql = 'INSERT INTO profiles(name, email, age, height, dob, gender, hobbies, address, city, photo_path) VALUES("'.$name.'", "'.$email.'", "'.$age.'", "'.$height.'", "'.$dob.'", "'.$gender.'", "'.$hobbiesEscaped.'", "'.$address.'", "'.$city.'", "'.$file_full_path.'")';

    $result = $con->query($sql);
    if ($result)
    {
			$jsonResponse = [
				'message' => 'Successfully registered',
				'status' => 'success',
				'code' => '200'
			];
    }
    else
	    $jsonResponse = [
				'message' => 'Failed to register'. $con->error,
				'status' => 'failed',
				'code' => '401'
			];
}


echo json_encode($jsonResponse);



?>