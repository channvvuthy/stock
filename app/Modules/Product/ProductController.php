<?php

namespace App\Modules\Product;

use App\Http\Controllers\BaseController;

class ProductController extends BaseController
{

    public function __construct()
    {
        $this->title = trans('product.Product');
        parent::__construct();

    }
}