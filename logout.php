<?php

  session_start();
  if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
  }

  // Destroy the session.
    session_destroy();

  header("Location: login.php");
  exit();
  
  ?>