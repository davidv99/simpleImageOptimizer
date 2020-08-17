<?php

namespace DavidValbuena;

class Image
{
    protected $path;
    private $width;
    private $height;
    /**
     * @var bool
     */
    private $grayScale;
    private $framed;

    public function __construct($path, $width, $height, $grayScale = false, $framed = false)
    {
        $this->path = $path;
        $this->width = $width;
        $this->height = $height;
        $this->grayScale = $grayScale;
        $this->framed = $framed;
    }

    public function draw()
    {
        $img = imagecreatefromjpeg($this->path);

        if ($this->width && $this->height) {
            $img = imagescale($img, $this->width, $this->height);
        }

        if ($this->grayScale) {
            imagefilter($img, IMG_FILTER_GRAYSCALE);
        }

        if ($this->framed) {
            for ($i = 0; $i < $this->framed; $i++) {
                imagerectangle($img, $i, $i, imagesx($img) - $i - 1, imagesy($img) - $i - 1, imagecolorallocate($img, 0,0,0));
            }
        }

        return $img;
    }
}