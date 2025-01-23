<?php session_start();
  require_once("configs/config.php");
  require_once("helpers/helper.php");
  require_once("libraries/library.php");
  require_once("models/model.php");
  require_once("controllers/controller.php");
  
  if(!isset($_SESSION["uid"])) header("location:$base_url");
  $uid=$_SESSION["uid"];
?>

<!doctype html>
<html lang="en" class="semi-dark">


<!-- Mirrored from codervent.com/snacked/demo/ltr/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Nov 2024 04:21:15 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?php echo $base_url;?>/assets/images/favicon-32x32.png" type="image/png" />
  <!--plugins-->
  <link href="<?php echo $base_url;?>/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
  <link href="<?php echo $base_url;?>/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <link href="<?php echo $base_url;?>/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
  <link href="<?php echo $base_url;?>/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
  <!-- Bootstrap CSS -->
  <link href="<?php echo $base_url;?>/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?php echo $base_url;?>/assets/css/bootstrap-extended.css" rel="stylesheet" />
  <link href="<?php echo $base_url;?>/assets/css/style.css" rel="stylesheet" />
  <link href="<?php echo $base_url;?>/assets/css/icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo $base_url;?>/assets/cdn.jsdelivr.net/npm/bootstrap-icons%401.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  <!-- loader-->
	<link href="<?php echo $base_url;?>/assets/css/pace.min.css" rel="stylesheet" />

  <!--Theme Styles-->
  <link href="<?php echo $base_url;?>/assets/css/dark-theme.css" rel="stylesheet" />
  <link href="<?php echo $base_url;?>/assets/css/light-theme.css" rel="stylesheet" />
  <link href="<?php echo $base_url;?>/assets/css/semi-dark.css" rel="stylesheet" />
  <link href="<?php echo $base_url;?>/assets/css/header-colors.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <title>Production Management</title>
</head>

<body>


  <!--start wrapper-->
  <div class="wrapper">
   
       <?php include_once "views/layout/topbar.php";?>
       <?php include_once "views/layout/sidebar.php";?>

       <!--start content-->
          <main class="page-content">