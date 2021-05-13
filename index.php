<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>
  <?php require_once ('functions.php');
?>

    <?php if(isset($_GET['add']) && !empty($_GET['name']) && !empty($_GET['img']) && !empty($_GET['collection'])){
      $addCard = new Card();
      $addCard->addCard();
    } ?>

<form action="" method="GET">
<input type="text" name="name">
<input type="file" name="img" id="fileToUpload" >
<input type="text" name="collection">
<button type="submit" value="ajouter" name="add">Valider</button>
</form>

  <div class="container">
    <div class="row">
      <div class="col-2">
      </div>
    </div>
  </div>
          
</body>

</html>