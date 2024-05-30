<?php
 
require_once('classes/database.php');
 
$con = new database();
session_start();
// if (isset($_SESSION['user']) || $_SESSION['account_type'] !=0){
//   header('location: login.php');
// }
 
 if(isset($_POST['delete'])) {
    $id = $_POST['id'];
    if ($con->delete($id)) {
    header('location:index.php');
    }else{
        echo "Something went wrong.";
    }
    }
 ?>
 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome!</title>
  <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.css">
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- For Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="./include/style.css">
</head>
<body>
  
<?php include('includes/navbar.php');?>
 
<div class="container user-info rounded shadow p-3 my-2">
<h2 class="text-center mb-2">User Table</h2>
  <div class="table-responsive text-center">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>#</th>
          <th>Profile</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Birthday</th>
          <th>Sex</th>
          <th>Username</th>
          <th>Address</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
 
      <?php
      $counter= 1;
      $data = $con->view();
      foreach ($data as $rows){
      ?>
 
 
 
        <tr>
          <td> <?php echo $counter++;?></td>
          <td>
        <?php if (!empty($rows['user_profile_picture'])): ?>
          <img src="<?php echo htmlspecialchars($rows['user_profile_picture']); ?>" alt="Profile Picture" style="width: 50px; height: 50px; border-radius: 50%;">
        <?php else: ?>
          <img src="path/to/default/profile/pic.jpg" alt="Default Profile Picture" style="width: 50px; height: 50px; border-radius: 50%;">
        <?php endif; ?>
      </td>
          <td><?php echo $rows['FirstName']; ?></td>
          <td><?php echo $rows['LastName']; ?></td>
          <td><?php echo $rows['Birthday']; ?></td>
          <td><?php echo $rows['Sex']; ?></td>
          <td><?php echo $rows['user']; ?></td>
          <td><?php echo $rows['Address']; ?></td>
          <td>
 
          <div class="btn-group" role="group">
          <form action="update.php" method="post" class="d-inline">
                                    <input type="hidden" name="id" value="<?php echo $rows['user_id']; ?>">
                                    <button type="submit" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </form>
                                <form method="POST" class="d-inline">
                                    <input type="hidden" name="id" value="<?php echo $rows['user_id']; ?>">
                                    <button type="submit" name="delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
        </div>
        </td>
        </tr>
        <?php
      }
      ?>
        <!-- Add more rows for additional users -->
      </tbody>
    </table>
  </div>
</div>
</div>
 
<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="./bootstrap-5.3.3-dist/js/bootstrap.js"></script>
<!-- Bootsrap JS na nagpapagana ng danger alert natin -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
 
</body>
</html>
 