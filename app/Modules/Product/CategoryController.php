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
            array('field' => 'name', 'title' => 'Name'),
            array('field' => 'photo', 'title' => 'Photo', 'type' => 'image'),
            array('field' => 'description', 'title' => 'Description'),
            array('field' => 'status', 'title' => 'Status'),
        ];

        $this->form = [
            array('field' => 'name', 'title' => 'Name', 'type' => 'text', 'required' => true, 'validated' => 'required'),
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
        $this->data['result'] = $this->paginate();
        return view('admin.index', ['data' => $this->data]);
    }

    /**
     * Retrieves the "Add" view for the admin panel.
     *
     * @return View|Factory|Application The "Add" view for the admin panel.
     */
    public function getAdd(): View|Factory|Application
    {
        $this->data['title'] = trans('common.Create new category');
        return view('admin.add', ['data' => $this->data]);
    }
}
