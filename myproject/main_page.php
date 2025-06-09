<?php
session_start();
include('check_connection.php');

    if (isset($_SESSION['success_message'])) {
        echo "<div class='bg-green-500 text-white text-center p-4 rounded mb-6'>" . $_SESSION['success_message'] . "</div>";
        unset($_SESSION['success_message']);
    }
    
    if (isset($_SESSION['error_message'])) { 
        echo "<div class='bg-red-500 text-white text-center p-4 rounded mb-6'>" . $_SESSION['error_message'] . "</div>";
        unset($_SESSION['error_message']);
    }

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C-Learn Hub</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="container mx-auto">
        <h1 class="text-4xl font-extrabold text-center text-[var(--accent)] mb-8">Create new account</h1>
        <!-- User Input Form -->
        <form action="enter_data.php" method="POST">
            <div class="form-section mb-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="TextBoxFName">First Name:</label>
                        <input type="text" name="TextBoxFName" id="TextBoxFName" required>
                    </div>
                    <div>
                        <label for="TextBoxSName">Second Name:</label>
                        <input type="text" name="TextBoxSName" id="TextBoxSName" required>
                    </div>
                    <div>
                        <label for="TextBoxLName">Last Name:</label>
                        <input type="text" name="TextBoxLName" id="TextBoxLName" required>
                    </div>
                    <div>
                        <label for="TextBoxEmail">Email:</label>
                        <input type="email" name="TextBoxEmail" id="TextBoxEmail" required>
                    </div>
                    <div>
                        <label for="TextBoxPassword">Password:</label>
                        <input type="password" name="TextBoxPassword" id="TextBoxPassword" required>
                    </div>
                    <div>
                        <label for="DropDownInstructor">Are you an instructor?</label>
                        <select name="DropDownInstructor" id="DropDownInstructor">
                            <option value="true">Yes</option>
                            <option value="false">No</option>
                        </select>
                    </div>
                    <div>
                        <label for="DropDownStudent">Are you a student?</label>
                        <select name="DropDownStudent" id="DropDownStudent">
                            <option value="true">Yes</option>
                            <option value="false">No</option>
                        </select>
                    </div>
                    <div>
                        <label for="DropDownAdmin">Are you an admin?</label>
                        <select name="DropDownAdmin" id="DropDownAdmin">
                            <option value="true">Yes</option>
                            <option value="false">No</option>
                        </select>
                    </div>
                  
                </div>

                <div class="flex justify-center space-x-4 mt-6">
    <button type="submit" style="
        background-color: #fabf46; /* Yellow background, same as First Name field */
        color: #1b1b1b; /* Dark text color for contrast */
        border-radius: 2rem; /* Rounded corners */
        padding: 0.6rem 2rem; /* Padding for a larger clickable area */
        cursor: pointer; /* Pointer cursor on hover */
        transition: background-color 0.3s, transform 0.2s; /* Smooth transitions for hover and transform */
        font-weight: bold; /* Bold text for better visibility */
        text-transform: uppercase; /* Uppercase text for a strong impact */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Subtle shadow to make it stand out */
    " onmouseover="this.style.backgroundColor='#f6dfa6'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 12px rgba(0, 0, 0, 0.3)';" onmouseout="this.style.backgroundColor='#fabf46'; this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 8px rgba(0, 0, 0, 0.2)';">Add User</button>
