<?php
include "config.php";
session_start();

// Create the database if it does not exist
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) !== TRUE) {
    die("Error creating database: " . $conn->error);
}
$conn->select_db($dbname);

// Create the event_applications table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS event_applications (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    event_id INT(6) UNSIGNED NOT NULL,
    name VARCHAR(255) NOT NULL,
    mobile VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    applied_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (event_id) REFERENCES events(id) ON DELETE CASCADE
)";

if ($conn->query($sql) !== TRUE) {
    die("Error creating table: " . $conn->error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $event_id = isset($_POST['event_id']) ? $_POST['event_id'] : null;
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $mobile = isset($_POST['mobile']) ? $_POST['mobile'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';

    if ($event_id === null) {
        die("Error: event ID is missing.");
    }

    $sql = "SELECT COUNT(*) AS count FROM events WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $event_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row['count'] == 0) {
        die("Error: event ID does not exist.");
    }

    $stmt = $conn->prepare("INSERT INTO event_applications (event_id, name, mobile, email) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $event_id, $name, $mobile, $email);

    if ($stmt->execute()) {
        header("Location: index1.php"); 
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    $event_id = isset($_GET['event_id']) ? htmlspecialchars($_GET['event_id']) : '';
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Apply for Event</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z4G4fA7+7DXt659Q6S/ahlWXIC/0mV5QVF3l0uFI0Rt66r9wBorAI7p6SB6b7R9gqxD0yIrO0DkF1cJ55n1Yq/0"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="styleRegister.css">

    </head>
    <body>
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
                            <?php
                            if ($_SESSION['role'] === 'employer') {
                                echo '<a class="nav-link" href="employerIndex.php">Home</a>';
                            } elseif ($_SESSION['role'] === 'job_seeker') {
                                echo '<a class="nav-link" href="index1.php">Home</a>';
                            }

                            ?>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="jobs.php">Jobs</a>
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
                            echo '<li class="nav-item" id="logout"><a class="nav-link logout-button" href="logout.php">Logout</a></li>';
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
        <div class="registration-page-background">
            <div class="container">
                <div class="row d-flex flex-row justify-content-center">
                    <div class="col-12 col-md-6">
                        <div class="registration-form">
                            <h1 class="registration-form-heading">Enroll for Event</h1>
                            <form id="registrationForm" action="applyevents.php" method="post">
                                <input type="hidden" name="event_id" value="<?php echo htmlspecialchars($event_id); ?>">
                                <p class="form-name">Full Name:</p>
                                <input type="text" class="r-form-fill-box" name="name" placeholder="Full Name" required>
                                <p class="form-name">Mobile Number:</p>
                                <input type="text" class="r-form-fill-box" name="mobile" placeholder="Mobile Number" required>
                                <p class="form-name">Email:</p>
                                <input type="email" class="r-form-fill-box" name="email" placeholder="Email" required>
                                <button type="submit" class="btn btn-primary">Submit Enrollment</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
    <?php
}
$conn->close();
?>
