<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  $loggedin = true;
} else {
  $loggedin = false;
}
echo '
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/forums/">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/forums/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="#">Contact us</a>
        </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Categories
        </a>
        <ul class="dropdown-menu dropdown-menu-dark">
        <button class="btn btn-primary btn-sm w-100" data-bs-toggle="modal" data-bs-target="#addcategoryModal">Add Category</button>
        <li><a class="dropdown-item" href="#">Another action</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Something else here</a></li>
        </ul>
        </li>
        </ul>
        ';
if ($loggedin) {
  echo '
      <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-success" type="submit">Search</button>
      <button class="btn ms-2 btn-outline-danger" data-bs-toggle="modal" type="button" data-bs-target="#logoutModal">Logout</button>
    </form>
    ';
}
if (!$loggedin) {

  echo '

      <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-success" type="submit">Search</button>
      <button class="btn ms-2 btn-outline-primary" data-bs-toggle="modal" type="button" data-bs-target="#loginModal">login</button>
      <button class="btn ms-2 btn-outline-primary" data-bs-toggle="modal" type="button" data-bs-target="#signupModal" >Signup</button>
      </form>
      ';
}
echo '
    </div>
  </div>
</nav>
';

$myalert = false;
$myerror = false;


if (isset($_SESSION['logout_success']) && $_SESSION['logout_success']) {
  $myalert = true;
  $myalert = "logged out successfully ";
  include("partials/alerterror.php");
  unset($_SESSION['logout_success']); // Unset the session variable after showing the alert
}
if (isset($_SESSION['signup_success']) && $_SESSION['signup_success']) {
  $myalert = true;
  $myalert = "Signup successful ";
  include("partials/alerterror.php");
  unset($_SESSION['signup_success']); // Unset the session variable after showing the alert
}
if (isset($_SESSION['signup_repeat']) && $_SESSION['signup_repeat']) {
  $myerror = true;
  $myerror = "User already exist";
  include("partials/alerterror.php");
  unset($_SESSION['signup_success']); // Unset the session variable after showing the alert
}
if (isset($_SESSION['signup_notmatch']) && $_SESSION['signup_notmatch']) {
  $myerror = true;
  $myerror = "Password do not match";
  include("partials/alerterror.php");
  unset($_SESSION['signup_success']); // Unset the session variable after showing the alert
}
if (isset($_SESSION['login_success']) && $_SESSION['login_success']) {
  $myalert = true;
  $myalert = "Logged in successful ";
  include("partials/alerterror.php");
  unset($_SESSION['login_success']); // Unset the session variable after showing the alert
}

include("partials/login.php");
include("partials/signup.php");
include("partials/logout.php");
include("partials/handlesignup.php");
include("partials/handlelogin.php");
include("partials/handlelogout.php");
include("partials/alerterror.php");
include("partials/addcategory.php");