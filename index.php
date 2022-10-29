<html>
    <head>
        <meta charset="utf-8">
        <title>Lavansh Arora</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Favicons -->


        <!-- Bootstrap CSS File -->
        <link href="./static/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />

        <!-- Libraries CSS Files -->
        <link href="./static/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="./static/lib/animate/animate.min.css" rel="stylesheet" />
        <link href="./static/lib/ionicons/css/ionicons.min.css" rel="stylesheet" />
        <link href="./static/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
        <link href="./static/lib/lightbox/css/lightbox.min.css" rel="stylesheet" />


        <link href="./static/css/main.css" rel="stylesheet" />
        <link href="./static/css/all.css" rel="stylesheet" />

    </head>
    <body>

    

<!--/ Nav Star /-->
  <nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll" href="#page-top">&nbsp;Lavansh Arora</a>
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll active ml-2" href="#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll ml-2" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll ml-2" href="#education">Education</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll ml-2" href="#work">Work</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll ml-2" href="#projects">Projects</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll ml-2" href="#contact">Contact</a>
          </li>
          <?php

            if(isset($_COOKIE["PHPSESSID"]))
            {
            echo "<li class='nav-item'>
            <a class='nav-link js-scroll ml-2' href='mail.php'>Send Mail</a>
            </li>
            <li class='nav-item'>
            <a class='nav-link js-scroll ml-2' href='logout.php'>Logout</a>
            </li>";
            }
            else
            {
            echo "<li class='nav-item'>
            <a class='nav-link js-scroll ml-2' href='login.php'>Login</a>
            </li>
            <li class='nav-item'>
            <a class='nav-link js-scroll ml-2' href='register.php'>Register</a>
            </li>";
            }

          ?>
        </ul>
      </div>
    </div>
  </nav>
  <!--/ Nav End /-->

  


  <!--/ Intro Skew Star /-->
  <div id="home" class="intro route bg-image" style="background-image: url(static/img/my-pic.jpg)">
    <div class="overlay-itro"></div>
    <div class="intro-content display-table">
      <div class="table-cell">
        <div class="container">
          <!--<p class="display-6 color-d">Hello, world!</p>-->
          <h1 class="intro-title mb-4">I am Lavansh Arora</h1>
          <p class="intro-subtitle"><span class="text-slider-items">Engineering Student, Django Developer, Full Stack Developer</span><strong class="text-slider"></strong></p>

        </div>
      </div>
    </div>
  </div>
  <!--/ Intro Skew End /-->
  
  <?php 

        

        if (isset($_POST["submit"])) {
            
          $user = $_POST["username"];
          $pass = $_POST["password"];
          
          $servername = "localhost"; 
          $username = "root"; 
          $password = "root"; 
          $database = "my_site";
          $conn = mysqli_connect($servername, $username, $password, $database); 
          
          $sql = "select * from `person_details` where username='$user' and pass1='$pass' "; 
          
          $result = mysqli_query($conn, $sql);

          $count=mysqli_num_rows($result);

          foreach($result as $k) {  
            $name = $k['name'];
          }  
          

          if($count>0)
          {
	          session_start();
            $_SESSION['userid'] = $user;
            $cookie_name = $user;
            date_default_timezone_set('Asia/Kolkata');
            $date = date('d-m-y--h-i-s');
            $cookie_value = $date;
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
            
            if(!isset($_COOKIE[$cookie_name])) {
              echo "Cookie named '" . $cookie_name . "' is not set!";
            } else {
              
              echo "<div class='alert alert-success alert-dismissible fade show ' style='margin-top:20px;'role='alert'>
              <h3>Cookie '" . $cookie_name . "' is set!<br></h3> <strong> Start time is: "  . $_COOKIE[$cookie_name] . "</strong>
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
              </button>
              </div>";
            }

            echo "<div class='alert alert-success alert-dismissible fade show ' style='margin-top:20px;'role='alert'>
            <h3>Hello $name ..!</h3> <strong> </string>You have logged in successfully.</storng>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
            </div>";      
          }
          else
          {
            $Message = urlencode("Invalid Credentials..Try Again");
            header('Location: /DA2/login.php?Message=".$Message');
            die;
          }

            
        }
    ?>



  <section id="about" class="about-mf sect-pt4 route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="box-shadow-full">
            <div class="row">
              <div class="col-md-6">

                <div class="row">

                  <div class="col-sm-6 col-md-5">
                    <div class="about-img">
                      <img src=./static/img/passport-pic.png class="img-fluid rounded b-shadow-a" alt="">
                    </div>
                  </div>

                  <div class="col-sm-6 col-md-7">
                    <div class="about-info">
                      <p><span class="title-s">Name: </span> <span>Lavansh Arora</span></p>
                      <p><span class="title-s">Profile: </span> <span>Engineering Student</span></p>
                      <p><span class="title-s">Email: </span> <span>aroralavit1810@gmail.com</span></p>
                      <p><span class="title-s">Phone: </span> <span>(+91) 9389709378</span></p>
                    </div>
                  </div>
                </div>

                

                <div class="skill-mf">

                  <p class="title-s">Skills</p>

                  
                    <span>HTML/CSS</span> <span class="pull-right">75%</span>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="85" aria-valuemin="0"
                        aria-valuemax="100"></div>
                    </div>
                  
                    <span>Java Core</span> <span class="pull-right">85%</span>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0"
                        aria-valuemax="100"></div>
                    </div>
                  
                    <span>C/C++</span> <span class="pull-right">75%</span>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="85" aria-valuemin="0"
                        aria-valuemax="100"></div>
                    </div>
                  
                    <span>Python</span> <span class="pull-right">70%</span>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 70%;" aria-valuenow="85" aria-valuemin="0"
                        aria-valuemax="100"></div>
                    </div>
                  
                    <span>PostgreSQL</span> <span class="pull-right">75%</span>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="85" aria-valuemin="0"
                        aria-valuemax="100"></div>
                    </div>
                  
                    <span>Database Management</span> <span class="pull-right">75%</span>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="85" aria-valuemin="0"
                        aria-valuemax="100"></div>
                    </div>
                  
                    <span>Git</span> <span class="pull-right">70%</span>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 70%;" aria-valuenow="85" aria-valuemin="0"
                        aria-valuemax="100"></div>
                    </div>
                  
                    <span>Postman</span> <span class="pull-right">75%</span>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="85" aria-valuemin="0"
                        aria-valuemax="100"></div>
                    </div>
                  

                </div>

                

              </div>

              <div class="col-md-6">

                <div class="about-me pt-4 pt-md-0" style="text-align: justify;;">
                  <div class="title-box-2">
                    <h5 class="title-left">
                      About me
                    </h5>
                  </div>
                  <p class="lead">
                    <p>Hello Everyone...!</p>

