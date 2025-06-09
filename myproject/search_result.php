<?php
session_start();
include('check_connection.php');


if (isset($_POST['search_id'])) {
    $search_id = $_POST['search_id'];

    
    $query = "SELECT * FROM users WHERE user_id = ?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param('i', $search_id); 
        $stmt->execute(); 
        $result = $stmt->get_result(); 

       
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['success_message'] = "User Found!"; 

        } else {
           $_SESSION['error_message'] = "No user found with this ID.";
           header('Location: main_page.php');
           exit();
        }
    } 

    if (isset($_SESSION['success_message'])) {
        echo "<div class='bg-green-500 text-white text-center p-4 rounded mb-6'>" . $_SESSION['success_message'] . "</div>";
        unset($_SESSION['success_message']);
    }
    
    if (isset($_SESSION['error_message'])) { 
        echo "<div class='bg-red-500 text-white text-center p-4 rounded mb-6'>" . $_SESSION['error_message'] . "</div>";
        unset($_SESSION['error_message']);
    }
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Result</title>
    <link rel="stylesheet" href="styles.css">
</head>

<style>
    .bg-green-500 {
        background-color: #48bb78; /* A shade of green */
        color: #ffffff; /* White text for better contrast */
        text-align: center; /* Center align text */
        padding: 1rem; /* Add some padding */
        border-radius: 0.5rem; /* Rounded corners */
        margin-bottom: 1.5rem; /* Add space below */
    }

    .bg-red-500 {
        background-color: #f56565; /* A shade of red */
        color: #ffffff; /* White text for better contrast */
        text-align: center; /* Center align text */
        padding: 1rem; /* Add some padding */
        border-radius: 0.5rem; /* Rounded corners */
        margin-bottom: 1.5rem; /* Add space below */
    }
</style>

<body>
    <div class="container mx-auto">
        <h1 class="text-4xl font-extrabold text-center mb-8">Search Results</h1>

        <?php if (isset($row)) { ?>
            <table class="table mx-auto">
                <tr><th>User ID</th><td><?php echo $row['user_id']; ?></td></tr>
                <tr><th>First Name</th><td><?php echo $row['fname']; ?></td></tr>
                <tr><th>Second Name</th><td><?php echo $row['sname']; ?></td></tr>
                <tr><th>Last Name</th><td><?php echo $row['lname']; ?></td></tr>
                <tr><th>Email</th><td><?php echo $row['userEmail']; ?></td></tr>
                <tr><th>Instructor</th><td><?php echo $row['instructor'] ? 'Yes' : 'No'; ?></td></tr>
                <tr><th>Student</th><td><?php echo $row['student'] ? 'Yes' : 'No'; ?></td></tr>
                <tr><th>Admin</th><td><?php echo $row['admins'] ? 'Yes' : 'No'; ?></td></tr>
                <tr><th>Created At</th><td><?php echo $row['createdAt']; ?></td></tr>
                <tr><th>Updated At</th><td><?php echo $row['updatedAt']; ?></td></tr>
            </table>
        <?php } ?>
    </div>
</body>
</html>
