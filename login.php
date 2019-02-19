
<?php
$auth = 0;

 include 'lib/includes.php';

// traitement du formulaire


//var_dump($_POST);
if(isset($_POST['username']) && isset($_POST['password'])){
  $username = htmlentities(trim($db->quote($_POST['username'])));
  $password = htmlentities(trim(sha1($_POST['password'])));
  $select = $db->query("SELECT * FROM users WHERE username=$username AND password='$password' ");
 if($select->rowCount() > 0){
    $_SESSION['Auth'] = $select->fetch();
    setFlash('Vous etes conecté');
    header('Location:' . WEBROOT . 'admin/index.php');
    die();
 }
//$db->query()
}

//inclusion du header
include 'partials/header.php';
?>


<form action="#" method="post">
  <fieldset>
    <ul>
      <li>
        <?php echo input('username'); ?>


      </li><!--
   --><li>
        <input type="text" id="password" name="password" placeholder="Mot de passe">
      </li><!--
    --><li>
        <button type="submit">Se connecter</button>
      </li>
    </ul>
  </fieldset>
</form>
