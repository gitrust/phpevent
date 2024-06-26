<?php

class Bootstrap
{

   private $_url;
   private $_controller = null;
   private $_defaultController;

   public function __construct()
   {
      //start the session class
      Session::init();
      //sets the url
      $this->_getUrl();
   }

   public function setController($name)
   {
      $this->_defaultController = $name;
   }

   public function init()
   {
      //if no page requested set default controller
      if (empty($this->_url[0])) {
         $this->_loadDefaultController();
         return false;
      }

      $this->_loadExistingController();
      $this->_callControllerMethod();
   }

   private function _getUrl()
   {
      $url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : NULL;
      $url = urldecode(filter_var(urlencode($url), FILTER_SANITIZE_URL));
      $this->_url = explode('/', $url);
   }

   private function _loadDefaultController()
   {
      require Conf::SRCROOT . '/controllers/' . $this->_defaultController . '.php';
      $this->_controller = new $this->_defaultController();
      $this->_controller->index();
   }

   private function _loadExistingController()
   {

      //set url for controllers
      $file = Conf::SRCROOT . '/controllers/' . $this->_url[0] . '.php';

      if (file_exists($file)) {
         require $file;

         //instatiate controller
         $this->_controller = new $this->_url[0];
      } else {
         $this->_error("File does not exist: " . $this->_url[0]);
         return false;
      }
   }

   /**
    * If a method is passed in the GET url parameter
    *
    *  http://localhost/controller/method/(param)/(param)/(param)
    *  url[0] = Controller
    *  url[1] = Method
    *  url[2] = Parameter
    *  url[3] = Parameter
    *  url[4] = Parameter
    */
   private function _callControllerMethod()
   {
      unset($this->_url[0]);
      $method = 'index';

      if (count($this->_url) > 0 && is_callable(array($this->_controller, $this->_url[1]))) {
         $method = array_shift($this->_url);
      }

      $parameter = filter_var_array($this->_url, FILTER_SANITIZE_STRING);
      try {
         call_user_func_array(array($this->_controller, $method), $parameter);
      } catch (ArgumentCountError $e) {
         $this->_error("Argument Count error passing to function: " . $e->getMessage());
      } catch (Exception $e) {
         $this->_error("Exception during function execution: " . $e->getMessage());
      }

      // you can call these parameter in your function this way
      // myfunction(param1, param2, param3, param4)
   }

   /**
    * Display an error page if nothing exists
    *
    * @return boolean
    */
   private function _error($error)
   {
      require Conf::SRCROOT . '/core/error.php';
      $this->_controller = new ErrorController($error);
      $this->_controller->index();
      die;
   }
}
