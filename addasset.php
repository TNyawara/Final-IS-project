<?php

session_start();

$url = 'https://cloud.iexapis.com/stable/tops?token=sk_20c64fd182fd425dbe327d2b4a939863&symbols=aapl,CARA,WVE,ARAY,EQNR';
$json = file_get_contents($url);
$obj = json_decode($json);
if (isset($obj[2])) {
  $aapl = $obj[0];
  $cara = $obj[1];
  $wve = $obj[2];
  $aray = $obj[3];
  $eqnr  = $obj[4];
}
$checker="";
require '../includes/db_inc.php';
$getStock = "SELECT * FROM stock_data";
$getD = $conn->query($getStock);
$tbld = $conn->query($getStock);
$currentD = date("Y-m-d");
while ($rowD = $getD->fetch_assoc()) {
  if ($rowD['date_last_update'] == $currentD) {
    $checker = "TRUE";
  }
}
if (isset($aapl)) {
  $aapl = serialize($aapl);
  $cara = serialize($cara);
  $wve = serialize($wve);
  $aray = serialize($aray);
  $eqnr = serialize($eqnr);


if ($checker!="TRUE") {
  $insertSQL = "INSERT INTO stock_data(date_last_update,aapl,cara,wve,aray,eqnr) VALUES('$currentD','$aapl','$cara','$wve','$aray','$eqnr')";
  if ($conn->query($insertSQL)===TRUE) {
    echo "SUCCESS!";
  }
}}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Admin Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">

        <?php include 'layouts/header.php'; ?>
        <!-- HEADER MOBILE-->

        <!-- END HEADER MOBILE -->

        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">
            <!-- BREADCRUMB-->
            <section class="au-breadcrumb2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="au-breadcrumb-content">
                                <div class="au-breadcrumb-left">
                                    <span class="au-breadcrumb-span">You are here:</span>
                                    <ul class="list-unstyled list-inline au-breadcrumb__list">
                                        <li class="list-inline-item active">
                                            <a href="#">Home</a>
                                        </li>
                                        <li class="list-inline-item seprate">
                                            <span>/</span>
                                        </li>
                                        <li class="list-inline-item">Dashboard</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->

            <!-- WELCOME-->
            <section class="welcome p-t-10">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="title-4">Welcome back
                                <span><?php echo $_SESSION['FirstName']?></span>
                            </h1>
                            <hr class="line-seprate">
                        </div>
                    </div>
                </div>
            </section>

            <div class="row">
              <div class="col-lg-9">
                  <div class="table-responsive table--no-card m-b-30">
                      <table class="table table-borderless table-striped table-earning">
                          <thead>
                              <tr>
                                  <th>Update ID</th>
                                  <th>Date of Latest Update</th>
                                  <th class="text-right">AAPL</th>
                                  <th class="text-right">CARA</th>
                                  <th class="text-right">WVE</th>
                                  <th class="text-right">ARAY</th>
                                  <th class="text-right">EQNR</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php while ($rowtbl = $tbld->fetch_assoc()) {?>
                              <tr>
                                  <td><?php echo $rowtbl['updates'];?></td>
                                  <td><?php echo $rowtbl['date_last_update'];?></td>
                                  <td class="text-right"><?php echo $rowtbl['aapl'];?></td>
                                  <td class="text-right"><?php echo $rowtbl['cara'];?></td>
                                  <td class="text-right"><?php echo $rowtbl['wve'];?></td>
                                  <td class="text-right"><?php echo $rowtbl['aray'];?></td>
                                  <td class="text-right"><?php echo $rowtbl['eqnr'];?></td>
                              </tr>
                            <?php } ?>
                          </tbody>
                      </table>
                  </div>
              </div>
            </div>

        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
