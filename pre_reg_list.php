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
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Pre-Registration List Table</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Application Num</th>
                                            <th>Surname</th>
                                            <th>Firstname</th>
                                            <th>Middlename</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        require_once "includes.inc/database.inc.php";
                                        $query = "SELECT DISTINCT id, applicationNum, surname, firstname, middlename, phone, email, date FROM studentcreate ORDER BY id ASC";
                                        $result=mysqli_query($connection, $query);
                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['id']?></td>
                                            <td><?php echo $row['applicationNum']?></td>
                                            <td><?php echo $row['surname']?></td>
                                            <td><?php echo $row['firstname']?></td>
                                            <td><?php echo $row['middlename']?></td>
                                            <td><?php echo $row['phone']?></td>
                                            <td><?php echo $row['email']?></td>
                                            <td><?php echo $row['date']?></td>
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
