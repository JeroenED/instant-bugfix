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

});

$(window).resize(function() {
    $('#bugfix').css({
        position: 'absolute',
        left: 0,
        top: ($(window).height() - $('#bugfix').outerHeight()) / 2,
        width: $(window).width()
    });
});

$(document).click(function() {
    history.pushState(null, "Instant Bug Fix", "/");
    $("#page").remove();
});
function openAboutPage() {
    
    history.pushState(null, "About Me", "/page/about");
    ibfCall("getPage?slug=about");
    
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
        }

    });
}

function parseBugfix(bugfix) {
    dom = $("body").html();
    dom = dom.replace(/%fix%/g, bugfix.fix);
    dom = dom.replace(/%id%/g, bugfix.fixID);
    $("body").html(dom);
    $(window).resize();
}

function createPage(pageData) {
    $("body").append("<div id='page'>" + pageData.content + "</div>");
    $('#page').css({
        "position": 'absolute',
        "width": "640",
        "height": "480",
        "left": ($(window).width() - 640) / 2,
        "top": ($(window).height() - 480) / 2,
        "background-color": "#000000",
        "opacity": 0
    });
    $("#page").animate({
        opacity: 0.9,
    }, 100);
}