<?php
$TO = "olivier.dugelet@cpe.fr";
$h  = "From: " . $TO;
$message = "";
while (list($key, $val) = each($_POST)) {
  $message .= "$key : $val\n";
}
mail($TO, $subject, $message, $h);
Header("Location: ciblecontact.php");
?>
