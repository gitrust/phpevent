<?php

class Foodlist_Model extends Model
{

  public function __construct()
  {
    parent::__construct();
  }

  /**
   * get food list
   */
  public function foodlist()
  {
    return $this->_db->select('SELECT f.id as id, f.eventId as eventId, f.note, 
      f.categoryId as categoryId, fc.name as category, f.name, f.volunteer, f.inactive 
      FROM Food f
      LEFT JOIN FoodCategories fc ON fc.id = f.categoryId
      ORDER BY f.name ASC LIMIT 0, 200');
  }

  public function foodlistByEventId($eventid)
  {
    if (empty($eventid)) {
      return array();
    }
    return $this->_db->select('SELECT f.id as id, f.eventId as eventId, f.note as note,
      f.categoryId as categoryId, fc.name as category, f.name, f.volunteer, f.inactive
      FROM Food f      
      LEFT JOIN FoodCategories fc
      ON f.categoryId = fc.id
      WHERE f.eventId = :eventId
      ORDER BY fc.name, f.name ASC LIMIT 0, 200', array("eventId" => $eventid));
  }

  public function add($eventid, $name, $category, $volunteer, $note)
  {
    if (empty($name) || empty($eventid) || (empty($category))) {
      return -1;
    }

    return  $this->_db->insert('Food', array(
      "id" => Uuid::guidv4(),
      "eventId" => substr($eventid, 0, 36),
      "name" => substr($name, 0, 50),
      "categoryId" => substr($category, 0, 36),
      "volunteer" => substr($volunteer, 0, 50),
      "note" => substr($note, 0, 60)
    ));
  }

  public function update($params)
  {
    if (empty($params["id"]) || empty($params["categoryId"])) {
      return -1;
    }
    return  $this->_db->update(
      'Food',
      array(
        "volunteer" => substr($params['volunteer'], 0, 50),
        "categoryId" => substr($params["categoryId"], 0, 36),
        "note" => substr($params["note"], 0, 60)
      ),
      array("id" => $params["id"])
    );
  }

  public function get($id)
  {
    return $this->_db->select('SELECT id, eventId, categoryId, name, volunteer, inactive, note
    FROM Food WHERE id = :id', array("id" => $id));
  }

  public function delete($id)
  {
    if (empty($id)) {
      return 0;
    }
    return $this->_db->delete('Food', array("id" => $id), 1);
  }

  public function categories()
  {
    return array_values($this->_db->select('SELECT id, name
        FROM FoodCategories  ORDER BY name ASC LIMIT 0, 200'));
  }

  public function eventExists($id)
  {
    $result =  $this->_db->select('SELECT Count(*) as total
      FROM Events WHERE id = :id', array("id" => $id));

    return $result[0]["total"] > 0;
  }
}
