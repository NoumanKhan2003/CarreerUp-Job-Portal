<?php
include "config.php";
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarrierUp.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z4G4fA7+7DXt659Q6S/ahlWXIC/0mV5QVF3l0uFI0Rt66r9wBorAI7p6SB6b7R9gqxD0yIrO0DkF1cJ55n1Yq/0" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="index.js"></script>
    <link rel="stylesheet" href="styleIndex.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <p class="navbar-brand"> <img src="pics/carrierup.png" alt="CarrierUp" id="img1"></p>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="jobs.html">Jobs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="events.html">Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="resumeInput.html">Resume</a>
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
                                  echo'<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
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
        <h1>Find your dream job now</h1>
        <h3>2 lakhs+ jobs for you to explore</h3>
        <div id="search-container">
            <div class="search-bar">
                <div class="icon"></div>
                <input type="text" placeholder="Enter skills / companies">
                <div class="divider"></div>
                <select title="experience" name="experience" id="experience">
                    <option class="options">Select experience</option>
                    <option class="options">0-1 years</option>
                    <option class="options">1-3 years</option>
                    <option class="options">3-5 years</option>
                    <option class="options">5+ years</option>
                </select>
                <div class="divider"></div>
                <input type="text" placeholder="Enter location">
                <button>Search</button>
            </div>
        </div>

        <h4>Top Companies Hiring Now</h4>
        <div id="carouselExampleControls" class="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="card">
                        <div class="img-wrapper"><img src="..." class="d-block w-100" alt="..."> </div>
                        <div class="card-body">
                            <h5 class="card-title">Card title 1</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the
                                card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card">
                        <div class="img-wrapper"><img src="..." class="d-block w-100" alt="..."> </div>
                        <div class="card-body">
                            <h5 class="card-title">Card title 2</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the
                                card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card">
                        <div class="img-wrapper"><img src="..." class="d-block w-100" alt="..."> </div>
                        <div class="card-body">
                            <h5 class="card-title">Card title 3</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the
                                card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card">
                        <div class="img-wrapper"><img src="..." class="d-block w-100" alt="..."> </div>
                        <div class="card-body">
                            <h5 class="card-title">Card title 4</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the
                                card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card">
                        <div class="img-wrapper"><img src="..." class="d-block w-100" alt="..."> </div>
                        <div class="card-body">
                            <h5 class="card-title">Card title 5</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the
                                card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card">
                        <div class="img-wrapper"><img src="..." class="d-block w-100" alt="..."> </div>
                        <div class="card-body">
                            <h5 class="card-title">Card title 6</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the
                                card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card">
                        <div class="img-wrapper"><img src="..." class="d-block w-100" alt="..."> </div>
                        <div class="card-body">
                            <h5 class="card-title">Card title 7</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the
                                card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card">
                        <div class="img-wrapper"><img src="..." class="d-block w-100" alt="..."> </div>
                        <div class="card-body">
                            <h5 class="card-title">Card title 8</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the
                                card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card">
                        <div class="img-wrapper"><img src="..." class="d-block w-100" alt="..."> </div>
                        <div class="card-body">
                            <h5 class="card-title">Card title 9</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the
                                card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="view-all-comp"><a href="jobs.html"><button type="button" class="button">View all Companies</button></a></div>

        <div class="container my-5">
            <h2>Upcoming events and challenges</h2>
            <div class="row">
                <div class="col-md-4">
                    <img src="pics/events.jpg" alt="Event Image" class="img-fluid">
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <small class="text-muted">Entry closes in 10d</small>
                                    <span class="badge bg-primary float-end">Hiring challenge</span>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">.Net Azure Innovator</h5>
                                    <p class="card-subtitle mb-2 text-muted">Grid Dynamics</p>
                                    <div class="tags mb-3">
                                        <span class="badge bg-secondary">.NET</span>
                                        <span class="badge bg-secondary">Azure Cloud</span>
                                        <span class="badge bg-secondary">SQL Server</span>
                                        <span class="badge bg-secondary">Aks Deploy</span>
                                    </div>
                                    <p><i class="fa fa-calendar"></i> 10 Aug, 10:00 AM &nbsp; <i class="fa fa-user"></i>
                                        75 Enrolled</p>
                                    <a href="#" class="btn btn-outline-primary btn-sm">Job offer</a>
                                    <a href="#" class="btn btn-link btn-sm float-end">View details</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <small class="text-muted">Entry closes in 7d</small>
                                    <span class="badge bg-success float-end">Webinar</span>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Resume tips to get you shortlisted for SDE roles at Amazon
                                    </h5>
                                    <p class="card-subtitle mb-2 text-muted">Coding Ninjas</p>
                                    <p><i class="fa fa-calendar"></i> 7 Aug, 7:00 PM &nbsp; <i class="fa fa-user"></i>
                                        8.6K Enrolled</p>
                                    <a href="#" class="btn btn-outline-primary btn-sm">Learn from experts</a>
                                    <a href="#" class="btn btn-link btn-sm float-end">View details</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <small class="text-muted">Entry closes in 20d</small>
                                    <span class="badge bg-primary float-end">Hackathon</span>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">HackerRank</h5>
                                    <p class="card-subtitle mb-2 text-muted">Competitive Programming</p>
                                    <div class="tags mb-3">
                                        <span class="badge bg-secondary">Core-Java</span>
                                        <span class="badge bg-secondary">C++</span>
                                        <span class="badge bg-secondary">DSA</span>
                                        <span class="badge bg-secondary">Multiprogramming</span>
                                    </div>
                                    <p><i class="fa fa-calendar"></i> 30 Aug, 11:00 AM &nbsp; <i class="fa fa-user"></i>
                                        65k Enrolled</p>
                                    <a href="#" class="btn btn-outline-primary btn-sm">Prizes</a>
                                    <a href="#" class="btn btn-link btn-sm float-end">View details</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <small class="text-muted">Entry closes in 15d</small>
                                    <span class="badge bg-primary float-end">Mega Job Pool</span>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Falcon Technologies</h5>
                                    <p class="card-subtitle mb-2 text-muted">200+ Roles</p>
                                    <div class="tags mb-3">
                                        <span class="badge bg-secondary">Java</span>
                                        <span class="badge bg-secondary">C++</span>
                                        <span class="badge bg-secondary">JavaScript</span>
                                        <span class="badge bg-secondary">Backend</span>
                                    </div>
                                    <p><i class="fa fa-calendar"></i> 15 Aug, 1:00 PM &nbsp; <i class="fa fa-user"></i>
                                        7.4k Enrolled</p>
                                    <a href="#" class="btn btn-outline-primary btn-sm">Job offers</a>
                                    <a href="#" class="btn btn-link btn-sm float-end">View details</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="view-all-comp"><a href="events.html"><button type="button" class="button">View all Events</button></a></div>

        <footer class="footer mt-auto py-3 bg-light">
            <div class="container-footer">
                <div class="row">
                    <div class="col-md-3" id="connect-with-us">
                        <img src="pics/carrierup.png" alt="CarrierUp" class="img-fluid mb-3" id="img2">
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
                                <p id="p2">All rights reserved © 2024 CarrierUp (India) Pvt. Ltd.</p>
                    </div>
                </div>
            </div>
        </footer>
    </main>
</body>

</html>