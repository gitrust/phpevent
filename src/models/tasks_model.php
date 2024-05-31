<?php

class Tasks_Model extends Model
{

  public function __construct()
  {
    parent::__construct();
  }

  /**
   * get all tasks
   */
  public function tasks()
  {
    return $this->_db->select('SELECT id, eventId, name, description, daytime, volunteer, inactive 
      FROM Tasks ORDER BY name ASC LIMIT 0, 500');
  }

  public function tasksByEventId($eventid)
  {
    if (empty($eventid)) {
      return array();
    }

    return $this->_db->select('SELECT id, eventId, name, description, daytime, volunteer, inactive 
     FROM Tasks WHERE eventId = :eventId  ORDER BY name ASC LIMIT 0, 500', array("eventId" => $eventid));
  }

  public function add($eventid, $name, $daytime = "", $volunteer = "", $description = "")
  {
    if (empty($name) || empty($eventid)) {
      return -1;
    }

    return  $this->_db->insert(
      'Tasks',
      array(
        "id" => Uuid::guidv4(),
        "eventId" => substr($eventid, 0, 36),
        "name" => substr($name, 0, 40),
        "description" => substr($description, 0, 150),
        "daytime" => substr($daytime, 0, 20),
        "volunteer" => substr($volunteer, 0, 50)
      )
    );
  }

  public function update($id, $volunteer = "", $description = "")
  {
    if (!empty($id)) {
      return  $this->_db->update('Tasks', array(
        "volunteer" => substr($volunteer, 0, 50),
        "description" => substr($description, 0, 150)
      ), array("id" => $id));
    }
    return -1;
  }

  public function get($id)
  {
    if (empty($id)) {
      return array();
    }
    return $this->_db->select('SELECT id, eventId, name, description, daytime, volunteer, inactive
      FROM Tasks WHERE id = :id', array("id" => $id));
  }

  public function delete($id)
  {
    if (!empty($id)) {
      return $this->_db->delete('Tasks', array("id" => $id), 1);
    }

    return 0;
  }

  public function deactivate($id)
  {
    if (!empty($id)) {
      return $this->_db->update('Tasks', array('inactive' => True), array('id' => $id));
    }

    return 0;
  }

  public function activate($id)
  {
    if (!empty($id)) {
      return $this->_db->update('Tasks', array('inactive' => False), array('id' => $id));
    }

    return 0;
  }

  public function eventExists($id)
  {
    $result =  $this->_db->select('SELECT Count(*) as total
      FROM Events WHERE id = :id', array("id" => $id));

    return $result[0]["total"] > 0;
  }
}
