<?php 
session_start();
session_unset();
session_destroy();

// Send a JSON response back to JS
header('Content-Type: application/json');
echo json_encode(['success' => true]);
exit();
?>