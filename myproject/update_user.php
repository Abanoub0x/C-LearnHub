<?php
session_start();
include('check_connection.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $ID = $_POST['userID'];
    $firstName = $_POST['TextBoxFName'];
    $secondName = $_POST['TextBoxSName'];
    $lastName = $_POST['TextBoxLName'];
    $email = $_POST['TextBoxEmail'];

    
    $isInstructor = ($_POST['DropDownInstructor'] === 'Yes') ? 1 : 0;
    $isStudent = ($_POST['DropDownStudent'] === 'Yes') ? 1 : 0;
    $isAdmin = ($_POST['DropDownAdmin'] === 'Yes') ? 1 : 0;

    $password = $_POST['TextBoxPassword'];

    
    $query = "UPDATE users SET fname = ?, sname = ?, lname = ?, userEmail = ?, password = ?, instructor = ?, student = ?, admins = ?, updatedAt = NOW() WHERE user_id = ?";
    
    
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sssssiisi', $firstName, $secondName, $lastName, $email, $password, $isInstructor, $isStudent, $isAdmin, $ID);

    
    if ($stmt->execute()) {
        
        $query = "SELECT userEmail FROM users WHERE user_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $ID);
        
        $stmt->execute();
        $stmt->bind_result($fetchedEmail); 
        $stmt->fetch();
        $stmt->close();

        

            $username = $firstName . " " . $secondName;
            $query = "UPDATE courses SET username = ?, email = ?, password = ?, enddate = NOW() WHERE email = ?";

            $stmt = $conn->prepare($query);
            $stmt->bind_param('ssss', $username, $email, $password, $fetchedEmail);  // Use fetched email



            if ($stmt->execute()) {
                $_SESSION['success_message'] = "User updated successfully!";
            } else {
                $_SESSION['error_message'] = "Error: Unable to update user in courses! " . $stmt->error;
            }
            $stmt->close();
        } 
} 

    
    header('Location: main_page.php');
    exit();

?>
