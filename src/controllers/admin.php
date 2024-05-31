<?php

class Admin extends Controller
{

    public function __construct()
    {
        parent::__construct($needsLogin = true);
    }

    public function index()
    {
        $this->render();
    }

    /** API: Get Events */
    public function events()
    {
        $this->render();
    }

    /** API: Delete Event */
    public function eventdel($id)
    {
        if (!empty($id) && $this->isLoggedIn()) {
            $this->_model->inactivateEvent($id);
        }

        $this->render();
    }

    /** API: Add Event */
    public function eventadd()
    {
        $this->addEvent();

        $this->render();
    }


    // Helper Function
    private function addEvent()
    {
        if (!empty($this->getParamPost("eventdate"))) {
            $params["targetDate"] = date_parse_from_format('d.m.Y',  $this->getParamPost("eventdate"));
            $params["title"] = $this->getParamPost("title");
            $params["subtitle"] = $this->getParamPost("subtitle");
            $params["organizer"] = $this->getParamPost("organizer");
            $params["location"] = $this->getParamPost("location");
            $params["description"] = trim($this->getParamPost("desc"));

            $this->_model->addEvent($params);
        }
    }

    // RENDER TEMPLATES

    private function render($data = array())
    {
        $isadmin = $this->isAdmin();
        $data["isadmin"] = $isadmin;
        $data["ismanager"] = $this->isManager();
        $data['title'] = I18n::tr('title.events');
        $data['form_header'] = I18n::tr('form.login');

        // render events dependent on users role
        if ($isadmin) {
            $data['events'] = $this->_model->events();
        } else {
            $data['events'] = $this->_model->current_events();
        }

        $this->_view->render('header', $data);
        $this->_view->render('container_start', $data);
        $this->_view->render('nav', $data);
        $this->_view->render('admin/head', $data);
        $this->_view->render('admin/nav', $data);
        $this->_view->render('admin/eventadd', $data);
        $this->_view->render('admin/eventtable', $data);
        $this->_view->render('admin/footer', $data);
        $this->_view->render('container_end', $data);
        $this->_view->render('footer');
    }
}
