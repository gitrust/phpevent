<?php

class Tasks extends Controller
{

  public function __construct()
  {
    parent::__construct(false);
  }

  public function index()
  {
    $this->render();
  }

  public function add()
  {
    $adding_ok = false;
    $eventid =  $this->getParamGet("event");
    $this->checkEvent($eventid);

    if ($this->isPost()) {
      $name = $this->getParamPost("name");
      $desc = $this->getParamPost("desc");
      $daytime = $this->getParamPost("time");
      $volunteer = $this->getParamPost("volunteer");

      $adding_ok = $this->_model->add($eventid, $name, $daytime, $volunteer, $desc) != -1;
    }

    if ($adding_ok) {
      # go back to listing
      $data["hide_new_btn"] = false;
      $this->render("list");
    } else {
      $data["hide_new_btn"] = true;
      $this->render("add", $data);
    }
  }

  private function checkEvent($eventid)
  {
    if (!$this->_model->eventExists($eventid)) {
      throw new Exception("Unknown event " . $eventid);
    }
  }


  public function edit($id)
  {
    $data["task"] = $this->_model->get($id)[0];
    $edit_ok = false;


    if ($this->isPost()) {
      $volunteer = $this->getParamPost("volunteer");
      $desc = $this->getParamPost("desc");
      $edit_ok = $this->_model->update($id, $volunteer, $desc) != -1;
    }

    if ($edit_ok) {
      # go back to listing
      $data["hide_new_btn"] = false;
      $this->render("list", $data);
    } else {
      $data["hide_new_btn"] = true;
      $this->render("edit", $data);
    }
  }

  public function delete($id)
  {
    if ($this->isLoggedIn()) {
      $this->_model->delete($id);
    }
    $this->render();
  }

  private function render($view = "list", $data = array())
  {

    if (!array_key_exists("hide_new_btn", $data)) {
      $data["hide_new_btn"] = false;
    }

    $eventid = $this->getParamGet("event");
    $this->checkEvent($eventid);

    $data['title'] = I18n::tr('title.tasks');
    $data["isadmin"] = $this->isAdmin();
    $data["ismanager"] = $this->isManager();
    $data["isloggedin"] = $this->isLoggedIn();
    $data["event"] = $eventid;
    $data["cancel.link"] = "/tasks/?event=" . $eventid;
    $data['tasks'] = $this->_model->tasksByEventId($eventid);

    $this->_view->render('header', $data);
    $this->_view->render('container_start', $data);
    if ($this->isLoggedIn()) {
      $this->_view->render('nav', $data);
    }
    $this->_view->render('tasks/nav', $data);
    $this->_view->render('tasks/' . $view, $data);
    $this->_view->render('container_end', $data);
    $this->_view->render('footer');
  }
}
