<?php
  $users = array(
    array(
      'name' => 'Petar',
      'prezime' => 'Petrovic',
      'number' => '063513313'),
    array(
      'name' => 'Nikola',
      'prezime' => 'Saravolac',
      'number' => '063520521'),
    array(
      'name' => 'Zarko',
      'prezime' => 'Djurdjev',
      'number' => '063525320'),
      array(
        'name' => 'Petar',
        'prezime' => 'Nikodijevic',
        'number' => '063513616')
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
      <input type="submit" name="submit" value="Search"><br>
    </form>
      <hr>
      <?php
      if (isset($_GET['name'])) {   #isset funk da bismo sprecili sliku greske kad se prvi put udje na stranicu
        $name = $_GET['name'];
        $name = strtolower($name);
        $brRezultata = 0;
        for ($i=0; $i < count($users); $i++) {
          $pripremljenoIme = strtolower($users[$i]['name']);
          if ($name == $pripremljenoIme ) {
            $brRezultata++;
            echo "Ime: " . $users[$i]['name'] . "<br>";
            echo "Prezime: " . $users[$i]['prezime'] . "<br>";
            echo "Broj telefona: " . $users[$i]['number'] . "<br><hr>";
          }
        }if ($brRezultata == 0) {
          echo "Nema rezultata pretrage...";
        }else {
          echo "Broj rezultata pretrage za kriterijum <b>" . $_GET['name'] . "</b> je: " . $brRezultata;
        }
        }
      else {
            echo "Unesite kriterijum za pretragu";
      }
      ?>
  </body>
</html>
