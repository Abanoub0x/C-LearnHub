<?php
session_start();
include('check_connection.php');

// Display success message if it exists
if (isset($_SESSION['success_message'])) {
    echo "<div class='bg-green-500 text-white text-center p-4 rounded mb-6'>" . $_SESSION['success_message'] . "</div>";
    unset($_SESSION['success_message']); 
}

// Display error message if it exists
if (isset($_SESSION['error_message'])) { 
    echo "<div class='bg-red-500 text-white text-center p-4 rounded mb-6'>" . $_SESSION['error_message'] . "</div>";
    unset($_SESSION['error_message']);
}
?>


<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>C-Learn Hub</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="home.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <img src="https://www.bing.com/images/search?view=detailV2&ccid=9Izv%2basz&id=DC6D4251C9FDC0D0DDFE086EEF4FF8023A3AA4D0&thid=OIP.9Izv-aszItToTtEqRMSE0QHaE6&mediaurl=https%3a%2f%2fth.bing.com%2fth%2fid%2fR.f48ceff9ab3322d4e84ed12a44c484d1%3frik%3d0KQ6OgL4T%252b9uCA%26riu%3dhttp%253a%252f%252fwww.photo-paysage.com%252falbums%252fuserpics%252f10001%252fCascade_-15.JPG%26ehk%3dkx1JjE9ugj%252bZvUIrjzSmcnslPc7NE1cOnZdra%252f3pJEM%253d%26risl%3d1%26pid%3dImgRaw%26r%3d0&exph=2813&expw=4237&q=image&simid=608041012199762018&FORM=IRPRST&ck=4321A7AD8AA78C868F0928CBF3391CC4&selectedIndex=1&itb=0" alt="ss">

</head>

