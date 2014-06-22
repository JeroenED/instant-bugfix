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
//define('PATH_LIBRARY', dirname(__FILE__) . "/spoon");
error_reporting(E_ALL);
ini_set('display_errors', '1');

// add this to the include path
//set_include_path(get_include_path() . PATH_SEPARATOR . PATH_LIBRARY);
// Initialize framework
require_once 'spoon/spoon.php';

// Add required shizzle
require_once "config.php";
require_once "controller.class.php";
require_once "controllers.php";
require_once "models.php";
require_once "dbcon.php";



// Let's hit the road
$site = new init();

class init {
    
    public $working_dir;
    public $controller = "pageClass";
    public $method = "index";
    public $id = "0";
    
    public function __construct() {
        $this->working_dir = $this->get_working_directory();
        $this->controller = $this->get_controller();
        $this->method = $this->get_method();
        $this->id = $this->get_id();
        
        // Hit that monster
        $monster = new $this->controller();
        $monster->controller = $this->controller;
        $monster->method = $this->method;
        $monster->id = $this->id;
        $monster->{$this->method}();
        
    }
    
    public function get_controller() {
        $query_array = explode('/', filter_input(INPUT_SERVER, 'REQUEST_URI'));
        $controller = (!empty($query_array[1])) ? $query_array[1] : "page";
        $r_value = $controller . "Class";
        return $r_value;
    }
    
    public function get_method() {
        $query = explode('?', filter_input(INPUT_SERVER, 'REQUEST_URI'));
        $query_array = explode('/', $query[0]);
        $r_value = (!empty($query_array[2])) ? $query_array[2] : "index";
        return $r_value;
    } 
    
    public function get_id() {
        $query_array = explode('/', filter_input(INPUT_SERVER, 'REQUEST_URI'));
        $r_value = (!empty($query_array[3])) ? $query_array[3] : -1;
        return $r_value;
    }
    
    public function get_working_directory() {
        $value_r = explode('/', filter_input(INPUT_SERVER,'PHP_SELF'));
        unset($value_r[count($value_r)-1]);
        $r_value = implode('/', $value_r);
        return $r_value . '/';
    }
    
}


