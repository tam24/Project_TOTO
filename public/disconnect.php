<?php
	// Include configuration and header added in all files /public
  require_once __DIR__.'/../inc/config.php';
  session_destroy();
  // At the end, display the index
  header("Location: index.php");
  exit();

?>
