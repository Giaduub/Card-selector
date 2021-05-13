<?php 
 include('functions.php');
$target_dir = "card/";                               
$target_file = $target_dir . basename($_FILES["img"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_GET["add"])) {
  $check = getimagesize($_FILES["img"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    echo "Le fichier n'est pas une image.";
    $uploadOk = 0;
  }
}

// Check file size
if ($_FILES["img"]["size"] > 500000) {
  echo "Désolé,votre fichier est trop grand.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Désolé,les formats autorisés sont JPG, JPEG, PNG & GIF.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Désolé, votre fichier n'a pas été téléchargé.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
    $nomimg = $target_dir."".htmlspecialchars( basename( $_FILES["img"]));
    addCard($nomimg);
    echo "Le fichier ". htmlspecialchars( basename( $_FILES["img"])). " a été téléchargé.";
    $delai=1;
			$url='http://localhost/card-selector/';
			header("Refresh: $delai;url=$url");
  } else {
    echo "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
  }
}
?>