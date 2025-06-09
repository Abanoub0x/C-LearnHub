<?php
session_start();  
include 'check_connection.php';

if (isset($_GET['id'])) {
    $userID = $_GET['id'];

    
    $query = "SELECT userEmail FROM users WHERE user_id = ?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param('i', $userID);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($userEmail);

        
        if ($stmt->num_rows > 0) {
            $stmt->fetch();

            
            $queryDeleteCourses = "DELETE FROM courses WHERE email = ?";
            if ($stmtDeleteCourses = $conn->prepare($queryDeleteCourses)) {
                $stmtDeleteCourses->bind_param('s', $userEmail);
                $stmtDeleteCourses->execute();
                $stmtDeleteCourses->close();
                     

                    $queryDeleteUser = "DELETE FROM users WHERE user_id = ?";
                    if ($stmtDeleteUser = $conn->prepare($queryDeleteUser)) {
                        $stmtDeleteUser->bind_param('i', $userID);

                        if ($stmtDeleteUser->execute()) {
                            $_SESSION['success_message'] = "User deleted successfully!";
                        } else {
                            $_SESSION['error_message'] = "Error: Unable to delete user!";
                        }
                        $stmtDeleteUser->close();
                    
                }
            }
        }

        $stmt->close();
    }

    // Redirect after deletion
    header('Location: main_page.php');
    exit();
} 

?>
