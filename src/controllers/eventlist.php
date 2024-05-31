<?php

class Eventlist extends Controller
{

  public function __construct()
  {
    parent::__construct($needsLogin = true);
  }

  public function index()
  {
    $this->render();
  }


  /** API: Reset form */
  public function reset()
  {
    $this->render();
  }

  /** API: My Event list */
  public function mylist()
  {
    $this->render();
  }


  private function render()
  {
    $view = "list";
    /*if (Session::get('ismobileversion')) {
      $view = "mlist";
    }*/

    $data['title'] = I18n::tr('title.eventlist');

    $isadmin = $this->isAdmin();

    $data["isadmin"] = $isadmin;
    $data["ismanager"] = $this->isManager();

    // render events dependent on users role
    if ($isadmin) {
      $data['events'] = $this->_model->events();
    } else {
      $data['events'] = $this->_model->current_events();
    }

    $this->_view->render('header', $data);
    $this->_view->render('container_start', $data);
    if ($this->isLoggedIn()) {
      $this->_view->render('nav', $data);
    }
    $this->_view->render('eventlist/' . $view, $data);
    $this->_view->render('container_end', $data);
    $this->_view->render('footer');
  }
}
