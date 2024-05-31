<?php

class Foodlist extends Controller
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
    $data["categories"] = $this->_model->categories();
    $data["hide_new_btn"] = true;

    if ($this->isPost()) {
      $name = $this->getParamPost("name");
      $category = $this->getParamPost("category");
      $volunteer = $this->getParamPost("volunteer");
      $note = $this->getParamPost("note");

      $adding_ok = $this->_model->add($eventid, $name, $category, $volunteer, $note) != -1;
    }

    if ($adding_ok) {
      # go back to listing
      $data["hide_new_btn"] = false;
      $this->render("list", $data);
    } else {
      $this->render("add", $data);
    }
  }


  public function edit($id)
  {
    $data["food"] = $this->_model->get($id)[0];
    $data["categories"] = $this->_model->categories();
    $data["hide_new_btn"] = true;
    $edit_ok = false;

    if ($this->isPost()) {
      $params["id"] = $id;
      $params["volunteer"] = $this->getParamPost("volunteer");
      $params["note"] = $this->getParamPost("note");
      $params["categoryId"] = $this->getParamPost("category");

      $edit_ok = $this->_model->update($params) != -1;
    }

    if ($edit_ok) {
      # go back to listing
      $data["hide_new_btn"] = false;
      $this->render("list", $data);
    } else {
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


  private function checkEvent($eventid)
  {
    if (!$this->_model->eventExists($eventid)) {
      throw new Exception("Unknown event " . $eventid);
    }
  }


  private function render($view = "list", $data = array())
  {
    if (!array_key_exists("hide_new_btn", $data)) {
      $data["hide_new_btn"] = false;
    }

    $eventid =  $this->getParamGet("event");
    $this->checkEvent($eventid);
    $data['title'] = I18n::tr('title.foodlist');

    $data["isadmin"] = $this->isAdmin();
    $data["ismanager"] = $this->isManager();
    $data["isloggedin"] = $this->isLoggedIn();
    $data["event"] = $eventid;
    $data["cancel.link"] = "/foodlist/?event=" . $eventid;

    $data['foodlist'] = $this->_model->foodlistByEventId($eventid);

    $this->_view->render('header', $data);
    $this->_view->render('container_start', $data);
    if ($this->isLoggedIn()) {
      $this->_view->render('nav', $data);
    }
    $this->_view->render('foodlist/nav', $data);
    $this->_view->render('foodlist/' . $view, $data);
    $this->_view->render('container_end', $data);
    $this->_view->render('footer');
  }
}
