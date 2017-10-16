/**
 * Created by ailus on 15.08.17.
 */
function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min)) + min;
}

var example, num1, num2, math_action, action, min_num, max_num, result;

min_num = 0;
max_num = 10;

function getExample() {
    num1 = getRandomInt(min_num, max_num);
    num2 = getRandomInt(min_num, max_num);

    // result = num1 + action + num2;

    math_action = getMathAction(0, 3);

    example = num1.toString() + math_action + num2.toString();

    if (action == 0) {
        result = num1 + num2;
    } else if (action == 1) {
        result = num1 - num2;
    } else if (action == 2) {
        result = num1 * num2;
    } else if (action == 3) {
        result = num1 / num2;
    }

    return example;
}

function getMathAction (min, max) {
    action = getRandomInt(min, max);

    if (action == 0) {
        math_action = '+';
    } else if (action == 1) {
        math_action = '-';
    } else if (action == 2) {
        math_action = '*';
    } else if (action == 3) {
        math_action = '/';
    }

    return math_action;
}