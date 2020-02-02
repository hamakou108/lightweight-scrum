<?php

namespace App\Http\Controllers;

use App\ProductBacklogItem;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Response;

class ProductBacklogItemController extends BaseController
{
    public function index() {
        return response(ProductBacklogItem::all()->jsonSerialize(), Response::HTTP_OK);
    }
}
