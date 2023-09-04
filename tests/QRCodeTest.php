<?php

namespace ThinkQR\Tests;

use Illuminate\Support\Str;
use ThinkQR\QRCode;

class QRCodeTest extends TestCase
{

    /** @test */
    public function get_svg_string()
    {
        $qrCode = QRCode::make('foo');

        $this->assertStringContainsString('<?xml version="1.0" encoding="UTF-8"?>', $qrCode->getSvgString());
    }

    /** @test */
    public function get_png_string()
    {
        $qrCode = QRCode::make('foo');

        $this->assertIsString($qrCode->getPngString());
    }

    /** @test */
    public function write_svg_file()
    {
        $qrCode = QRCode::make('foo');

        $name = rtrim(sys_get_temp_dir(), DIRECTORY_SEPARATOR). DIRECTORY_SEPARATOR . Str::uuid() .'example.file';

        $this->assertFileDoesNotExist($name);

        $qrCode->writeSvgFile($name);

        $this->assertFileExists($name);
    }

    /** @test */
    public function write_png_file()
    {
        $qrCode = QRCode::make('foo');

        $name = rtrim(sys_get_temp_dir(), DIRECTORY_SEPARATOR). DIRECTORY_SEPARATOR . Str::uuid() .'example.file';

        $this->assertFileDoesNotExist($name);

        $qrCode->writePngFile($name);

        $this->assertFileExists($name);
    }
}
