<?php
require 'vendor/autoload.php';

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

if (isset($_GET['text']) && !empty(trim($_GET['text']))) {
    $text = $_GET['text'];
    $qrCode = QrCode::create($text)->setSize(300);
    $writer = new PngWriter();
    $result = $writer->write($qrCode);

    header('Content-Type: '.$result->getMimeType());
    echo $result->getString();
} else {
    http_response_code(400);
    echo "Input tidak valid.";
}
?>
