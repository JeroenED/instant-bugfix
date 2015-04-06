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

$(document).ready(function() {
    $(window).resize();
    $(window).resize(function() {
        $('#bugfix').css({
            position: 'absolute',
            left: 0,
            top: ($(window).height() - $('#bugfix').outerHeight()) / 2,
            width: $(window).width()
        });
    });

});


function openPage(page) {
    history.pushState(null, "About Me", "/page/" + page);
    ibfCall("getPage?slug=" + page);
}

function closePage() {
    history.pushState(null, "Instant Bug Fix", "/");
    $("#page").remove();
}

function ibfCall(apiCall) {
    console.log("ibfCall called");
    if (typeof apiCall === undefined) return;
    if (apiCall == "none") return;
    var ajCall = $.ajax('/api/' + apiCall, {
        cache: false
    });
    ajCall.done(function(data) {
        var JSON = $.parseJSON(data);
        var key = JSON.type;
        switch (key) {
            case "Bugfix":
                parseBugfix(JSON.data);
                break;
            case "Page":
                createPage(JSON.data);
                break;
        }

    });
}

function parseBugfix(bugfix) {
    dom = $("body").html();
    dom = dom.replace(/@fix@/g, bugfix.fix);
    dom = dom.replace(/@id@/g, bugfix.fixID);
    $("body").html(dom);
    $(window).resize();
}

function createPage(pageData) {
    $("#container").append("<div id='page' onclick='return closePage();'>" + pageData.content + "</div>");

    $("#page").animate({
        opacity: 0.9,
    }, 100);
}