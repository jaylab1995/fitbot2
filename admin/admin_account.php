<?php 

require_once("../conn.php");


if (empty($_SESSION['user_id']))
{
 header("location: admin_login.php");
}

$id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT * FROM users WHERE user_id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
  die("User not found.");
}

                // Close connection
$stmt->close();
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="../img/logo/logo.png" rel="icon">
  <title>RNHS Assistfit - Dashboard Page</title>
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="../css/ruang-admin.min.css" rel="stylesheet">


  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  <!-- Latest jQuery via CDN -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <!-- Latest Bootstrap JS and Popper.js via CDN -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">

      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin_index.php">
      <div class="sidebar-brand-icon">
        <img src="../img/logo/logo2.png">
      </div>
      <div class="sidebar-brand-text mx-3">RNHS Assistfit - Admin</div>
    </a>
    
    <hr class="sidebar-divider my-0">
    <li class="nav-item ">
      <a class="nav-link " href="admin_index.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Admin Dashboard</span></a>
      </li>
      
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Navigation
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
        aria-controls="collapsePage">
        <i class="fas fa-fw fa-columns"></i>
        <span>Student List</span>
      </a>
      <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Year</h6>
          <a class="collapse-item" href="admin_studentlist.php?grade=7">Grade 7</a>
          <a class="collapse-item" href="admin_studentlist.php?grade=8">Grade 8</a>
          <a class="collapse-item" href="admin_studentlist.php?grade=9">Grade 9</a>
          <a class="collapse-item" href="admin_studentlist.php?grade=10">Grade 10</a>
          <a class="collapse-item" href="admin_studentlist.php?grade=11">Grade 11</a>
          <a class="collapse-item" href="admin_studentlist.php?grade=12">Grade 12</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="admin_teacherlist.php">
          <i class="fas fa-fw fa-user"></i>
          <span>Teacher List</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link " href="admin_account.php">
            <i class="fas fa-fw fa-user"></i>
            <span>Admin Information</span></a>
          </li>

          <!-- ////////////////////////// -->
          <hr class="sidebar-divider">
          <div class="version" id="version-RNHS Assistfit"></div>
        </ul>
        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
          <div id="content">
            <!-- TopBar -->
            <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">

              <ul class="navbar-nav ml-auto">
                <div class="topbar-divider d-none d-sm-block"></div>
                <li class="nav-item dropdown no-arrow">
                  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  <img class="img-profile rounded-circle" src="../img/boy.png" style="max-width: 60px">
                  <span class="ml-2 d-none d-lg-inline text-white small">Good Day, Administrator</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                  </a>
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Settings
                  </a>
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Activity Log
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                  </a>
                </div>
              </li>
            </ul>
          </nav>
          <!-- Topbar -->

          <!-- Container Fluid-->
          <div class="container">
            <div class="form-container">
              <h2 class="text-center">Update Administrator Information</h2>
              <form action="update_admin.php" method="post">
                <input type="hidden" name="user_id" value="<?=$id;?>">

                <div class="form-row">
           
                  <div class="form-group col-lg-4 col-md-6 col-sm-12">
                    <label for="user_name">User Given Name</label>
                    <input type="text" class="form-control" id="user_name" name="user_name" value="<?php echo htmlspecialchars($user['user_name']); ?>" required>
                  </div>
                  
                  <div class="form-group col-lg-4 col-md-6 col-sm-12">
                    <label for="user_username">Username</label>
                    <input type="text" class="form-control" id="user_username" name="user_username" value="<?php echo htmlspecialchars($user['user_username']); ?>" required title="Do not edit if you will not change your username">
                  </div>
                  <div class="form-group col-lg-4 col-md-6 col-sm-12">
                    <label for="user_password">Password</label>
                    <input minlength="6" type="password" class="form-control" id="user_password" name="user_password" title="Do not edit if you will not change your password">
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
          </div>


        </div>


        <!-- Modal Add Student-->
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-body">
               <div class="container mb-5">


                <h2 class="card-title">Student Registration Form</h2>

                <form action="process_registration.php" method="post">
                  <div class="mb-3 mb-compact">
                    <label for="student_id" class="form-label">Student ID</label>
                    <input type="text" class="form-control" id="student_idnum" name="student_idnum" required>
                  </div>

                  <div class="mb-3 mb-compact">
                    <label for="student_name" class="form-label">Student Name</label>
                    <input type="text" class="form-control" id="student_name" name="student_name" required>
                  </div>

                  <div class="mb-3 mb-compact">
                    <label for="student_name" class="form-label">Student Gender</label>
                    <select name="student_gender" class="form-control" id="student_gender">
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                  </div>

                  <div class="mb-3 mb-compact">
                    <label for="student_grade" class="form-label">Student Grade</label>
                    <input min="7" max="12" type="number" value="7" step="1" class="form-control" id="student_grade" name="student_grade" required placeholder="example: 7 to 12">
                  </div>

                  <div class="mb-3 mb-compact">
                    <label for="student_section" class="form-label">Student Section</label>
                    <input maxlength="1" type="text" class="form-control" id="student_section" name="student_section" required placeholder="">
                  </div>

                  <div class="mb-3 mb-compact">
                    <label for="student_bdate" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" id="student_bdate" name="student_bdate" required>
                  </div>

                          <!-- <div class="mb-3 mb-compact">
                            <label for="student_username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="student_username" name="student_username" required>
                          </div>

                          <div class="mb-3 mb-compact">
                            <label for="student_password" class="form-label">Password</label>
                            <input type="password" minlength="6" class="form-control" id="student_password" name="student_password" required>
                          </div> -->

                          <div class="mb-3 mb-compact">
                            <label for="student_email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="student_email" name="student_email" required>
                          </div>

                          <hr>

                          <div class="mb-3 mb-compact">
                            <label for="student_weight" class="form-label">Weight (kg)</label>
                            <input type="number" value="0.00" step="0.01" min="1.00" class="form-control" id="student_weight" name="student_weight" required>
                          </div>

                          <div class="mb-3 mb-compact">
                            <label for="student_height" class="form-label">Height (cm)</label>
                            <input type="number" value="0.00" step="0.01" min="1.00" class="form-control" id="student_height" name="student_height" required>
                          </div>

                          <div class="mb-3 mb-compact">
                            <label for="student_medicalhistory" class="form-label">Medical History (separate with comma or none)</label>
                            <input type="text" class="form-control" id="student_medicalhistory" name="student_medicalhistory" required>
                          </div>

                          <div class="mb-3 mb-compact">
                            <label for="student_allergy" class="form-label">Allergies (separate with comma or none)</label>
                            <input type="text" class="form-control" id="student_allergy" name="student_allergy" required>
                          </div>

                          <div class="mb-3 mb-compact">
                            <label for="student_medication" class="form-label">Medication (separate with comma or none)</label>
                            <input type="text" class="form-control" id="student_medication" name="student_medication" required>
                          </div>

                          <div class="d-grid">
                            <button type="submit" name="register" class="btn btn-primary btn-block mb-1">Register</button>
                            <button type="reset" name="reset" class="btn btn-warning btn-block">Clear</button>
                          </div>
                        </form>
                      </div>
                    </div>


                  </div>
                </div>
              </div>

              <!-- Modal Add Student -->



              <!-- Modal Logout -->
              <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
              aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>Are you sure you want to logout?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                    <form method="POST" action="process_login.php">
                      <button type="submit" name="logout" class="btn btn-primary">Logout</a>
                      </form>
                  </div>
                </div>
              </div>

              <!---Container Fluid-->
            </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
              <div class="container my-auto">
                <div class="copyright text-center my-auto">

                </div>
              </div>
            </footer>
            <!-- Footer -->
          </div>
        </div>

        <!-- Scroll to top -->
        <a class="scroll-to-top rounded" href="#page-top">
          <i class="fas fa-angle-up"></i>
        </a>


        <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
        <script>
          new DataTable('#studentList');
          $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
          });
        </script>
        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="../js/ruang-admin.min.js"></script>
      </body>

      </html>