<p>I am an Undergraduate Student pursuing Bachelor of Technology in Computer Science from VIT. I am passionate about Problem Solving, Web Development.</p>
                  </p>
                  <p class="lead">
                    <p>I&#x27;m an organized and dependable candidate successful at managing multiple priorities with a positive attitude.</p>
                  </p>
                  <p class="lead">
                    <p>I always believe that balancing, extracurricular activities and work, enhances productivity and can promote holistic development.</p>
                  </p>
                </div>


                <div class="about-me pt-4 pt-md-0" style="text-align: justify;margin-top:40px;">

                  <div class="title-box-2">
                    <h5 class="title-left">
                      Interests &#38; Hobbies
                    </h5>
                  </div>

                  <div class="container">

                    <div class="row" >

                      

                        <div class="col-sm-4 mb-5 mt-2">
                          <div class="glass-btn">
                            <i class="fa fa-bicycle fa-3x" aria-hidden="true"></i>
                          </div>
                          <div class="glass-btn d-flex align-items-stretch" style="font-weight:bold;text-align: center;min-height: 60px;">
                            Cycling
                          </div>
                        </div>

                      

                        <div class="col-sm-4 mb-5 mt-2">
                          <div class="glass-btn">
                            <i class="fa fa-road fa-3x" aria-hidden="true"></i>
                          </div>
                          <div class="glass-btn d-flex align-items-stretch" style="font-weight:bold;text-align: center;min-height: 60px;">
                            Trekking
                          </div>
                        </div>

                      

                        <div class="col-sm-4 mb-5 mt-2">
                          <div class="glass-btn">
                            <i class="fa fa-suitcase fa-3x" aria-hidden="true"></i>
                          </div>
                          <div class="glass-btn d-flex align-items-stretch" style="font-weight:bold;text-align: center;min-height: 60px;">
                            Travelling
                          </div>
                        </div>

                      

                        <div class="col-sm-4 mb-5 mt-2">
                          <div class="glass-btn">
                            <i class="fa fa-lightbulb-o fa-3x" aria-hidden="true"></i>
                          </div>
                          <div class="glass-btn d-flex align-items-stretch" style="font-weight:bold;text-align: center;min-height: 60px;">
                            Problem Solving
                          </div>
                        </div>

                      

                        <div class="col-sm-4 mb-5 mt-2">
                          <div class="glass-btn">
                            <i class="fa fa-music fa-3x" aria-hidden="true"></i>
                          </div>
                          <div class="glass-btn d-flex align-items-stretch" style="font-weight:bold;text-align: center;min-height: 60px;">
                            Listening to Music
                          </div>
                        </div>

                      

                        <div class="col-sm-4 mb-5 mt-2">
                          <div class="glass-btn">
                            <i class="fa fa-internet-explorer fa-3x" aria-hidden="true"></i>
                          </div>
                          <div class="glass-btn d-flex align-items-stretch" style="font-weight:bold;text-align: center;min-height: 60px;">
                            Web Development
                          </div>
                        </div>

                      

                    </div>

                  </div>

                </div>


              </div>


            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--/ Section Services Star /-->
  <section id="education" class="services-mf route">

    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-box text-center">
            <h3 class="title-a">
              Education
            </h3>
            <p class="subtitle-a">
              &#x201C; An investment in knowledge pays the best interest. &#x201D; &nbsp; <br>
              <text style="font-weight:bold;margin-top:2px;">Benjamin Franklin</text>
            </p>
            <div class="line-mf"></div>
          </div>
        </div>
      </div>

      <div class="row d-flex">

        

            <div class="col-md-4 align-items-stretch">


              <div class="service-box scale">

                <div class="service-ico" style="text-align:center;min-height: 130px;">
                  <img src="static/media/360_F_393217240_zfkRyEmOdzBx5VuSm36iNT1Jz36oZmpP_UhuYpNZ.jpg"  style="border-radius: 40%; width:200px;">
                </div>

                <div class="service-content">

                  <h5 class="text-center m-4" style="min-height: 30px;">B.Tech  :  CSE</h5>
                  <h6 class="text-center m-4" style="min-height: 50px;">Vellore Institute of Technology, Chennai, India</h6>

                  <p class="s-description text-center">
                    08/2020 - Present
                  </p>

                  <p class="s-description text-center" style="min-height: 50px;">
                    <text style="font-weight:bold;">CGPA :- </text>9.16
                  </p>

                </div>

              </div>

            </div>

          

            <div class="col-md-4 align-items-stretch">


              <div class="service-box scale">

                <div class="service-ico" style="text-align:center;min-height: 130px;">
                  <img src="static/media/1537766606_qrOm2of.jpg"  style="border-radius: 40%; width:200px;">
                </div>

                <div class="service-content">

                  <h5 class="text-center m-4" style="min-height: 30px;">Higher Secondary</h5>
                  <h6 class="text-center m-4" style="min-height: 50px;">Delhi Public School, Moradabad, India</h6>

                  <p class="s-description text-center">
                    04/2019 - 05/2020
                  </p>

                  <p class="s-description text-center" style="min-height: 50px;">
                    <text style="font-weight:bold;">Percentage :- </text>98.6%
                  </p>

                </div>

              </div>

            </div>

          

            <div class="col-md-4 align-items-stretch">


              <div class="service-box scale">

                <div class="service-ico" style="text-align:center;min-height: 130px;">
                  <img src="static/media/1537766606_qrOm2of.jpg"  style="border-radius: 40%; width:200px;">
                </div>

                <div class="service-content">

                  <h5 class="text-center m-4" style="min-height: 30px;">High School</h5>
                  <h6 class="text-center m-4" style="min-height: 50px;">Delhi Public School, Moradabad, India</h6>

                  <p class="s-description text-center">
                    04/2017 - 05/2018
                  </p>

                  <p class="s-description text-center" style="min-height: 50px;">
                    <text style="font-weight:bold;">Percentage :- </text>96.6%
                  </p>

                </div>

              </div>

            </div>

          

    </div>

  </section>
  <!--/ Education Section Ends /-->

  <!--/ Section Blog Star /-->
  <section id="work" class="blog-mf sect-pt4 route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-box text-center">
            <h3 class="title-a">
              Work Experience
            </h3>
            <p class="subtitle-a">
              &#x201C; A mind that is stretched by new experiences can never go back to its old dimensions. &#x201D; &nbsp; <br>
              <text style="font-weight:bold;margin-top:2px;">Oliver Wendell Holmes</text>
            </p>
            <div class="line-mf"></div>
          </div>
        </div>
      </div>
      <div class="row d-flex justify-content-center">


          

              <div class="col-md-4 d-flex align-items-stretch">


                <div class="service-box scale">

                  <div class="service-ico" style="text-align:center;min-height: 120px;">
                    <img src="static/media/maxresdefault_XRf7EIf.jpg"  style="border-radius: 40%; width:200px;">
                  </div>

                  <div class="service-content">

                    <h5 class="text-center m-4" style="min-height: 30px;">Django Developer </h5>


                    <h6 class="text-center m-4"  style="min-height: 50px;">FUTURESTIC IT SERVICES AND IT CONSULTING</h6>

                    <p class="s-description text-center"  style="min-height: 30px;">
                      07/2022 - 08/2022
                    </p>

                    <p class="s-description text-center"  style="min-height: 50px;">
                      <text style="font-weight:bold;">Mr. Jaskirat Singh :- </text>jaskirat@futurestic.co.in
                    </p>

                    <p class="s-description text-center">
                      <a href="https://drive.google.com/file/d/1oJDdehZqR0ZOjSdKUxI7C-KoMa283wCG/view?usp=sharing" target="_blank" style="text-decoration: none;">&#128065;</a>
                    </p>

                  </div>

                </div>

              </div>

          

      </div>
    </div>
  </section>
  <!--/ Section Blog End /-->

   <!--/ Section Testimonials Star /-->
  <div class="testimonials paralax-mf bg-image" style="background-image: url(static/img/overlay-bg.jpg)">
    <div class="overlay-mf">
    <div class="container">
      <div class="row">
        <div class="col-md-12">

          <div id="testimonial-mf" class="owl-carousel owl-theme" >


            

              <div class="testimonial-box">
                <div class="author-test">

                  <span class="author" >Mr. Jaskirat Singh</span>


                    <h4>
                      <a class="author" target="_blank" href="https://www.linkedin.com/in/techsmartjsk/" style="text-decoration: none;font-size:15px;" >Founder &amp; CEO
