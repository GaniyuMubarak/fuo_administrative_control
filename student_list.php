<?php
session_start();

if(!isset($_SESSION["emailAddress"])){
    header("location: index.php?error=loginrequired");
}
include 'includes.inc/config.php';
?>

<?php
    require_once "includes.inc/head.inc.php";
?>

    <!-- Page Wrapper -->
    <div id="wrapper">

<!-- includes start here -->
<?php
    require_once "includes.inc/sidebar.inc.php";
?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

 <!-- includes navbar start here -->
<?php
    require_once "includes.inc/navbar.inc.php";
?>            
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Student Page</h1>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mt-4 my-5">
                                <div class="card-body">
                                    <form action="" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select class="form-select form-select-lg mb-3 input-group form-control" id="slct1" onchange="populate(this.id, 'slct2')" name="college" required>
                                            <option selected disabled value="">-- Choose your College -- </option>
                                            <option value="cobmhes">College of Basic Medical & Health Sciences</option>
                                            <option value="comass">College of Management and Social Sciences</option>
                                            <option value="conas">College of Nutural and Applied Sciences</option>
                                            <option value="law">College of Law</option>
                                              </select>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-select form-select-lg mb-3 input-group form-control" id="slct2" name="dept" required>
                                            <option selected disabled value="">-- Choose your Department -- </option>
                                              </select>
                                        </div>
                                        <div class="col-md-12">
                                            <select class="form-select form-select-lg mb-3 input-group form-control" name="level" require>
                                                <option selected>Select Level</option>
                                                <option value="100">100</option>
                                                <option value="200">200</option>
                                                <option value="300">300</option>
                                                <option value="400">400</option>
                                              </select>
                                        </div>
                                        <div class="col-md-4">
                                        <button type="submit" class="btn btn-success" name="search">Submit</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Matric No</th>
                                            <th>Surname</th>
                                            <th>Firstname</th>
                                            <th>middlename</th>
                                            <th>Department</th>
                                            <th>Year of Admission</th>
                                            <th>Level</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        if(isset($_POST['search'])){
                                            print"We are good to go";
                                            $college = $_POST['college'];
                                            echo $college;
                                            $department = $_POST['dept'];
                                            $level = $_POST['level'];

                                            $college_id = GetFacultyId($college);
                                            $department_id = GetDepartmentId($department);

                                            $query= "SELECT DISTINCT * FROM students INNER JOIN faculty ON faculty.faculty_id=students.faculty INNER JOIN department ON department.department_id=students.department WHERE students.level= '$level' AND  students.faculty = '$college_id' AND students.department = '$department_id' ORDER BY students.id ASC";
                                           $result=mysqli_query($connection, $query);
                                            if(mysqli_num_rows($result) > 0){
                                                foreach($result as $items){
                                                    ?>
                                                <tr>
                                                    <td><?= $items['id'];?></td>
                                                    <td><?= $items['matric_no'];?></td>
                                                    <td><?= $items['surname'];?></td>
                                                    <td><?= $items['first_name'];?></td>
                                                    <td><?= $items['middle_name'];?></td>
                                                    <td><?= $items['department_name'];?></td>
                                                    <td><?= $items['year_of_admission'];?></td>
                                                    <td><?= $items['level'];?></td>
                                                </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                                                <?php
                                        }
                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

 <!-- includes logout.in start here -->
<?php
    require_once "includes.inc/logout.in.inc.php";
?>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Selecting department -->
    <script src="js/menus.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>