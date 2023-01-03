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
                            <h6 class="m-0 font-weight-bold text-primary">View Result</h6>
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
                                            <th>Middlename</th>
                                            <th>Session</th>
                                            <th>Semester</th>
                                            <th>Level</th>
                                            <th>CourseCode</th>
                                            <th>CourseTitle</th>
                                            <th>CourseUnit</th>
                                            <th>GP_Point</th>
                                            <th>CA</th>
                                            <th>ExamScore</th>
                                            <th>TotalScore</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require_once "includes.inc/database.inc.php";
                                        $query = "SELECT DISTINCT results.id, students.matric_no, students.surname, students.first_name, students.middle_name, results.session, results.semester, results.level, results.course_code, results.course_title, results.course_unit, results.gp_point, results.ca, results.exam_score, results.total_score FROM results INNER JOIN students ON students.matric_no=results.matric_no ORDER BY results.id ASC;";
                                        $result=mysqli_query($connection, $query);
                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['id']?></td>
                                            <td><?php echo $row['matric_no']?></td>
                                            <td><?php echo $row['surname']?></td>
                                            <td><?php echo $row['first_name']?></td>
                                            <td><?php echo $row['middle_name']?></td>
                                            <td><?php echo $row['session']?></td>
                                            <td><?php echo $row['semester']?></td>
                                            <td><?php echo $row['level']?></td>
                                            <td><?php echo $row['course_code']?></td>
                                            <td><?php echo $row['course_title']?></td>
                                            <td><?php echo $row['course_unit']?></td>
                                            <td><?php echo $row['gp_point']?></td>
                                            <td><?php echo $row['ca']?></td>
                                            <td><?php echo $row['exam_score']?></td>
                                            <td><?php echo $row['total_score']?></td>
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