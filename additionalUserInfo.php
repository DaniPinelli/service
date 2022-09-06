<?php

require './Connection.php';

$connection = new Connection('localhost', 'root', '', 'yeies');

$connection->conectToDB();

switch ($_SERVER['REQUEST_METHOD']) {
    case 'PUT': 
        $_PUT = json_decode(file_get_contents('php://input'), true);
        $userType = $_PUT['type'];
        $id = $_PUT['id'];
        $address1 = $_PUT['Address1'];
        $address2 = $_PUT['Address2'];
        $firstName = $_PUT['FirstName'];
        $lastName = $_PUT['LastName'];
        $Schools = $_PUT['Schools'];
        $Classes = $_PUT['Classes'];
        $phone = $_PUT['phone'];
        $id_number = $_PUT['id_number'];
        $documents = $_PUT['documents'];
        $profile_picture = $_PUT['profile_picture'];

       if ($userType == 'admin' || $userType == 'school') {
            if (!empty($id) && !empty($address1) && !empty($address2) && !empty($firstName) && !empty($lastName) && !empty($Schools) && !empty($Classes) && !empty($phone) && !empty($id_number) && !empty($documents) && !empty($profile_picture)) {

                $connectionQuery = mysqli_connect('localhost', 'root', '', 'yeies');
                $queryUpdate = 'UPDATE users SET Address1 = "' . $address1 . '", Address2 = "' . $address2 . '", FirstName = "' . $firstName . '", LastName = "' . $lastName . '", Schools = "' . $Schools . '", Classes = "' . $Classes . '", phone = "' . $phone . '", id_number = "' . $id_number . '", documents = "' . $documents . '", profile_picture = "' . $profile_picture . '" WHERE ID = "' . $id . '"';
                mysqli_query($connectionQuery, $queryUpdate);
                echo 'User updated successfully';
                
            }else {
                echo "All fields are required";
            }
        } else {
            echo "You have to be an administrator or school user to make changes";
        }
        break;
} 


