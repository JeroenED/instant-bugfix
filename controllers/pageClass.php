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
 * Description of homeClass
 *
 * @author Jeroen De Meerleer <me@jeroened.be>
 */
class pageClass extends controller{
    
    public function index() {
        $model = new page();
        $model->apiCall[]["call"] = "getBugFix";
        $this->create_template("index.tpl", $model);
    }
    
    public function about() {
        $model = new page();
        $model->apiCall[]["call"] = "getBugFix";
        $model->apiCall[]["call"] = "getPage?slug=about";
        $this->create_template("index.tpl", $model);
    }
    public function fix() {
        $model = new page();
        $model->apiCall[]["call"] = "getBugFix?fix=" . $this->id;
        $this->create_template("index.tpl", $model);
    }
}
