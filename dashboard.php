<?php
session_start();
if(!isset($_SESSION["emailAddress"])){
    header("location: index.php?error=loginrequired");
}
require_once "includes.inc/database.inc.php";
?>

<!-- includes start here -->
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800" style="font-weight:700;">Welcome to Administrative Portal</h1>
                        
                    </div>
                </div>

                <div class="container-fluid">
<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xl font-weight-bold text-primary text-uppercase mb-4">
                            Number of Student Applied for 2022/2023 Academic Session</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php 
                            $query = "SELECT COUNT(DISTINCT id, applicationID, surname, othername, session, date_submitted) FROM application_studentinfo WHERE session='2022/2023' AND applicationID!=''";
                            $result=mysqli_query($connection, $query);
                            $get_result = mysqli_fetch_array($result);
                            print $get_result[0];
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xl font-weight-bold text-success text-uppercase mb-4">
                            Number of Student Admitted into 2022/2023 Academic Session</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php 
                            $query = "SELECT COUNT(DISTINCT academic_studentinfo.id, academic_studentinfo.applicationID, application_studentinfo.surname, application_studentinfo.othername, academic_studentinfo.new_appID, academic_studentinfo.Awarded_course, academic_studentinfo.JAMBregNumber, academic_studentinfo.date) FROM academic_studentinfo INNER JOIN application_studentinfo ON academic_studentinfo.applicationID=application_studentinfo.applicationID WHERE academic_studentinfo.AdminStatus='admit' AND application_studentinfo.session='2022/2023' AND academic_studentinfo.applicationID!=' '";
                            $result=mysqli_query($connection, $query);
                            $get_result = mysqli_fetch_array($result);
                            print $get_result[0];
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xl font-weight-bold text-warning text-uppercase mb-4">Number of Student Not Admitted into 2022/2023 Academic Session</div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                <?php 
                            $query = "SELECT COUNT(DISTINCT academic_studentinfo.id, academic_studentinfo.applicationID, application_studentinfo.surname, application_studentinfo.othername, academic_studentinfo.new_appID, academic_studentinfo.Awarded_course, academic_studentinfo.JAMBregNumber, academic_studentinfo.date) FROM academic_studentinfo INNER JOIN application_studentinfo ON academic_studentinfo.applicationID=application_studentinfo.applicationID WHERE academic_studentinfo.AdminStatus='not admit' AND application_studentinfo.session='2022/2023' AND academic_studentinfo.applicationID!=' '";
                            $result=mysqli_query($connection, $query);
                            $get_result = mysqli_fetch_array($result);
                            print $get_result[0];
                            ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xl font-weight-bold text-info text-uppercase mb-4">
                            Number of Student Enrolled into 2022/2023 Academic Session</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php 
                            $query = "SELECT COUNT(DISTINCT students.id, registered_courses.matric_no, students.surname, students.first_name, students.middle_name, department.department_name ,students.year_of_admission, students.level) FROM registered_courses INNER JOIN students ON registered_courses.matric_no=students.matric_no INNER JOIN department ON department.department_id=students.department WHERE registered_courses.session='2022/2023'";
                            $result=mysqli_query($connection, $query);
                            $get_result = mysqli_fetch_array($result);
                            print $get_result[0];
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Content Row -->
</div>
               

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
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>