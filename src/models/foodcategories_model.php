<?php

class FoodCategories_Model extends Model {

  public function __construct(){
    parent::__construct();
  }

  /**
   * Get all available activities
   */
  public function foodcategories() {
    return $this->_db->select('SELECT a.id, a.name as name, a.inactive as inactive
     FROM FoodCategories as a  ORDER BY a.name ASC LIMIT 0, 100');
  }

   /**
   * Delete an FoodCategories
   */
  public function delete($id) {
    return $this->_db->delete('FoodCategories',array("id" => $id), 1); 
  }

  /**
   * Activate an FoodCategories
   */
  public function activate($id) {
    return $this->_db->update('FoodCategories',array('inactive' => 0), array('id' => $id)); 
  }

  /**
   * Deactivate an FoodCategories
   */
  public function deactivate($id) {
    return $this->_db->update('FoodCategories',array('inactive' => TRUE), array('id' => $id)); 
  }

  /**
   * Get all available FoodCategories names
   */
  public function names() {
    $result  = array_values($this->_db->select('SELECT name 
    FROM FoodCategories ORDER BY name DESC LIMIT 0, 200'));

    $names = array();
    foreach ($result as $ar) {
        array_push($names,$ar["name"]);
    }
    return $names;
  }
  
  /**
   * Get a foodcategory by id
   */
  public function get($id) {
    if (empty($id)) {
      return array();
    }
    return $this->_db->select('SELECT id, name
      FROM FoodCategories WHERE id = :id',array("id" => $id));
  }


  /**
   * Add new FoodCategories
   */
  public function add($name) {
    if (!empty($name)) {
      return  $this->_db->insert('FoodCategories',
        array("id" => Uuid::guidv4() ,"name" => substr($name,0,40))
      );
    }
    return -1;
  }

}
