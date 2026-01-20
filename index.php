<?php
// Leggiamo il file JSON come stringa
$jsonText = file_get_contents('dischi.json');
// Convertiamo il JSON in array PHP
$dischi = json_decode($jsonText, true);

// se per qualche motivo il JSON è vuoto o invalido, evito errori
if (!is_array($dischi)) {
  $dischi = [];
}

$message = null;

// Gestione del form di aggiunta disco
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Prendo i dati dal form
    $titolo = $_POST['titolo'] ?? '';
    $artista = $_POST['artista'] ?? '';
    $cover = $_POST['cover'] ?? '';
    $anno = $_POST['anno'] ?? '';
    $genere = $_POST['genere'] ?? '';
    if ($titolo === '' || $artista === '' || $cover === '' || $anno <= 0 || $genere === '') {
    $message = "Dati non validi: compila tutti i campi correttamente.";
    } else {
    $newDisco = [
      "titolo" => $titolo,
      "artista" => $artista,
      "cover" => $cover,
      "anno" => $anno,
      "genere" => $genere
    ];

    $dischi[] = $newDisco;
    // Salvo l'array aggiornato nel file JSON
    file_put_contents('dischi.json', json_encode($dischi, JSON_PRETTY_PRINT));
     // redirect per evitare doppio invio con refresh
    header('Location: index.php');
    exit;
  }
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  echo '<pre>';
  var_dump($_POST);
  echo '</pre>';
  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-DISCHI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
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
  <div class="card mb-4">
  <div class="card-body">
    <h2 class="h5 mb-3">Aggiungi un nuovo disco</h2>
    <?php if ($message !== null) { ?>
    <div class="alert alert-warning"><?php echo $message; ?></div>
    <?php } ?>

    <form action="index.php" method="POST" class="row g-3">

      <div class="col-md-6">
        <label class="form-label">Titolo</label>
        <input type="text" name="titolo" class="form-control" required>
      </div>

      <div class="col-md-6">
        <label class="form-label">Artista</label>
        <input type="text" name="artista" class="form-control" required>
      </div>

      <div class="col-md-6">
        <label class="form-label">URL Cover</label>
        <input type="text" name="cover" class="form-control" required>
      </div>

      <div class="col-md-3">
        <label class="form-label">Anno</label>
        <input type="number" name="anno" class="form-control" required>
      </div>

      <div class="col-md-3">
        <label class="form-label">Genere</label>
        <input type="text" name="genere" class="form-control" required>
      </div>

      <div class="col-12">
        <button type="submit" class="btn btn-primary">Aggiungi disco</button>
      </div>

    </form>
  </div>
</div>

</body>
</html>