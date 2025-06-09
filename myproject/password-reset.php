<?php
session_start();
include('check_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $new_password = $_POST['new-password'];  
    $confirm_new_password = $_POST['confirm-new-password'];  

    
    if ($new_password !== $confirm_new_password) {
        $_SESSION['error_message'] = "The two passwords does not match.";
        header('Location: password-reset-form.php');
        exit();
    }

   
    $query = "UPDATE courses SET password = ? WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ss', $new_password, $_SESSION['email']);
        $stmt->execute();
        $stmt->close();
    

    $query = "UPDATE users SET password = ? WHERE userEmail = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ss', $new_password, $_SESSION['email']);
        $stmt->execute();
        $stmt->close();  
    
        $_SESSION['success_message'] = "Password changed successfully!";
        header('Location: course-details.php');
        exit();

        }
?>