</div>



            </div>
        </form>

        <form action="search_result.php" method="POST" class="flex justify-center space-x-4 mt-6">
            <div class="flex items-center">
                 <input type="number" name="search_id" id="search_id" placeholder="Enter User ID" required class="border px-4 py-2 rounded-md">
                 <button type="submit" class="text-white px-4 py-2 rounded-md">Search</button>
             </div>
        </form>


        <!-- User Table -->
        <div class="overflow-x-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>First Name</th>
                        <th>Second Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Instructor</th>
                        <th>Student</th>
                        <th>Admin</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Actions</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                    <td>{$row['user_id']}</td>
                                    <td>{$row['fname']}</td>
                                    <td>{$row['sname']}</td>
                                    <td>{$row['lname']}</td>
                                    <td>{$row['userEmail']}</td>
                                    <td>" . ($row['instructor'] ? 'Yes' : 'No') . "</td>
                                    <td>" . ($row['student'] ? 'Yes' : 'No') . "</td>
                                    <td>" . ($row['admins'] ? 'Yes' : 'No') . "</td>
                                    <td>{$row['createdAt']}</td>
                                    <td>{$row['updatedAt']}</td>

                                     
                                    <td>    
                                    <a href='update_form.php?id=" . $row['user_id'] . "' class='btn btn-primary'>Update</a>
                                    <a href='delete.php?id=" . $row['user_id'] . "' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this user?\");'>Delete</a>
                                    </td>
                                     
                                  </tr>";
                                  
                        }
                    
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="text-center mt-12">
            <h2 class="text-3xl font-bold text-[var(--accent)]">Our Team</h2>
            <p class="text-lg text-[var(--text-muted)]">Meet the dedicated team behind C-Learn Hub.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-8">
           <div class="card text-center bg-[var(--secondary-background)] p-6 rounded-3xl shadow-lg transform hover:scale-105 transition duration-300">
                <img alt="Portrait of Basmala Azab Mohamed Selima" class="mb-4 rounded-full mx-auto" height="100" src="https://i.ibb.co/3NzpFkn/basmala.jpg" width="100"/>
                <h3 class="text-2xl font-bold mb-2 text-[var(--accent)]">Basmala Azab Mohamed Selima</h3>
                <p class="text-[var(--text-muted)]">ID: 2301073</p>
            </div>        

           <div class="card text-center bg-[var(--secondary-background)] p-6 rounded-3xl shadow-lg transform hover:scale-105 transition duration-300">
                <img alt="Portrait of Abanoub Amir George Zaki" class="mb-4 rounded-full mx-auto" height="100" src="https://i.ibb.co/kyVYnPh/abanoub.jpg" width="100"/>
                <h3 class="text-2xl font-bold mb-2 text-[var(--accent)]">Abanoub Amir George Zaki</h3>
                <p class="text-[var(--text-muted)]">ID: 2301001</p>
            </div>        

            <div class="card text-center bg-[var(--secondary-background)] p-6 rounded-3xl shadow-lg transform hover:scale-105 transition duration-300">
                <img alt="Portrait of Yousef Amr Abdelazeem Elbish" class="mb-4 rounded-full mx-auto" height="100" src="https://i.ibb.co/BVWsx9Z/yousef.jpg" width="100">
                <h3 class="text-2xl font-bold mb-2 text-[var(--accent)]">Yousef Amr Abdelazeem Elbish</h3>
                <p class="text-[var(--text-muted)]">ID: 2301295</p>
                </div>
        </div>

        <!-- Contact Us Section -->
        <div class="text-center mt-12">
            <h2 class="text-3xl font-bold text-[var(--accent)]">Contact Us</h2>
            <p class="text-lg text-[var(--text-muted)]">Feel free to reach out to us anytime.</p>
            <div class="mt-4">
            <p class="text-lg text-[var(--text-muted)]">Basmala: <a class="text-[var(--accent)]" href="mailto:2301073basmala@rst.edu.eg">2301073basmala@rst.edu.eg</a></p>
            <p class="text-lg text-[var(--text-muted)]">Abanoub: <a class="text-[var(--accent)]" href="mailto:2301001abanoub@rst.edu.eg">2301001abanoub@rst.edu.eg</a></p>
            <p class="text-lg text-[var(--text-muted)]">Yousef: <a class="text-[var(--accent)]" href="mailto:2301295yousef@rst.edu.eg">2301295yousef@rst.edu.eg</a></p> 
            </div>
        </div>
    </div>
</body>
</html>