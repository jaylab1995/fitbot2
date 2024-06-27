<?php 

require_once("../conn.php");

if (empty($_SESSION['user_id']))
{
 header("location: admin_login.php");
}


$generateList = mysqli_query($conn, "SELECT * FROM teachers ORDER BY teacher_id ASC ");


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
        <div class="sidebar-brand-text mx-3">RNHS Assistfit</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item">
        <a class="nav-link " href="admin_index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
        </li>

        <hr class="sidebar-divider">
        <div class="sidebar-heading">
          Navigation
        </div>

        <li class="nav-item ">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
          aria-controls="collapsePage">
          <i class="fas fa-fw fa-columns"></i>
          <span>Student List</span>
        </a>
        <div id="collapsePage" class="collapse " aria-labelledby="headingPage" data-parent="#accordionSidebar">
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
        <li class="nav-item active">
          <a class="nav-link " href="admin_teacherlist.php">
            <i class="fas fa-fw fa-user"></i>
            <span>Teacher List</span></a>
          </li>
          <li class="nav-item">
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
            <div class="container-fluid" id="container-wrapper">
              <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <!-- <h1 class="h4 mb-0 text-gray-800">Student Information</h1> -->

              </div>

              <h2>Teacher List <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalLong" id="#modalLong" data-placement="top" title="Register New Student"> <i class="fa-solid fa-plus"></i></button></h2>

              <table id="studentList" class="table table-striped" style="width:100%">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Designation</th>
                    <th>Active Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if ($generateList) 
                  {
                    while ($row = mysqli_fetch_array($generateList)) 
                    {
                      ?>
                      <tr>
                        <td><?= $row['teacher_id'] ?></td>
                        <td><?= $row['teacher_name'] ?></td>
                        <td><?= $row['teacher_gender'] ?></td>
                        <td><?= $row['teacher_designation']?></td>
                        <td><?php if($row['teacher_status'] == '1'){ echo "Active"; 
                      } else { echo "Inactive";}
                    ?></td>
                    <td class="text-center" width="10%">
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" data-toggle="modal" data-target="#editModal<?=$row['teacher_id'];?>" id="#editModal<?=$row['teacher_id'];?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit Teacher Data"><i class="fa-solid fa-pen"></i></button>


                        <!-- Modal Edit Teacher-->
                        <div class="modal fade" id="editModal<?=$row['teacher_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-body">
                               <div class="container mb-5">


                                <h2 class="card-title">Teacher Registration Form</h2>

                                <form action="process_update.php" method="post">
                                  <input type="hidden" name="teacher_id" value="<?= $row['teacher_id']?>">
                                  <div class="mb-3 mb-compact">
                                    <label for="teacher_name" class="form-label">Teacher Name</label>
                                    <input type="text" class="form-control" id="teacher_name" name="teacher_name" value="<?= $row['teacher_name']?>" required>
                                  </div>

                                  <label for="teacher_gender" class="form-label">Student Gender</label>
                                  <select name="teacher_gender" id="teacher_gender" class="form-control">
                                    <option selected value="<?=$row['teacher_gender']?>"><?=$row['teacher_gender']?></option>
                                    <option value="0" disabled>----Select Gender----</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                  </select>

                                  <div class="mb-3 mb-compact">
                                    <label for="teacher_designation" class="form-label">Teacher Designation</label>
                                    <input type="text" class="form-control" id="teacher_designation" name="teacher_designation" required value="<?= $row['teacher_designation']?>">
                                  </div>

                                  <div class="mb-3 mb-compact">
                                    <label for="teacher_username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="teacher_username" name="teacher_username" required value="<?= $row['teacher_username']?>" required>
                                  </div>

                                  <div class="mb-3 mb-compact">
                                    <label for="teacher_password" class="form-label">Password</label>
                                    <input type="password" minlength="6" class="form-control" id="teacher_password" name="teacher_password" >
                                  </div>

                                  <hr>

                                  <div class="d-grid">
                                    <button type="submit" name="update_teacher" class="btn btn-primary btn-block mb-1">Update</button>
                                    <button type="reset" name="reset" class="btn btn-warning btn-block">Clear</button>
                                  </div>
                                </form>
                              </div>
                            </div>


                          </div>
                        </div>
                      </div>

                      <!-- Modal Edit Teacher -->



                      <form method="POST" action="process_update.php">
                        <input type="hidden" name="teacher_name" value="<?=$row['teacher_name'] ?>">
                        <input type="hidden" name="inactive_id" value="<?=$row['teacher_id'] ?>">
                        <button type="submit" name="inactive_teacher" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Mark as Inactive" onclick="javascript:return confirm('Are you sure you want to mark this user as inactive? Only the Administrator can reverse this action.')"><i class="fa-solid fa-user-minus"></i></button>
                      </form>
                      <?php

                    }
                    ?>
                  </div>

                </div>
              </td>
            </tr>

            <?php


          } 
          else 
          {
            echo 'Error' . mysqli_error($conn);
          }
          ?>

        </tbody>
      </table>
    </div>


  </div>


  <!-- Modal Add Teacher-->
  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-body">
         <div class="container mb-5">


          <h2 class="card-title">Teacher Registration Form</h2>

          <form action="process_update.php" method="post">
            <div class="mb-3 mb-compact">
              <label for="teacher_name" class="form-label">Teacher Name</label>
              <input type="text" class="form-control" id="teacher_name" name="teacher_name" required>
            </div>

            <div class="mb-3 mb-compact">
              <label for="student_name" class="form-label">Teacher Gender</label>
              <select name="teacher_gender" class="form-control" id="teacher_gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>

            <div class="mb-3 mb-compact">
              <label for="teacher_designation" class="form-label">Teacher Designation</label>
              <input type="text" class="form-control" id="teacher_designation" name="teacher_designation" required>
            </div>

            <div class="mb-3 mb-compact">
              <label for="teacher_username" class="form-label">Username</label>
              <input type="text" class="form-control" id="teacher_username" name="teacher_username" required>
            </div>

            <div class="mb-3 mb-compact">
              <label for="teacher_password" class="form-label">Password</label>
              <input type="password" minlength="6" class="form-control" id="teacher_password" name="teacher_password" required>
            </div>

            <hr>

            <div class="d-grid">
              <button type="submit" name="teacher" class="btn btn-primary btn-block mb-1">Register</button>
              <button type="reset" name="reset" class="btn btn-warning btn-block">Clear</button>
            </div>
          </form>
        </div>
      </div>


    </div>
  </div>
</div>

<!-- Modal Add Teacher -->



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