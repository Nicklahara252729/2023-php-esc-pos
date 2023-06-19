<?php
/* Call this file 'hello-world.php' */
require __DIR__ . '/vendor/autoload.php';

use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;

try {
    /**
     * Printer Harus Dishare
     * Nama Printer Contoh: Generic
     */
    $connector = new WindowsPrintConnector("smb://LAPTOP-Q8K0EB15/POS80");
    $printer = new Printer($connector);

    /** RATA TENGAH */
    $img = EscposImage::load("logo.png",false);
    $printer->bitImage($img);
    $title = "TEST PRINTER ANTRIAN";
    $printer->initialize();
    $printer->setFont(Printer::FONT_A);
    $printer->setJustification(Printer::JUSTIFY_CENTER);
    $printer->text("\n");

    $printer->initialize();
    $printer->setFont(Printer::FONT_B);
    $printer->setJustification(Printer::JUSTIFY_CENTER);
    $printer->text(date('d/m/Y H:i:s') . "\n");
    $printer->setLineSpacing(5);
    $printer->text("\n");

    $printer->initialize();
    $printer->setFont(Printer::FONT_A);
    $printer->setJustification(Printer::JUSTIFY_CENTER);
    $printer->text("Nomor Antrian Anda Adalah :\n");
    $printer->text("\n");

    $printer->initialize();
    $printer->setJustification(Printer::JUSTIFY_CENTER);
    $printer->setTextSize(6, 4);
    $printer->text("A010" . "\n");
    $printer->text("\n");

    $printer->initialize();
    $printer->setFont(Printer::FONT_C);
    $printer->setTextSize(2, 2);
    $printer->setJustification(Printer::JUSTIFY_CENTER);
    $printer->text("LOKET : UMUM" . "\n");
    $printer->text("\n\n\n");

    $printer->initialize();
    $printer->setFont(Printer::FONT_A);
    $printer->setJustification(Printer::JUSTIFY_CENTER);
    $printer->text("Silahkan Menunggu Antrian Anda\n");
    $printer->text("Terima Kasih\n");
    $printer->text("\n");
    

    $printer->cut();

    /* Close printer */
    $printer->close();
} catch (Exception $e) {
    echo "Couldn't print to this printer: " . $e->getMessage() . "\n";
}
