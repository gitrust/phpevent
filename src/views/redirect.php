<?php
    
    $location = $data['location'];

    if ($location) {
        header('Location: ' . Conf::DIR . $location,true);
        die();
    }

?>