<?php
// Include the database configuration and establish a database connection
include('admin/includes/database.php');

// Check if the blog_id is provided in the URL
if (isset($_GET['blog_id'])) {
  $blogId = $_GET['blog_id'];

  // Fetch the blog post details based on blog_id
  $sql = "SELECT * FROM blog WHERE blog_id = ?";
  $stmt = $connect->prepare($sql);
  $stmt->bind_param("i", $blogId);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows === 1) {
    // Fetch the blog post data
    $row = $result->fetch_assoc();

    // Fetch additional images associated with the blog post from blog_images table
    $sqlImages = "SELECT image_path FROM blog_images WHERE blog_id = ?";
    $stmtImages = $connect->prepare($sqlImages);
    $stmtImages->bind_param("i", $blogId);
    $stmtImages->execute();
    $resultImages = $stmtImages->get_result();

    $additionalImages = [];
    while ($imageRow = $resultImages->fetch_assoc()) {
      $additionalImages[] = $imageRow['image_path'];
    }
  } else {
    // Handle the case where the blog post with the provided ID is not found
    echo "Blog post not found.";
    exit;
  }
} else {
  // Handle the case where the blog_id is not provided in the URL
  echo "Invalid blog post URL.";
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>DaCentric Technologies</title>
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
          <li><a class="nav-link scrollto" href="index.html#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <div class="header-social-links d-flex align-items-center">
        <a href="https://x.com/dacentric?s=20" class="twitter"><i class="fa-brands fa-x-twitter"></i></a>
        <a href="https://www.facebook.com/DaCentric" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="https://instagram.com/dacentrictechnologies?igshid=MTlnbmdhanJhMzhoYQ==" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="https://www.linkedin.com/company/dacentric-technologies/" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </header><!-- End Header -->

  
  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Blog details</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Blog Details</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

   

  </main><!-- End #main -->



       <!-- Blog Start -->
       <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-8">
                    <!-- Blog Detail Start -->
                    <div class="mb-5">
                        <img class="img-fluid w-100 rounded mb-5" src="<?php echo $row['cover_image']; ?>" alt="">
                        <h1 class="mb-4"><?php echo $row['title']; ?></h1>
                        <p><?php echo $row['content']; ?></p>
                    </div>
                    <!-- Blog Detail End -->
    
               
          
                </div>
    
                <!-- Sidebar Start -->
                <div class="col-lg-4">
                
    
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
    
    
                    <!-- Image Start -->
                    <!-- <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <img src="assets/img/about1.png" alt="" class="img-fluid rounded">
                    </div> -->
                    <!-- Image End -->
    
                  
    
                    
                    
                </div>
                <!-- Sidebar End -->
            </div>
        </div>
    </div>
    <!-- Blog End -->



    


  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3>DaCentric Technologies</h3>
              <p class="pb-3"><em>We are specialized in providing solution for  IT & ELV Systems.</em></p>
              <p>
                Mas Tower,<br>
                Attakulangara, Thiruvananthapuram<br><br>
                <!-- <strong>Phone:</strong> +1 5589 55488 55<br> -->
                <strong>Email:</strong> tse@dacentrictechnologies.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="https://x.com/dacentric?s=20" class="twitter"><i class="fa-brands fa-x-twitter"></i></a>
                <a href="https://www.facebook.com/DaCentric" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="https://instagram.com/dacentrictechnologies?igshid=MTlnbmdhanJhMzhoYQ==" class="instagram"><i class="bx bxl-instagram"></i></a>
                <!-- <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a> -->
                <a href="https://www.linkedin.com/company/dacentric-technologies/" class="linkedin"><i class="bx bxl-linkedin"></i></a>
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
              <li><i class="bx bx-chevron-right"></i> <a href="services.html">Artificial Intelligence</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="services.html">IT and Networking</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="services.html">Data Center Monitoring System</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="services.html">Intercom System</a></li>
              <!-- <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li> -->
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <!-- <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p> -->
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

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
        Designed by <a href="https://dacentrictechnologies.com">DaCentric Technologies</a>
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