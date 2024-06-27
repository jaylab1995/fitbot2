<?php 

require_once("../conn.php");

if (empty($_SESSION['user_id']))
{
 header("location: admin_login.php");
}


$grade = $_GET['grade'];

$generateList = mysqli_query($conn, "SELECT * FROM students WHERE student_grade='$grade' ORDER BY student_idnum ASC ");


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
      <li class="nav-item">
        <a class="nav-link " href="admin_index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Admin Dashboard</span></a>
      </li>
      
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Navigation
      </div>
      <li class="nav-item active">
        <a class="nav-link " href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
          aria-controls="collapsePage">
          <i class="fas fa-fw fa-columns"></i>
          <span>Student List</span>
        </a>
        <div id="collapsePage" class="collapse show" aria-labelledby="headingPage" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Year</h6>
            <a class="collapse-item <?=$grade==7 ? 'active' : ''; ?>" href="admin_studentlist.php?grade=7">Grade 7</a>
            <a class="collapse-item <?=$grade==8 ? 'active' : ''; ?>" href="admin_studentlist.php?grade=8">Grade 8</a>
            <a class="collapse-item <?=$grade==9 ? 'active' : ''; ?>" href="admin_studentlist.php?grade=9">Grade 9</a>
            <a class="collapse-item <?=$grade==10 ? 'active' : ''; ?>" href="admin_studentlist.php?grade=10">Grade 10</a>
            <a class="collapse-item <?=$grade==11 ? 'active' : ''; ?>" href="admin_studentlist.php?grade=11">Grade 11</a>
            <a class="collapse-item <?=$grade==12 ? 'active' : ''; ?>" href="admin_studentlist.php?grade=12">Grade 12</a>
        </div>
      </li>
      <li class="nav-item">
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

            <h2>Grade <?=$grade?> Student's List <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalLong" id="#modalLong" data-placement="top" title="Register New Student"> <i class="fa-solid fa-plus"></i></button></h2>

            <table id="studentList" class="table table-striped" style="width:100%">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Gender</th>
                  <th>Year</th>
                  <th>Section</th>
                  <th>Current Height</th>
                  <th>Current Weight</th>
                  <th>Medical History</th>
                  <th>Allergies</th>
                  <th>Medication</th>
                  <th>Plan Status</th>
                  <th>Active Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if ($generateList) {
                  while ($row = mysqli_fetch_array($generateList)) {
                    ?>
                    <tr>
                      <td><?= $row['student_name'] ?></td>
                      <td><?= $row['student_gender'] ?></td>
                      <td><?= $row['student_grade'] ?></td>
                      <td><?= $row['student_section'] ?></td>
                      <td><?= $row['student_height'] ?></td>
                      <td><?= $row['student_weight'] ?></td>
                      <td><?= $row['student_medicalhistory'] ?></td>
                      <td><?= $row['student_allergy'] ?></td>
                      <td><?= $row['student_medication'] ?></td>
                      <td><?= $row['student_plan'] == '' ? 'Not Generated' : 'Generated'; ?></td>
                      <td><?= $row['student_status'] ?></td>
                      <td class="text-center" width="10%">
                        <div>


                          <?php
                          if ($row['student_plan'] == '') {
                            $age = floor((time() - strtotime($row['student_bdate'])) / 31556926);
                            ?>
                            <div class="btn-group" role="group" aria-label="Basic example">
                              <form action="fitbot.php" method="POST" >
                                <input type="hidden" name="student_id" value="<?= $row['student_id'] ?>">
                                <textarea name="studentDetails" id="" cols="30" rows="10" hidden><?php echo "I am " . $row['student_name'] . ", born on ". $row['student_bdate'] . ", ". $age . " year's old, height " . $row['student_height'] . ", weight " . $row['student_weight'] . ". I have medical history of " . $row['student_medicalhistory'] . ". My allergies are " . $row['student_allergy']. ". My medications are " . $row['student_medication']; ?> </textarea>
                                <button type="submit" name="generate" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Create 1Month Plan with FitBOT"><i class="fa-solid fa-gears"></i></button>
                              </form>
                            </div>
                            <div class="btn-group" role="group" aria-label="Basic example">

                              <button type="button" class="btn btn-secondary disabled" data-toggle="tooltip" data-placement="top" title="Create plan to view"><i class="fa-solid fa-eye"></i></button>
                              <button type="button" data-toggle="modal" data-target="#editModal<?=$row['student_id'];?>" id="#editModal<?=$row['student_id'];?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit Student Data"><i class="fa-solid fa-pen"></i></button>

                              <!-- Modal Edit Student-->
                              <div class="modal fade" id="editModal<?php echo $row['student_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                                  <div class="modal-content">
                                    <div class="modal-body">
                                     <div class="container mb-5">
                                      

                                      <h2 class="card-title">Student Information Update</h2>

                                      <?php
                                      $id = $row['student_id'];
                                      $getDetails = mysqli_query($conn, "SELECT * FROM students WHERE student_id ='$id' ");
                                      if ($getDetails) {
                                        while ($row1 = mysqli_fetch_assoc($getDetails)) {

                                          ?>
                                          <form action="process_update.php" method="post">
                                            <input type="hidden" name="student_id" value="<?=$row1['student_id']?>">
                                            <div class="mb-3 mb-compact">
                                              <label for="student_idnum" class="form-label">Student ID</label>
                                              <input type="text" class="form-control" id="student_idnum" name="student_idnum" value="<?=$row1['student_idnum']?>" required>
                                            </div>

                                            <div class="mb-3 mb-compact">
                                              <label for="student_name" class="form-label">Student Name</label>
                                              <input type="text" class="form-control" id="student_name" name="student_name" value="<?=$row1['student_name']?>" required>
                                            </div>

                                            <div class="mb-3 mb-compact">
                                              <label for="student_gender" class="form-label">Student Gender</label>
                                              <select name="student_gender" id="student_gender" class="form-control">
                                                <option selected value="<?=$row1['student_gender']?>"><?=$row1['student_gender']?></option>
                                                <option value="0" disabled>----Select Gender----</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                              </select>
                                            </div>

                                            <div class="mb-3 mb-compact">
                                              <label for="student_grade" class="form-label">Student Grade</label>
                                              <input min="7" max="12" type="number" value="7" step="1" class="form-control" id="student_grade" value="<?=$row1['student_grade']?>"  name="student_grade" required placeholder="example: 7 to 12">
                                            </div>

                                            <div class="mb-3 mb-compact">
                                              <label for="student_section" class="form-label">Student Section</label>
                                              <input maxlength="1" type="text" class="form-control" id="student_section" name="student_section" value="<?=$row1['student_section']?>"  required placeholder="">
                                            </div>


                                            <div class="mb-3 mb-compact">
                                              <label for="student_bdate" class="form-label">Date of Birth</label>
                                              <input type="date" class="form-control" id="student_bdate" name="student_bdate" value="<?=$row1['student_bdate']?>" required>
                                            </div>


                                            <div class="mb-3 mb-compact">
                                              <label for="student_email" class="form-label">Email address</label>
                                              <input type="email" class="form-control" id="student_email" name="student_email" value="<?=$row1['student_email']?>" required>
                                            </div>

                                            <div class="mb-3 mb-compact">
                                              <label for="student_weight" class="form-label">Weight (kg)</label>
                                              <input type="number" step="0.01" min="1.00" class="form-control" id="student_weight" name="student_weight" value="<?=$row1['student_weight']?>" required>
                                            </div>

                                            <div class="mb-3 mb-compact">
                                              <label for="student_height" class="form-label">Height (cm)</label>
                                              <input type="number"  step="0.01" min="1.00" class="form-control" id="student_height" name="student_height" value="<?=$row1['student_height']?>" required>
                                            </div>

                                            <div class="mb-3 mb-compact">
                                              <label for="student_medicalhistory" class="form-label">Medical History (separate with comma or none)</label>
                                              <input type="text" class="form-control" id="student_medicalhistory" name="student_medicalhistory" value="<?=$row1['student_medicalhistory']?>" required>
                                            </div>

                                            <div class="mb-3 mb-compact">
                                              <label for="student_allergy" class="form-label">Allergies (separate with comma or none)</label>
                                              <input type="text" class="form-control" id="student_allergy" name="student_allergy" value="<?=$row1['student_allergy']?>" required>
                                            </div>

                                            <div class="mb-3 mb-compact">
                                              <label for="student_medication" class="form-label">Medication (separate with comma or none)</label>
                                              <input type="text" class="form-control" id="student_medication" name="student_medication" value="<?=$row1['student_medication']?>" required>
                                            </div>

                                            <div class="mb-3 mb-compact">
                                              <label for="student_status" class="form-label">Active Status</label>
                                              <select name="student_status" id="student_status" class="form-control">
                                                <option selected value="<?=$row1['student_status']?>"><?php if($row1['student_status'] == '1'){ echo "Active"; 
                                                } else { echo "Inactive";}
                                            ?></option>
                                                <option value="33" disabled>----Select Status----</option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                              </select>
                                            </div>

                                            <div class="d-grid">
                                              <button type="submit" name="update" class="btn btn-primary btn-block mb-1">Update</button>
                                              <button type="reset" name="reset" class="btn btn-warning btn-block">Clear</button>
                                            </div>
                                          </form>
                                        </div>
                                      </div>

                                   
                                    </div>
                                  </div>
                                </div>

                                <!-- Modal Edit Student -->
                              </div>
                              <?php 
                            }
                          }
                        } else {
                          $age = floor((time() - strtotime($row['student_bdate'])) / 31556926);
                          ?>
                          <div class="btn-group" role="group" aria-label="Basic example">
                            <form action="fitbot.php" method="POST" >
                              <input type="hidden" name="student_id" value="<?= $row['student_id'] ?>">
                              <textarea name="studentDetails" id="" cols="30" rows="10" hidden><?php echo "I am " . $row['student_name'] . ", born on ". $row['student_bdate'] . ", ". $age . " year's old, height " . $row['student_height'] . ", weight " . $row['student_weight'] . ". I have medical history of " . $row['student_medicalhistory'] . ". My allergies are " . $row['student_allergy']. ". My medications are " . $row['student_medication']; ?> </textarea>
                              <button type="submit" name="recreate" onclick="javascript:return confirm('Are you sure you want to regenerate current plan?')" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Change Current 1Month Plan with FitBOT"><i class="fa-solid fa-dice-five"> </i></button>

                            </form>
                          </div>
                          <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" onclick="window.location.href = 'viewplan.php?id=<?= $row['student_id'];?>'" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="View Plan"><i class="fa-solid fa-eye"></i></button>
                            <button type="button" data-toggle="modal" data-target="#editModal<?=$row['student_id'];?>" id="#editModal<?=$row['student_id'];?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit Student Data"><i class="fa-solid fa-pen"></i></button>

                            <!-- Modal Edit Student-->
                            <div class="modal fade" id="editModal<?php echo $row['student_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                                <div class="modal-content">
                                  <div class="modal-body">
                                   <div class="container mb-5">
                                    

                                    <h2 class="card-title">Student Information Update Form</h2>

                                    <?php
                                    $id = $row['student_id'];
                                    $getDetails = mysqli_query($conn, "SELECT * FROM students WHERE student_id ='$id' ");
                                    if ($getDetails) {
                                      while ($row2 = mysqli_fetch_assoc($getDetails)) {

                                        ?>
                                        <form action="process_update.php" method="post">
                                            <input type="hidden" name="student_id" value="<?=$row2['student_id']?>">
                                            <div class="mb-3 mb-compact">
                                              <label for="student_idnum" class="form-label">Student ID</label>
                                              <input type="text" class="form-control" id="student_idnum" name="student_idnum" value="<?=$row2['student_idnum']?>" required>
                                            </div>

                                            <div class="mb-3 mb-compact">
                                              <label for="student_name" class="form-label">Student Name</label>
                                              <input type="text" class="form-control" id="student_name" name="student_name" value="<?=$row2['student_name']?>" required>
                                            </div>

                                            <div class="mb-3 mb-compact">
                                              <label for="student_gender" class="form-label">Student Gender</label>
                                              <select name="student_gender" id="student_gender" class="form-control">
                                                <option selected value="<?=$row2['student_gender']?>"><?=$row2['student_gender']?></option>
                                                <option value="0" disabled>----Select Gender----</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                              </select>
                                            </div>

                                            <div class="mb-3 mb-compact">
                                              <label for="student_grade" class="form-label">Student Grade</label>
                                              <input min="7" max="12" type="number"  step="1" class="form-control" id="student_grade" value="<?=$row2['student_grade']?>"  name="student_grade" required placeholder="example: 7 to 12">
                                            </div>

                                            <div class="mb-3 mb-compact">
                                              <label for="student_section" class="form-label">Student Section</label>
                                              <input maxlength="1" type="text" class="form-control" id="student_section" name="student_section" value="<?=$row2['student_section']?>"  required placeholder="">
                                            </div>


                                            <div class="mb-3 mb-compact">
                                              <label for="student_bdate" class="form-label">Date of Birth</label>
                                              <input type="date" class="form-control" id="student_bdate" name="student_bdate" value="<?=$row2['student_bdate']?>" required>
                                            </div>


                                            <div class="mb-3 mb-compact">
                                              <label for="student_email" class="form-label">Email address</label>
                                              <input type="email" class="form-control" id="student_email" name="student_email" value="<?=$row2['student_email']?>" required>
                                            </div>

                                            <div class="mb-3 mb-compact">
                                              <label for="student_weight" class="form-label">Weight (kg)</label>
                                              <input type="number" step="0.01" min="1.00" class="form-control" id="student_weight" name="student_weight" value="<?=$row2['student_weight']?>" required>
                                            </div>

                                            <div class="mb-3 mb-compact">
                                              <label for="student_height" class="form-label">Height (cm)</label>
                                              <input type="number"  step="0.01" min="1.00" class="form-control" id="student_height" name="student_height" value="<?=$row2['student_height']?>" required>
                                            </div>

                                            <div class="mb-3 mb-compact">
                                              <label for="student_medicalhistory" class="form-label">Medical History (separate with comma or none)</label>
                                              <input type="text" class="form-control" id="student_medicalhistory" name="student_medicalhistory" value="<?=$row2['student_medicalhistory']?>" required>
                                            </div>

                                            <div class="mb-3 mb-compact">
                                              <label for="student_allergy" class="form-label">Allergies (separate with comma or none)</label>
                                              <input type="text" class="form-control" id="student_allergy" name="student_allergy" value="<?=$row2['student_allergy']?>" required>
                                            </div>

                                            <div class="mb-3 mb-compact">
                                              <label for="student_medication" class="form-label">Medication (separate with comma or none)</label>
                                              <input type="text" class="form-control" id="student_medication" name="student_medication" value="<?=$row2['student_medication']?>" required>
                                            </div>

                                            <div class="mb-3 mb-compact">
                                              <label for="student_status" class="form-label">Active Status</label>
                                              <select name="student_status" id="student_status" class="form-control">
                                                <option selected value="<?=$row2['student_status']?>"><?php if($row2['student_status'] == '1'){ echo "Active"; 
                                                } else { echo "Inactive";}
                                            ?></option>
                                                <option value="33" disabled>----Select Status----</option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                              </select>
                                            </div>

                                          <div class="d-grid">
                                            <button type="submit" name="update" class="btn btn-primary btn-block mb-1">Update</button>
                                            <button type="reset" name="reset" class="btn btn-warning btn-block">Clear</button>
                                          </div>
                                        </form>
                                      </div>
                                    </div>

                                  
                                  </div>
                                </div>
                              </div>

                              <!-- Modal Edit Student -->
                            </div>

                            <?php
                          }
                        }
                      }

                      ?>

                    </div>
                  </td>
                </tr>

                <?php

              }
            } else {
              echo 'Error' . mysqli_error($conn);
            }
            ?>

          </tbody>
        </table>
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