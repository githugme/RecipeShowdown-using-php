<?php

	// Connecting to the database
	include('config/connect.php');

	// query and taking the result back in associative array

	$sql = 'SELECT name, dish, id from recipes ORDER BY created_at';

	$result = mysqli_query($conn, $sql);

	$recipes = mysqli_fetch_all($result, MYSQLI_ASSOC);



	// free result data for memory
	mysqli_free_result($result);

	// close connection
	mysqli_close($conn);


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

  <?php include('templates/header.php'); ?>

	<h1 style="cursor: pointer" class="recipe-title">Recipes</h1>


	<div style="max-width: 1000px;
  margin: 40px auto;"class="grid-container">

			<?php foreach($recipes as $recipe): ?>

				<div class="card">
					<h2><?php echo htmlspecialchars($recipe['name']); ?></h2>
					<h3>Dish: <?php echo htmlspecialchars($recipe['dish']); ?></h3>
					<a class="" href="details.php?id=<?php echo $recipe['id'] ?>">More info</a>
				</div>

			<?php endforeach; ?>

	</div>

  <?php include('templates/footer.php'); ?>


</html>
