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
$(document).ready(function () {
    $(window).resize(function () {
        
        $('#bugfix').css({
            position: 'absolute',
            left: 0,
            top: ($(window).height() - $('#bugfix').outerHeight()) / 2,
            width: $(window).width()
        });


    });


    $(window).resize();
    
    // To initially run the function:
    $("#navhead").click(function () {
        if ($("#navcontent").css("display") == "none") {
            $("#navcontent").css({
                display: "block",
                right: "25px"
            });
            $("#navcontent").animate({
                right: "5px"
            }, 400);
        } else {
            $("#navcontent").css({
                display: "none"
            });
        }
    });

    $("#navcontent ul li a").click(function () {

        $("#bugfix p").html("You cannot return flase");

        //$(this).html()
        history.pushState(null, "contact", "/contact");
    })
})