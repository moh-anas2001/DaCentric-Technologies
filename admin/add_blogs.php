<?php
session_start();

// Check if the user is not authenticated (not logged in)
if (!isset($_SESSION['id'])) {
    header('Location: index.php');
    exit();
}

// Include the database configuration
require_once('includes/database.php');

// Fetch user data from the users table
$userID = $_SESSION['id']; // Assuming you store the user ID in the session
$sqlFetchUserData = "SELECT username, profile_image FROM users WHERE id = ?";
$stmtFetchUserData = $connect->prepare($sqlFetchUserData);
$stmtFetchUserData->bind_param("i", $userID);
$stmtFetchUserData->execute();
$stmtFetchUserData->bind_result($authorNameFromUserTable, $authorImageFromUserTable);
$stmtFetchUserData->fetch();
$stmtFetchUserData->close();

// Create new variables for author name and image from the user table
$authorName = $authorNameFromUserTable;
$authorImage = $authorImageFromUserTable;

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the submitted token matches the stored token
    if ($_POST['token'] === $_SESSION['token']) {
        // Token is valid, now check for duplicates
        $blogTitle = $_POST["title"];
        $publishDate = $_POST["publish_date"];
        $content = $_POST["content"];
        $topic = $_POST["topic"];

        // Upload and handle blog images
        $blogImageDir = "../assets/img/blog/"; // Directory to store blog images
        $blogImagePaths = []; // Array to store image paths

        foreach ($_FILES["images"]["tmp_name"] as $key => $tmp_name) {
            $blogImage = $_FILES["images"]["name"][$key];
            $blogImagePath = $blogImageDir . basename($blogImage);

            if (move_uploaded_file($_FILES["images"]["tmp_name"][$key], $blogImagePath)) {
                // Image uploaded successfully, add its path to the array
                $blogImagePaths[] = $blogImagePath;
            } else {
                echo "";
                // Handle the error as needed
            }
        }

        // Upload and handle cover image
        $coverImageDir = "../assets/img/blog/"; // Directory to store cover images
        $coverImage = $_FILES["cover_image"]["name"];
        $coverImagePath = $coverImageDir . basename($coverImage);

        if (isset($_FILES["cover_image"]) && $_FILES["cover_image"]["error"] == 0) {
            if (move_uploaded_file($_FILES["cover_image"]["tmp_name"], $coverImagePath)) {
                // Cover image uploaded successfully
            } else {
                echo '<script>alert("Error uploading cover image!");</script>';
                // Handle the error as needed
            }
        } else {
            echo '<script>alert("No file uploaded or an error occurred.");</script>';
        }

        // Insert data into the blog table with author_id
        $sql = "INSERT INTO blog (title, author_id, author_name, publish_date, content, author_image, cover_image) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param("iisssss", $blogTitle, $userID, $authorName, $publishDate, $content, $authorImage, $coverImagePath);

        if ($stmt->execute()) {
            // Data inserted successfully
            $blog_id = $stmt->insert_id; // Get the ID of the inserted blog post
            $stmt->close();

            // Insert blog image paths into the blog_images table
            foreach ($blogImagePaths as $imagePath) {
                $sql = "INSERT INTO blog_images (blog_id, image_path) VALUES (?, ?)";
                $stmt = $connect->prepare($sql);
                $stmt->bind_param("is", $blog_id, $imagePath);
                $stmt->execute();
                $stmt->close();
            }

            echo '<script>alert("Blog post added successfully!");</script>';
        } else {
            // Error inserting data
            echo '<script>alert("Error adding blog post: ' . $stmt->error . '");</script>';
        }
    } else {
        // Token mismatch
        echo '<script>alert("Duplicate Upload Detected!");</script>';
    }
}

// Generate a new token when the form is initially loaded.
$_SESSION['token'] = md5(uniqid(rand(), true));
?>




<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords">
    <title>Manage Projects Section</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">

