<?php
$niz = array();

echo "Nas niz je: <br>";

for ($i=0; $i < 100; $i++) {
  $broj = rand(1,100);
  array_push($niz, $broj);
  echo $niz[$i] . ", ";
}
echo "<hr>Brojevi deljivi sa tri u nasem nizu su: <br>";

foreach ($niz as $broj) {
  if ($broj % 3 == 0) {
    echo $broj . ", ";
  }
}

echo "<hr> Prosecna vrednost u nasem nizu je: <br>";

$n = count($niz);
$zbir = 0;

foreach ($niz as $clan) {
  $zbir = $zbir + $clan;            // ODRADJENO SVE STO IMA U ZADATKU
}
$average = $zbir / $n;
echo $average;

$max = 0;
$min = 100;

echo "<hr>Maksimalna i minimalna vrednost u nasem nizu su: <br>";

foreach ($niz as $najveci) {
  if ($najveci > $max) {
    $max = $najveci;
  }
}

foreach ($niz as $najmanji) {
  if ($najmanji <= $min) {
    $min = $najmanji;
  }
}
echo $max . ", " . $min;

 ?>
