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

INSERT INTO ibf_fixes (fix) VALUES ('Have you tried turning it off and on again?');
INSERT INTO ibf_fixes (fix) VALUES ('Get a couple of beers and try again tommorow');
INSERT INTO ibf_fixes (fix) VALUES ('You cannot return flase');
INSERT INTO ibf_fixes (fix) VALUES ('Is that an infinite loop?');
INSERT INTO ibf_fixes (fix) VALUES ('Private properties are private');
INSERT INTO ibf_fixes (fix) VALUES ('Sorry, I don\'t understand that thing');
INSERT INTO ibf_fixes (fix) VALUES ('Void methods are not supposed to return strings');
INSERT INTO ibf_fixes (fix) VALUES ('You cannot expect responses from a server which is not running');
INSERT INTO ibf_fixes (fix) VALUES ('Executing that script requires permission');
INSERT INTO ibf_fixes (fix) VALUES ('Works for me!');
INSERT INTO ibf_fixes (fix) VALUES ('Escaping strings is most of the times not a bad idea');
INSERT INTO ibf_fixes (fix) VALUES ('You missed a semicolon ;)');

CREATE TABLE ibf_revisions(
	revID		int				NOT NULL	AUTO_INCREMENT,
	pageslug	varchar(25)		NOT NULL,
	created		timestamp		NOT NULL	DEFAULT current_timestamp,
	content		text			NOT NULL,
	isCurrent	bool,
	CONSTRAINT		revPK		PRIMARY KEY (revID)
);

INSERT INTO `ibf_revisions` (`revID`, `pageslug`, `created`, `content`, `isCurrent`) VALUES
(1, 'about', '2014-06-21 14:32:59', '<h1>Jeroen De Meerleer - Developer</h1> <h2>Who am I?</h2> <p><img src="/content/images/JeroenED.jpg" class="nomobile" style="float: right; height: 150px;"/>My name is Jeroen De Meerleer and I\'m a developer. I live in Waregem, Belgium and I\'m doing an evening course as Programmer/Network Engineer (I\'m doing both) My hobbies are Programming and Chess (I eat Deep Blue for breakfast :-) ). When I\'m not doing one of these I\'m probably working on my server (VagrantBox running CentOS with lots of provisioning behind it. PHP-Development is run there too).</p> <h2>Why this website?</h2> <p>I created this mini-site as a project to show employers that I can program. I already did some projects but they were not quite good, so I created a complete new project where I could do whatever I want and this is it.</p> <h2>Credits and Used sources</h2> <p><ul> <li>Original idea: instantbugfix.com (taken offline; author unknown)</li> <li><a href="http://jquery.com">jQuery</a></li> <li><a href="http://spoon-library.com/">Spoon Library</a></li> </ul></p><p style="line-height: 15px;">&nbsp;</p>', 1);