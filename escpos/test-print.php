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
    $connector = new WindowsPrintConnector("POS80");
    $printer = new Printer($connector);

    /** RATA TENGAH */
    $printer->setJustification(Printer::JUSTIFY_CENTER);
    $img = EscposImage::load("logo.png",false);
    $printer->bitImage($img);
    $printer->initialize();
    $printer->text("\n");

    $printer->initialize();
    $printer->setFont(Printer::FONT_C);
    $printer->setTextSize(2,2);
    $printer->setJustification(Printer::JUSTIFY_CENTER);
    $printer->text("BAPENDA LABUSEL"."\n\n");

    $printer->initialize();
    $printer->setFont(Printer::FONT_B);
    $printer->setJustification(Printer::JUSTIFY_CENTER);
    $printer->text(date('d/m/Y H:i:s'));
    $printer->text("\n");

    $printer->initialize();
    $printer->setFont(Printer::FONT_A);
    $printer->setJustification(Printer::JUSTIFY_CENTER);
    $printer->text("Nomor SPTPD Anda Adalah :\n");
    $printer->text("\n");

    $printer->initialize();
    $printer->setJustification(Printer::JUSTIFY_CENTER);
    $printer->setTextSize(6, 4);
    $printer->text("1.1-12.14.000000002" . "\n");
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
