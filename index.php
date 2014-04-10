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
echo $site->working_dir;

class init {
    
    public $working_dir;
    
    public function __construct() {
        $this->working_dir = $this->get_working_directory();
    }
    
    public function get_working_directory() {
        $value = $_SERVER['PHP_SELF'];
        $value = explode('/', $value);
        unset($value[count($value)-1]);
        $value = implode('/', $value);
        return $value . '/';
    }
    
}


