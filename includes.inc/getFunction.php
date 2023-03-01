<?php
session_start();

if(!isset($_SESSION["emailAddress"])){
    header("location: index.php?error=loginrequired");
}else{
    include 'database.inc.php';
    if(isset($_GET['department_id'])){
        $faculty = $_GET['department_id'];
        $query =  mysqli_query($connection, "SELECT DISTINCT * FROM department WHERE faculty_id = $faculty ORDER BY department_id DESC");
        if(mysqli_num_rows($query) > 0){
            while($departments = mysqli_fetch_array($query)){
                $deptName = $departments['department_name'];
                $deptId = $departments['department_id'];
                echo '<option value='. $deptId .'>'. $deptName . '</option>';
            }
        }
    }

    if(isset($_GET['id'])) {
        $department = $_GET['id'];
        $query = mysqli_query($connection, "SELECT DISTINCT * FROM level WHERE id = $department");
        if(mysqli_num_rows($query) > 0){
            while($level = mysqli_fetch_array($query)){
                $levelID = $level['id'];
                $levelStatus = $level['level'];
                echo '<option value= '.$levelID . '>'. $levelStatus . '</option>';
            }
        }
    }
    
}

?>