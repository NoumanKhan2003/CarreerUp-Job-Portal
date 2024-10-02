<?php
include "config.php";
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.html");
    exit();
}

$email = $_SESSION['email']; 
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->query("CREATE DATABASE IF NOT EXISTS $dbname");
$conn->select_db($dbname);
$tableCreationQuery = "CREATE TABLE IF NOT EXISTS job_seekers_profiles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    skills TEXT,
    experience TEXT,
    education TEXT,
    certifications TEXT
)";
$conn->query($tableCreationQuery);

$stmt = $conn->prepare("SELECT * FROM job_seekers_profiles WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    $user = array(
        'name' => '',
        'email' => $email,
        'skills' => '',
        'experience' => '',
        'education' => '',
        'certifications' => ''
    );
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="styleProfile.css">
</head>
        <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <p class="navbar-brand"> <img src="pics/CareerUp.png" alt="CareerUp" id="img1"></p>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link "  href="index1.php">Home</a>
                    </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="jobs.php">Jobs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="events.php">Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="resumeTemplateSelection.php">Resume</a>
                        </li>
                        <?php
                        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                            echo '<li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>';
                            echo '<li class="nav-item"><a class="nav-link logout-button" href="logout.php">Logout</a></li>';
                        } else {
                            echo '<div class="nav-buttons">
                                    <a href="login.html"><button type="button" class="buttons" id="login">Login</button></a>
                                    <a href="register.html"><button type="button" class="buttons" id="register">Register</button></a>
                                  </div>';
                            echo '<li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    For Employers
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="employerRegister.html">Employer Registration</a></li>
                                    <li><a class="dropdown-item" href="employerLogin.html">Employer Login</a></li>
                                </ul>
                            </li>';
                        }
                        ?>

                    </ul>
                </div>
            </div>
        </nav>
        </header>
        <main>
        <div class="container">
        <h1>Profile Status</h1>
        <section id="job-seekers">
            <form class="profile-form" action="profile_handler.php" method="post">
                <h3>Personal Details</h3>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" value="<?php echo htmlspecialchars($user['name']); ?>">

                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" value="<?php echo htmlspecialchars($user['email']); ?>" readonly>

                <h3>Skills</h3>
                <label for="skills">Skills</label>
                <input type="text" id="skills" name="skills" placeholder="Enter your skills" value="<?php echo htmlspecialchars($user['skills']); ?>">

                <h3>Experience</h3>
                <label for="experience">Experience</label>
                <textarea id="experience" name="experience" placeholder="Enter your experience"><?php echo htmlspecialchars($user['experience']); ?></textarea>

                <h3>Education</h3>
                <label for="education">Education</label>
                <textarea id="education" name="education" placeholder="Enter your education"><?php echo htmlspecialchars($user['education']); ?></textarea>

                <h3>Certifications</h3>
                <label for="certifications">Certifications</label>
                <textarea id="certifications" name="certifications" placeholder="Enter your certifications"><?php echo htmlspecialchars($user['certifications']); ?></textarea>

                <button type="submit">Submit</button>
            </form>
        </section>
    </div>
    </main>
    <footer class="footer mt-auto py-3 bg-light">
            <div class="container-footer">
                <div class="row">
                    <div class="col-md-3" id="connect-with-us">
                        <img src="pics/CareerUp.png" alt="CareerUp" class="img-fluid mb-3" id="img2">
                        <p id="p1">Connect with us</p>
                        <div class="social-icons">
                            <a href="https://www.facebook.com/profile.php?id=100013915323747"><i class="fa fa-facebook"></i></a>
                            <a href="https://www.instagram.com/nouman_khan_innocent?igsh=MTE2NGRsYW84OGF2Mg=="><i class="fa fa-instagram"></i></a>
                            <a href="https://github.com/NoumanKhan2003"><i class="fa fa-github"></i></a>
                            <a href="https://www.linkedin.com/in/nouman-khan-95923a256?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <ul class="list-unstyled">
                            <li><a href="https://www.infoedge.in/">About us</a></li>
                            <li><a href="https://careers.infoedge.com/#!/">Careers</a></li>
                            <li><a href="employerLogin.html">Employer home</a></li>
                            <li><a href="sitemap.php">Sitemap</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <ul class="list-unstyled">
                            <li><a href="feedback.html">Feedback</a></li>
                            <li><a href="notice.html">Summons/Notices</a></li>
                            <li><a href="grievances.html">Grievances</a></li>
                            <li><a href="report.html">Report issue</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <ul class="list-unstyled">
                            <li><a href="privacyPolicy.html">Privacy policy</a></li>
                            <li><a href="terms.html">Terms & conditions</a></li>
                            <li><a href="fraudAlert.html">Fraud alert</a></li>
                            <li><a href="trustAndSafety.html">Trust & safety</a></li>
                        </ul>
                    </div>
                </div>
                <hr>
                <div class="row mt-4">
                        <div class="p2">
                                <p id="p2">All trademarks are the property of their respective owners</p>
                                <p id="p2">All rights reserved © 2024 CareerUp (India) Pvt. Ltd.</p>
                    </div>
                </div>
            </div>
        </footer>
</body>
</html>
