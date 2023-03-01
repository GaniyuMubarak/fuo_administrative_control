<?php
include 'database.inc.php';
function GetFacultyId($faculty_code)
{
    global $connection;
    $faculty_code = mysqli_real_escape_string($connection, $faculty_code);
    $get_facultyId_query = "SELECT faculty_id FROM faculty WHERE faculty_code = '$faculty_code'";
    $result_get = mysqli_query($connection, $get_facultyId_query);
    if($result_get){
        $get_id = mysqli_fetch_array($result_get);
        return $get_id['faculty_id'];
    }else{
        return null;
    }
}

function GetDepartmentId($department_name)
{
    global $connection;
    $get_department_query = "SELECT department_id FROM department WHERE department_name = '$department_name'";
    $result_get_department = mysqli_query($connection, $get_department_query);
    if($result_get_department){
        $get_id_department = mysqli_fetch_array($result_get_department);
        // var_dump($get_id_department);
        var_dump($department_name);
        // return $get_id_department['department_id'];
    }else{
        return null;
    }
}

// echo GetDepartmentId('Physics, Electronics & Earth Science');