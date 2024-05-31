<?php

/* REST API */
class Api extends Controller
{

    public function __construct()
    {
        parent::__construct(false);
    }

    public function index()
    {
        $this->render();
    }

    private function render($data = array())
    {
        $this->switchRatio();
        $this->_view->render('api/config', $data);
    }

    private function switchRatio()
    {
        if (isset($_GET['switchratio'])) {
            $v = Session::get('ismobileversion');
            Session::set('ismobileversion', !($v == true));
        }
    }
}
