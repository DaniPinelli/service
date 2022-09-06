<?php

require './Connection.php';

$connection = new Connection('localhost', 'root', '', 'yeies');

$connection->conectToDB();

switch ($_SERVER['REQUEST_METHOD']) {
    case 'PUT': 
        $_PUT = json_decode(file_get_contents('php://input'), true);
        $userType = $_PUT['type'];
        $id = $_PUT['id'];
        $name = $_PUT['name'];
        $address1 = $_PUT['Address1'];
        $address2 = $_PUT['Address2'];
        $phone = $_PUT['phone'];
        $tax_id = $_PUT['tax_id'];
        $users = $_PUT['users'];
        $classes = $_PUT['classes'];
        $email = $_PUT['email'];
        $password = $_PUT['password'];
        $logo = $_PUT['logo'];
        $theme = $_PUT['theme'];

        if ($userType == 'admin' || $userType == 'school') {
            if (!empty($id) && !empty($name) || !empty($address1) || !empty($address2) || !empty($phone) || !empty($tax_id) || !empty($users) || !empty($classes) || !empty($email) || !empty($password) || !empty($logo) || !empty($theme)) {

                $connectionQuery = mysqli_connect('localhost', 'root', '', 'yeies');
                $queryUpdate = 'UPDATE schools SET name = "' . $name . '", Address1 = "' . $address1 . '", Address2 = "' . $address2 . '", phone = "' . $phone . '", tax_id = "' . $tax_id . '", users = "' . $users . '", classes = "' . $classes . '", email = "' . $email . '", password = "' . $password . '", logo = "' . $logo . '", theme = "' . $theme . '" WHERE ID = "' . $id . '"';
                mysqli_query($connectionQuery, $queryUpdate);
                echo 'User updated successfully';
                
            }else {
                echo "You need to send and id and one field at least";
            }
        } else {
            echo "You have to be an administrator or school user to make changes";
        }
        break;
} 