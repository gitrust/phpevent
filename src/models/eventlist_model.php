<?php

class Eventlist_Model extends Model {

  public function __construct(){
    parent::__construct();
  }

  /**
   * get all active events
   */
  public function events() {
    return $this->_db->select('SELECT id, targetDate, title, subtitle, description, eventUrl, eventOrganizer, eventLocation
      FROM Events
      WHERE inactive = False
      ORDER BY targetDate DESC LIMIT 0, 500');
  }

  /**
   * get all available schedules
   */
  public function available_events() {
    return $this->_db->select('SELECT id, targetDate, title, subtitle, description, eventUrl, eventOrganizer, eventLocation
     FROM Events WHERE targetDate >= CURDATE() ORDER BY targetDate DESC LIMIT 0, 500');
  }

  public function current_events() {
    return $this->_db->select("SELECT id, targetDate, title, subtitle, description, eventUrl, eventOrganizer, eventLocation
      FROM Events WHERE targetDate >= DATE_SUB(CURDATE(), INTERVAL 2 DAY) ORDER BY targetDate DESC LIMIT 0, 100");
  }


}
