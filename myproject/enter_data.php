<?php
session_start();
include 'check_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $first_name = $_POST['TextBoxFName'];
    $second_name = $_POST['TextBoxSName'];
    $last_name = $_POST['TextBoxLName'];
    $email = $_POST['TextBoxEmail'];
    $is_instructor = $_POST['DropDownInstructor'] === '1' ? 1 : 0;
    $is_student = $_POST['DropDownStudent'] === '1' ? 1 : 0;
    $is_admin = $_POST['DropDownAdmin'] === '1' ? 1 : 0;
    $password = $_POST['TextBoxPassword'];
    

    $created_at = date('Y-m-d H:i:s');
    $updated_at = date('Y-m-d H:i:s', strtotime($created_at . ' +1 month'));

    

    $check_query = "SELECT 1 FROM users WHERE userEmail = ?";
    if ($check_stmt = $conn->prepare($check_query)) {
        $check_stmt->bind_param('s', $email);
        $check_stmt->execute();
        $check_stmt->store_result();

        if ($check_stmt->num_rows > 0) {
            
            $_SESSION['error_message'] = "Error: Email already exists!";
            $check_stmt->close();
            header('Location: main_page.php');
            exit();
        }

        $check_stmt->close();
    }


    $query = "INSERT INTO users (fname, sname, lname, userEmail, password, instructor, student, admins, createdAt, updatedAt) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"; // To prevent SQL injection

    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param('sssssiiiss', $first_name, $second_name, $last_name, $email ,$password, $is_instructor, $is_student, $is_admin, $created_at, $updated_at);

        if ($stmt->execute()) {
            $_SESSION['success_message'] = "User added successfully!";
        } else {
            $_SESSION['error_message'] = "Error: Unable to add user!";
        }

        $stmt->close();
    }

    header('Location: main_page.php');
    exit();
}
?>
