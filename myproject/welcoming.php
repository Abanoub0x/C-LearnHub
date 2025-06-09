<?php
session_start();
include('check_connection.php');


    $email = $_GET['e'];
   
    
    $query = "SELECT * FROM courses WHERE email = ?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param('s', $email); 
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        }
    }

    
    $course = $row['coursename'];
    $courseDescription = '';

    switch($course) {
        case 'Introduction to Machine Learning':
            $courseDescription = "<p><strong>Machine Learning:</strong> Machine learning teaches computers to learn from data and make predictions or decisions. This course covers algorithms like regression, classification, clustering, and neural networks. You’ll explore tools like Python, TensorFlow, and Scikit-learn to build predictive models.</p>
            <p>Real-world applications include image recognition, speech processing, and recommendation systems. This course also covers model evaluation, data preprocessing, and feature engineering techniques.</p>
            <p>Gain hands-on experience in training, testing, and deploying machine learning models to solve practical problems. You'll also learn how to improve model performance and handle large datasets efficiently.</p>
            <p>Machine learning is a rapidly growing field with a wide range of applications, and this course will give you the skills to work with real-world data and machine learning challenges.</p>
            <p>Join us and start your journey into the world of machine learning!</p>";
            break;
    
        case 'Cybersecurity Basics':
            $courseDescription = "<p><strong>Cybersecurity:</strong> Cybersecurity is the practice of protecting systems, networks, and data from digital attacks, theft, and damage. This course introduces you to fundamental security principles like encryption, authentication, and access control.</p>
            <p>You will learn how to safeguard your personal and professional data from cyber threats, such as hackers and malware. Topics also cover firewalls, antivirus software, and ethical hacking techniques to protect against security breaches.</p>
            <p>Gain hands-on experience by exploring security best practices and understanding real-world attack methods. You'll also learn how to respond effectively to security incidents and develop strategies for securing online platforms.</p>
            <p>With an increasing number of cyber attacks targeting individuals and businesses, cybersecurity has become more critical than ever. By the end of this course, you'll have the knowledge and skills to defend against common cyber threats.</p>
            <p>Join us and take the first step towards becoming a cybersecurity professional!</p>";
            break;
    
        case 'Web Development 101':
            $courseDescription = "<p><strong>Web Development:</strong> Web development involves creating and maintaining websites, ensuring they are functional, accessible, and user-friendly. In this course, you'll learn HTML, CSS, and JavaScript to build responsive web applications. Explore front-end and back-end frameworks, databases, and server management.</p>
            <p>Youll also dive into best practices in web security and performance optimization. By the end, you'll be able to develop dynamic websites and web apps that meet modern web standards and user needs.</p>
            <p>This course will also introduce you to frameworks like React and Node.js, empowering you to build scalable and efficient applications. Real-world project work will help you apply your skills and prepare you for professional web development roles.</p>
            <p>As the digital landscape continues to evolve, web development skills are in high demand. With the knowledge from this course, you’ll be equipped to create and manage high-quality web applications.</p>
            <p>Join us today and take the first step towards becoming a skilled web developer!</p>";
            break;
    
        case 'Cloud Computing Essentials':
            $courseDescription = "<p><strong>Cloud Computing:</strong> Cloud computing allows businesses to access computing resources over the internet, offering flexibility, scalability, and cost efficiency. This course introduces cloud service models, including IaaS, PaaS, and SaaS, using platforms like AWS, Azure, and Google Cloud.</p>
            <p>Youll learn how to deploy, manage, and scale applications in the cloud. This course also covers cloud security and best practices to ensure your applications are secure and cost-effective.</p>
            <p>Gain hands-on experience with leading cloud providers and understand how to design cloud-based solutions for businesses. You’ll also explore cloud storage, networking, and infrastructure management.</p>
            <p>As cloud computing continues to reshape industries, this course will equip you with the skills to leverage cloud technology in your career.</p>
            <p>Join us today and explore the future of cloud computing!</p>";
            break;
    
        case 'DevOps Fundamentals':
            $courseDescription = "<p><strong>DevOps:</strong> DevOps focuses on integrating software development and IT operations to improve the speed and quality of software delivery. In this course, you’ll learn about automation tools, continuous integration, and deployment (CI/CD). You’ll explore the use of containers and orchestration platforms like Docker and Kubernetes.</p>
            <p>The course also covers monitoring, testing, and cloud infrastructure, as well as tools like Jenkins, Git, and Terraform for streamlining workflows. You'll learn to work in teams to deliver faster, more reliable software.</p>
            <p>Gain practical knowledge on deploying and managing software applications in a seamless, automated manner. By the end of the course, you'll understand how to implement DevOps principles and accelerate software development and delivery cycles.</p>
            <p>DevOps is essential for organizations aiming to improve collaboration, increase productivity, and shorten release cycles. This course will prepare you to implement DevOps practices in real-world environments.</p>
            <p>Join us and enhance your skills in DevOps!</p>";
            break;
    
        case 'Artificial Intelligence Fundamentals':
            $courseDescription = "<p><strong>Artificial Intelligence:</strong> Artificial Intelligence (AI) is the simulation of human intelligence by machines. This course covers key AI concepts like search algorithms, machine learning, and natural language processing. You’ll learn how to implement AI models using tools like Python and TensorFlow.</p>
            <p>Real-world applications include chatbots, self-driving cars, and recommendation engines. Youll also explore techniques for developing intelligent systems that can analyze and make decisions based on data.</p>
            <p>Gain practical experience building AI models and applying them to solve complex problems in various domains. This course also covers AI ethics and the impact of AI on society.</p>
            <p>AI is revolutionizing industries worldwide, and this course will provide you with the foundational skills to develop intelligent systems and innovate with AI technology.</p>
            <p>Join us and take your first step toward mastering artificial intelligence!</p>";
            break;
    }
    
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Details</title>
    <link rel="stylesheet" href="welcoming.css">
</head>

<body>
    <div class="course-welcome-header">
            Welcome <?php echo htmlspecialchars($_SESSION['username']);?>!
    </div>
    <div class="container">
        <h1 class="text-4xl font-extrabold text-center mb-8">Course Details</h1>

        <?php  if (isset($row)) { ?>
            <table class="result-table">
                <tr><th>Course Name</th><td><?php echo $row['coursename']; ?></td></tr>
                <tr><th>Username</th><td><?php echo $_SESSION['username']; ?></td></tr>
                <tr><th>Email</th><td><?php echo $row['email']; ?></td></tr>
                <tr><th>Password</th><td><?php echo $row['password']; ?></td></tr>
                <tr><th>Start Date</th><td><?php echo $row['startdate']; ?></td></tr>
                <tr><th>End Date</th><td><?php echo $row['enddate']; ?></td></tr>
            </table>
        <?php } ?>

        <!-- Welcome Section Below Table -->
            <div class="course-description">
                <?php echo $courseDescription;?>
            </div>
            
    </div> 
</body>
</html>

