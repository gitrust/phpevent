<?php

class Session
{

   private static $_sessionStarted = false;

   public static function init_()
   {
      if (self::$_sessionStarted == false) {
         # lifetime in secs
         # To make cookies visible on all subdomains prefix domain with dot
         # lifetime in secs
         $lifetime = Conf::SESSION_TIMEOUT * 60;

         session_set_cookie_params([
            'lifetime' => $lifetime,
            'path' => '/',
            'domain' => Conf::SITE_DOMAIN,
            'secure' => true,
            'httponly' => true,
            'samesite' => 'Strict'
         ]);
         session_start(['cookie_httponly' => true]);
         self::$_sessionStarted = true;

         // check timeout         
         self::checkTimeout();
      }
   }

   private static function  checkTimeout()
   {
      if (Conf::SESSION_TIMEOUT <= 0) {
         return;
      }

      // if cookie was deleted, reset it
      if (!self::get("timeout")) {
         self::resetTimeout();
      }

      # session outdated
      if ((self::get("timeout") + Conf::SESSION_TIMEOUT * 60) < time()) { 
         self::destroy();
         session_start();
         session_regenerate_id();
         
      }
      # set current time
      self::resetTimeout();
   }

   private static function resetTimeout()
   {
      self::set("timeout",  time());
      session_start(['cookie_httponly' => true]);
   }

   public static function set($key, $value)
   {
      return $_SESSION[Conf::SESSION_PREFIX . $key] = $value;
   }

   public static function get($key, $secondkey = false)
   {
      if ($secondkey == true) {
         if (isset($_SESSION[Conf::SESSION_PREFIX . $key][$secondkey])) {
            return $_SESSION[Conf::SESSION_PREFIX . $key][$secondkey];
         }
      } else {
         if (isset($_SESSION[Conf::SESSION_PREFIX . $key])) {
            return $_SESSION[Conf::SESSION_PREFIX . $key];
         }
      }
      return false;
   }

   public static function display()
   {
      return $_SESSION;
   }

   public static function clear($key)
   {
      unset($_SESSION[Conf::SESSION_PREFIX . $key]);
   }

   public static function destroy()
   {
      if (self::$_sessionStarted == true) {
         // unset $_SESSION variable for the run-time 
         session_unset();
         // destroy session data in storage
         session_destroy();
      }
   }

   public static function init($timeout = 1440) {
      ini_set('session.gc_maxlifetime', $timeout);
      session_start();
  
      if (isset($_SESSION['timeout_idle']) && $_SESSION['timeout_idle'] < time()) {
          session_destroy();
          session_start();
          session_regenerate_id();
          $_SESSION = array();
      }
  
      $_SESSION['timeout_idle'] = time() + $timeout;
  }
}
