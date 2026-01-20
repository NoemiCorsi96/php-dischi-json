<?php
// Leggiamo il file JSON come stringa
$jsonText = file_get_contents('dischi.json');
// Convertiamo il JSON in array PHP
$dischi = json_decode($jsonText, true);



// Per ora stampiamo tutto per controllo
//echo '<pre>';
//var_dump($dischi);
//echo '</pre>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-DISCHI</title>
</head>
<body>
    <h1>Lista dischi</h1>
<!-- Ciclo sui dischi e li stampo -->
  <?php foreach ($dischi as $disco) { ?>
    <div style="margin-bottom: 20px;">
      <h2><?php echo $disco['titolo']; ?></h2>
      <p>
        Artista: <?php echo $disco['artista']; ?><br>
        Anno: <?php echo $disco['anno']; ?><br>
        Genere: <?php echo $disco['genere']; ?>
      </p>
      <img src="<?php echo $disco['cover']; ?>" alt="<?php echo $disco['titolo']; ?>" width="150">
      <hr>
    </div>
  <?php } ?>
</body>
</html>