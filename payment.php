<?php
session_start();
if(!isset($_SESSION["emailAddress"])){
    header("location: index.php?error=loginrequired");
}else{
    require_once "includes.inc/database.inc.php";
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mt-4 my-5">
                                <div class="card-body">
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="col-md-12">
                                              <input type="text" class="input-group form-control" placeholder="Enter Matric Number e.g FUO/16/sample" name="matric">
                                        </div>
                                        <div class="col-md-12 my-3">
                                            <select class="form-select form-select-lg mb-3 input-group form-control" name="session">
                                            <option value="" require disabled selected>-- Select Session -- </option>
                                            <?php
                                                    $query = mysqli_query($connection, 'SELECT * FROM session');
                                                    if(mysqli_num_rows($query) > 0){
                                                        while($row = mysqli_fetch_array($query)){
                                                            $sessionId = $row['id'];
                                                            $sessionName = $row['session_name'];
                                                            echo '<option>'. $sessionName . '</option>';
                                                        }
                                                    }
                                                
                                                ?>
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
                                            <th>Matric Number</th>
                                            <th>Surname</th>
                                            <th>Firstname</th>
                                            <th>Middle Name</th>
                                            <th>Payment Type</th>
                                            <th>Amount Paid</th>
                                            <th>Date</th>
                                            <th>Paystack Reference</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        if(isset($_POST['search'])){
                                            $matric_no = $_POST['matric'];
                                            $session = $_POST['session'];
                                            require_once "includes.inc/database.inc.php";
                                            $query= "SELECT DISTINCT * FROM student_payment INNER JOIN students ON students.matric_no=student_payment.matric WHERE matric = '$matric_no' AND  session = '$session' AND paystack_return!='0'";
                                            $result=mysqli_query($connection, $query);
                                            if(mysqli_num_rows($result) > 0){
                                                $i = 0;
                                                foreach($result as $items){
                                                    $i++;
                                                    ?>
                                                <tr>
                                                    <td><?= $i ?></td>
                                                    <td><?= $items['matric'];?></td>
                                                    <td><?= $items['surname'];?></td>
                                                    <td><?= $items['first_name'];?></td>
                                                    <td><?= $items['middle_name'];?></td>
                                                    <td><?= $items['payment_type'];?></td>
                                                    <td><?= $items['paid_amount'];?></td>
                                                    <td><?= $items['date_time'];?></td>
                                                    <td><?= $items['payref'];?></td>
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

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>