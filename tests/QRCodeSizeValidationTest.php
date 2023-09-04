<?php

namespace ThinkQR\Tests;

use ThinkQR\QRCode;

class QRCodeSizeValidationTest extends TestCase
{

    /** @test */
    public function render_size_cant_be_less_1()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Render size should be between 1-999999px');

        $qrCode = QRCode::make('foo', [
            'render_size' => 0,
        ]);
    }

    /** @test */
    public function setter_render_size_cant_be_less_1()
    {
        $qrCode = QRCode::make('foo');

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Render size should be between 1-999999px');
        $qrCode->renderSize(0);
    }

    /** @test */
    public function render_size_cant_be_great_999999()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Render size should be between 1-999999px');

        $qrCode = QRCode::make('foo', [
            'render_size' => 1000000,
        ]);
    }

    /** @test */
    public function setter_render_size_cant_be_great_999999()
    {
        $qrCode = QRCode::make('foo');

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Render size should be between 1-999999px');
        $qrCode->renderSize(1000000);
    }

    /** @test */
    public function margin_cant_be_less_0()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Margin should be between 0-999999px');

        $qrCode = QRCode::make('foo', [
            'margin' => -0.1,
        ]);
    }

    /** @test */
    public function setter_margin_cant_be_less_0()
    {
        $qrCode = QRCode::make('foo');

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Margin should be between 0-999999px');
        $qrCode->margin(-0.1);
    }

    /** @test */
    public function margin_cant_be_great_999999()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Margin should be between 0-999999px');

        $qrCode = QRCode::make('foo', [
            'margin' => 1000000,
        ]);
    }

    /** @test */
    public function setter_margin_cant_be_great_999999()
    {
        $qrCode = QRCode::make('foo');

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Margin should be between 0-999999px');
        $qrCode->margin(1000000);
    }

    /** @test */
    public function has_content_setter()
    {
        $qrCode = QRCode::make('foo');

        $this->assertEquals('foo', $qrCode->getContent());

        $qrCode->content('bar');

        $this->assertEquals('bar', $qrCode->getContent());
    }
}
