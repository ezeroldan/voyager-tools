<?php

namespace App\Http\Controllers\Admin;

use Laracsv\Export;
use App\Web\Suscriptor;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Auth;
use App\Filters\Admin\SuscriptorFilter;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class SuscriptorController extends VoyagerBaseController
{
    public function index(Request $request)
    {

        /** Modelo */
        $dataType = Voyager::model('DataType')->where('slug', '=', $this->getSlug($request))->first();
        $this->authorize('browse', app($dataType->model_name));


        /** Resultados */
        $query = Suscriptor::filter($request->all(), SuscriptorFilter::class);
        
        /** Descargar */
        if ($request->csv) {
            $csv = new Export();
            $csv->build($query->get(), ['email']);
            return $csv->download("{$dataType->slug}.csv");
        }

        $dataTypeContent = $query->paginateFilter();

        /** Acciones */
        $actions = [];
        if (!empty($dataTypeContent->first())) {
            foreach (Voyager::actions() as $action) {
                $action = new $action($dataType, $dataTypeContent->first());
                if ($action->shouldActionDisplayOnDataType()) {
                    $actions[] = $action;
                }
            }
        }

        /** Permisos */
        $showCheckboxColumn = false;
        if (Auth::user()->can('delete', app($dataType->model_name))) {
            $showCheckboxColumn = true;
        } else {
            foreach ($actions as $action) {
                if (method_exists($action, 'massAction')) {
                    $showCheckboxColumn = true;
                }
            }
        }

        /** Filtros */
        $filtros = [];
        
        $data = compact('filtros', 'actions', 'dataType', 'dataTypeContent', 'showCheckboxColumn');

        return Voyager::view("voyager::suscriptores.browse", $data);
    }
}
