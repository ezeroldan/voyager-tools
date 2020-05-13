<?php

namespace EzeRoldan\VoyagerTools\Seeder\Bread\Field\Types;

use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Field;

class Image extends Field
{
    public function __construct(string $dbColName, string $name = null,  int $widthPx = null, int $heightPx = null, int  $width = null)
    {
        parent::__construct('image', $dbColName, $name, false, $width);
        $this->extras['resize']['width'] = $widthPx;
        $this->extras['resize']['height'] = $heightPx;
    }

    public function  setQuality(int $quality): self
    {
        $this->extras['quality'] = "{$quality}%";
        return $this;
    }

    public function  setUpsize(bool $value = true): self
    {
        $this->extras['upsize'] = $value;
        return $this;
    }

    public function  setThumbnails(array $thumbnails): self
    {
        $this->extras['thumbnails'] = $thumbnails;
        return $this;
    }

    public function  addThumbnail(string $name, int $scale = null, int $cropWidth = null, $cropHeight = null): self
    {
        $thumbnail = [];
        $thumbnail['name'] = $name;

        if ($scale) {
            $thumbnail['scale'] = "{$scale}%";
        }

        if ($cropWidth && $cropHeight) {
            $thumbnail['crop'] = [
                'width' => $cropWidth,
                'height' => $cropHeight
            ];
        }

        $this->extras['thumbnails'][] = $thumbnail;
        return $this;
    }
}
