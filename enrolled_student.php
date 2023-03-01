<?php
session_start();
if(!isset($_SESSION["emailAddress"])){
    header("location: index.php?error=loginrequired");
}

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
                                        require_once "includes.inc/database.inc.php";
                                        $query = "SELECT DISTINCT students.id, registered_courses.matric_no, students.surname, students.first_name, students.middle_name, department.department_name ,students.year_of_admission, students.level FROM registered_courses INNER JOIN students ON registered_courses.matric_no=students.matric_no INNER JOIN department ON department.department_id=students.department WHERE registered_courses.session='2022/2023' ORDER BY students.level DESC";
                                        $result=mysqli_query($connection, $query);
                                        $i = 0;
                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                            $i++;
                                        ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $row['matric_no']?></td>
                                            <td><?php echo $row['surname']?></td>
                                            <td><?php echo $row['first_name']?></td>
                                            <td><?php echo $row['middle_name']?></td>
                                            <td><?php echo $row['department_name']?></td>
                                            <td><?php echo $row['year_of_admission']?></td>
                                            <td><?php echo $row['level']?></td>
                                        </tr>
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

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
