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

/**
 * Description of apiClass
 *
 * @author Jeroen De Meerleer <me@jeroened.be>
 */
class apiClass {
    
    Public function getBugfix() {
        global $db;
        $array["type"] = "Bugfix";
        
        if(isset($_GET['fix'])) {
            $array["data"] = $db->getRecord('SELECT * FROM ' . DB_PREFIX . 'fixes WHERE fixID = ? ',filter_input(INPUT_GET, 'fix') );          
        }else {
            $array["data"] = $db->getRecord('SELECT * FROM ' . DB_PREFIX . 'fixes ORDER BY RAND() LIMIT 1,1');
        }
        echo json_encode($array);
        exit;
    }
    
    Public Function getPage() {
        global $db;
        $slug = filter_input(INPUT_GET, "slug");
        $array["type"] = "Page";
        $array["data"] = $db->getRecord('SELECT * '
                . 'FROM ' . DB_PREFIX . 'revisions '
                . 'WHERE pageslug = ? '
                . 'AND isCurrent = 1', $slug);
        echo json_encode($array);
        exit;
    }
    
}
