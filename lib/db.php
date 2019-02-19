<?php
  try{
    $db = new PDO('mysql:host=localhost;dbname=u696138781_6262', 'root', 'usbw',
    [
           PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
             PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
         ]
  );

  }catch (Exception $e){
      echo 'Impossible de se connecter à la base de donnée';
      echo $e->getMessage();
      die();
  }
