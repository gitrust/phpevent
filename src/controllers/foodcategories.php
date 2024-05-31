<?php

class FoodCategories extends Controller
{

    public function __construct()
    {
        parent::__construct($needsLogin = true);
    }

    public function index()
    {
        $data['foodcategories'] = $this->_model->foodcategories();
        $data['title'] = I18n::tr('title.foodcategories');
        $data['form_header'] = I18n::tr('form.login');

        $this->render($data);
    }

    /**  API: Add FoodCategory */
    public function add()
    {
        $this->addFoodCategory();

        $data['foodcategories'] = $this->_model->foodcategories();
        $data['title'] = I18n::tr('title.foodcategories');
        $data['form_header'] = I18n::tr('form.login');

        $this->render($data);
    }

    /** API: Activate  */
    public function activate($id)
    {
        if (!empty($id)) {
            $this->_model->activate($id);
        }


        $data['foodcategories'] = $this->_model->foodcategories();
        $data['title'] = I18n::tr('title.foodcategories');
        $data['form_header'] = I18n::tr('form.login');
        $this->render($data);
    }

    /** API: Deactivate  */
    public function deactivate($id)
    {
        if (!empty($id)) {
            $this->_model->deactivate($id);
        }


        $data['foodcategories'] = $this->_model->foodcategories();
        $data['title'] = I18n::tr('title.activitysite');
        $data['form_header'] = I18n::tr('form.login');
        $this->render($data);
    }

    /** API: Delete  */
    public function del($id)
    {
        if (!empty($id)) {
            $this->_model->delete($id);
        }


        $data['foodcategories'] = $this->_model->foodcategories();
        $data['title'] = I18n::tr('title.activitysite');
        $data['form_header'] = I18n::tr('form.login');
        $this->render($data);
    }

    // Helper Function
    private function addFoodCategory()
    {
        if (!empty($_POST['name'])) {
            $name = trim($_POST['name']);
            $this->_model->add($name);
        }
    }

    private function render($data)
    {
        $data["isadmin"] = $this->isAdmin();
        $data["ismanager"] = $this->isManager();

        $this->_view->render('header', $data);
        $this->_view->render('container_start', $data);
        $this->_view->render('nav', $data);
        $this->_view->render('partials/admin/head', $data);
        $this->_view->render('partials/admin/nav', $data);
        $this->_view->render('foodcategories/form', $data);
        $this->_view->render('foodcategories/list', $data);
        $this->_view->render('partials/admin/footer', $data);
        $this->_view->render('container_end', $data);
        $this->_view->render('footer');
    }
}
