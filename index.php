<?php

/* 
 * Copyright (C) 2014 Jeroen De Meerleer <me@jeroened.be>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

// define location of your library
define('PATH_LIBRARY', '/home/www/htdocs/instantbugfix.local');

// add this to the include path
set_include_path(get_include_path() . PATH_SEPARATOR . PATH_LIBRARY);

// require spoon
require_once 'spoon/spoon.php';
$site = new init();
echo "working-dir: " . $site->get_working_directory() . "<br>";
echo "controller: " . $site->get_controller() . "<br>";
echo "method: " . $site->get_method() . "<br>";
echo "id: " . $site->get_id() . "<br>";


class init {
    
    public $working_dir;
    public $controller = "homeClass";
    public $method = "index";
    public $id = "0";
    
    public function __construct() {
        $this->working_dir = $this->get_working_directory();
        $this->controller = $this->get_controller();
        $this->method = $this->get_method();
        $this->id = $this->get_id();
    }
    
    public function get_controller() {
        $query_array = explode('/', filter_input(INPUT_SERVER, 'REQUEST_URI'));
        $r_value = (isset($query_array[1])) ? $query_array[1] : "homeClass";
        return $r_value;
    }
    
    public function get_method() {
        $query_array = explode('/', filter_input(INPUT_SERVER, 'REQUEST_URI'));
        $r_value = (isset($query_array[2])) ? $query_array[2] : "index";
        return $r_value;
    } 
    
    public function get_id() {
        $query_array = explode('/', filter_input(INPUT_SERVER, 'REQUEST_URI'));
        $r_value = (isset($query_array[3])) ? $query_array[3] : "1";
        return $r_value;
    }
    
    public function get_working_directory() {
        $value_r = explode('/', filter_input(INPUT_SERVER,'PHP_SELF'));
        unset($value_r[count($value_r)-1]);
        $r_value = implode('/', $value_r);
        return $r_value . '/';
    }
    
}


