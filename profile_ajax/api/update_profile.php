<?php

include '../inc.database.php';

if ($_POST) {

    // Validate Profile Information
    
    // print_r($_POST);
    // exit;

    $id = $_POST['id'];
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
		
		$update_file_path_sql = "";
    if ($_FILES['photo']['size'] > 0)
    {
        $file_name = $_FILES['photo']['name'];
        $folder = '../uploads/';

        if (file_exists($folder.$file_name))
        {
            $file_name = getFileName($folder, $file_name);
        }

        $file_full_path = $folder. $file_name;
        if(!move_uploaded_file($_FILES['photo']['tmp_name'], $file_full_path))
        {
            // echo 'Failed to Move File';
        } else 
        {
					// echo 'Uploaded Success';
					$update_file_path_sql  = ', photo_path = "'.$file_full_path.'"';
        }
    }
   
    $sql = 'UPDATE profiles SET name = "'.$name.'", email = "'.$email.'", age = "'.$age.'", height = "'.$height.'", dob = "'.$dob.'", gender =  "'.$gender.'", hobbies = "'.$hobbiesEscaped.'", address = "'.$address.'", city = "'.$city.'" '.$update_file_path_sql.' WHERE id="'.$id.'"';

    $result = $con->query($sql);
    if ($result) {
			$jsonResponse = [
				'message' => 'Successfully updated',
				'status' => 'success',
				'code' => '200'
			];
    }
    else {
			$jsonResponse = [
				'message' => 'Failed to update'. $con->error,
				'status' => 'failed',
				'code' => '401'
			];
    }
}

echo json_encode($jsonResponse);
