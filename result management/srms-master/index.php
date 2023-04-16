<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./css/homepage.css">
    <link rel="stylesheet" href="./css/font-awesome-4.7.0/css/font-awesome.css">
    <title>Homepage</title>
</head>
<body>
    
    <div class="container">
        <div class="title">
            <span class="heading">Student Result Management System</span>
        </div>
        
        <div class="nav">
            <ul>
                <li>
                    <a href="">Home</a>
                </li>
                <li>
                    <a href="./admin_login.php">Admin Login</a>
                </li>
                <li class="dropdown" onclick="toggleDisplay('1')">
                    <a href="#" class="dropbtn">Faculties &nbsp
                        <span class="fa fa-angle-down"></span>
                    </a>
                    <div class="dropdown-content" id="1"> 
	      <a href="./faculty_login.php">View Results</a>
                        <a href="./result_analysis.php">Results Analysis</a>
                        <a href="">Others</a>
                    </div>
                </li>
                <li class="dropdown" onclick="toggleDisplay('2')">
                    <a href="#" class="dropbtn">Student &nbsp
                        <span class="fa fa-angle-down"></span>
                    </a>
                    <div class="dropdown-content" id="2">
                        <a href="./student_login.php">Get Results</a>
                        <a href="./result_analysis.php">Results Analysis</a>
	      <a href="">Others</a>
                    </div>
                </li>
            </ul>
        </div>
    
        <div class="slider">
            <img src="images/home3.jpg" class="slider-image" alt="img">
        </div>
    
        <div class="main">
            <span>About the College</span>
            <p>Andhra Loyola Institute of Engineering and Technology (ALIET) It was established in 2008 Situated at the foothills of the Eastern Ghats of Vijayawada, the campus of ALIET has a verdant look. This green campus engenders a conducive and serene ambience, giving a fillip to the learners’ zeal and enthusiasm. ALIET has an efficient, experienced and dedicated  faculty to offer a holistic education to the students. The institution, recognized by the Government of Andhra Pradesh and affiliated to JNTU Kakinada, was approved by AICTE, New Delhi, on 4th June 2008.Andhra Loyola College (ALC) has been ranked 36th at the national level in the National Institutional Ranking Framework (NIRF) Ranking 2020. The list was released by the Union HRD Minister.</p>
    
            <div class="info">
                <div>
                    <span>Courses</span> <hr>
                    <p>Still deciding what you want to study at university? Browse the full range of options with our course guides, a detailed information about types of program, specializations and career prospects.</p>
                </div>
                <div>
                    <span>Admissions</span> <hr>
                    <p>Whether your new to campus or are looking for more information on campus activities you can find information about admissions and financial aid here</p>
                </div>
                <div>
                    <span>Library</span> <hr>
                    <p>Be the first to know. Stay informed and up to date with the upcoming technology. Get varied knowledge right from social events to newest research topics by clicking the link</p>
                </div>
                <div>
                    <span>Campus Region</span> <hr>
                    <p>Welcome to Campus, a multipurpose WordPress theme. Go ahead and click around, there is a ton of new stuff to check out. For more information</p>
                </div>
            </div>
        </div>

        <div class="footer">
            <div class="footer--contact">
                <span>Contact Us</span>
                <p>chaitanya392000@gmail.com</p>
                <p>+91-123456789</p>
            </div>
            <div class="footer--info">
                <span>Important Links</span>
                <a href="index.php">Home</a>
                <a href="admin_login.php">Admin Login</a>
                <a href="student_login.php">Results</a>
            </div>
        </div>

    </div>

</body>
</html>