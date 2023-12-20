<?php
namespace App\Modules\Product;

use App\Http\Controllers\BaseController;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class CategoryController extends BaseController
{
    public function __construct(CategoryModel $category)
    {
        $this->title = trans('common.Product Category');
        $this->model = $category;

        $this->head = [
            array('field' => 'title', 'title' => 'Name'),
            array('field' => 'photo', 'title' => 'Photo', 'type' => 'image'),
            array('field' => 'description', 'title' => 'Description'),
            array('field' => 'status', 'title' => 'Status'),
        ];

        $this->form = [
            array('field' => 'title', 'title' => 'Name', 'type' => 'text', 'required' => true, 'validated' => 'required'),
            array('field' => 'photo', 'title' => 'Photo', 'type' => 'file', 'accept' => 'image/*', 'validated' => 'required'),
            array('field' => 'description', 'title' => 'Description', 'type' => 'text'),
            array('field' => 'status', 'title' => 'Status', 'type' => 'status'),

        ];
        
        parent::__construct();

    }


    /**
     * Retrieves the index view for the admin panel.
     *
     * @return View|Factory|Application The index view.
     */
    public function index(): View|Factory|Application
    {
        $this->result = $this->paginate();
        return view('admin.index', ['data' => $this->data]);
    }
}
