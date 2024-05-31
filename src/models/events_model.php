<?php

class Events_Model extends Model {

  public function __construct(){
    parent::__construct();
  }

  /**
   * get all schedules
   */
  public function events() {
    return $this->_db->select('SELECT id, targetDate, title, subtitle, description, eventUrl, eventOrganizer, eventLocation FROM Events ORDER BY id ASC LIMIT 0, 500');
  }

  /**
   * get all available schedules
   */
  public function available_events() {
    return $this->_db->select('SELECT id, targetDate, title, subtitle, description, eventUrl, eventOrganizer, eventLocation FROM Events WHERE targetDate >= CURDATE() ORDER BY id ASC LIMIT 0, 500');
  }

  public function get($id) {
      return $this->_db->select('SELECT id, targetDate, title, subtitle, 
        description, eventUrl, eventOrganizer, eventLocation
        FROM Events WHERE id = :id',array("id" => $id));
  }

  public function countTasks($id) {
    return $this->_db->select('SELECT COUNT(*) as cnt
        FROM Tasks WHERE eventId = :id',array("id" => $id));
  }

  public function countFood($id) {
    return $this->_db->select('SELECT COUNT(*) as cnt
        FROM Food WHERE eventId = :id',array("id" => $id));
  }

  public function foodlistByEvent($eventid) {
    if (empty($eventid)){
      return array();
    }
    return $this->_db->select('SELECT  f.note as note, fc.name as category,
      f.name as name, f.volunteer as volunteer
      FROM Food f      
      LEFT JOIN FoodCategories fc
      ON f.categoryId = fc.id
      WHERE f.eventId = :eventId
      ORDER BY fc.name, f.name ASC LIMIT 0, 200', array("eventId" => $eventid));
  }

  public function tasksByEvent($eventid) {
    if (empty($eventid)) {  
      return array();
    }
    
    return $this->_db->select('SELECT name, description, daytime, volunteer 
     FROM Tasks WHERE eventId = :eventId  ORDER BY name ASC LIMIT 0, 500', array("eventId" => $eventid));
  }

}
