<?php
  session_start();
 ?>
<html lang="en">
  <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous"
      />
      <link rel="stylesheet" href="assets/index.css" />
      <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico" />
      <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"
      ></script>

      <title>Laptop's Heaven Homepage</title>
    </head>
    <body>
      <nav
        class="navbar navbar-expand-lg navbar-light"
        style="background-color: #e3f2fd"
      >
        <div class="container-fluid">
          <img
            src="assets/images/icons8-bbb-100.png"
            alt="logo"
            height="60"
            width="60"
            style="margin-right: 10px"
          />

          <a class="navbar-brand" href="#">Laptop's Heaven</a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="?page=home">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Sales</a>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="?page=products"
                  id="navbarDropdown"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  Products
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Apple</a></li>
                  <li><a class="dropdown-item" href="#">HP</a></li>
                </ul>
              </li>
            </ul>
            <form class="d-flex">
              <input
                class="form-control me-2"
                type="search"
                placeholder="Search"
                aria-label="Search"
              />
              <?php if(!isset($_SESSION["email"])) { ?>
              <button class="btn btn-outline-success" type="submit">
                <a href="?page=register" class="none-active-link">Register</a> 
              </button>
              <button class="btn btn-outline-secondary ms-3"><a href="?page=login" class="none-active-link">Login</a> </button>
              <?php } else { ?>
                <span class="navbar-text text-nowrap">
                  Welcome <?php
                  $prefix = substr($_SESSION["email"], 0, strrpos($_SESSION["email"], '@'));
                  echo $prefix;
                  ?>
                </span>
              <button class="btn btn-outline-secondary ms-3"><a href="authentication/logout.php" class="none-active-link">Logout</a> </button>
                <?php } ?>
            </form>
          </div>
        </div>
      </nav>
      