<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;


/**
 * Class BaseController
 * @package App\Http\Controllers
 */
class BaseController extends Controller
{
    public string $title = "Stock Management System(VSM)";

    public int $limit = 20;

    public string $pk = "id";

    public string $order_by = "id";

    public string $order = "desc";

    public bool $has_action = true;

    public bool $edit = true;

    public bool $view = true;

    public bool $delete = true;

    public bool $add = true;

    public bool $export = false;

    public bool $import = false;

    public array $filter = [];

    public bool $display_id = true;

    public $model;

    public $result;

    public array $data = [];

    public array $head = [];

    public int $col = 12;

    public int $grid = 12;

    public array $form = [];

    public bool $wysiwyg = false;

    public bool $select2 = false;

    public int $action_with = 250;

    public string $method = "GET";

    /**
     * Initializes the data array with the values of the class properties.
     */
    public function init(): void
    {
        $this->data['title'] = $this->title;
        $this->data['has_action'] = $this->has_action;
        $this->data['edit'] = $this->edit;
        $this->data['delete'] = $this->delete;
        $this->data['add'] = $this->add;
        $this->data['view'] = $this->view;
        $this->data['export'] = $this->export;
        $this->data['import'] = $this->import;
        $this->data['filter'] = $this->filter;
        $this->data['display_id'] = $this->display_id;
        $this->data['pk'] = $this->pk;
        $this->data['head'] = $this->head;
        $this->data['result'] = $this->result;
        $this->data['method'] = $this->method;
        $this->data['col'] = $this->col;
        $this->data['grid'] = $this->grid;
        $this->data['wysiwyg'] = $this->wysiwyg;
        $this->data['select2'] = $this->select2;
        $this->data['action_with'] = $this->action_with;
        $this->data['form'] = $this->form;
    }

    public function __construct()
    {
        $this->init();
    }

    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('admin.index', ['data' => $this->data]);
    }

    /**
     * @return Application|Factory|View
     */
    public function getAdd(): View|Factory|Application
    {
        $this->init();
        return view('admin.add', ['data' => $this->data]);
    }


    /**
     * Paginate the data.
     *
     * @return mixed
     */
    public function paginate(): mixed
    {
        return $this->model->orderBy($this->order_by, $this->order)->paginate($this->limit);
    }

    /**
     * Handles the POST request for adding data.
     *
     * @param Request $request The HTTP request object.
     * @return Redirector|Application|RedirectResponse The response object.
     */
    public function postAdd(Request $request): Redirector|Application|RedirectResponse
    {
        $redirectUrl = $request->get('save');
        $field = $request->except(['_token', 'save']);
        $request->validate($this->validationForm());

        foreach ($field as $key => $params) {
            if ($request->hasFile($key)) {
                $fileName = Helper::imageUpload("images", $request->file($key));
                $field[$key] = $fileName;
            }
            if ($request->input('password')) {
                $field["password"] = bcrypt($request->input('password'));
            }
        }

        $this->model->create($field);
        return redirect($redirectUrl)->with('message', 'The data has been added');
    }

    /**
     * Validates the form and returns an array of validated form fields.
     *
     * @return array The array of validated form fields.
     */
    public function validationForm(): array
    {
        $validated = [];

        foreach ($this->form as $form) {
            if ($this->isRequired($form)) {
                $validated[$form['field']] = $form['validated'];

                if (Str::contains($form['validated'], "unique")) {
                    $this->appendUniqueValidation($validated, $form);
                }
            }
        }
        return $validated;
    }

    /**
     * Checks if the given form is required.
     *
     * @param array $form The form to be checked.
     * @return bool Returns true if the form is required, false otherwise.
     */
    protected function isRequired(array $form): bool
    {
        return isset($form['required']) && $form['required'];
    }

    /**
     * Appends unique validation to the given array.
     *
     * @param array &$validated The array to append the unique validation to.
     * @param array $form The form data.
     * @throws NotFoundExceptionInterface If the validation fails.
     * @throws ContainerExceptionInterface If there is a problem with the container.
     * @return void
     */
    protected function appendUniqueValidation(array &$validated, array $form): void
    {
        try {
            $uniqueValidation = $form['validated'] . "," . $form['field'] . "," . request()->get('id');
            $validated[$form['field']] = $uniqueValidation;
        } catch (NotFoundExceptionInterface | ContainerExceptionInterface $e) {
            // Handle the exception if needed
        }
    }

}
