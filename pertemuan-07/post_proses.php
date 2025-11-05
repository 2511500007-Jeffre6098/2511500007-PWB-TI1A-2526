<?php
session_start();
  $sesname = $_POST["nama"];
  $sesemail = $_POST["email"];
  $sespesan = $_POST["pesan"];
  echo $_SESSION["nama"]. $_SESSION["email"]. $_SESSION["pesan"]
  #header("Location: post.php");
?>