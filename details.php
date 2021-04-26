<?php
  include('config/connect.php');

  if(isset($_POST['delete'])):
    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
    $sql = "DELETE FROM recipes WHERE id=$id_to_delete";


  if(mysqli_query($conn, $sql)){
    header("Location: index.php");
  } else {
    echo "Error :" .  mysqli_error($conn);
  }

  endif;

  // check get req id parameter
  if(isset($_GET['id'])){

    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // make sql (overrides previous value of $sql no confusion)
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
      <h1>--------------------------</h1>
      <h2>Ingredients : </h2>
      <h3><?php echo htmlspecialchars($recipe['ingredients']); ?></h3>
      <h2>Procedure :</h2>
      <h3><?php echo htmlspecialchars($recipe['protocol']); ?></h3>
      <h4>Created at <?php echo htmlspecialchars($recipe['created_at']); ?></h4>
    <?php else: ?>
      <h4>There is no such Pizza</h4>
    <?php endif; ?>

    <form class="" action="details.php" method="POST">

      <input type="hidden" name="id_to_delete" value="<?php echo $recipe['id'] ?>">
      <input style="
      color: #fff;
      background-color: #c64756;
      border-radius: 3px;
      font-size: 18px;
      padding: 0;
      text-align: center;
      max-width: 500px;
      margin: 30px auto;
      height: 40px;
      width: 150px;
      font-family: 'Montserrat', sans-serif;
      border: 1px solid #ddd;
      " class="delete_button" type="submit" name="delete" value="Remove">

    </form>


  </div>


  <?php include('templates/footer.php'); ?>

</html>
