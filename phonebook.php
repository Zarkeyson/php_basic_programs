<?php
  // Comment: status == 1 GOST, ako je status == 2 REGISTROVAN KORISNIK
  $status = 1;
  $vaucer_id = "123";
  $users = array(
    array(
      'name' => 'Petar',
      'prezime' => 'Petrovic',
      'number' => "063 555 666"),
    array(
      'name' => 'Nikola',
      'prezime' => 'Saravolac',
      'number' => "063 520 521"),
    array(
      'name' => 'Zarko',
      'prezime' => 'Djurdjev',
      'number' => "063 525 320"),
      array(
        'name' => 'Petar',
        'prezime' => 'Nikodijevic',
        'number' => "063 513 616")
  );
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Core PHP - Phonebook</title>
  </head>
  <body>
    <form action="phonebook.php" method="get">
      <input type="text" name="name" placeholder="Kriterijum...."/>
      <input type="text" name="vaucer" placeholder="Vaucer...">
      <input type="submit" name="submit" value="Search"><br>
    </form>
      <hr>
      <?php

      if (isset($_GET['name'])) {   #isset funk da bismo sprecili sliku greske kad se prvi put udje na stranicu
        if (isset($_GET['vaucer'])) {
          $vaucer = $_GET['vaucer'];
        }else {
          $vaucer = "";
        }

        $name = $_GET['name'];
        $name = strtolower($name);
        $brRezultata = 0;
        for ($i=0; $i < count($users); $i++) {
          $pripremljenoIme = strtolower($users[$i]['name']);
          $pripremljenoPrezime = strtolower($users[$i]['prezime']);
          if ($name == $pripremljenoIme || $name == $pripremljenoPrezime) {
            $brRezultata++;
            echo "Ime: " . $users[$i]['name'] . "<br>";
            echo "Prezime: " . $users[$i]['prezime'] . "<br>";
            if (($status == 2) || ($vaucer == $vaucer_id)) {
              echo "Broj telefona: " . $users[$i]['number'] . "<br><hr>";
            }else {
              echo "Broj telefona: ";
              for ($j=0; $j<strlen($users[$i]['number']); $j+2) {
                if ($j < 3) {
                  echo $users[$i]['number'][$j];
                }else {
                  if (!($j%3)) {
                    echo $users[$i]['number'][$j];
                  }else {
                    echo "*";
                  }
                }
              }
              echo "<br><hr>";
            }
          }
        }if ($brRezultata) {
          echo "Broj rezultata pretrage za kriterijum <b>" . $_GET['name'] . "</b> je: " . $brRezultata . "<br>";
          if ($vaucer == $vaucer_id) {
            echo "<p style='color:red'>Pretraga uspesno izvrsena uz pomoc vaucera</p>";
          }else {
            echo "Da biste prikazali broj telefon molimo Vas unesite vazci vaucer";
          }
        }else {
          echo "Nema rezultata pretrage...";
        }
        }
      else {
            echo "Unesite kriterijum za pretragu";
      }
      ?>
  </body>
</html>
