CREATE DATABASE CourseSystem1;
USE CourseSystem1;

DROP TABLE IF EXISTS Answers, Questions, Quizzes, Certificates, Lessons, Track, Feedback, Enrollment, Courses, Users;


CREATE TABLE Users (
    user_id int not null PRIMARY KEY,
    fname VARCHAR(50),
    sname VARCHAR(50),
    lname VARCHAR(50),
    password VARCHAR(100),
    createdAt DATETIME,
    updatedAt DATETIME,
    instructor BIT,
    student BIT,
    admins BIT
);


CREATE TABLE Enrollment (
    enrollment_id INT PRIMARY KEY,
    grades DECIMAL(5,2),
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES Users(user_id)
);







CREATE TABLE Track (
    track_id INT PRIMARY KEY,
    trackName VARCHAR(50),
    description TEXT,
    startDate DATE,
    endDate DATE,
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES Users(user_id)
);


CREATE TABLE Courses (
    course_id INT PRIMARY KEY,
    courseName VARCHAR(50),
    startDate DATE,
    endDate DATE,
    description TEXT,
    track_id INT,
    FOREIGN KEY (track_id) REFERENCES Track(track_id)
);



CREATE TABLE Lessons (
    lesson_id INT PRIMARY KEY,
    lessonName VARCHAR(50),
    startDate DATE,
    ORDERR INT,
    links TEXT,
    video TEXT,
    text TEXT,
    course_id INT,
    FOREIGN KEY (course_id) REFERENCES Courses(course_id)
);


CREATE TABLE Quizzes (
    quiz_id INT PRIMARY KEY,
    title VARCHAR(50),
    description TEXT,
    userName VARCHAR(50),
    courseName VARCHAR(50),
    grades DECIMAL(5,2),
    startDate DATE,
    endDate DATE,
    contentGeneral TEXT,
    contentFinal TEXT
);


CREATE TABLE HasQuiz (
    lesson_id INT,
    quiz_id INT,
    FOREIGN KEY (lesson_id) REFERENCES Lessons(lesson_id),
    FOREIGN KEY (quiz_id) REFERENCES Quizzes(quiz_id)
);


CREATE TABLE Questions (
    question_id INT PRIMARY KEY,
    text TEXT,
    startDate DATE,
    endDate DATE,
    quiz_id INT,
    FOREIGN KEY (quiz_id) REFERENCES Quizzes(quiz_id)
);


CREATE TABLE Answers (
    answer_id INT PRIMARY KEY,
    selectedAns BIT,
    question_id INT,
    FOREIGN KEY (question_id) REFERENCES Questions(question_id)
);


CREATE TABLE Feedback (
    request TEXT,
    reply TEXT,
    course_id INT,
    user_id INT,
    FOREIGN KEY (course_id) REFERENCES Courses(course_id),
    FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

INSERT INTO Users (user_id, fname, sname, lname, password, createdAt, updatedAt, instructor, student, admins)
VALUES 
(1, 'John', 'Doe', 'Smith', 'password123', GETDATE(), GETDATE(), 1, 0, 0),
(2, 'Jane', 'Doe', 'Johnson', 'password456', GETDATE(), GETDATE(), 0, 1, 0),
(3, 'Alice', 'Wonder', 'Land', 'password789', GETDATE(), GETDATE(), 0, 1, 0);

INSERT INTO Enrollment (enrollment_id, grades, user_id)
VALUES 
(1, 95.00, 1),
(2, 88.50, 2),
(3, 76.00, 3);

INSERT INTO Track (track_id, trackName, description, startDate, endDate, user_id)
VALUES 
(1, 'Computer Science', 'A track focused on computer science fundamentals.', '2023-01-01', '2023-12-31', 1),
(2, 'Artificial Intelligence', 'A track focused on AI and machine learning.', '2023-02-01', '2023-11-30', 1);


INSERT INTO Courses (course_id, courseName, startDate, endDate, description, track_id)
VALUES 
(1, 'Introduction to Programming', '2023-01-15', '2023-03-15', 'Learn the basics of programming.', 1),
(2, 'Data Structures and Algorithms', '2023-04-01', '2023-06-01', 'An in-depth look at data structures and algorithms.', 1),
(3, 'Machine Learning Basics', '2023-03-01', '2023-05-01', 'Introduction to machine learning concepts.', 2);


INSERT INTO Lessons (lesson_id, lessonName, startDate, ORDERR, links, video, text, course_id)
VALUES 
(1, 'Lesson 1: Getting Started', '2023-01-15', 1, 'http://example.com/lesson1', 'http://example.com/video1', 'This lesson covers the basics.', 1),
(2, 'Lesson 2: Control Structures', '2023-01-22', 2, 'http://example.com/lesson2', 'http://example.com/video2', 'This lesson covers control structures.', 1),
(3, 'Lesson 1: Introduction to ML', '2023-03-01', 1, 'http://example.com/ml_lesson1', 'http://example.com/ml_video1', 'This lesson introduces machine learning.', 3);


INSERT INTO Quizzes (quiz_id, title, description, userName, courseName, grades, startDate, endDate, contentGeneral, contentFinal)
VALUES 
(1, 'Quiz 1: Basics of Programming', 'A quiz on the basics of programming.', 'John Doe', 'Introduction to Programming', 100.00, '2023-01-20', '2023-01-25', 'General content for quiz.', 'Final content for quiz.'),
(2, 'Quiz 1: Data Structures', 'A quiz on data structures.', 'John Doe', 'Data Structures and Algorithms', 100.00, '2023-04-10', '2023-04-15', 'General content for quiz.', 'Final content for quiz.');


INSERT INTO HasQuiz (lesson_id, quiz_id)
VALUES 
(1, 1),
(2, 2);

INSERT INTO Questions (question_id, text, startDate, endDate, quiz_id)
VALUES 
(1, 'What is a variable?', '2023-01-20', '2023-01-25', 1),
(2, 'What is a loop?', '2023-01-20', '2023-01-25', 1),
(3, 'What is a linked list?', '2023-04-10', '2023-04-15', 2);


