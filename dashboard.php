<?php
session_start();
// Prevent back button from showing cached page
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.
// Access prevent 
if (!isset($_SESSION['user'])) { 
    // Redirect to login page
    header("Location: index.php");
    exit();
}
$last_login = $_SESSION['last_login_time'] ?? "First login";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags --> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
  <meta http-equiv="Pragma" content="no-cache">
  <meta http-equiv="Expires" content="0">

  <title>Company Admin</title>
  <!-- base:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css"/>
  <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="vendors/jquery-bar-rating/fontawesome-stars-o.css">
  <link rel="stylesheet" href="vendors/jquery-bar-rating/fontawesome-stars.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  

</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="#"><img src="images/pc.jpeg" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="#"><img src="images/pc1.jpeg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="Search Projects.." aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
            
          <li class="nav-item dropdown d-flex mr-4 ">
            <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="logout.php" >
               <i class="fa-solid fa-right-from-bracket"></i>
            </a>
            
          </li>
          
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="user-profile">
          <div class="user-image">
            <img src="images/faces/f1.png">
          </div>
          <div class="user-name">
              <?php $name= htmlspecialchars($_SESSION['user']); 
              echo ucfirst($name); ?>
          </div>
          <div class="user-designation">
              <?php echo htmlspecialchars($_SESSION['role']); ?>
          </div>
        </div>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="icon-box menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12 mb-4 mb-xl-0">
              <h4 class="font-weight-bold text-dark">Hi, welcome back!</h4>
              <p class="font-weight-normal mb-2 text-muted">
                 
                <?php   
                 if($last_login == "First login")
                      { 
                        echo "First Time login";
                      }else{ 
                      $last_log = htmlspecialchars($last_login);

                      $last_logdt = new DateTime($last_log);
                      echo "Your Last Login is on".$last_log_Date = $last_logdt->format('d M Y'); 
                ?>&nbsp;At 
                <?php
                      echo $last_log_Time = $last_logdt->format('H:i:s');
                    }
                 ?>    
              </p>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-xl-3 flex-column d-flex grid-margin stretch-card">
              <div class="row flex-grow">
                <div class="col-sm-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                          <h4 class="card-title">Customers</h4>
                          <p>23% increase in conversion</p>
                          <h4 class="text-dark font-weight-bold mb-2">43,981</h4>
                          <canvas id="customers"></canvas>
                      </div>
                    </div>
                </div>
                <div class="col-sm-12 stretch-card">
                    <div class="card">
                      <div class="card-body">
                          <h4 class="card-title">Orders</h4>
                          <p>6% decrease in earnings</p>
                          <h4 class="text-dark font-weight-bold mb-2">55,543</h4>
                          <canvas id="orders"></canvas>
                      </div>
                    </div>
               </div>
              </div>
            </div>
            <div class="col-xl-9 d-flex grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                      <h4 class="card-title">Website Audience Metrics</h4>
                      <div class="row">
                        <div class="col-lg-5">
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit amet cumque cupiditate</p>
                        </div>
                        <div class="col-lg-7">
                          <div class="chart-legends d-lg-block d-none" id="chart-legends"></div>
                        </div>
                      </div>
                      <div class="row">
                          <div class="col-sm-12">
                              <canvas id="web-audience-metrics-satacked" class="mt-3"></canvas>
                          </div>
                      </div>
                        
                    </div>
                  </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-xl-9 grid-margin-lg-0 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Top Sellers</h4>
                    <div class="table-responsive mt-3">
                      <table class="table table-header-bg">
                        <thead>
                          <tr>
                            <th>
                                Country
                            </th>
                            <th>
                                Revenue
                            </th>
                            <th>
                                Vs Last Month
                            </th>
                            <th>
                                Goal Reached
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <i class="flag-icon flag-icon-us mr-2" title="us" id="us"></i> United States 
                            </td>
                            <td>
                              $911,200
                            </td>
                            <td>
                              <div class="text-success"><i class="icon-arrow-up mr-2"></i>+60%</div>
                            </td>
                            <td>
                              <div class="row">
                                <div class="col-sm-10">
                                  <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </div>
                                <div class="col-sm-2">
                                  25%
                                </div>
                              </div>
                            </td>
                            
                          </tr>
                          <tr>
                            <td>
                              <i class="flag-icon flag-icon-at mr-2" title="us" id="at"></i> Austria
                            </td>
                            <td>
                                $821,600
                            </td>
                            <td>
                              <div class="text-danger"><i class="icon-arrow-down mr-2"></i>-40%</div>
                            </td>
                            <td>
                              <div class="row">
                                <div class="col-sm-10">
                                  <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </div>
                                <div class="col-sm-2">
                                  50%
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <i class="flag-icon flag-icon-fr mr-2" title="us" id="fr"></i> France
                            </td>
                            <td>
                                $323,700
                            </td>
                            <td>
                              <div class="text-success"><i class="icon-arrow-up mr-2"></i>+40%</div>
                            </td>
                            <td>
                              <div class="row">
                                <div class="col-sm-10">
                                  <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 10%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </div>
                                <div class="col-sm-2">
                                  10%
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td class="py-1">
                              <i class="flag-icon flag-icon-de mr-2" title="us" id="de"></i> Germany
                            </td>
                            <td>
                                $833,205
                            </td>
                            <td>
                              <div class="text-danger"><i class="icon-arrow-down mr-2"></i>-80%</div>
                            </td>
                            <td>
                              <div class="row">
                                <div class="col-sm-10">
                                  <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 70%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </div>
                                <div class="col-sm-2">
                                  70%
                                </div>
                              </div>
                            </td>
                          </tr>
                          
                          
                        </tbody>
                      </table>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 grid-margin-lg-0 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">Overall rating</h4>
                    <div class="d-flex">
                      <div>
                          <h4 class="text-dark font-weight-bold mb-2 mr-2">4.3</h4>
                      </div>
                      <div>
                        <select id="over-all-rating" name="rating" autocomplete="off">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                        </select>
                      </div>
                    </div>
                    <p class="mb-4">Based on 186 reviews</p>
                    <div class="row">
                      <div class="col-sm-2 pr-0">
                          <div class="d-flex">
                            <div>
                                <div class="text-dark font-weight-bold mb-2 mr-2">5</div>
                            </div>
                            <div>
                              <i class="fa fa-star text-warning"></i>
                            </div>
                          </div>
                      </div>
                      <div class="col-sm-9 pl-2">
                          <div class="row">
                            <div class="col-sm-10">
                              <div class="progress progress-lg mt-1">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 80%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </div>
                            <div class="col-sm-2 p-lg-0">
                              80%
                            </div>
                          </div>
                      </div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-sm-2 pr-0">
                          <div class="d-flex">
                            <div>
                                <div class="text-dark font-weight-bold mb-2 mr-2">4</div>
                            </div>
                            <div>
                              <i class="fa fa-star text-warning"></i>
                            </div>
                          </div>
                      </div>
                      <div class="col-sm-9 pl-2">
                          <div class="row">
                            <div class="col-sm-10">
                              <div class="progress progress-lg mt-1">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 45%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </div>
                            <div class="col-sm-2 p-lg-0">
                              45%
                            </div>
                          </div>
                      </div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-sm-2 pr-0">
                          <div class="d-flex">
                            <div>
                                <div class="text-dark font-weight-bold mb-2 mr-2">3</div>
                            </div>
                            <div>
                              <i class="fa fa-star text-warning"></i>
                            </div>
                          </div>
                      </div>
                      <div class="col-sm-9 pl-2">
                          <div class="row">
                            <div class="col-sm-10">
                              <div class="progress progress-lg mt-1">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </div>
                            <div class="col-sm-2 p-lg-0">
                              30%
                            </div>
                          </div>
                      </div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-sm-2 pr-0">
                          <div class="d-flex">
                            <div>
                                <div class="text-dark font-weight-bold mb-2 mr-2">2</div>
                            </div>
                            <div>
                              <i class="fa fa-star text-warning"></i>
                            </div>
                          </div>
                      </div>
                      <div class="col-sm-9 pl-2">
                          <div class="row">
                            <div class="col-sm-10">
                              <div class="progress progress-lg mt-1">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 8%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </div>
                            <div class="col-sm-2 p-lg-0">
                              8%
                            </div>
                          </div>
                      </div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-sm-2 pr-0">
                          <div class="d-flex">
                            <div>
                                <div class="text-dark font-weight-bold mb-2 mr-2">5</div>
                            </div>
                            <div>
                              <i class="fa fa-star text-warning"></i>
                            </div>
                          </div>
                      </div>
                      <div class="col-sm-9 pl-2">
                          <div class="row">
                            <div class="col-sm-10">
                              <div class="progress progress-lg mt-1">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 1%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </div>
                            <div class="col-sm-2 p-lg-0">
                              1%
                            </div>
                          </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <p class="mb-2 mt-3 mb-3 text-dark font-weight-bold">Rating by category</p>
                        <div class="d-flex">
                            <div>
                                <div class="text-dark font-weight-bold mb-2 mr-2">4.3</div>
                            </div>
                            <div class="mr-2">
                              <i class="fa fa-star text-warning"></i>
                            </div>
                            <div><p>Work/Management</p></div>
                          </div>
                          <div class="d-flex">
                              <div>
                                  <div class="text-dark font-weight-bold mb-2 mr-2">3.5</div>
                              </div>
                              <div class="mr-2">
                                <i class="fa fa-star text-warning"></i>
                              </div>
                              <div><p>Salary/Culture</p></div>
                            </div>
                      </div>
                    </div>

                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Loremipsum.com 2025</span>
            
          </div>
          
        </footer>
        
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- base:js -->
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>

</html>

