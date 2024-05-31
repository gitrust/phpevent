<?php

class Admin_Model extends Model
{

  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Get all events
   */
  public function events()
  {
    return $this->_db->select('SELECT id, targetDate,title, subtitle,description , eventOrganizer, eventLocation
    FROM Events WHERE inactive = False ORDER BY targetDate ASC');
  }

  /**
   * Get all available events
   */
  public function current_events()
  {
    return $this->_db->select('SELECT id, targetDate,title,subtitle,description , eventOrganizer, eventLocation
     FROM Events WHERE inactive = False AND targetDate >= CURDATE() 
     ORDER BY targetDate ASC');
  }


  /**
   * Delete an Event
   */
  public function deleteEvent($id)
  {
    $this->_db->delete('ResourceAssignment', array("eventId" => $id), 'no');
    return $this->_db->delete('Events', array("id" => $id), 1);
  }

  /**
   * Inactivate an Event
   */
  public function inactivateEvent($id)
  {
    return $this->_db->update('Events', array('inactive' => True), array('id' => $id));
  }

  /**
   * Add new Event
   */
  public function addEvent($params)
  {
    if (empty($params["targetDate"]) || empty($params["title"])) {
      return -1;
    }

    // FIXME optimize
    // comes from date_parse_from_str
    $s = $params["targetDate"]["year"] . '-' . $params["targetDate"]["month"] . '-' .  $params["targetDate"]["day"];

    return  $this->_db->insert(
      'Events',
      array(
        "id" => Uuid::guidv4(),
        "title" => substr($params["title"], 0, 50),
        "subtitle" => substr($params["subtitle"], 0, 50),
        "targetDate" => $s,
        "eventLocation" =>  substr($params["location"], 0, 40),
        "eventOrganizer" => substr($params["organizer"], 0, 50),
        "description" => substr($params["description"], 0, 4000)
      )
    );
  }
}
