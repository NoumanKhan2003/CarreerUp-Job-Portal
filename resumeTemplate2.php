<?php
include "config.php";

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    $conn->select_db($dbname);

    $sql = "CREATE TABLE IF NOT EXISTS resumes (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50) NOT NULL,
        title VARCHAR(50) NOT NULL,
        profilePicture VARCHAR(100) ,
        mobile VARCHAR(15) NOT NULL,
        email VARCHAR(50) NOT NULL,
        address VARCHAR(100) NOT NULL,
        about TEXT NOT NULL,
        education TEXT NOT NULL,
        skills TEXT NOT NULL,
        technologies TEXT NOT NULL,
        experience TEXT NOT NULL,
        projects TEXT NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($conn->query($sql) === TRUE) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $title = $_POST['title'];
            $mobile = $_POST['mobile'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $about = $_POST['about'];
            $education = $_POST['education'];
            $skills = $_POST['skills'];
            $technologies = $_POST['technologies'];
            $experience = $_POST['experience'];
            $projects = $_POST['projects'];
            $stmt = $conn->prepare("INSERT INTO resumes (name, title, mobile, email, address, about, education, skills, technologies, experience, projects) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ,?)");
            $stmt->bind_param("sssssssssss", $name, $title, $mobile, $email, $address, $about, $education, $skills, $technologies, $experience, $projects);

            if ($stmt->execute()) {
                $skillsList = array_filter(array_map('trim', preg_split('/[\n,]+/', $skills)));
                $technologiesList = array_filter(array_map('trim', preg_split('/[\n,]+/', $technologies)));
                $educationList = array_filter(array_map('trim', preg_split('/[\n,]+/', $education)));
                $projectList = array_filter(array_map('trim', preg_split('/[\n,]+/', $projects)));
                $experienceList = array_filter(array_map('trim', preg_split('/[\n,]+/', $experience)));

                echo "
                <!DOCTYPE html>
                <html lang='en'>
                <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>Resume of $name</title>
                    <link rel='stylesheet' href='styleResumeTemplate2.css'>
                    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
                    <link href='https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap' rel='stylesheet'>
                </head>
                <body>
                    <div class='resume-container'>
                        <div class='header'>
                            <h1>$name</h1>
                            <h2>$title</h2>
                            <p>$about</p>
                            <div class='contact-info'>
                                <span>📧 $email</span>
                                <span>📱 $mobile</span>
                                <span>📍 $address</span>
                            </div>
                        </div>
                        <div class='main-content'>
                            <div class='left-column'>
                                <section>
                                    <h3>Work Experience</h3>
                                    <ul>";
                foreach ($experienceList as $exp) {
                    echo "<li>$exp</li>";
                }
                echo "
                                    </ul>
                                </section>
                                <section>
                                    <h3>Education</h3>
                                    <ul>";
                foreach ($educationList as $edu) {
                    echo "<li>$edu</li>";
                }
                echo "
                                    </ul>
                                </section>
                                <section>
                                    <h3>Skills and Abilities</h3>
                                    <ul>";
                foreach ($skillsList as $skill) {
                    echo "<li>$skill</li>";
                }
                echo "
                                    </ul>
                                </section>
                            </div>
                            <div class='right-column'>
                                <section>
                                    <h3>Technologies</h3>
                                    <ul>";
                foreach ($technologiesList as $tech) {
                    echo "<li>$tech</li>";
                }
                echo "
                                    </ul>
                                </section>
                                <section>
                                    <h3>Projects</h3>
                                    <ul>";
                foreach ($projectList as $project) {
                    echo "<li>$project</li>";
                }
                echo "
                                    </ul>
                                </section>
                            </div>
                        </div>
                        <div class='buttons'>
                            <button type='button' id='print'>Print</button>
                            <button type='button' id='home'>Home</button>
                        </div>
                    </div>
                    <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js'></script>
                    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js'></script>
                    <script>
                        document.getElementById('print').addEventListener('click', function() {
                            window.print();
                        });
                        document.getElementById('home').addEventListener('click', function() {
                            window.location.href = 'index1.php';
                        });
                    </script>
                </body>
                </html>
                ";
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        }
    } else {
        echo "Error creating table: " . $conn->error;
    }
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();
?>
