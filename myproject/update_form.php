<?php
session_start();
include 'check_connection.php';

// Check if the user ID is provided in the URL
if (isset($_GET['id'])) {
    $userID = $_GET['id'];

    // Fetch the user data from the database to pre-fill the form
    $query = "SELECT * FROM users WHERE user_id = ?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param('i', $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container mx-auto">
        <h1 class="text-4xl font-extrabold text-center mb-8">Update User</h1>

        <!-- Update Form -->
        <form action="update_user.php" method="POST">
            <div class="form-section mb-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <input type="hidden" name="userID" value="<?php echo $user['user_id']; ?>">
                    <div>
                        <label for="TextBoxFName">First Name:</label>
                        <input type="text" name="TextBoxFName" value="<?php echo $user['fname']; ?>" required>
                    </div>
                    <div>
                        <label for="TextBoxSName">Second Name:</label>
                        <input type="text" name="TextBoxSName" value="<?php echo $user['sname']; ?>" required>
                    </div>
                    <div>
                        <label for="TextBoxLName">Last Name:</label>
                        <input type="text" name="TextBoxLName" value="<?php echo $user['lname']; ?>" required>
                    </div>
                    <div>
                        <label for="TextBoxEmail">Email:</label>
                        <input type="email" name="TextBoxEmail" value="<?php echo $user['userEmail']; ?>" required>
                    </div>
                    <div>
                        <label for="TextBoxPassword">Password:</label>
                        <input type="text" name="TextBoxPassword"  value="<?php echo "" ?>" required>
                    </div>
                    <div>
                        <label for="DropDownInstructor">Instructor:</label>
                        <select name="DropDownInstructor" required>
                            <option value="1" <?php if ($user['instructor'] == 1) echo 'selected'; ?>>Yes</option>
                            <option value="0" <?php if ($user['instructor'] == 0) echo 'selected'; ?>>No</option>
                        </select>
                    </div>
                    <div>
                        <label for="DropDownStudent">Student:</label>
                        <select name="DropDownStudent" required>
                            <option value="1" <?php if ($user['student'] == 1) echo 'selected'; ?>>Yes</option>
                            <option value="0" <?php if ($user['student'] == 0) echo 'selected'; ?>>No</option>
                        </select>
                    </div>
                    <div>
                        <label for="DropDownAdmin">Admin:</label>
                        <select name="DropDownAdmin" required>
                            <option value="1" <?php if ($user['admins'] == 1) echo 'selected'; ?>>Yes</option>
                            <option value="0" <?php if ($user['admins'] == 0) echo 'selected'; ?>>No</option>
                        </select>
                    </div>
                    <div>
                        <label for="TextBoxCreatedAt">Created At:</label>
                        <input type="text" name="TextBoxCreatedAt" value="<?php echo $user['createdAt']; ?>" disabled>
                    </div>
                    <div>
                        <label for="TextBoxUpdatedAt">Updated At:</label>
                        <input type="text" name="TextBoxUpdatedAt" value="<?php echo $user['updatedAt']; ?>" disabled>
                    </div>
                </div>
                <div class="flex justify-center space-x-4 mt-6">
                    <button type="submit">Update User</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
