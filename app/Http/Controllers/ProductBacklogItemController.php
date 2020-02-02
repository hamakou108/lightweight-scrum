<?php

namespace App\Http\Controllers;

use App\ProductBacklogItem;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ProductBacklogItemController extends BaseController
{
    public function store(Request $request) {
        $pbi = new ProductBacklogItem();
        $pbi->name = $request->name;

        DB::transaction(function() use ($pbi) {
            $pbi->save();
        });

        return response($pbi->jsonSerialize(), Response::HTTP_CREATED);
    }

    public function index() {
        return response(ProductBacklogItem::all()->jsonSerialize(), Response::HTTP_OK);
    }

    public function destroy($id) {
        ProductBacklogItem::destroy($id);

        return response(null, Response::HTTP_OK);
    }
}