<body class="bg-white text-gray-800 transition" data-theme="light">
  <header class="header">
    <div class="container mx-auto px-4">
      <div class="logo transition">C-Learn Hub</div>
      <nav class="nav">
        <a class="nav-link text-gray-800 hover:text-gray-600 transition" href="#home">Home</a>
        <a class="nav-link text-gray-800 hover:text-gray-600 transition" href="#tracks">Tracks</a>
        <a class="nav-link text-gray-800 hover:text-gray-600 transition" href="#courses">Courses</a>
        <a class="nav-link text-gray-800 hover:text-gray-600 transition" href="#about">About</a>
      </nav>
      <div class="flex items-center gap-4">
        <div class="relative">
          <input type="text" class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" placeholder="Search...">
          <button class="absolute right-2 top-2 text-gray-600">
            <i class="fas fa-search"></i>
          </button>
        </div>
        <div class="theme-toggle">
          <a href='main_page.php' class='btn bg-yellow-500 text-white transition' id="light-mode">Registration</a>
          <a href="powerpi.php"  class="btn bg-gray-800 text-white transition" id="dark-mode">Power Pi</a>
        </div>
      </div>
    </div>
  </header>

  <section class="bg-white py-20" id="home">
    <div class="container mx-auto px-4 text-center">
      <h1 class="text-4xl font-bold mb-4">Welcome to C-Learn Hub</h1>
      <p class="text-lg mb-8">Your gateway to comprehensive computer science courses.</p>
      <a class="btn bg-yellow-500 text-white transition" href="https://en.wikipedia.org/wiki/Computer_science" target="_blank">Learn More</a>
    </div>
  </section>

  <section class="bg-gray-100 py-20" id="tracks">
    <div class="container mx-auto px-4">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-bold">Learning Tracks</h2>
        <p class="text-lg">Explore our well-structured learning tracks in various fields of computer science.</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <div class="card">
          <h3 class="text-2xl font-bold mb-4">Machine Learning</h3>
          <p>Deep dive into the world of algorithms and data-driven models.</p>
        </div>
        <div class="card">
          <h3 class="text-2xl font-bold mb-4">Cybersecurity</h3>
          <p>Learn how to protect systems and networks from digital attacks.</p>
        </div>
        <div class="card">
          <h3 class="text-2xl font-bold mb-4">Web Development</h3>
          <p>Master the art of building dynamic and responsive websites.</p>
        </div>
        <div class="card">
          <h3 class="text-2xl font-bold mb-4">Data Engineering</h3>
          <p>Understand the principles of data collection, storage, and processing.</p>
        </div>
        <div class="card">
          <h3 class="text-2xl font-bold mb-4">Cloud Computing</h3>
          <p>Explore the world of cloud services and infrastructure.</p>
        </div>
        <div class="card">
          <h3 class="text-2xl font-bold mb-4">Artificial Intelligence</h3>
          <p>Dive into the concepts of AI and machine intelligence.</p>
        </div>
        <div class="card">
          <h3 class="text-2xl font-bold mb-4">Blockchain Development</h3>
          <p>Understand the technology behind cryptocurrencies and decentralized applications.</p>
        </div>
        <div class="card">
          <h3 class="text-2xl font-bold mb-4">Software Engineering</h3>
          <p>Learn the principles of software design and development.</p>
        </div>
        <div class="card">
          <h3 class="text-2xl font-bold mb-4">Mobile App Development</h3>
          <p>Master the skills to build mobile applications for various platforms.</p>
        </div>
      </div>
    </div>
  </section>

 
  <section class="bg-gray-100 py-20" id="courses">
  <div class="container mx-auto px-4">
    <div class="text-center mb-12">
      <h2 class="text-3xl font-bold">Courses</h2>
      <p class="text-lg">Discover our wide range of courses designed for all levels of learners.</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <!-- Introduction to Machine Learning -->
      <div class="card">
        <a href="course-details.php?course=machine-learning&reset=true">
          <img alt="Course image showing a computer screen with code" class="mb-4 rounded" height="400" src="https://storage.googleapis.com/a1aa/image/zYZ2JwYA1B7oAJCUPt61MfeLaU0lkXEG7M7VaABhtxQZl44TA.jpg" width="600"/>
        </a>
        <h3 class="text-2xl font-bold mb-2">Introduction to Machine Learning</h3>
        <p>Beginner level course to get started with machine learning concepts.</p>
      </div>

      <!-- Cybersecurity Basics -->
      <div class="card">
        <a href="course-details.php?course=cybersecurity&reset=true">
          <img alt="Course image showing a padlock and binary code" class="mb-4 rounded" height="400" src="https://storage.googleapis.com/a1aa/image/pwpsmgXjcwbzAZU0rM9GSYs82CLXrXluJELgd829jmDVJOeJA.jpg" width="600"/>
        </a>
        <h3 class="text-2xl font-bold mb-2">Cybersecurity Basics</h3>
        <p>Learn the fundamentals of cybersecurity and how to protect digital assets.</p>
      </div>

      <!-- Web Development 101 -->
      <div class="card">
        <a href="course-details.php?course=web-development&reset=true">
          <img alt="Course image showing a website layout on a computer screen" class="mb-4 rounded" height="400" src="https://storage.googleapis.com/a1aa/image/dGJTgJQBgA5AO1ZaGidKwE4AYwV8nHoLm2wjMbQyykSVJOeJA.jpg" width="600"/>
        </a>
        <h3 class="text-2xl font-bold mb-2">Web Development 101</h3>
        <p>Get started with web development and build your first website.</p>
      </div>

      <!-- Cloud Computing Essentials -->
      <div class="card">
        <a href="course-details.php?course=cloud-computing&reset=true">
          <img alt="Course image showing a cloud icon with data flow" class="mb-4 rounded" height="400" src="https://storage.googleapis.com/a1aa/image/JPctkxuGR95mAFyP5wnxiy4m1Y0rmn2WCitO96hyFEjWJOeJA.jpg" width="600"/>
        </a>
        <h3 class="text-2xl font-bold mb-2">Cloud Computing Essentials</h3>
        <p>Understand the basics of cloud computing and its applications.</p>
      </div>
