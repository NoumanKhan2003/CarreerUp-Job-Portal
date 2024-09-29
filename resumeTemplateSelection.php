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
    <link rel="stylesheet" href="styleResumeTemplateSelection.css"> 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
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

<body>
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
