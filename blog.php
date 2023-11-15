<?php
// Include the database configuration and establish a database connection
include('admin/includes/database.php');

// Fetch blog data from the database
// Fetch up to three most recent blog posts
$sql = "SELECT * FROM blog ORDER BY created_at DESC ";
$result = $connect->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Bell Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
    <meta property="og:title" content="">
    <meta property="og:image" content="">
    <meta property="og:url" content="">
    <meta property="og:site_name" content="">
    <meta property="og:description" content="">

    <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="">
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700|Roboto:400,900" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800' rel='stylesheet'>

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Bell
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/bell-free-bootstrap-4-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center">

            <div id="logo" class="me-auto">
                <a href="index.html"><img src="assets/img/logo-nav.png" alt=""></a>
                <!-- Uncomment below if you prefer to use a text image -->
                <!--<h1><a href="#hero">Bell</a></h1>-->
            </div>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto " href="index.html">Home</a></li>
                    <li><a class="nav-link scrollto" href="about.html">About</a></li>
                    <li><a class="nav-link scrollto" href="Services.html">Services</a></li>
                    <li><a class="nav-link scrollto active" href="#">Blog</a></li>
                    <!-- <li><a class="nav-link scrollto" href="#team">Team</a></li> -->
                    <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> -->
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            <div class="header-social-links d-flex align-items-center">
                <a href="#" class="twitter"><i class="fa-brands fa-x-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
            </div>
        </div>
    </header><!-- End Header -->


    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Blog</h2>
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li>Blog</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->

    </main><!-- End #main -->


    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->


    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <!-- Blog list Start -->
                <div class="col-lg-8">
                    <div class="row g-5">
                        <?php while ($row = $result->fetch_assoc()) : ?>
                            <div class="col-md-6 wow slideInUp" data-wow-delay="0.1s">
                                <div class="blog-item bg-light rounded overflow-hidden">
                                    <div class="blog-img position-relative overflow-hidden">
                                        <img class="img-fluid" src="<?php echo $row['title']; ?>" alt="">
                                        <a class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4" href="blog-details.php?blog_id=<?php echo $row['blog_id']; ?>">Web Design</a>
                                    </div>
                                    <div class="p-4">
                                        <div class="d-flex mb-3">
                                            <small class="me-3"><i class="far fa-user text-primary me-2"></i><?php echo $row['author_name']; ?></small>
                                            <small><i class="far fa-calendar-alt text-primary me-2"></i><?php $formattedDate = date('d-m-Y', strtotime($row["publish_date"]));
                                                                                                        echo $formattedDate;
                                                                                                        ?></small>
                                        </div>
                                        <h4 class="mb-3"><?php echo $row['title']; ?></h4>
                                        <!-- <p>Dolor et eos labore stet justo sed est sed sed sed dolor stet amet</p> -->
                                        <a class="text-uppercase" href="blog-details.php?blog_id=<?php echo $row['blog_id']; ?>">Read More <i class="bi bi-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div><?php endwhile; ?>


                        <div class="col-12 wow slideInUp" data-wow-delay="0.1s">

                        </div>
                    </div>
                </div>
                <!-- Blog list End -->

                <!-- Sidebar Start -->
                <div class="col-lg-4">


                   
                  
                    <!-- Recent Post End -->

                             <!-- Recent Post Start -->
                             <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Recent Post</h3>
                        </div>
                        <?php
                  // Query to fetch the most recent 6 blog posts
                  $sqlRecentPosts = "SELECT * FROM blog ORDER BY created_at DESC LIMIT 6";
                  $resultRecentPosts = $connect->query($sqlRecentPosts);

                  // Loop through the recent posts and display them
                  while ($rowRecent = $resultRecentPosts->fetch_assoc()): ?>
                        <div class="d-flex rounded overflow-hidden mb-3">
                            <img class="img-fluid" src="<?php echo $rowRecent['cover_image']; ?>" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                            <a href="blog-details.php?blog_id=<?php echo $rowRecent['blog_id']; ?>" class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0"> <?php echo $rowRecent['title']; ?>
                            </a>
                        </div>
                        <?php endwhile; ?>
                        
                    
                    </div>
                    <!-- Recent Post End -->




                </div>
                <!-- Sidebar End -->
            </div>
        </div>
    </div>
    <!-- Blog End -->



    <?php
    // Close the database connection
    $connect->close();
    ?>


<footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-6">
                        <div class="footer-info">
                            <h3>DaCentric Technologies</h3>
                            <p class="pb-3"><em>We are specialized in providing solution for IT & ELV Systems.</em></p>
                            <!-- <div class="row">

                                <div class="col-md-6" style="padding-left: 50px;">
                                    <address style="padding-top: 20px;">India</address>
                                </div>
                                <div class="col-md-6" style="padding-right: 50px;">
                                    <address>Mas Tower, <br>Attakulangara, Thiruvananthapuram</address>
                                </div>
                            </div>


                            <div class="row">

                                <div class="col-md-6" style="padding-left: 50px;">
                                    <address style="padding-top: 20px;">UAE</address>
                                </div>
                                <div class="col-md-6" style="padding-right: 50px;">
                                    <address>Office:702-20, Mai Tower, Al Nahda-1,

                                        Al Qusais, Dubai, UAE</address>
                                </div>
                            </div> -->


                            <div class="row">
                                <!-- India Address -->
                                <div class="col-md-6 col-sm-12" style="padding-left: 20px; padding-right: 20px;">
                                  <address style="padding-top: 20px;">India</address>
                                </div>
                                <!-- Mas Tower Address -->
                                <div class="col-md-6 col-sm-12" style="padding-left: 20px; padding-right: 20px;">
                                  <address style="text-align: left;">Mas Tower, <br>Attakulangara, Thiruvananthapuram</address>
                                </div>
                              </div>
                              
                              <div class="row">
                                <!-- UAE Address -->
                                <div class="col-md-6 col-sm-12" style="padding-left: 20px; padding-right: 20px;">
                                  <address style="padding-top: 20px;">UAE</address>
                                </div>
                                <!-- Dubai Address -->
                                <div class="col-md-6 col-sm-12" style="padding-left: 20px; padding-right: 20px;">
                                  <address style="text-align: left;">Office:702-20, Mai Tower, Al Nahda-1, Al Qusais, Dubai, UAE</address>
                                </div>
                              </div>

                            <p>
                                <strong>Email:</strong> tse@dacentrictechnologies.com<br>
                            </p>
                            <div class="social-links mt-3">
                                <a href="https://x.com/dacentric?s=20" class="twitter"><i
                                        class="fa-brands fa-x-twitter"></i></a>
                                <a href="https://www.facebook.com/DaCentric" class="facebook"><i
                                        class="bx bxl-facebook"></i></a>
                                <a href="https://instagram.com/dacentrictechnologies?igshid=MTlnbmdhanJhMzhoYQ=="
                                    class="instagram"><i class="bx bxl-instagram"></i></a>
                                <!-- <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a> -->
                                <a href="https://www.linkedin.com/company/dacentric-technologies/" class="linkedin"><i
                                        class="bx bxl-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="index.html">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="about.html">About us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="services.html">Services</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="blog.html">Blog</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#contact">Contact</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="services.html">Artificial Intelligence</a>
                            </li>
                            <li><i class="bx bx-chevron-right"></i> <a href="services.html">IT and Networking</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="services.html">Data Center infrastructure
                                    management</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="services.html">Intercom System</a></li>
                            <!-- <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li> -->
                        </ul>
                    </div>

                    <!-- <div class="col-lg-4 col-md-6 footer-newsletter">


                        
            
                    </div> -->

                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <div class="row">
                            
                            <div class="col-lg-12">
                                <p style="text-align: center; font-size: 20px;">India</p>
                                <!-- Content for the first row goes here -->
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3946.211704623293!2d76.94489467479714!3d8.478784697359364!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b05bbab3adce1c3%3A0xdc1b33b9ab0e92fd!2sDaCentric%20Technologies!5e0!3m2!1sen!2sin!4v1700048357679!5m2!1sen!2sin" width="100%" height="175" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <p style="text-align: center; font-size: 20px;">UAE</p>
                                <!-- Content for the second row goes here -->
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d28859.983693419534!2d55.3572806!3d25.2874685!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f5dc8bf44b213%3A0x2b359e754483f519!2sQplus%20Technical%20Service%20LLC!5e0!3m2!1sen!2sin!4v1700029795698!5m2!1sen!2sin" width="100%" height="175" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                    

                    

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>DaCentric Technologies</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/multi-responsive-bootstrap-template/ -->
                <!-- Designed by <a href="https://dacentrictechnologies.com">DaCentric Technologies</a> -->
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>