<?php
include("conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && isset($_POST['job_id'])) {
    $worker_id = $_POST['worker_id'];
    $job_id = $_POST['job_id'];
    $action = $_POST['action'];
    $job_user = $_POST['job_user'];

        $message= "The job have completed";

        $sql = "INSERT INTO chat_tab (sender, receiver, message) VALUES ('$worker_id','$job_user', '$message')";
        mysqli_query($conn, $sql);

        $accept_query = "UPDATE job_tab SET requst=3 WHERE job_id='$job_id' AND job_worker='$worker_id'";
        $update = mysqli_query($conn, $accept_query);
        if ($update) {
            echo "<script>window.location.href='request.php';</script>";
        } else {
            echo "<script>alert('Error accepting the job'); window.location.href='request.php';</script>";
        }
    } 

