<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Book Management System</title>
  <meta content="A system for managing books, inventory, and library resources efficiently." name="description">
  <meta content="books, library, management, system, inventory" name="keywords">

 <!-- Favicons -->
  <link href="assets/img/b.jpg" rel="icon">
 

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <style>
    /* Custom styles for the search button */
    .search-button {
      background-color: #007bff;
      color: #fff;
      border-radius: 5px;
      padding: 10px 15px;
      transition: background-color 0.3s, transform 0.3s;
      border: none;
    }
    
    .search-button:hover {
      background-color: #0056b3;
      transform: scale(1.1); /* Slight zoom effect */
    }

    .search-button i {
      margin-right: 8px; /* Add spacing between the icon and the text */
    }

    /* Custom styles for the search input group */
    .search-bar .input-group {
      max-width: 400px;
      width: 100%;
    }

    .search-bar input {
      border-radius: 5px 0 0 5px; /* Rounded left corners */
    }

    .search-bar button {
      border-radius: 0 5px 5px 0; /* Rounded right corners */
    }
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <!-- Logo and Toggle -->
    <div class="d-flex align-items-center justify-content-between">
      <a href="dashboard.php" class="logo d-flex align-items-center">
        <img src="assets/img/g.jpg" alt="Book Logo">
        <span class="d-none d-lg-block">Book Management System</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <!-- Search Bar -->
    <div class="search-bar ms-3">
      <!-- Search Form -->
      <form method="GET" action="" class="mb-3">
        <div class="input-group">
          <input type="text" name="search" class="form-control" placeholder="Search..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
          <button type="submit" class="search-button">
            <i class="bi bi-search"></i>Search
          </button>
        </div>
      </form>
    </div><!-- End Search Bar -->

    <!-- Navigation Icon -->
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <!-- Search Icon for Mobile -->
        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle" href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon -->

        <!-- Notifications Dropdown -->
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-danger badge-number">2</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 2 new notifications
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item" href="#">
                <i class="bi bi-book"></i> New book added to the library.
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="#">
                <i class="bi bi-calendar-check"></i> Library event: Book Fair this weekend.
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">View all notifications</a>
            </li>
          </ul>
        </li><!-- End Notifications Dropdown -->

        <!-- Profile Dropdown -->
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/m.png" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Librarian</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Librarian</h6>
              <span>Library Administrator</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>
          </ul>
        </li><!-- End Profile Dropdown -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- Rest of the page content here -->

</body>
</html>
