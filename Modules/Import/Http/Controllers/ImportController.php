<?php

namespace Modules\Import\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Modules\Import\Jobs\StoreUsers;

class ImportController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $data = json_decode(file_get_contents(storage_path('challenge.json')));

        $chunk = array_chunk($data,80);

        foreach ($chunk as $data){
            StoreUsers::dispatch($data);
        }

        return view('import::index');
    }
}
