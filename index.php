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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
   <body class="bg-light">

  <div class="container py-4">
    <h1 class="text-center mb-4">Lista Dischi</h1>

    <div class="row">
      <?php foreach ($dischi as $disco) { ?>
        <div class="col-12 col-md-4 mb-4">
          <div class="card h-100">
            <img 
              src="<?php echo $disco['cover']; ?>" 
              class="card-img-top" 
              alt="<?php echo $disco['titolo']; ?>"
            style="height: 350px; object-fit: cover;"
            >

            <div class="card-body">
              <h5 class="card-title"><?php echo $disco['titolo']; ?></h5>
              <p class="card-text">
                <strong>Artista:</strong> <?php echo $disco['artista']; ?><br>
                <strong>Anno:</strong> <?php echo $disco['anno']; ?><br>
                <strong>Genere:</strong> <?php echo $disco['genere']; ?>
              </p>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>

  </div>
</body>
</html>