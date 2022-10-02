<?php

namespace ThinkQR;

use BaconQrCode\Renderer\Image\ImageBackEndInterface;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

/**
 * QR code image generator
 */
class QRCode
{
    protected string $content;
    protected float $renderSize;
    protected float $margin;

    /**
     * @param  string  $content
     * @param  array  $options
     */
    public function __construct(string $content, array $options = [])
    {
        $this->content    = $content;
        $this->renderSize = $options['render_size'] ?? config('thinkqr.defaults.render_size');
        $this->margin     = $options['margin']      ?? config('thinkqr.defaults.margin');
    }

    protected function prepareWriter(?ImageBackEndInterface $imageBackEnd = null): Writer
    {
        $renderer = new ImageRenderer(
            new RendererStyle($this->renderSize, $this->margin),
            $imageBackEnd ?? new SvgImageBackEnd()
        );

        return new Writer($renderer);
    }

    public function content(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function renderSize(float $renderSize, ?float $margin = null): self
    {
        $this->renderSize = $renderSize;

        if (!is_null($margin)) {
            $this->margin($margin);
        }

        return $this;
    }

    public function margin(float $margin): self
    {
        $this->margin = $margin;

        return $this;
    }

    public function getSvgString(): string
    {
        return $this->prepareWriter()->writeString($this->content);
    }

    public function getPngString(): string
    {
        return $this->prepareWriter(new ImagickImageBackEnd())->writeString($this->content);
    }

    public function writeSvgFile(string $filename): static
    {
        $this->prepareWriter()->writeFile($this->content, $filename);

        return $this;
    }

    public function writePngFile(string $filename): static
    {
        $this->prepareWriter(new ImagickImageBackEnd())->writeFile($this->content, $filename);

        return $this;
    }
}
