<?php
$allowedExts = array("htm","html");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
$upload_location = "/home4/brightk1/public_html/budget/";
if (($_FILES["file"]["type"] == "text/html") && ($_FILES["file"]["size"] < 200000) && in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0){
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else{
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

    if (file_exists($upload_location . $_FILES["file"]["name"])){
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else{
      move_uploaded_file($_FILES["file"]["tmp_name"], $upload_location. $_FILES["file"]["name"]);
      echo "Stored in: " . $upload_location . $_FILES["file"]["name"];
      }
    }
  }
else{
  echo "Invalid file <br />";
  echo $_FILES["file"]["type"];
  }
?>