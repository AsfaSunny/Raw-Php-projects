<?php 
  include "config.php";


  $del_id = $_GET['id'];
  $query = "DELETE FROM `user` WHERE `user_id`='{$del_id}'";

  if (mysqli_query($db_connect, $query)) {
    header("Location: {$host_namelink}/admin/users.php");
  } else {
    echo "<p style = 'color: red; text-align: center;'>Cannot Delete the User</p>";
  }


  mysqli_close($db_connect);
?>