<?php

namespace EzeRoldan\VoyagerTools\Seeder\Bread\Field\Types;

use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Field;

class ImagesMultiple extends Field
{
    public function __construct(string $dbColName, string $name = null, int $width = null)
    {
        parent::__construct('multiple_images', $dbColName, $name, false, $width);
        $this->hideInPageBrowse();
        $this->setExtra('thumbnails', []);
    }

    public function setResize(int $width = null, int $height = null)
    {
        $resize = [];
        $resize['width'] = null;
        $resize['height'] = null;
        return $this->setExtra('resize', $resize);
    }

    public function setQuality(int $quality)
    {
        return $this->setExtra('quality', $quality . '%');
    }

    public function setUpsize()
    {
        return $this->setExtra('upsize', true);
    }

    public function addThumbnailScale(int $scale, string $name = 'thumbnail')
    {
        $this->extras['thumbnails'][] = [
            'name'  => $name,
            'scale' => $scale . '%'
        ];
        return $this;
    }

    public function addThumbnail(int $width = null, $height = null, string $name = 'thumbnail')
    {
        $this->extras['thumbnails'][] = [
            'name' => $name,
            'crop' => [
                'width'  => $width,
                'height' => $height
            ]
        ];

        return $this;
    }
}
