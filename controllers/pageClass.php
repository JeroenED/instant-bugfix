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
 * Description of pageClass
 *
 * @author Jeroen De Meerleer <me@jeroened.be>
 */
	class pageClass extends controller{
		public
		function index() {
			$protocol = ($_SERVER['SERVER_PORT']  == 443) ? 'https://' : 'http://';
			$url = $protocol.$_SERVER['HTTP_HOST'].'/api/getBugfix';

			$headers = get_headers($url, 1);
			
			
			if (!stripos($headers[0], '200') > 0) {
				http_response_code(500);
				echo '<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
<html><head>
<title>500 Internal Server Error</title>
</head><body>
<h1>Internal Server Error</h1>
<p>The server encountered an internal error or
misconfiguration and was unable to complete
your request.</p>
<p>Please contact the server administrator at 
 me@jeroened.be to inform them of the time this error occurred,
 and the actions you performed just before this error.</p>
<p>More information about this error may be available
in the server error log.</p>
</body></html>
';
				exit;
			}
			
			$model = new page();
			$model->apiCall[]["call"] = "getBugFix";
			$this->create_template("index.tpl", $model);
		}

		public
		function about() {
			$model = new page();
			$model->apiCall[]["call"] = "getBugFix";
			$model->apiCall[]["call"] = "getPage?slug=about";
			$this->create_template("index.tpl", $model);
		}

		public
		function fix() {
			$model = new page();
			$model->apiCall[]["call"] = "getBugFix?fix=" . $this->id;
			$this->create_template("index.tpl", $model);
		}

	}