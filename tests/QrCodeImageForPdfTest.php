<?php

namespace ThinkQR\Tests;

use ThinkQR\Image\QrCodeImageForPdf;

class QrCodeImageForPdfTest extends TestCase
{

    /** @test */
    public function file_path()
    {
        $qrCode = QrCodeImageForPdf::make('foo');

        $this->assertFileExists($qrCode->filePath());
    }
}