</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="add_blogs.php">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!-- Dark Logo icon -->
                            <img src="plugins/images/logo-icon.png" alt="homepage" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="plugins/images/logo-text.png" alt="homepage" />
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav d-none d-md-block d-lg-none">
                        <li class="nav-item">
                            <a class="nav-toggler nav-link waves-effect waves-light text-white"
                                href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav ms-auto d-flex align-items-center">

                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class=" in">
                            <form role="search" class="app-search d-none d-md-block me-3">
                                <input type="text" placeholder="Search..." class="form-control mt-0">
                                <a href="" class="active">
                                    <i class="fa fa-search"></i>
                                </a>
                            </form>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="dropdown">
                            <a class="profile-pic" href="#">
                                <?php
                                // Include the database configuration
                                require_once('includes/database.php');

                                // Assuming you have a session variable for the logged-in user ID
                                $userID = $_SESSION['id'];

                                // Fetch user data from the users table based on the user ID
                                $sqlFetchUserData = "SELECT username, profile_image FROM users WHERE id = ?";
                                $stmtFetchUserData = $connect->prepare($sqlFetchUserData);
                                $stmtFetchUserData->bind_param("i", $userID);
                                $stmtFetchUserData->execute();
                                $stmtFetchUserData->bind_result($username, $profile_image);
                                $stmtFetchUserData->fetch();
                                $stmtFetchUserData->close();

                                // Display the user's profile image and username
                                echo '<img src="' . $profile_image . '" alt="user-img" width="36" class="img-circle">';
                                echo '<span class="text-white font-medium">' . $username . '</span>';
                                ?>
                            </a>


                            <div class="dropdown-content">
                                <a href="add_blogs.php">Add Blogs</a>
                                <a href="404.php">Edit Blogs</a>
                                <a href="Logout.php">Logout</a>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <!-- <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="basic-table.php"
                                aria-expanded="false">
                                <i class="fa fa-table" aria-hidden="true"></i>
                                <span class="hide-menu">Basic Table</span>
                            </a>
                        </li> -->

                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="add_blogs.php"
                                aria-expanded="false">
                                <i class="fas fa-upload" aria-hidden="true"></i>
                                <span class="hide-menu">Add Blogs</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="blog_edit.php"
                                aria-expanded="false">
                                <i class="fas fa-edit" aria-hidden="true"></i>
                                <span class="hide-menu">Edit Blogs</span>
                            </a>
                        </li>

                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Add Blogs</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <!-- <ol class="breadcrumb ms-auto">
                                <li><a href="#" class="fw-normal"></a></li>
                            </ol> -->
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post"
                                enctype="multipart/form-data" class="form-horizontal form-material">
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Blog Title</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" name="title" placeholder="Enter Blog Title" required
                                            class="form-control p-0 border-0">
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Publish Date</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="date" name="publish_date" required
                                            class="form-control p-0 border-0">
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Cover Image</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="file" name="cover_image" accept="image/*" required
                                            class="form-control p-0 border-0">

                                        <small class="text-muted">**Image to appear on the cover of the blog</small>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Blog Description</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <textarea id="content" rows="5" class="form-control p-0 border-0" name="content"
                                            placeholder="Enter Blog Description"></textarea>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-sm-12">Select Topic</label>

                                    <div class="col-sm-12 border-bottom">
                                        <select name="topic" class="form-select shadow-none p-0 border-0 form-control-line">
                                            <option>Web development</option>
                                            <option>Mobile App Development</option>
                                            <option>Digital Marketing</option>
                                            <option>Graphic Design</option>
                                            <option>Data Science</option>
                                            <option>Artificial Intelligence</option>
                                            <option>Cybersecurity</option>
                                            <option>UI/UX Design</option>
                                            <option>E-commerce</option>
                                            <option>Cloud Computing</option>
                                            <option>Blockchain</option>
                                            <option>Others</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success">Upload and Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>




            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right sidebar -->
            <!-- ============================================================== -->
            <!-- .right-sidebar -->
            <!-- ============================================================== -->
            <!-- End Right sidebar -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center"> 2020 © Qplus Technical Service LLC - <a
                href="https://www.qplus-ts.com">www.qplus-ts.com</a>
        </footer>

        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- All Jquery -->

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const readMoreLinks = document.querySelectorAll(".read-more-link");

            readMoreLinks.forEach(function (link) {
                link.addEventListener("click", function () {
                    const description = this.getAttribute("data-description");
                    alert(description); // You can replace this with code to display the full description in a modal or expand the table row.
                });
            });
        });
    </script>



    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>
    <script src="js/tinymce/js/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: '#content'
        })
    </script>


</body>

</html>