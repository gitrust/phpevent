<?php

class URL {

   public static function redirect($url = null, $status = 200) {
      header('Location: ' . Conf::DIR . $url, true, $status);
      exit;
   }

   public static function halt($status = 404, $message = 'Something went wrong.') {
      if (ob_get_level() !== 0) {
          ob_clean();
      }

      http_response_code($status);
      $data['status'] = $status;
      $data['message'] = $message;

      $filename = Conf::SRCROOT . "/views/error/$status.php";
      if (!file_exists($filename)) {
         $status = 'default';
      }
      require $filename;

      exit;
   }

   public static function STYLES($filename = false, $path = 'static/css/') {
      if ($filename) {
         $path .= "$filename.css";
      }
      return Conf::DIR . $path;
   }

   public static function JS($filename = false, $path = 'static/js/') {
      if ($filename) {
         $path .= "$filename.js";
      }
      return Conf::DIR . $path;
   }

   public static function IMG($filename = false, $path = 'static/img/') {
      if ($filename) {
         $path .= "$filename";
      }
      return Conf::DIR . $path;
   }
}
