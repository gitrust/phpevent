<?php

class View
{

   public function render($path, $data = false, $error = false)
   {
      require Conf::SRCROOT . "/views/$path.php";
   }
}
