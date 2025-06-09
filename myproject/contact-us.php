<?php
session_start();
include 'check_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Call the stored procedure
    $stmt = $conn->prepare("CALL CheckAndInsertFeedback(?, ?, ?, @feedback_status)");
    $stmt->bind_param("sss", $name, $email, $message);
    $stmt->execute();
    $stmt->close();

    // Retrieve the feedback status from the OUT parameter
    $result = $conn->query("SELECT @feedback_status AS feedback_status");
    $row = $result->fetch_assoc();
    $feedback_status = $row['feedback_status'];

    if ($feedback_status === 'exists') {
        $_SESSION['error_message'] = "Feedback can only be sent once.";
    } elseif ($feedback_status === 'inserted') {
        $_SESSION['success_message'] = "Feedback sent successfully!";
    } else {
        $_SESSION['error_message'] = "Error: Unable to send feedback!";
    }

    // Redirect to home page after setting session messages
    header('Location: home.php');
    exit();
}
?>
