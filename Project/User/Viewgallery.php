<?php

include('../Assets/Connection/Connection.php');
include('Header.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FitSeeker::Gallery</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Custom CSS can be added here */
  </style>
</head>
<body>

<div class="container mt-5">
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Gallery Caption</th>
        <th scope="col">Gallery</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // Assuming $con is your database connection object
      $selquery = "SELECT * FROM tbl_gallery WHERE traineer_id = '".$_GET["gid"]."'";
      $result = $con->query($selquery);
      $i = 0;
      while($data = $result->fetch_assoc()) {
        $i++;
      ?>
      <tr>
        <td><?php echo $data["gallery_name"]; ?></td>
        <td><img src="../Assets/Files/Traineerdocs/Gallery/<?php echo $data["gallery_photo"]; ?>" class="img-thumbnail" width="50" height="50" alt="Gallery Image"></td>
      </tr>
      <?php
      } 
      ?>
    </tbody>
  </table>
</div>

<!-- Bootstrap JS (Optional, only if you need Bootstrap's JavaScript components) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</body>
<?php
include('Footer.php');
?>
</html>
