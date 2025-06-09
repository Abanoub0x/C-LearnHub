<?php
session_start();
include('check_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $courseTitle = trim($_POST['coursename']);
    $startDate = date('Y-m-d H:i:s');
    $endDate = date('Y-m-d H:i:s', strtotime($startDate . ' +1 month'));

    $_SESSION['email'] = $email;
    

   
    $query = "SELECT * FROM users WHERE userEmail = ?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        
        $username = $row['fname'] . " " . $row['sname'];  
        $_SESSION['username'] = $username;

        $realemail = $row['userEmail'];
        $realpass = $row['password'];
        
        if ($result->num_rows == 0) {
           
            $_SESSION['error_message'] = "Create account first before registering";
            $stmt->close(); 
            header('Location: course-details.php');
            exit();

        } else if($realemail !== $email || $realpass !== $password){

            $_SESSION['error_message'] = "Wrong username or password";
            $stmt->close(); 
            header('Location: course-details.php');
            exit();
        }

    }


    
    $check_query = "SELECT 1 FROM courses WHERE email = ?";
    if ($check_stmt = $conn->prepare($check_query)) {
        $check_stmt->bind_param('s', $email);
        $check_stmt->execute();
        $check_stmt->store_result();

        if ($check_stmt->num_rows > 0) {
            
            $_SESSION['error_message'] = "This user is already enrolled in a course";
            $check_stmt->close();
            header('Location: course-details.php');
            exit();
        }

        $check_stmt->close();
    }
   


    $stmt = $conn->prepare("INSERT INTO courses (coursename, username, email, password, startDate, endDate) 
            VALUES (?, ?, ?, ?, ?, ?)");

        $stmt->bind_param('ssssss', $courseTitle, $username, $email, $password, $startDate, $endDate);

        if ($stmt->execute()) {
            $_SESSION['success_message'] = "Registered Successfully!";
            $stmt->close();  
            header('Location: welcoming.php?e=' . $email . "&reset=true");
            exit();
        }
    

    $conn->close(); 
}
?>
