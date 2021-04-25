<?php
  include('config/connect.php');

  // check get req id parameter
  if(isset($_GET['id'])){

    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // make sql
    $sql = "SELECT * FROM recipes WHERE id=$id";

    $result = mysqli_query($conn, $sql);

    $recipe = mysqli_fetch_assoc($result);
    // $recipe = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);

    mysqli_close($conn);

  }

?>

<!DOCTYPE html>
<html>
  <?php include('templates/header.php'); ?>

  <div style=""
  class="details">


    <?php if($recipe): ?>
      <h2>Name : <?php echo htmlspecialchars($recipe['name']); ?></h2>
      <h2>Dish : <?php echo htmlspecialchars($recipe['dish']); ?></h2>
      <h2>Ingredients : </h2>
      <h3><?php echo htmlspecialchars($recipe['ingredients']); ?></h3>
      <h2>Procedure :</h2>
      <h3><?php echo htmlspecialchars($recipe['protocol']); ?></h3>
      <h4>Created at <?php echo htmlspecialchars($recipe['created_at']); ?></h4>
    <?php else: ?>
      <h4>There is no such Pizza</h4>
    <?php endif; ?>


  </div>

  <?php include('templates/footer.php'); ?>

</html>