Futurestic</a>
                    </h4>


                  <div style="text-align: center;" class="m-2 d-lg-block d-xl-block d-none ">
                    <img style="border-radius: 50%; width:60px; height:60px;" src="static/media/Screenshot_161.png" />
                  </div>

                </div>

                <div class="content-test">
                  <p class="description" style="font-weight:bold;" >
                    &#x201C;&nbsp;Lavansh worked on several projects. He successfully
met the objectives of the project. Lavansh is a hardworking, sincere and
enthusiastic individual.
I wish him well in his future endeavours. &nbsp;&#x201D;
                  </p>
                </div>



              </div>
            

          </div>
        </div>
      </div>
    </div>
  </div>
  </div>


  <!--/ Section Portfolio Star /-->
  <section id="projects" class="portfolio-mf sect-pt4 route">
    <div class="container">

      <div class="row">
        <div class="col-sm-12">
          <div class="title-box text-center">
            <h3 class="title-a">
              Projects
            </h3>
            <p class="subtitle-a">
              &#x201C; An ounce of practice is worth more than tons of preaching. &#x201D; &nbsp; <br>
              <text style="font-weight:bold;margin-top:2px;">Mahatma Gandhi</text>
            </p>
            <div class="line-mf"></div>
          </div>
        </div>
      </div>

      <div class="row">

        


          <div class="col-md-4 ">


                <div class="service-box scale">

                  <div class="service-ico" style="text-align:center;">
                    <img src="static/media/Things-weve-learned-from-building-selling-WordPress-plugins-1024x547_kjs2sk1.png"  style="border-radius: 40%; width:200px;">
                  </div>

                  <div class="service-content">

                    <h5 class="text-center m-4 " style="min-height: 50px;"><p>Hunt for Developers</p></h5>

                    <div class="text-justify m-4" style="min-height: 150px;"><p>A Django based project that allows the users to create their profile, update their profile, add projects, search for other developers and giving ratings and reviews for their projects.</p></div>

                  <div style="text-align:center;" class="m-4" style="min-height: 50px;">
                    <a href="https://github.com/Lavansh1810/huntfordev" ><i class="fa fa-github fa-2x" aria-hidden="true"></i></a>
                  </div>

                  </div>

                </div>

          </div>

        


          <div class="col-md-4 ">


                <div class="service-box scale">

                  <div class="service-ico" style="text-align:center;">
                    <img src="./static/media/Screenshot_163_3raS1pK.png"  style="border-radius: 40%; width:200px;">
                  </div>

                  <div class="service-content">

                    <h5 class="text-center m-4 " style="min-height: 50px;"><p>Integrated Hospital Management System (EHMS)</p></h5>

                    <div class="text-justify m-4" style="min-height: 150px;"><p>A Django projects that allows simple User Registration and Login with Django Authentication . Look for hospitals near them, number of beds available, and also allows them to book appointment with the hospitals.</p></div>

                  <div style="text-align:center;" class='m-4' style="min-height: 50px;">
                    <a href="https://github.com/Lavansh1810/ehms" ><i class="fa fa-github fa-2x" aria-hidden="true"></i></a>
                  </div>

                  </div>

                </div>

          </div>

        

      </div>

    </div>
  </section>
  <!--/ Section Portfolio End /-->





  <!--/ Section Contact-Footer Star /-->
  <section class="paralax-mf footer-paralax bg-image sect-mt4 route" style="background-image: url(static/img/overlay-bg.jpg)">
    <div class="overlay-mf"></div>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="contact-mf">
            <div id="contact" class="box-shadow-full">


              <div class="row">

                




                <div class="col-md-6">
                  <div class="title-box-2">
                    <h5 class="title-left">
                      Send Message
                    </h5>
                  </div>
                  <div>



                      <form action="#contact" class="contactForm">

                        
                        <div style="display:none;" id="message_success">

                            <div class="alert alert-success alert-dismissible fade show"  role="alert">
                            <p style="text-align:center;">Message sent successfully.</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>

                        </div>

                        <div class="row" style="display:block;" id="contact_form">

                            <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <input type="text" name="name" value="" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                <div class="validation"></div>
                            </div>
                            </div>
                            <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                <div class="validation"></div>
                            </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                <div class="validation"></div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" id="message" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                                <div class="validation"></div>
                            </div>
                            </div>
                            <div class="col-md-12">


                            <button onclick="myFunction()" class="button button-a button-big button-rouded" >Send Message</button>
                            </div>
                        </div>
                    </form>

                  </div>
                </div>

                <div class="col-md-6">
                  <div class="title-box-2 pt-4 pt-md-0">
                    <h5 class="title-left">
                      Get in Touch
                    </h5>
                  </div>
                  <div class="more-info">
                    <p class="lead">
                      <div class="google-maps">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3493.2782174577515!2d78.46764201423285!3d28.89007947913027!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390b0932f4708ec9%3A0xf313ed67a318a9db!2sSri%20Ramasheeshpuram!5e0!3m2!1sen!2sin!4v1660858165449!5m2!1sen!2sin" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                      </div>
                    </p>
                    <ul class="list-ico">

                      <li><span class="ion-ios-telephone"></span> (+91) 9389709378</li>
                      <li><span class="ion-email"></span> aroralavit1810@gmail.com</li>
                    </ul>
                  </div>
                  <div class="socials">
                    <ul>

                      <li><a href="https://www.facebook.com/lavit.arora"><span class="ico-circle"><i class="fa fa-facebook m-2" aria-hidden="true"></i></span></a></li>
                      <li><a href="https://www.instagram.com/aroralavit/"><span class="ico-circle"><i class="fa fa-instagram m-2" aria-hidden="true"></i></span></a></li>
                      <li><a href="https://twitter.com/LavanshArora"><span class="ico-circle"><i class="fa fa-twitter m-2" aria-hidden="true"></i></i></span></a></li>
                      <li><a href="https://github.com/Lavansh1810/"><span class="ico-circle"><i class="fa fa-github m-2" aria-hidden="true"></i></i></span></a></li>

                    </ul>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="copyright-box">
              <p class="copyright">&copy; Copyright <strong>Lavansh@2022</strong>. All Rights Reserved</p>
              <div class="credits">
                <!--
                  All the links in the footer should remain intact.
                  You can delete the links only if you purchased the pro version.
                  Licensing information: https://bootstrapmade.com/license/
                  Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=DevFolio
                -->
                Designed by <a href="">Lavansh</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </section>
  <!--/ Section Contact-footer End /-->

  <a href="#home" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  
  <!-- JavaScript Libraries -->
  <script src="static/lib/jquery/jquery.min.js"></script>
  <script src="static/lib/jquery/jquery-migrate.min.js"></script>
  <script src="static/lib/popper/popper.min.js"></script>
  <script src="static/lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="static/lib/easing/easing.min.js"></script>
  <script src="static/lib/counterup/jquery.waypoints.min.js"></script>
  <script src="static/lib/counterup/jquery.counterup.js"></script>
  <script src="static/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="static/lib/lightbox/js/lightbox.min.js"></script>
  <script src="static/lib/typed/typed.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="static/contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="static/js/main.js"></script>

  <script>
    function myFunction() {
      document.getElementById("contact_form").style.display = "none";
      document.getElementById("message_success").style.display = "block";
    }
</script>





        <script src=./static/lib/jquery/jquery.min.js></script>
        <script src=./static/lib/jquery/jquery-migrate.min.js></script>
        <script src=./static/lib/popper/popper.min.js></script>
        <script src=./static/lib/bootstrap/js/bootstrap.min.js></script>
        <script src=./static/lib/easing/easing.min.js></script>
        <script src=./static/lib/counterup/jquery.waypoints.min.js></script>
        <script src=./static/lib/counterup/jquery.counterup.js></script>
        <script src=./static/lib/owlcarousel/owl.carousel.min.js></script>
        <script src=./static/lib/lightbox/js/lightbox.min.js></script>
        <script src=./static/lib/typed/typed.min.js></script>
        <!-- Contact Form JavaScript File -->
        <script src="./static/contactform/contactform.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>


        <!-- Template Main Javascript File -->
        <script src="./static/js/main.js"></script>
    </body>
</html>