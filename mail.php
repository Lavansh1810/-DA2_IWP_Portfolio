<html>
    <head>
        <meta charset="utf-8">
        <title>Send Mail with Attachment</title>
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
        
        <?php

            if(isset($_POST['button']) && isset($_FILES['attachment']))
            {
                $from_email		 = 'lavansh@abc.com'; 
                $recipient_email = 'recipient@xyz.com'; 
                
                
                $sender_name = $_POST["sender_name"]; 
                $reply_to_email = $_POST["sender_email"]; 
                $subject	 = $_POST["subject"]; 
                $message	 = $_POST["message"]; 

                
                $tmp_name = $_FILES['attachment']['tmp_name']; 
                $name	 = $_FILES['attachment']['name']; 
                $size	 = $_FILES['attachment']['size']; 
                $type	 = $_FILES['attachment']['type']; 
                $error	 = $_FILES['attachment']['error']; 

                
                if($error > 0)
                {
                    die('Upload error or No files uploaded');
                }

                
                $handle = fopen($tmp_name, "r"); 
                $content = fread($handle, $size); 
                fclose($handle);				 

                $encoded_content = chunk_split(base64_encode($content));
                $boundary = md5("random"); 

                //header
                $headers = "MIME-Version: 1.0\r\n"; 
                $headers .= "From:".$from_email."\r\n"; 
                $headers .= "Reply-To: ".$reply_to_email."\r\n";
                $headers .= "Content-Type: multipart/mixed;"; 
                $headers .= "boundary = $boundary\r\n";
                    
                
                $body = "--$boundary\r\n";
                $body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
                $body .= "Content-Transfer-Encoding: base64\r\n\r\n";
                $body .= chunk_split(base64_encode($message));
                    
                
                $body .= "--$boundary\r\n";
                $body .="Content-Type: $type; name=".$name."\r\n";
                $body .="Content-Disposition: attachment; filename=".$name."\r\n";
                $body .="Content-Transfer-Encoding: base64\r\n";
                $body .="X-Attachment-Id: ".rand(1000, 99999)."\r\n\r\n";
                $body .= $encoded_content; 
                
                $sentMailResult = mail($recipient_email, $subject, $body, $headers);

                if($sentMailResult )
                {
                echo "<h3>File Sent Successfully.<h3>";
                }
                else
                {
                die("Sorry but the email could not be sent.
                                Please go back and try again!");
                }
            }
        ?>

        <nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
            <div class="container">
            <a class="navbar-brand js-scroll" href="index.php">&nbsp;Lavansh Arora</a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
                aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link ml-2" href="index.php">Home</a>
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

        


        

        <!--/ Section Contact-Footer Star /-->
        <section class="paralax-mf footer-paralax bg-image route" style="background-image: url(static/img/overlay-bg.jpg)">
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
                                Send Mail with Attachment
                            </h5>
                        </div>
                        <div>



                        <div style="display:flex; justify-content: center; margin-top:10%;">
                            <form enctype="multipart/form-data" method="POST" action="" style="width: 500px;">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="sender_name" placeholder="Your Name" required/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="email" name="sender_email" placeholder="Recipient's Email Address" required/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="subject" placeholder="Subject"/>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="message" placeholder="Message"></textarea>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="file" name="attachment" placeholder="Attachment" required/>
                                </div>
                                <div class="form-group">
                                    <input class="button button-a button-big button-rouded" type="submit" name="button" value="Submit" />
                                </div>           
                            </form>
                        </div>

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

        <script>

            function validateform(){
                console.log("Hello");
                var name=document.myForm.username.value;
                var password=document.myForm.password.value;

                if (name==null || name==""){
                    alert("Name can't be blank");
                    return false;
                }
                else if(password==null || password==""){
                    alert("Password can't be blank");
                    return false;
                }
                else if (name.localeCompare("admin")!=0){
                    alert("Invalid Admin Credentials");
                    return false;
                }
                else if(password.localeCompare("admin@123")!=0){
                    alert("Invalid Admin Credentials");
                    return false;
                }

            }

        
            function myReset(){

                document.myForm.username.value = "";
                document.myForm.password.value = "";


            }

        </script>
    </body>
</html>
