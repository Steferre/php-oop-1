<?php
/*
Oggi pomeriggio ripassate i primi concetti di classe e di variabili e metodi d'istanza che abbiamo visto stamattina e create un file index.php in cui:
- è definita una classe ‘Movie’
   => all'interno della classe sono dichiarate delle variabili d'istanza
   => all'interno della classe è definito un costruttore
   => all'interno della classe è definito almeno un metodo
- vengono istanziati almeno due oggetti ‘Movie’ e stampati a schermo i valori delle relative proprietà
*/

class Movie {
   public $title;
   public $year;
   public $filmProducer;
   public $singleUserVote;
   public $averageVote = 8;
   public $cast = [
      [
         'name' => "",
         'lastname' => "",
         'gender' => ""
      ],
      [
         'name' => "",
         'lastname' => "",
         'gender' => ""
      ]
   ];
   
   function __construct($singleUserVote)
   {
      $this->singleUserVote = $singleUserVote;   
   }

   public function calcNewVoteAverage() {
      $result = ($this->averageVote + $this->singleUserVote) / 2;
      
      return $result;
   }

   public function actorFullName() {
      $actorFullNameList = [];
      foreach($this->cast as $actor) {
         $actorFullNameList[] = $actor["name"] . " " . $actor["lastname"];
      }

      return $actorFullNameList;
   }
}

$film1 = new Movie(6);
$film1->title = "Limitless";
$film1->year = 2011;
$film1->calcNewVoteAverage();
$film1->filmProducer = "Neil Burger";
$film1->cast[0]["name"] = "Bradley";
$film1->cast[0]["lastname"] = "Cooper";
$film1->cast[0]["gender"] = "male";
$film1->cast[1]["name"] = "Robert";
$film1->cast[1]["lastname"] = "De Niro";
$film1->cast[1]["gender"] = "male";
$film1->actorFullName();

$film2 = new Movie(9);
$film2->title = "Disturbia";
$film2->year = 2007;
$film2->calcNewVoteAverage();
$film2->filmProducer = " D.J. Caruso";
$film2->cast[0]["name"] = "Shia";
$film2->cast[0]["lastname"] = "LeBeouf";
$film2->cast[0]["gender"] = "male";
$film2->cast[1]["name"] = "Sarah";
$film2->cast[1]["lastname"] = "Roemer";
$film2->cast[1]["gender"] = "female";
$film2->actorFullName();

$filmsList = [
   0 => $film1,
   1=> $film2
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>PHP-OOP-1</title>
</head>
<body>
   <ol>
   <?php 
      foreach($filmsList as $film) {
   ?> 
      <li>     
         <h1><?php echo $film->title ?></h1>
         <p>Prodotto da: <strong><?php echo $film->filmProducer ?></strong>, nel <?php echo $film->year ?></p>
         <p>Valutazione: <?php echo $film->calcNewVoteAverage() ?>/10</p>
         <p>Cast:</p>
         <ul>
            <?php
               foreach($film->actorFullName() as $actor) {
            ?>
               <li><?php echo $actor ?></li>
            <?php      
               }
            ?>
         </ul>
         <?php   
         }
         ?>
      </li>
   </ol>
</body>
</html>

