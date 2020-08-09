<?php

namespace EzeRoldan\VoyagerTools\Seeder\Bread\Field\Types;

use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Field;

/**
 * Agregar el traint al modelo al usar este campo
 * TCG\Voyager\Traits\Resizable
 */
class MediaPicker extends Field
{

    public function __construct(string $dbColName, string $name = null, int $width = null, int $min = 0, int $max = 20)
    {
        parent::__construct('media_picker', $dbColName, $name, false, $width);
        $this->hideInPageBrowse();
        $this->setExtra('min', $min);
        $this->setExtra('max', $max);

        /** Opciones Default */
        $this->setExpanded();
        $this->setAllowCrop();
        $this->setAllowMove();
        $this->setShowFolders();
        $this->setShowToolbar();
        $this->setAllowUpload();
        $this->setAllowDelete();
        $this->setAllowRename();
        $this->setAllowCreateFolder();
        $this->setRename("{random:10}");
    }

    /**
     * Delete files if the BREAD entry is deleted.
     *
     * @return self
     */
    public function setDeleteFiles(): self
    {
        $this->extras['delete_files'] = true;
        return $this;
    }

    /**
     * Show subfolders
     *
     * @param boolean $value
     * @return self
     */
    public function setShowFolders(bool $value = true): self
    {
        $this->extras['show_folders'] = $value;
        return $this;
    }

    /**
     * Shows/hides the whole toolbar
     *
     * @param boolean $value
     * @return self
     */
    public function setShowToolbar(bool $value = true): self
    {
        $this->extras['show_toolbar'] = $value;
        return $this;
    }

    /**
     * Allow users to upload new files
     *
     * @param boolean $value
     * @return self
     */
    public function setAllowUpload(bool $value = true): self
    {
        $this->extras['allow_upload'] = $value;
        return $this;
    }

    /**
     * Allow users to move files/folders
     *
     * @param boolean $value
     * @return self
     */
    public function setAllowMove(bool $value = true): self
    {
        $this->extras['allow_move'] = $value;
        return $this;
    }

    /**
     * Allow users to delete files
     *
     * @param boolean $value
     * @return self
     */
    public function setAllowDelete(bool $value = true): self
    {
        $this->extras['allow_delete'] = $value;
        return $this;
    }

    /**
     * Allow users to create new folders
     *
     * @param boolean $value
     * @return self
     */
    public function setAllowCreateFolder(bool $value = true): self
    {
        $this->extras['allow_create_folder'] = $value;
        return $this;
    }

    /**
     * Allow users to rename files.
     *
     * @param boolean $value
     * @return self
     */
    public function setAllowRename(bool $value = true): self
    {
        $this->extras['allow_rename'] = $value;
        return $this;
    }

    /**
     * Allow users to crop images
     *
     * @param boolean $value
     * @return self
     */
    public function setAllowCrop(bool $value = true): self
    {
        $this->extras['allow_crop'] = $value;
        return $this;
    }

    /**
     * The allowed types to be uploaded/selected.
     *
     * @param string $type
     * @return self
     */
    public function addAllowed(string $type): self
    {
        $this->extras['allowed'][] = $type;
        return $this;
    }

    public function addAllowedImage(): self
    {
        return $this->addAllowed('image');
    }

    public function addAllowedJPEG(): self
    {
        return $this->addAllowed('image/jpeg');
    }

    public function addAllowedPNG(): self
    {
        return $this->addAllowed('image/png');
    }

    public function addAllowedBMP(): self
    {
        return $this->addAllowed('image/bmp');
    }

    public function addAllowedVideo(): self
    {
        return $this->addAllowed('video');
    }

    public function addAlloweAaudio(): self
    {
        return $this->addAllowed('audio');
    }

    /**
     * The start path relative to the filesystem
     * Can contain the following placeholders:
     * 
     * {pk} the primary-key of the entry (only for base_path)
     * {uid} the user-id of the current logged-in user
     * {date:format} the current date in the format defined in format. For example {date:d.m.Y}
     * {random:10} random string with N characters
     * 
     * So a base_path can, for example, look like the following:
     * /my-bread/{pk}/{date:Y}/{date:m}/
     * 
     * @param string $name
     * @return self
     */
    public function setBasePath(string $path): self
    {
        $this->extras['base_path'] = $path;
        return $this;
    }

    /**
     * Rename uploaded files to a given string/expression
     * Can contain the following placeholders:
     * 
     * {pk} the primary-key of the entry (only for base_path)
     * {uid} the user-id of the current logged-in user
     * {date:format} the current date in the format defined in format. For example {date:d.m.Y}
     * {random:10} random string with N characters
     *
     * @param string $name
     * @return self
     */
    public function setRename(string $name): self
    {
        $this->extras['rename'] = $name;
        return $this;
    }

    /**
     * Shows stored data as images when browsing
     *
     * @param bool $value
     * @return self
     */
    public function setShowAsImages(bool $value = true): self
    {
        $this->extras['show_as_images'] = $value;
        return $this;
    }

    /**
     * If the media-picker should be expanded by default
     * 
     * @return self
     */
    public function setExpanded(): self
    {
        $this->extras['expanded'] = true;
        return $this;
    }

