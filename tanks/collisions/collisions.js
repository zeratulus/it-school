/**
 * Created by ailus on 08.08.17.
 */

var screen_x = window.innerWidth;
var screen_y = window.innerHeight;

function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min)) + min;
}

function getWall(id, pos_x, pos_y) {
    return '<img src="../image/wall.png" class="wall" id="wall-' + x + '" style="top: ' + pos_y + 'px; left: ' + pos_x + 'px;">';
}

//    var rand_x = getRandomInt(10, 100);
var rand_x = 2;

for (x=0; x < rand_x; x++) {
    var pos_x = getRandomInt(screen_x - 300, screen_x - 100);
    var pos_y = getRandomInt(screen_y - 300, screen_y - 100);

    var new_wall = getWall(x, pos_x, pos_y);

    $('body').append(new_wall);
}

function checkCollision(obj1, obj2) {
    var o1_t = parseInt(obj1.css('top'));
    var o1_l = parseInt(obj1.css('left'));
    var o1_w = parseInt(obj1.css('width'));
    var o1_h = parseInt(obj1.css('height'));

    //Angles of rectangle obj1
    var o1_1 = [o1_l, o1_t];
    var o1_2 = [o1_l + o1_w, o1_t];
    var o1_3 = [o1_l + o1_w , o1_t + o1_h];
    var o1_4 = [o1_l, o1_t + o1_h];

    var o2_t = parseInt(obj2.css('top'));
    var o2_l = parseInt(obj2.css('left'));
    var o2_w = parseInt(obj2.css('width'));
    var o2_h = parseInt(obj2.css('height'));

    //Angles of rectangle obj2
    var o2_1 = [o2_l, o2_t];
    var o2_2 = [o2_l + o2_w, o2_t];
    var o2_3 = [o2_l + o2_w , o2_t + o2_h];
    var o2_4 = [o2_l, o2_t + o2_h];

    console.log(o1_1);
    console.log(o1_2);
    console.log(o2_1);

    //is colided in x axis (screen width)
    // if (o2_1[0] >= o1_1[0] && o2_1[0] <= o1_2[0]) {
    //     return 'Colided';
    // }

    //is colided in x & y axis (screen width and height)
    if (o2_1[0] >= o1_1[0] && o2_1[0] <= o1_4[0]) {
        if (o2_1[1] >= o1_1[1] && o2_1[1] <= o1_2[1]) {
            return 'Colided';
        }
    }

    return 'Nothing collided'
}

function checkCollisions() {
    var walls = $('.wall');
    console.log(walls);
    // var walls_col = $('.wall');

    // var res = checkCollision(walls[0], walls[1])

    // var res = checkCollision($('#wall-0'), $('#wall-1'));

    var res = collision($('#wall-0'), $('#wall-1'));

    // console.log(res);
    alert(res);
}

function collision($div1, $div2) {
    var x1 = $div1.offset().left;
    var y1 = $div1.offset().top;
    var h1 = $div1.outerHeight(true);
    var w1 = $div1.outerWidth(true);
    var b1 = y1 + h1;
    var r1 = x1 + w1;
    var x2 = $div2.offset().left;
    var y2 = $div2.offset().top;
    var h2 = $div2.outerHeight(true);
    var w2 = $div2.outerWidth(true);
    var b2 = y2 + h2;
    var r2 = x2 + w2;

    if (b1 < y2 || y1 > b2 || r1 < x2 || x1 > r2) return false;
    return true;
}


checkCollisions();