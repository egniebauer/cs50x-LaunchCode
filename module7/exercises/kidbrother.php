<?php

print "I can remember a LOT of things! Tell me what to remember!";
print "\nHow many things?: ";

$howMany = readline();
$stack = array();

// TODO: your code here! Loop here, collecting as many elements as the user told us to,
// and push each element into $stack

for ($i = 1; $i <= $howMany; $i++) {
  $newItem = readline("Thing " . $i . "? ");
  array_push($stack, $newItem);
}

print "\nOkay okay okay the things are:";
// Our code: loop over the array and pop out all the elements
while(!empty($stack)){
  $value = array_pop($stack);
  print "\n$value";
}
print "\nI'm so great! ...Or did I mess it up?\n";

?>