    /**
     * If the media-picker should be collapsed by default
     * 
     * @param bool $value
     * @return self
     */
    public function setCollapsed(): self
    {
        $this->extras['expanded'] = false;
        return $this;
    }


    /**
     * Hides known thumbnails and shows them as children of the parent image
     *
     * @param boolean $value
     * @return self
     */
    public function setHideThumbnails(bool $value = true): self
    {
        $this->extras['hide_thumbnails'] = $value;
        return $this;
    }

    /**
     * Sets the quality of uploaded images and thumbnails
     *
     * @param integer $quality
     * @return self
     */
    public function setQuality(int $quality): self
    {
        $this->extras['quality'] = $quality;
        return $this;
    }

    /**
     * Watermark
     * A watermark can be added to uploaded images. 
     * 
     * Position:
     * - top-left (default)
     * - top
     * - top-right
     * - left
     * - center
     * - right
     * - bottom-left
     * - bottom
     * - bottom-right
     *
     * @param string $source Relative to Voyagers storage-disk. 
     * @param string $position
     * @param integer $x Relative offset to the position on the x-axis. Defaults to 0
     * @param integer $y Relative offset to the position on the y-axis. Defaults to 0
     * @param integer $size The size (in percent) of the watermark relative to the image. Defaults to 15
     * @return self
     */
    public function setWatermark(string $source, string $position = 'top-left', int $x = 0, int $y = 0, int $size = null): self
    {
        $watermark = [];

        $watermark['source']   = $source;
        $watermark['position'] = $position;

        $watermark['x'] = $x;
        $watermark['y'] = $y;

        if ($size) {
            $watermark['size'] = $size;
        }

        $this->extras['watermark'] = $watermark;
        return $this;
    }

    protected function addThumbnail(array $thumbnail)
    {
        if (!isset($this->extras['thumbnails'])) {
            $this->extras['thumbnails'] = [];
        }

        $this->extras['thumbnails'][] = $thumbnail;
        return $this;
    }

    /**
     * Thumbnail Fit
     * 
     * Fit combines cropping and resizing to find the best way to generate a thumbnail matching your dimensions.
     * You have to pass width and can pass height and position
     * 
     * Position: Refer to http://image.intervention.io/api/fit
     * - top-left
     * - top
     * - top-right
     * - left
     * - center (default)
     * - right
     * - bottom-left
     * - bottom
     * - bottom-right
     * 
     * @param integer $width The width the image will be resized to after cropping out the best fitting aspect ratio.
     * @param integer $height The height the image will be resized to after cropping out the best fitting aspect ratio. If no height is given, method will use same value as width.
     * @param string $name
     * @param string $position 
     * @return self
     */
    public function addThumbnailFit(int $width = null, int $height = null, string $name = null, string $position =  'center'): self
    {
        $thumbnail = [];

        $thumbnail['type'] = 'fit';

        if (is_null($name)) {
            $name = [];

            if (!is_null($width)) {
                $name[] = $width;
            }

            if (!is_null($height)) {
                $name[] = $height;
            }

            $thumbnail['name'] = implode('-', $name);
        } else {
            $thumbnail['name'] = $name;
        }

        if (!is_null($width)) {
            $thumbnail['width']  = $width; // Required
        }

        if (!is_null($height)) {
            $thumbnail['height'] = $height; // Optional
        }

        $thumbnail['position'] = $position; // Optional. 

        return $this->addThumbnail($thumbnail);
    }

    /**
     * Thumbnail Crop
     * 
     * Crop an image by given dimensions and position. 
     * You have to pass width and height and can pass x and y.
     *
     * @param integer $width
     * @param integer $height
     * @param string $name
     * @param integer $x
     * @param integer $y
     * @return self
     */
    public function addThumbnailCrop(int $width, int $height, string $name = null, int $x = null, int $y = null): self
    {
        $thumbnail = [];

        $thumbnail['type'] = 'crop';
        $thumbnail['name'] = is_null($name) ? "{$width}-{$height}" : $name;

        $thumbnail['width']  = $width; // Required
        $thumbnail['height'] = $height; // Required

        $thumbnail['x'] = $x; // Optional. Left offset
        $thumbnail['y'] = $y; // Optional. Top offset

        return $this->addThumbnail($thumbnail);
    }

    /**
     * Thumbnail Resize
     * Resize the image to the given dimensions. 
     * You have to pass width and/or height
     *
     * @param integer $width
     * @param integer $height
     * @param string $name
     * @param boolean $upsize Set to false to prevent upsizing
     * @return self
     */
    public function addThumbnailResize(int $width, int $height = null, string $name = null, bool $upsize = true): self
    {
        $thumbnail = [];

        $thumbnail['type'] = 'resize';

        if (is_null($name)) {
            $name = [$width];
            if (!is_null($height)) {
                $name[] = $height;
            }

            $thumbnail['name'] = implode('-', $name);
        } else {
            $thumbnail['name'] = $name;
        }

        $thumbnail['width']  = $width;

        if (!is_null($height)) {
            $thumbnail['height'] = $height;
        }

        $thumbnail['upsize'] = $upsize; // Optional.

        return $this->addThumbnail($thumbnail);
    }
}
