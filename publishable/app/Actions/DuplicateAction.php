<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class DuplicateAction extends AbstractAction
{
    public function getTitle()
    {
        return 'Duplicar';
    }

    public function getIcon()
    {
        return 'mdi mdi-content-copy';
    }

    public function getPolicy()
    {
        return 'edit';
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-info pull-right duplicate',
        ];
    }

    public function getDefaultRoute()
    {
        return route('voyager.' . $this->dataType->slug . '.duplicate', ['id' => $this->data->id]);
    }
}
