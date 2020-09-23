<?php
function checkPair($string, $brackets) {

    $stackMy = new SplStack();

    for ($i = 0; $i < strlen($string); $i++) {
        //index of the element in the array $brackets
        $key = array_search($string[$i], $brackets);

        if ($string[$i] == '"') {
            echo "<br>";
            echo "Extra quotation mark";
            echo "<br>";
            break;
        }

        if (($stackMy->count()) > 0) {
            //compare the indexes of the pair of elements 
            if (array_search($stackMy->top(), $brackets) != ($key - 1)) {
                //if the elements are not paired, then add the element to the stack
                $stackMy->push($string[$i]);
            } else {
                //if the elements are paired, then remove the element from the stack
                $stackMy->pop();
            }
        } else {
            $stackMy->push($string[$i]);
        }
    }
    if ($stackMy->count() > 0) {
        return "False";
    } else {
        return "True";
    }
}

$brackets = ["(", ")", "[", "]", "{", "}"];

function bracketsSearch($string, $brackets)
{
    $ecpressDelTextBetweenQM = '/"[^"]*"/';
    $ecpressLeftBrackets = '/[^\"\(\)\[\]]/';

    $stringBetweenMarks = preg_match_all($ecpressDelTextBetweenQM, $string, $matches);

    //deleting text between quotation marks
    $string = preg_replace($ecpressDelTextBetweenQM, '', $string);
    //delete everything except a couple items
    $string = preg_replace($ecpressLeftBrackets, '', $string);
}

$file1 = "()[([)]";
$file2 = "()[()]";
$file = 'f()[]dk "hhh (" [ "hhh" a)]ak "0';

bracketsSearch($file, $brackets, true);
