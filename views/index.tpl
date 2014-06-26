<!DOCTYPE html>
<!--
Copyright (C) 2014 Jeroen De Meerleer <me@jeroened.be>

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
-->

<html>
<head>
    <title>Instant Bug Fix</title>
    <link href="/content/style.css" media="screen" rel="stylesheet" type="text/css">
    <link href="/favicon.ico" rel="icon" type="image/png">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.js"></script>
    <script src="/content/instantbugfix.js" type="text/javascript"></script>
    <meta charset="UTF-8">
    <meta content="width=device-width" name="viewport">
    <script type="text/javascript">
{iteration:apiCall}
        ibfCall("{$apiCall.call}");
    {/iteration:apiCall}
    </script>
</head>

<body>
    <div id="bugfix">
        <p>%fix%</p>
    </div>

    <div id="about">
        <a onclick="return openPage('about');">About me</a>
    </div>

    <div id="permalink">
        <a href="#" onclick="prompt('Copy this and share the bugfix', 'http://instantbugfix.jeroened.be/page/fix/%id%');">Permalink</a>
    </div>

    <div id="tweetthis">
        <a href="https://twitter.com/intent/tweet?text=%fix%&amp;url=http%3A%2F%2Finstantbugfix.jeroened.be%2Fpage%2Ffix%2F%id%" target="_blank">Tweet</a>
    </div>

    <div id="badge">
        <a href="http://www.jeroened.be" target="_blank"><img alt="created by Jeroen De Meerleer" src="/content/images/jeroenED.png"></a>
    </div>

    <div id="container"></div>
</body>
</html>