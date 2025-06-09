<?php
session_start();
include('check_connection.php');


if (isset($_POST['email'])) {
    $email = $_POST['email'];


    $query = "SELECT * FROM courses WHERE email = ?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param('s', $email); 
        $stmt->execute();
        $result = $stmt->get_result();

        $_SESSION['email'] = $email;
        $stmt->close();
       
        if ($result->num_rows > 0) {
            header('Location: password-reset-form.php'); 
            exit(); 
        } else {
           
            $_SESSION['error_message'] = "Error: There is no such email in our system";
            header('Location: forget_pass_form.php'); 
            exit(); 
        }

       
    } 
}
?>
