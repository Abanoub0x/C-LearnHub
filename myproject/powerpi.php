<?php
$pdfFilePath = "powerpi.pdf"; 

header('Content-Type: application/pdf');

@readfile($pdfFilePath);
?>
