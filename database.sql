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


DROP DATABASE IF EXISTS instantbugfix;
CREATE DATABASE instantbugfix;
USE instantbugfix;

CREATE TABLE ibf_fixes(
	fixID		int				NOT NULL	AUTO_INCREMENT,
	fix			tinytext		NOT NULL,
	CONSTRAINT		fixPK		PRIMARY KEY (fixID)
);

CREATE TABLE ibf_revisions(
	revID		int				NOT NULL	AUTO_INCREMENT,
	pageslug	varchar(25)		NOT NULL,
	created		timestamp		NOT NULL	DEFAULT current_timestamp,
	content		text			NOT NULL,
	isCurrent	bool,
	CONSTRAINT		revPK		PRIMARY KEY (revID)
);	