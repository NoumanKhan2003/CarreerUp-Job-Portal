<?php
include "config.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Your Resume Template</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z4G4fA7+7DXt659Q6S/ahlWXIC/0mV5QVF3l0uFI0Rt66r9wBorAI7p6SB6b7R9gqxD0yIrO0DkF1cJ55n1Yq/0"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styleResumeTemplateSelection.css"> 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</head>
<header>
    <body>
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
    <div class="container">
        <h1 class="text-center" id="h1">Choose Your Resume Template</h1>
        <p class="text-center" id="para">Select a template that best fits your style and needs.</p>
        <p class="text-center" id="para">You can make multiple styles Resumes.</p>

        <div class="template-container">
            <div class="template-card">
                <img src="pics/resume1.png" alt="Template 1 " class="template-image">
                <div class="template-details">
                <h5>Classic Template</h5>
                <p>Traditional layout with a focus on skills and projects.</p>
                    <button class="select-button" onclick="Template(1)">Select</button>
                </div>
            </div>

            <div class="template-card">
                <img src="pics/resume2.png" alt="Template 2 Preview" class="template-image">
                <div class="template-details">
                <h5>Modern Template</h5>
                <p>Clean and professional design with a modern touch.</p>
                  
                    <button class="select-button" onclick="Template(2)">Select</button>
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
                            <li><a href="employerIndex.php">Employer home</a></li>
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
    <script>
        function Template(templateID) {
            if (templateID === 1) {
                window.location.href = "resumeInput1.html"; 
            } else if (templateID === 2) {
                window.location.href = "resumeInput2.html"; 
            }
        }
    </script>
</body>
</html>
