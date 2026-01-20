<?php
//Questo mi serve per dire al browser che quello che sto restituendo è un file JSON
header('Content-Type: application/json');
//Array di dischi
$dischi = [
  [
    "titolo" => "Hybrid Theory",
    "artista" => "Linkin Park",
    "cover" => "https://via.placeholder.com/200",
    "anno" => 2000,
    "genere" => "Nu Metal"
  ],
  [
    "titolo" => "Random Access Memories",
    "artista" => "Daft Punk",
    "cover" => "https://via.placeholder.com/200",
    "anno" => 2013,
    "genere" => "Electronic"
  ]
];
//Restituisco i dischi in formato JSON
//La funzione json_encode() prende un array PHP e lo converte in una stringa JSON
echo json_encode($dischi);