<?php 
  include "header.php";

  include "config.php";


  if ($_SESSION['user_Role'] == '0') {
    header("Location: {$host_namelink}/admin/post.php");
  }

?>

  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Users</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-user.php">add user</a>
              </div>

              <div class="col-md-12">
              <?php
                $limit = 3;
                // $page = $_GET['page'];

                if (isset($_GET['page'])) {
                  $page = $_GET['page'];
                } else {
                  $page = 1;
                }
                
                $offset = ($page - 1) * $limit;


                $query = "SELECT * FROM `user` ORDER BY `user_id` DESC LIMIT {$offset}, {$limit}";
                $result = mysqli_query($db_connect, $query) or die("Query Failed");

                if (mysqli_num_rows($result) > 0) {
              ?>

                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Full Name</th>
                          <th>User Name</th>
                          <th>Role</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>

                      <tbody>
                        <?php
                          while ($data_row = mysqli_fetch_assoc($result)) {
                        ?>
                          <tr>
                              <td class='id'><?php echo $data_row['user_id']; ?></td>
                              <td><?php echo $data_row['first_name'] . " " . $data_row['last_name']; ?></td>
                              <td><?php echo $data_row['username']; ?></td>

                              <td>
                                <?php
                                  if ($data_row['role'] == 1) {
                                    echo "Admin";
                                  } else {
                                    echo "Normal User";
                                  }
                                ?> 
                              </td>

                              <td class='edit'><a href="update-user.php?id=<?php echo $data_row['user_id']; ?>"><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href="delete-user.php?id=<?php echo $data_row['user_id']; ?>"><i class='fa fa-trash-o'></i></a></td>
                          </tr>
                        <?php
                          }
                        ?>
                      </tbody>

                  </table>
                <?php 
                  }


                  $pagination_query = "SELECT * FROM `user`";
                  $result_2 = mysqli_query($db_connect, $pagination_query) or die("Query Failed");

                  if (mysqli_num_rows($result_2) > 0) {
                    $total_records = mysqli_num_rows($result_2);
                    $limit = 3;
                    $total_Page = ceil($total_records / $limit);

                    echo "<ul class='pagination admin-pagination'>";
                    if ($page > 1) {
                      echo "<li><a href='users.php?page=".($page - 1)."'>Prev</a></li>";
                    }

                    for ($p = 1; $p <= $total_Page; $p++) { 

                      if ($p == $page) { //for button active
                        $active = "active";
                      } else {
                        $active = "";
                      }

                      echo "<li class='{$active}'><a href='users.php?page={$p}'>{$p}</a></li>";
                    }

                    if ($page < $total_Page) {
                      echo "<li><a href='users.php?page=".($page + 1)."'>Next</a></li>";
                    }
                    echo "</ul>";
                  }
                ?>

                  <!-- <ul class='pagination admin-pagination'>
                      <li class="active"><a>1</a></li>
                      <li><a>2</a></li>
                      <li><a>3</a></li>
                  </ul> -->
              </div>
          </div>
      </div>
  </div>

<?php 
  include "header.php"; 
?>
