<?php
include "config.php";
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Job Listings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z4G4fA7+7DXt659Q6S/ahlWXIC/0mV5QVF3l0uFI0Rt66r9wBorAI7p6SB6b7R9gqxD0yIrO0DkF1cJ55n1Yq/0"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styleJobs.css">
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
        <h1 class="top">Jobs to Uplift your Career</h1>

    </header>
    <main>
        <div class="row">
            <?php
            include "config.php";

            $skills = isset($_GET['skills']) ? $_GET['skills'] : '';
            $jobType = isset($_GET['job-type']) ? $_GET['job-type'] : '';
            $location = isset($_GET['location']) ? $_GET['location'] : '';

            $sql = "SELECT id, job_title, company_name, location, job_type, salary, job_description FROM jobs WHERE 1=1";

            if (!empty($skills)) {
                $sql .= " AND (job_title LIKE '%" . $conn->real_escape_string($skills) . "%' OR company_name LIKE '%" . $conn->real_escape_string($skills) . "%')";
            }

            if (!empty($jobType)) {
                $sql .= " AND job_type = '" . $conn->real_escape_string($jobType) . "'";
            }

            if (!empty($location)) {
                $sql .= " AND location LIKE '%" . $conn->real_escape_string($location) . "%'";
            }

            $sql .= " ORDER BY job_title ASC";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-lg-4 col-md-6 col-sm-12 p-4">';
                    echo '  <div class="card">';
                    echo '    <div class="card-body">';
                    echo '      <h5 class="card-title">' . $row["job_title"] . '</h5>';
                    echo '      <p class="card-text">' . $row["job_description"] . '</p>';
                    echo '      <p class="card-text">Company: ' . $row["company_name"] . '</p>';
                    echo '      <p class="card-text">Location: ' . $row["location"] . '</p>';
                    echo '      <p class="card-text">Job Type: ' . $row["job_type"] . '</p>';
                    echo '      <p class="card-text">Salary: ' . $row["salary"] . '</p>';
                    echo '      <a href="applyJobs.php?job_id=' . $row["id"] . '" class="btn btn-primary">Apply Now</a>';
                    echo '    </div>';
                    echo '  </div>';
                    echo '</div>';
                }
            } else {
                echo '<p class="text-center">No jobs found for your search criteria.</p>';
            }

            $conn->close();
            ?>
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
                        <a href="https://www.facebook.com/profile.php?id=100013915323747"><i
                                class="fa fa-facebook"></i></a>
                        <a href="https://www.instagram.com/nouman_khan_innocent?igsh=MTE2NGRsYW84OGF2Mg=="><i
                                class="fa fa-instagram"></i></a>
                        <a href="https://github.com/NoumanKhan2003"><i class="fa fa-github"></i></a>
                        <a
                            href="https://www.linkedin.com/in/nouman-khan-95923a256?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"><i
                                class="fa fa-linkedin"></i></a>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>