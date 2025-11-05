<?php
session_start();
  $sesname = $_SESSION["nama"];
  $sesemail = $_SESSION["email"];
  $sespesan = $_SESSION["pesan"];
  echo "$sesname $sesemail $sespesan";
  header("Location: get.php");
?>