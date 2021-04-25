<?php

    include('config/connect.php');
    $name = $dish = $ingredients = $protocol = "";
    $errors = ["name" => "", "dish" => "", "ingredients" => "", "protocol" => ""];

    if(isset($_POST['submit'])){

    // checking if the data is provided correctly or throw an output message

      if(empty($_POST['name'])){
        $errors["name"] = "Pls type your name and submit";
      } else {
        $name = $_POST['name'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $name)){
          $errors["name"] = "Must only contain letters and spaces";
        }
      }

      if(empty($_POST['dish'])){
        $errors["dish"] = "Pls type your dish name and submit";
      } else {
        $dish = $_POST['dish'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $dish)){
        $errors["dish"] = "Must only contain letters and spaces";
      }
      }

      if(empty($_POST['ingredients'])){
        $errors["ingredients"] = "Pls type the ingredients and submit";
      } else {
        $ingredients = $_POST['ingredients'];
        if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
        $errors["ingredients"] = "use comma to seperate items and must only consist of letters and spaces";
      }
      }

      if(empty($_POST['protocol'])){
        $errors["protocol"] = "Pls type the protocol and submit";
      } else {
        $protocol = $_POST['protocol'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $protocol)){
        $errors["protocol"] = "Must only contain letters and spaces";
      }
      }


      if(array_filter($errors)){
			//echo 'errors in form';
		} else {
			// escape sql chars
			$name = mysqli_real_escape_string($conn, $_POST['name']);
			$dish = mysqli_real_escape_string($conn, $_POST['dish']);
			$ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);
      $protocol = mysqli_real_escape_string($conn, $_POST['protocol']);

			// create sql
      $sql = "INSERT INTO recipes(name,dish,ingredients) VALUES('$name','$dish','$ingredients')";

			// save to db and check
			if(mysqli_query($conn, $sql)){
				// success
				header('Location: index.php');
			} else {
				echo 'query error: '. mysqli_error($conn);
			}


		}
    };
?>


<html lang="en" dir="ltr">

  <?php include('templates/header.php'); ?>


  <section>

    <form class="" action="add.php" method="POST">
      <h1>Add Recipe</h1>

      <label for="">Your name: </label>
      <input type="text" name="name" value="<?php echo htmlspecialchars($name) ?>">
      <p><?php echo $errors["name"]; ?></p>

      <label for="">Dish name: </label>
      <input type="text" name="dish" value="<?php echo htmlspecialchars($dish) ?>">
      <p><?php echo $errors["dish"]; ?></p>

      <label for="">Ingredients: </label>
      <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients) ?>">
      <p><?php echo $errors["ingredients"]; ?></p>

      <label for="">procedure: </label>
      <textarea class="protocol" type="textarea" name="protocol" value="<?php echo htmlspecialchars($protocol) ?>"></textarea>
      <p><?php echo $errors["protocol"]; ?></p>

      <input class="submit-button" type="submit" name="submit" value="Add Recipe">
    </form>


  </section>


  <?php include('templates/footer.php'); ?>


</html>
