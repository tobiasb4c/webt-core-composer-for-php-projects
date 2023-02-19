<?php
namespace Fn\WebtCoreComposerForPhpProjects;

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

class QRCode{
    private $QRCode;

    public function __construct(string $number, int $size)
    {
        $QRCode = Builder::create()
            ->writer(new PngWriter())
            ->writerOptions([])
            ->data($number)
            ->encoding(new Encoding('UTF-8'))
            ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
            ->size($size)
            ->margin(10)
            ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->labelText($number)
            ->labelFont(new NotoSans(20))
            ->labelAlignment(new LabelAlignmentCenter())
            ->validateResult(false)
            ->build();

        $QRCode->saveToFile('imgs/' . str_replace(" ", "", $number) . '.png');
        $this->setQRCode($QRCode);
    }

    public function getQRCode()
    {
        return $this->QRCode;
    }

    public function setQRCode($QRCode)
    {
        $this->QRCode = $QRCode;
    }

    public function getURI()    {
        return $this->QRCode->getDataUri();
    }
}




?>

