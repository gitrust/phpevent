<?php

class Identity {

    public static function hash() {
        return substr(md5(microtime()),rand(0,26), 40);
    }
}