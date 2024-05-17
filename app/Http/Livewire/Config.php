<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Mike42\Escpos\Printer;
use Mike42\Escpos\GdEscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;

class Config extends Component
{

    public $title = "Config";
    
    public function render()
    {
        return view('livewire.config');
    }

    public function test_print($printer){
        try {
            $connector = new WindowsPrintConnector($printer);
            // $tux = GdEscposImage::load("resource/tux.png",false,['native']);
            $printer = new Printer($connector);
            
            
            
            $printer->setJustification(Printer::JUSTIFY_CENTER);
            // $printer->bitImageColumnFormat($tux,Printer::IMG_DOUBLE_WIDTH | Printer::IMG_DOUBLE_HEIGHT);
            $printer->setJustification(Printer::JUSTIFY_LEFT);
            $printer->setFont(0);
            
            
            
            $printer->text("Helloo... world...\n");
            $printer->setFont(1);
            $printer->text("Helloo... world...\n");
            $printer->setPrintLeftMargin(0);
            $printer ->text("this is example text for printing\n");
            $printer->setUnderline();
            $printer ->text("this is underline\n");
            
            $printer->cut();
            
            /* Close printer */
            $printer -> close();
            
            echo "Test selesai...";
        } catch (\Throwable $th) {
            //throw $th;
            echo "Couldn't print to this printer: " . $th -> getMessage() . "\n";
        }
    }
}
