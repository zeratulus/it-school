<?php
ini_set('display_errors', 1);

$array = array(); //Пустой массив

$some_array = array(
    'id'     => 8,
    'name'   => 'Jon Doe',
    'email'  => 'jon.doe@example.com'
); //Ассоциативный массив с данными

//Пример вывода данных из массива и конкетанеция строк (сложение строк)
//Вывод: "8: Jon Doe - jon.doe@example.com"
echo $some_array['id'] . ': ' . $some_array['name'] . ' - ' . $some_array['email'];

//Числа в переменной $result будет число 8 как результат сложениея
$result = 4 + 4;

//$c будет равно 160 и мы можем перемножать переменные
$a = 16;
$b = 10;
$c = $a * $b;
$c1 = 16 * 10;

// Возможные арифметические действия +, -, *, / (плюс, минус, умножить, разделить)

//Строки
$str = 'Hello World!';
$string = "Hello World!";

//Логические конструкции

//если то - если а больше б
if ($a > $b) {
    // что то делаем
}

//если то ещё
if ($a > $b) {
    // что то делаем
} else {
    // если не равно, равно или меньше делаем ещё что-то
}

//если то ещё, ещё
if ($a > $b) {
    // что то делаем
} elseif ($a < $b) {
    //делаем что-то если а меньше b
//} elseif ($a === $b) {

//} elseif ($a === $b) {

} else {
    // если не равно или равно
}

// в условии если - то могут быть следующие аррифметические сравнения:
// ">" - больше
// "<" - меньше
//">=" - больше или равно
//"<=" - меньше или равно
//"==" - равно
//"!="  - не равно

//если строка пуста
if (empty($str)) {

}

//В если - то в условие можно передавать функции. Пример: Если строка не пуста
if (!empty($str)) {
    // делаем что-то
}

$isDoorLocked = true;
$isHandFree = true;
$isKeyExists = false;

if ($isDoorLocked && $isHandFree && $isKeyExists) {

}

if (($a > $b) || ($isDoorLocked)) {

}

if (($a > $b) || $isDoorLocked) {

}

if ($isDoorLocked && $isHandFree || $isKeyExists) {

}

//function getCustomerIdByEmail($email) {
// return $id;
//}

function abs($a, $b) {
    return $a + $b;
}
echo '<br><br>';

function something() {
    return 'Something happend';
}

//$result = something();
something();

function somethingReturn() {
    //...
    $result = 'Something happend';
    return $result;
//    return 'Something happend';
}

$result = somethingReturn();
echo $result;

function sum($a, $b) {
//    return $a + $b;
    return (int)$a + (int)$b;
}
// http://localhost
$url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'];

// http://localhost/homework/get.php?name=Name&....
header('Location: ' . $url); //301 Redirect