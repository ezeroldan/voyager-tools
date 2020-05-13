<?php

namespace EzeRoldan\VoyagerTools\Seeder\Bread\Field\Types;

use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Field;

/**
 * Agregar el traint al modelo al usar este campo
 * TCG\Voyager\Traits\Resizable
 */
class MediaPicker extends Field
{

    public function __construct(string $dbColName, string $name = null, int $width = null)
    {
        parent::__construct('media_picker', $dbColName, $name, false, $width);
        $this->hideInPageBrowse();
        $this->setExtra('min', 0);
        $this->setExtra('max', 0);
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
}


/*


base_path
The start path relative to the filesystem
String
/bread-slug/


rename
Rename uploaded files to a given string/expression
String
Original name


show_as_images
Shows stored data as images when browsing
bool
false


expanded
If the media-picker should be expanded by default
bool
true


hide_thumbnails
Hides known thumbnails and shows them as children of the parent image
bool
true


quality
Sets the quality of uploaded images and thumbnails
int
90


*/
