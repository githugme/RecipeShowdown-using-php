<?php

    if(isset($_POST['submit'])){

    // checking if the data is provided or throw an output message

    if(empty($_POST['name'])){
      echo "Pls type your name and submit";
    } else {
      echo htmlspecialchars($_POST['name']);
    }

    if(empty($_POST['dish'])){
      echo "Pls type your dish name and submit";
    } else {
      echo htmlspecialchars($_POST['dish']);
    }

    if(empty($_POST['ingredients'])){
      echo "Pls type the ingredients and submit";
    } else {
      echo htmlspecialchars($_POST['ingredients']);
    }

    if(empty($_POST['procedure'])){
      echo "Pls type the procedure and submit";
    } else {
      echo htmlspecialchars($_POST['procedure']);
    }

    };
?>


<html lang="en" dir="ltr">

  <?php include('templates/header.php'); ?>


  <section>

    <form class="" action="add.php" method="POST">
      <h1>Add Recipe</h1>

      <label for="">Your name</label>
      <input type="text" name="name" value="">

      <label for="">Dish name</label>
      <input type="text" name="dish" value="">

      <label for="">Ingredients (Comma seperated)</label>
      <input type="text" name="ingredients" value="">

      <label for="">Procedure</label>
      <textarea class="procedure" type="textarea" name="procedure" value=""></textarea>

      <input class="submit-button" type="submit" name="submit" value="Add Recipe">
    </form>


  </section>


  <?php include('templates/footer.php'); ?>


</html>
