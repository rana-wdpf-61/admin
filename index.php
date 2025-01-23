<?php session_start();
require_once("configs/db_config.php");
$base_url = "cpanel";
//require_once("library/classes/system_log.class.php");

if (isset($_POST["btnSignIn"])) {

  $username = trim($_POST["txtUsername"]);
  $password = trim($_POST["txtPassword"]);
  //echo $username," ",$password;
  //$result=$db->query("select u.id,u.username,r.name from {$tx}users u,{$tx}roles r where r.id=u.role_id and u.username='$username' and u.password='$password'");
  $result = $db->query("select u.id,u.full_name,u.password,u.email,u.photo,u.mobile,u.role_id,r.name role from {$tx}users u,{$tx}roles r where r.id=u.role_id and u.name='$username' and u.inactive=0");


  $user = $result->fetch_object();

  if ($user && password_verify($password, $user->password)) {

    $_SESSION["uid"] = $user->id;
    $_SESSION["uname"] = $user->full_name;
    $_SESSION["uphoto"] = $user->photo;
    $_SESSION["email"] = $user->email;
    $_SESSION["mobile"] = $user->mobile;
    $_SESSION["role_id"] = $user->role_id;
    $_SESSION["urole"] = $user->role;

    header("location:home");
  } else {
    echo "Incorrect username or password";
  }



  //  $now=date("Y-m-d H:i:s");
  //  $log=new System_log("","LOGIN","Successfully logged in user : $uid-$_username",$now);
  //  $log->save();



}

?>

<!doctype html>
<html lang="en" class="semi-dark">


<!-- Mirrored from codervent.com/snacked/demo/ltr/authentication-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Nov 2024 04:24:37 GMT -->

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
  <!-- Bootstrap CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/bootstrap-extended.css" rel="stylesheet" />
  <link href="assets/css/style.css" rel="stylesheet" />
  <link href="assets/css/icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../../../cdn.jsdelivr.net/npm/bootstrap-icons%401.5.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- loader-->
  <link href="assets/css/pace.min.css" rel="stylesheet" />

  <title>Snacked - Bootstrap 5 Admin Template</title>
</head>

<body class="bg-login">

  <!--start wrapper-->
  <div class="wrapper">

    <!--start content-->
    <main class="authentication-content mt-5">
      <div class="container-fluid">
        <div>
          <h5 class="text-center" style="color: white; font-size: 35px; margin-bottom: 20px;">Admin Login</h5>
        </div>
        <div class="row">
          <div class="col-12 col-lg-4 mx-auto">
            <div class="card shadow rounded-2 overflow-hidden">
              <div class="card-body p-4 p-sm-5">
              <p style="text-align:center; font-size:16px; color:darkred; font-weight:600">Production Management System (PMS)</p>
                <!-- form validation -->
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="form-body">
                  <!-- <div class="col-12">
                  <img src="img/1628951927077.jpeg" style="height: 100px; width:100%" alt="">
                  </div> -->
                  <div class="row g-3">
                    <div class="col-12">
                      <label for="username" class="form-label">Enter Username</label>
                      <div class="ms-auto position-relative">
                        <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="fa-solid fa-user"></i></div>
                        <input type="text" class="form-control radius-2 ps-5" name="txtUsername" id="txtUsername" placeholder="Enter Username">
                      </div>
                    </div>
                    <div class="col-12">
                      <label for="password" class="form-label">Enter Password</label>
                      <div class="ms-auto position-relative">
                        <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="fa-solid fa-lock"></i></div>
                        <input type="password" class="form-control radius-2 ps-5" name="txtPassword" id="txtPassword" placeholder="Enter Password">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked="">
                        <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="d-grid">
                        <button type="submit" name="btnSignIn" class="btn btn-primary radius-2">Sign In</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!--end page main-->

  </div>
  <!--end wrapper-->


  <!-- Bootstrap bundle JS -->
  <script src="assets/js/bootstrap.bundle.min.js"></script>

  <!--plugins-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/pace.min.js"></script>


</body>


<!-- Mirrored from codervent.com/snacked/demo/ltr/authentication-signin-with-header-footer.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Nov 2024 04:24:55 GMT -->

</html>