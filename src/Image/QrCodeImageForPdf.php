<?php

namespace ThinkQR\Image;

use Intervention\Image\ImageManagerStatic;
use ThinkQR\QRCode;

class QrCodeImageForPdf
{
    protected string $tmpFileName = '';

    public function __construct(string $content, array $options = [])
    {
        $this->tmpFileName = $this->generateTemporalFileName('png');
        ( new QRCode($content, $options) )->writePngFile($this->tmpFileName);
        static::convertImageTo8bit($this->tmpFileName);
    }

    public static function make(...$arguments): static
    {
        return new static(...$arguments);
    }

    public function filePath(): string
    {
        return $this->tmpFileName;
    }

    /**
     * Create temporal file name.
     *
     * @param string|null $ext
     *
     * @return string
     * @throws \Exception
     */
    protected function generateTemporalFileName(?string $ext = null): string
    {
        $name = tempnam(sys_get_temp_dir(), 'gen_pdf_image_qr');
        if ($ext) {
            $name = "{$name}.{$ext}";
        }
        if (!$name) {
            throw new \Exception('Temporal file name can\'t be created.');
        }

        return $name;
    }

    /**
     * FPDF support only 8 bit colors - so we need convert image before insert
     * @param string $path
     */
    public static function convertImageTo8bit(string $path): void
    {
        $img = ImageManagerStatic::make($path);
        $img->limitColors(255, '#ffffff');
        $img->save($path);
    }
}
