<?php

require_once 'vendor/autoload.php';

use SweetAlert\SweetAlert;

// Connect to the database
$db = new PDO('mysql:host=localhost;dbname=pointofsale', 'root', '');

// Validate the menu data
if (empty($_POST['menu_name'])) {
  SweetAlert::error('Menu name is required!');
} elseif (strlen($_POST['menu_name']) > 100) {
  SweetAlert::error('Menu name must not exceed 100 characters!');
} elseif (empty($_POST['menu_desc'])) {
  SweetAlert::error('Menu description is required!');
} elseif (strlen($_POST['menu_desc']) > 1000) {
  SweetAlert::error('Menu description must not exceed 1000 characters!');
} else {
  // Insert the menu data into the database
  $stmt = $db->prepare('INSERT INTO ref_menu (menu_name, menu_desc) VALUES (:menu_name, :menu_desc)');
  $stmt->bindParam(':menu_name', $_POST['menu_name']);
  $stmt->bindParam(':menu_desc', $_POST['menu_desc']);
  $stmt->execute();

  // Get the last inserted menu ID
  $lastInsertId = $db->lastInsertId();

  // Display a success message
  SweetAlert::success('Menu successfully created!');

  // Redirect to the menu list page
  header('Location: menu_list.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Menu Item</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <h1>Add Menu Item</h1>

    <form action="add_menu.php" method="post">
      <div class="form-group">
        <label for="menu_name">Menu Name</label>
        <input type="text" class="form-control" id="menu_name" name="menu_name" placeholder="Enter menu name">
      </div>

      <div class="form-group">
        <label for="menu_desc">Menu Description</label>
        <textarea class="form-control" id="menu_desc" name="menu_desc" placeholder="Enter menu description"></textarea>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.5/dist/sweetalert2.all.min.js"></script>
</body>
</html>
