<?php
session_start();
include('check_connection.php');


if (isset($_SESSION['success_message'])) { 
  echo "<div style='background-color: #48bb78; color: white; text-align: center; padding: 1rem; border-radius: 0.25rem; margin-bottom: 1.5rem;'>" . $_SESSION['success_message'] . "</div>";
  unset($_SESSION['success_message']);
}

if (isset($_SESSION['error_message'])) { 
  echo "<div style='background-color: #f56565; color: white; text-align: center; padding: 1rem; border-radius: 0.25rem; margin-bottom: 1.5rem;'>" . $_SESSION['error_message'] . "</div>";
  unset($_SESSION['error_message']);
}


$course = isset($_GET['course']) ? $_GET['course'] : '';


$courseTitle = '';
$courseDescription = '';
$courseImage = '';


switch($course) {
  case 'machine-learning':
    $courseTitle = 'Introduction to Machine Learning';
    $courseDescription = 'Beginner level course to get started with machine learning concepts.';
    $courseImage = 'https://storage.googleapis.com/a1aa/image/zYZ2JwYA1B7oAJCUPt61MfeLaU0lkXEG7M7VaABhtxQZl44TA.jpg';
    break;
  case 'cybersecurity':
    $courseTitle = 'Cybersecurity Basics';
    $courseDescription = 'Learn the fundamentals of cybersecurity and how to protect digital assets.';
    $courseImage = 'https://storage.googleapis.com/a1aa/image/pwpsmgXjcwbzAZU0rM9GSYs82CLXrXluJELgd829jmDVJOeJA.jpg';
    break;
  case 'web-development':
    $courseTitle = 'Web Development 101';
    $courseDescription = 'Get started with web development and build your first website.';
    $courseImage = 'https://storage.googleapis.com/a1aa/image/dGJTgJQBgA5AO1ZaGidKwE4AYwV8nHoLm2wjMbQyykSVJOeJA.jpg';
    break;
  case 'cloud-computing':
    $courseTitle = 'Cloud Computing Essentials';
    $courseDescription = 'Understand the basics of cloud computing and its applications.';
    $courseImage = 'https://storage.googleapis.com/a1aa/image/JPctkxuGR95mAFyP5wnxiy4m1Y0rmn2WCitO96hyFEjWJOeJA.jpg';
    break;
  case 'dev-ops':
    $courseTitle = 'DevOps Fundamentals';
    $courseDescription = 'Learn the essentials of DevOps, continuous integration, and deployment.';
    $courseImage = 'https://storage.googleapis.com/a1aa/image/Tzq71fdF5cVmUCfYt3KTWc8qOBz6nQiXPFSvMJ3bNo8Tl44TA.jpg';
    break;
  case 'artificial-intelligence-fundamentals':
    $courseTitle = 'Artificial Intelligence Fundamentals';
    $courseDescription = 'Get introduced to the fundamentals of AI and its real-world applications.';
    $courseImage = 'https://storage.googleapis.com/a1aa/image/ffEiX5gQKDtQfI5AoNLkoOTfDPSHMaUULJFg3XfHLbePUJOeJA.jpg';
    break;
}


if (isset($_GET['reset']) && $_GET['reset'] == 'true') {
  unset($_SESSION['photo'], $_SESSION['title'], $_SESSION['description1']);
}


if (!isset($_SESSION['photo']) || !isset($_SESSION['title']) || !isset($_SESSION['description1'])) {
  $_SESSION['photo'] = $courseImage;
  $_SESSION['title'] = $courseTitle;
  $_SESSION['description1'] = $courseDescription;
}

?>

 <link rel="stylesheet" href="course-details.css">
<div class="scroll-down">SCROLL DOWN
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
  <path d="M16 3C8.832031 3 3 8.832031 3 16s5.832031 13 13 13 13-5.832031 13-13S23.167969 3 16 3zm0 2c6.085938 0 11 4.914063 11 11 0 6.085938-4.914062 11-11 11-6.085937 0-11-4.914062-11-11C5 9.914063 9.914063 5 16 5zm-1 4v10.28125l-4-4-1.40625 1.4375L16 23.125l6.40625-6.40625L21 15.28125l-4 4V9z"/> 
</svg></div>
<div class="container"></div>
<div class="modal">
  <div class="modal-container">
    <div class="modal-left">
      <h1 class="modal-title"><?php echo  $_SESSION['title']?></h1>
      <p class="modal-desc"><?php echo $_SESSION['description1'] ?></p>

    <form action="course-login.php" method="POST">
      <input type="hidden" name="coursename" value="<?php echo $_SESSION['title'] ?>">

      <div class="input-block">
        <label for="email" class="input-label">Email</label>
        <input type="email" name="email" id="email" placeholder="Email">
      </div>
      <div class="input-block">
        <label for="password" class="input-label">Password</label>
        <input type="password" name="password" id="password" placeholder="Password">
      </div>
      <div class="modal-buttons">
        <a href="forget_pass_form.php" class="">Forgot your password?</a>
        <button type="submit" class="input-button" >Register</button>
      </div>
    </form>

    </div>
    <div class="modal-right">
      <img src="<?php echo $_SESSION['photo'] ?>" alt="">
    </div>
     <button class="icon-button close-button">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50">
           <path d="M 25 3 C 12.86158 3 3 12.86158 3 25 C 3 37.13842 12.86158 47 25 47 C 37.13842 47 47 37.13842 47 25 C 47 12.86158 37.13842 3 25 3 z M 25 5 C 36.05754 5 45 13.94246 45 25 C 45 36.05754 36.05754 45 25 45 C 13.94246 45 5 36.05754 5 25 C 5 13.94246 13.94246 5 25 5 z M 16.990234 15.990234 A 1.0001 1.0001 0 0 0 16.292969 17.707031 L 23.585938 25 L 16.292969 32.292969 A 1.0001 1.0001 0 1 0 17.707031 33.707031 L 25 26.414062 L 32.292969 33.707031 A 1.0001 1.0001 0 1 0 33.707031 32.292969 L 26.414062 25 L 33.707031 17.707031 A 1.0001 1.0001 0 0 0 32.980469 15.990234 A 1.0001 1.0001 0 0 0 32.292969 16.292969 L 25 23.585938 L 17.707031 16.292969 A 1.0001 1.0001 0 0 0 16.990234 15.990234 z"></path>
        </svg>
      </button>
  </div>
  <button class="modal-button">Click here to login</button>
</div>



<script>
const body = document.querySelector("body");
const modal = document.querySelector(".modal");
const modalButton = document.querySelector(".modal-button");
const closeButton = document.querySelector(".close-button");
const scrollDown = document.querySelector(".scroll-down");
let isOpened = false;

const openModal = () => {
  modal.classList.add("is-open");
  body.style.overflow = "hidden";
};

const closeModal = () => {
  modal.classList.remove("is-open");
  body.style.overflow = "initial";
};

window.addEventListener("scroll", () => {
  if (window.scrollY > window.innerHeight / 3 && !isOpened) {
    isOpened = true;
    scrollDown.style.display = "none";
    openModal();
  }
});

modalButton.addEventListener("click", openModal);
closeButton.addEventListener("click", closeModal);

document.onkeydown = evt => {
  evt = evt || window.event;
  evt.keyCode === 27 ? closeModal() : false;
};
</script>