<!-- DevOps Course -->
<div class="card">
  <a href="course-details.php?course=dev-ops&reset=true">
    <img alt="Course image showing DevOps process" class="mb-4 rounded" height="400" src="https://storage.googleapis.com/a1aa/image/Tzq71fdF5cVmUCfYt3KTWc8qOBz6nQiXPFSvMJ3bNo8Tl44TA.jpg" width="600"/>
  </a>
  <h3 class="text-2xl font-bold mb-2">DevOps Fundamentals</h3>
  <p>Learn the essentials of DevOps, continuous integration, and deployment.</p>
</div>

<!-- Artificial Intelligence Fundamentals Course -->
<div class="card">
  <a href="course-details.php?course=artificial-intelligence-fundamentals&reset=true">
    <img alt="Course image showing AI concepts" class="mb-4 rounded" height="400" src="https://storage.googleapis.com/a1aa/image/ffEiX5gQKDtQfI5AoNLkoOTfDPSHMaUULJFg3XfHLbePUJOeJA.jpg" width="600"/>
  </a>
  <h3 class="text-2xl font-bold mb-2">Artificial Intelligence Fundamentals</h3>
  <p>Get introduced to the fundamentals of AI and its real-world applications.</p>
</div>
    </div>
  </div>
</section>



  <section class="bg-gray-100 py-20" id="about">
    <div class="container mx-auto px-4">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-bold">About Us</h2>
        <p class="text-lg">C-Learn Hub is an innovative online platform designed to offer comprehensive computer science courses. Our mission is to empower students with the knowledge and skills they need to excel in the tech industry. We provide high-quality education, track student progress, offer certifications, and foster interactive learning environments.</p>
      </div>



      <div class="text-center mt-12">
        <h2 class="text-3xl font-bold">Our Team</h2>
        <p class="text-lg">Meet the dedicated team behind C-Learn Hub
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-8">

      <div class="card text-center">
    <img alt="Portrait of Abanoub Amir Gorge Zaki" class="mb-4 rounded-full mx-auto" height="100" src="https://i.ibb.co/kyVYnPh/abanoub.jpg" width="100"/>
    <h3 class="text-2xl font-bold mb-2 gradient-text">Abanoub Amir George Zaki</h3>
    <p>ID: 2301001</p>
  </div>

  <div class="card text-center">
    <img alt="Portrait of Basmala Azab Mohamed Selima" class="mb-4 rounded-full mx-auto" height="100" src="https://i.ibb.co/3NzpFkn/basmala.jpg" width="100"/>
    <h3 class="text-2xl font-bold mb-2 gradient-text">Basmala Azab Mohamed Selima</h3>
    <p>ID: 2301073</p>
  </div>
  
  <div class="card text-center">
    <img alt="Portrait of Yousef Amr Abdelazeem Elbish" class="mb-4 rounded-full mx-auto" height="100" src="https://i.ibb.co/BVWsx9Z/yousef.jpg" width="100"/>
    <h3 class="text-2xl font-bold mb-2 gradient-text">Yousef Amr Abdelazeem Elbish</h3>
    <p>ID: 2301295</p>
  </div>




</div>


      <div class="text-center mt-12">
        <h2 class="text-3xl font-bold">Contact Us</h2>
        <p class="text-lg">Feel free to reach out to us anytime.</p>
      </div>
      <div class="max-w-lg mx-auto mt-8">
        <form action="contact-us.php" class="bg-white p-8 rounded-lg shadow-md" method="POST">

          <div class="mb-4">
            <label class="block text-gray-700" for="name">Name</label>
            <input class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" id="name" name="name" required type="text"/>
          </div>

    <div class="mb-4">
      <label class="block text-gray-700" for="email">Email</label>
      <input class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500"  id="email" name="email" required type="email"/>
    </div>

          <div class="mb-4">
            <label class="block text-gray-700" for="message">Message</label>
            <textarea class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" id="message" name="message" required rows="4"></textarea>
          </div>
          <button class="w-full btn bg-yellow-500 text-white transition" type="submit">Send Message</button>
        </form>
      </div>
    </div>
  </section>

  <footer class="footer">
    <div class="container mx-auto px-4">
      <p>© 2024 C-Learn Hub. All rights reserved.</p>
    </div>
  </footer>




