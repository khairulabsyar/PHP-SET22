<?php

// constant declaration
// define ('STATUS_PAID', 'paid');

// echo STATUS_PAID;

// const STATUS_PAID = 'paid';


// if (true){
//     define ('STATUS_PAID', 'paid');
// }

// echo STATUS_PAID;

// define("PREFIX", "OPTION");

// echo PREFIX;

// define(PREFIX . '_1', 1);
// define(PREFIX . '_1', 2);
// define(PREFIX . '_1', 3);

// echo PREFIX_1;

// 3 Main Data Types
// 1. Scalar Data Types
# bool,int, flat, string
$completed = true;
$score = 42;
$price = 0.99;
$greeting = "Hello";

echo $completed . '<br/>';
echo $score . '<br/>';
echo $price . '<br/>';
echo $greeting . '<br/>';

echo gettype($completed) . '<br/>';
echo gettype($score) . '<br/>';
echo gettype($price) . '<br/>';
echo gettype($greeting) . '<br/>';

// 2. Compound Data Types
# array, objects, callable, iterable
$arrs = [1, 2, 3, 4, 5, -6.6, 'A', true, null];

// echo cant be used for arrays
var_dump($arrs) . '<br/>';

// to check key of the array
echo '<pre>';
print_r($arrs);
echo '</pre>';

// 3. special
# null, resource

$score = (string) $score;
var_dump($score);

// floating point

var_dump(0.1 + 0.2);

$x = floor((0.1 + 0.7) * 10);
$y = ceil((0.1 + 0.7) * 10);

var_dump($x, $y);

$x = 0.23;
$y = 1 - 0.77;

if ($x === $y) {
    echo 'yes' . '<br/>';
} else {
    echo 'no' . '<br/>';
}

// string

$firstName = 'Absyar';
$lastName = 'Fahimi';

//concat string
$name = $firstName . ' ' . $lastName;
echo $name . '<br/>';

$name2 = "$firstName $lastName";
echo $name2 . '<br/>';

$name3 = "{$firstName} {$lastName}";
echo $name3 . '<br/>';

echo $name[-2] . '<br/>';

$firstName[-2] = 'W';

echo $firstName . '<br/>';

// heredoc
$k = 'Hello';
$l = 'World';
$test = <<<TEXT
Line 1 $k
Line 2 $l
Line 3
TEXT;
echo nl2br($test) . '<br/>';

// arrays
$language = ['PHP', 'JS', "Python"];

echo $language[1] . '<br/>';
// check count
echo count($language) . '<br/>';
echo '<prep>';
print_r($language);
echo '</prep>' . '<br/>';

// to check if variable has been declared
var_dump(isset($language[3])) . '<br/>';

if (isset($language[2])) {
    echo 'key exist' . '<br/>';
};

// change specific element
$language[1] = 'C++';

// add element
$language[] = "TypeScript";
// or
array_push($language, 'Ruby', 'Java');

echo '<prep>';
print_r($language);
echo '</prep>' . '<br/>';

// check if it is array
var_dump(gettype($language) === 'array');
var_dump(is_array($language));

// change to string use implode
var_dump(implode(',', $language));

// associative arrays
$bahasa = [
    'php' => "PHP",
    'js' => "JAVASCRIPT",
    'python' => "PYTHON"
];
echo '<prep>' . '<br/>';
print_r($bahasa) . '<br/>';
echo '</prep>' . '<br/>';

echo $bahasa['php'] = "PPPPPPP";
// adding new key
$bahasa['rust'] = 'RUST';
echo '<prep>' . '<br/>';
print_r($bahasa) . '<br/>';
echo '</prep>' . '<br/>';

$languages2 = [
    'php' => [
        'creator' => 'Rasmus Lerdorf',
        'extension' => 'php',
        'website' => 'www.php.net',
        'isOpenSource' => true,
        'versions' => [
            ['version' => 8, 'releaseDate' => 'Nov 26, 2020'],
            ['version' => 7.4, 'releaseDate' => 'Nov 28, 2019']
        ]
    ],
    'python' => [
        'creator' => 'Guido Van Rossum',
        'extension' => 'py',
        'website' => 'www.python.org',
        'isOpenSource' => true,
        'versions' => [
            ['version' => 3.9, 'releaseDate' => 'Oct 5, 2020'],
            ['version' => 3.8, 'releaseDate' => 'Oct 14, 2019']
        ]
    ]
];

$languages2['php']['versions'][]['version'] = 8.1;
$languages2['php']['versions'][2]['releaseDate'] = 'Nov 25, 2021';

// array_push($language2['php']['versions'], ['version' => 8.1, 'releaseDate' => 'Sep 29, 2022']);

echo $languages2['php']['versions'][0]['releaseDate'] . '<br/>';

echo '<prep>';
print_r($languages2['php']['versions']);
echo '</prep>' . '<br/>';

// remove element from array
$arr = ['a', 'b', 50 => 'c', 'd'];
echo '<prep>';
print_r($arr) . '<br/>';
echo '</prep>' . '<br/>';

echo array_shift($arr) . '<br/>';
echo array_pop($arr) . '<br/>';

echo '<prep>';
print_r($arr) . '<br/>';
echo '</prep>' . '<br/>';

?>

<html>

<head></head>

<body>
    <?php
    $score = 40;
    if ($score >= 90) {
        echo '<strong>A</strong>';
    } elseif ($score >= 80) {
        echo '<strong>B</strong>';
    } else {
        echo '<strong>F</strong>';
    }
    ?>

    <!-- 2 ways of writing in HTML -->

    <?php $score = 55 ?>
    <?php if ($score > 90) : ?>
    <strong>A</strong>
    <?php elseif ($score > 70) : ?>
    <strong>B</strong>
    <?php elseif ($score > 40) : ?>
    <strong>C</strong>
    <?php else : ?>
    <strong>FAIL</strong>
    <?php endif ?>
</body>

</html>

<?php
// ternary
$studied = true;
$score = ($studied === true) ? "A" . '<br/>' : "F" . '<br/>';

echo $score;

// while loop
$count = 0;

while (true) {
    $count++;
    if ($count > 10) {
        break;
    }
    echo $count . '<br/>';
}

//do while loop
$count = 0;
do {
    $count++;
    echo $count . '<br/>';
} while ($count < 10);

// for loop
$nama = ['absyar', 'jun', 'fairuz', 'muaz'];

for ($i = 0; $i < 4; $i++) {
    echo $nama[$i] . '<br/>';
}

// loop through the names array, echo out each name but first letter capitalised
// for ($i = 0; $kira = count($nama); $i < $kira; $i++){
//     echo ucfirst($nama[$i]).'<br/>';
// }

// for each

foreach ($language as  $key => $languages) {
    echo $key . ': ' . $languages . '<br/>';
}

$user = [
    'name' => 'Absyar',
    'email' => 'absyar@invoke.com',
    'skills' => ['baking', 'coding']
];

// loop through the arr, print out the key: value. If element is an arr, print out values seperated by comma
foreach ($user as $key => $value) {
    if (is_array($value)) {
        echo $key . ': ';
        foreach ($value as $info) {
            echo $info . ', ';
        };
    } else {
        echo $key . ': ' . $value . '<br/>';
    }
}

// nowdoc
// switch
// match
// nl2br
?>