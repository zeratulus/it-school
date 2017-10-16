/**
 * Created by ailus on 01.08.17.
 */
var shoots = [];

function life() {
    shoots.forEach(function callback(currentValue, index, array) {
        console.log(currentValue, index, array);
        var el = $('#'+array);
        var dir = el.data('direction');
        var speed = el.data('speed');

        shoot(array, dir, speed);
    });
}

setInterval(function () {
    life();
}, 50);

function shoot(id, tank_direction, shoot_speed) {
    var shoot_obj = $('#'+id);

    var shoot_x = parseInt(shoot_obj.css('left'));
    var shoot_y = parseInt(shoot_obj.css('top'));

    if (tank_direction == 0) { // Top
        shoot_y = shoot_y - shoot_speed;
    } else if (tank_direction == 1) { // Right
        shoot_x = shoot_x + shoot_speed;
    } else if (tank_direction == 2) { // Bottom
        shoot_y = shoot_x + shoot_speed;
    } else if (tank_direction == 3) { // Left
        shoot_x = shoot_x - shoot_speed;
    }

    shoot_obj.css('left', shoot_x+'px');
    shoot_obj.css('top', shoot_y+'px');
}

$(document).ready(function () {
    var tank = $('#tank');
    var info = $('#info');

    var tank_direction = 0; //0 - Top, 1 - Right, 2 - Bottom, 3 - Left

    var screen_x = window.innerWidth;
    var screen_y = window.innerHeight;

    var new_val_x = 0;
    var new_val_y = 0;

    var shoot_count = 0;

    var shoot_speed = 10;

    $(window).keypress(function (event) {
        // console.log(event.which);
        var text_info = 'Screen X = ' + screen_x + '<br>Screen Y = ' + screen_y;

        var tank_x = parseInt(tank.css('left'));
        var tank_y = parseInt(tank.css('top'));

        var tank_speed = 10;

        //115 = s - Move Down
        if (event.which == 115) {
            tank.css('transform', 'rotate(180deg)');
            new_val_y = tank_y + tank_speed;
            if (new_val_y + 100 >= screen_y) {
                new_val_y = tank_y;
            }
            tank.css('top', new_val_y);
            tank_direction = 2;
        }

        //119 = w - Move Up
        if (event.which == 119) {
            tank.css('transform', 'rotate(0deg)');
            new_val_y = tank_y - tank_speed;
            if (new_val_y <= 0) {
                new_val_y = tank_y;
            }
            tank.css('top', new_val_y);
            tank_direction = 0;
        }

        //97 = a - Move Left
        if (event.which == 97) {
            tank.css('transform', 'rotate(270deg)');
            new_val_x = tank_x - tank_speed;
            if (new_val_x <= 0) {
                new_val_x = tank_x;
            }
            tank.css('left', new_val_x);
            tank_direction = 3;
        }

        //100 = d - Move Right
        if (event.which == 100) {
            tank.css('transform', 'rotate(90deg)');
            new_val_x = tank_x + tank_speed;
            if (new_val_x + 100 >= screen_x) {
                new_val_x = tank_x;
            }
            tank.css('left', new_val_x);
            tank_direction = 1;
        }

        //32 - Space - Fire
        if (event.which == 32) {
            shoot_count++; // shoot_count = shoot_count + 1;
            var shoot_x = 0;
            var shoot_y = 0;

            if (tank_direction == 0) { // Top
                shoot_x = tank_x + 45;
                shoot_y = tank_y - 10;
            } else if (tank_direction == 1) { // Right
                shoot_x = tank_x + 110;
                shoot_y = tank_y + 45;
            } else if (tank_direction == 2) { // Bottom
                shoot_x = tank_x + 45;
                shoot_y = tank_y + 110;
            } else if (tank_direction == 3) { // Left
                shoot_x = tank_x - 10;
                shoot_y = tank_y + 45;
            }

            // alert(tank_direction + ' ' +  shoot_x + ' ' + shoot_y);
            var cs_id =  'shoot-' + shoot_count; // Current Shoot
            $('body').append('<div id="' + cs_id + '" class="shoot" style="left: ' + shoot_x + 'px; top: ' + shoot_y + 'px;" data-direction="'+tank_direction+'" data-speed="'+shoot_speed+'"></div>');
            // funcs[funcs.length] = shoot(cs_id, tank_direction, shoot_speed);
            shoots[shoots.length] = cs_id;
        }

        text_info = text_info + '<br> Tank X = ' + tank_x + '<br> Tank Y = ' + tank_y;

        info.html(text_info);
    });
});