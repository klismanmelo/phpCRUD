<?php
    include "db_connect.php";
    $id = $_GET['id'];
    
        $sql = "DELETE FROM `list_user` WHERE id=$id";

        $result = mysqli_query($connect,$sql);

        if($result){
            header("Location: index.php?msg=Data deleted succesfully");
        }else
            echo "Failed: " . mysqli_error($connect);
?>