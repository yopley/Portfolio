<?php
include '../lib/includes.php';
var_dump($_FILES);
var_dump($_POST);
var_dump($_SESSION);
/**
* La SAUVEGARDE
**/
if(isset($_POST['name']) && isset($_POST['slug'])){
checkCsrf();
  $slug = $_POST['slug'];
  if(preg_match('/^[a-z\-0-9]+$/', $slug)){
    $name = $db->quote($_POST['name']);
    $slug = $db->quote($_POST['slug']);
    $category_id = $db->quote($_POST['category_id']);
    $content = $db->quote($_POST['content']);

    /**
    * RECUPERATION DE LA REALISATION**/
    if(isset($_GET['id'])){
      $id = $db->quote($_GET['id']);
      $db->query("UPDATE works SET name=$name, slug=$slug , content=$content, category_id=$category_id WHERE id=$id");
    }else{
    $db->query("INSERT INTO works SET name=$name, slug=$slug, content=$content, category_id=$category_id");
    $_GET['id'] = $db->lastInsertId();
  }
    setFlash('La réalisation a bien été enregistré');

    /**
    * ENVOIS DES IMAGES
    **/

    $work_id = $db->quote($_GET['id']);
    $files = !empty($_FILES['images']) ? $_FILES['images'] : NULL;
    $images = array();
    require '../lib/image.php';
    foreach($files['tmp_name'] as $k => $v){
        $image = array(
          'name' => $files['name'][$k],
          'tmp_name' => $files['tmp_name'][$k]
        );
        $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
        if(in_array($extension, array('jpg','png'))){
          $db->query("INSERT INTO images SET work_id=$work_id");
          $image_id = $db->lastInsertId();
          $image_name = $image_id . '.' . $extension;

          move_uploaded_file($image['tmp_name'], IMAGES . '/works/' . $image_name);
          resizeImage(IMAGES . '/works/' . $image_name, 420, 220);
          $image_name = $db->quote($image_name);
          $db->query("UPDATE images SET name=$image_name WHERE id = $image_id");
        }
    }


    header('Location:work.php');
    die();
  }else {
    setFlash('Le slug n\'est pas validé', 'danger');
  }
}
if(isset($_GET['id'])){
  $id = $db->quote($_GET['id']);
  $select = $db->query("SELECT * FROM works WHERE id=$id");
  if($select->rowCount() == 0){
    setFlash("Il n'y a pas de réalisaion avec cet ID", 'danger');
    header('Location:work.php');
    die();
  }
  $_POST = $select->fetch();
}

//SUPPRESSION  IMAGE

if(isset($_GET['delete_image'])){
  checkCsrf();
  $id = $db->quote($_GET['delete_image']);
  $select = $db->query("SELECT name, work_id FROM images WHERE id=$id");
  $image = $select->fetch();
  var_dump($image['name']);
  $images=glob(IMAGES . '/works/' . pathinfo($image['name'], PATHINFO_FILENAME) . '_*x*.*');
    if(is_array($images)){
      foreach($images as $value){
        unlink($value);
      }
    }
  unlink(IMAGES . '/works/' . $image['name']);
  $db->query("DELETE FROM images WHERE id=$id");
  setFlash("L'image a bien été supprimée");
  header('Location:work_edit.php?id=' . $image['work_id']);
  die();
}

//Mise en avant d'une   IMAGE

if(isset($_GET['highlight_image'])){
  checkCsrf();
  $work_id = $db->quote($_GET['id']);
  $image_id = $db->quote($_GET['highlight_image']);
  $db->query("UPDATE works SET image_id=$image_id WHERE id=$work_id");
  setFlash("L'image a bien été mise en avant");
  header('Location:work_edit.php?=' . $_GET['id']);
  die();
}
//RECUPERATION LISTE CATEGORIE
$select = $db->query('SELECT id, name FROM categories ORDER BY name ASC');
$categories = $select->fetchAll();
$categories_list = array();
foreach($categories as $category){
  $categories_list[$category['id']] = $category['name'];
}
//RECPP LISTE IMG
if(isset($_GET['id'])){
$work_id = $db->quote($_GET['id']);
$select = $db->query("SELECT id, name FROM images WHERE work_id=$work_id");
$images = $select->fetchAll();
}else{
  $images = array();
}
 include '../partials/admin_header.php';
 ?>

<h1>Editer une réalisation </h1>

<div class="row">
  <form action="#" method="post" enctype="multipart/form-data">
  <div class="col-sm-8">
      <div class="form-group">
        <label for="name">Nom de la réalisation</label>
        <?= inputCategory('name'); ?>

      </div>
      <div class="form-group">
        <label for="slug">URL  de la réalisation</label>
        <?= inputCategory('slug'); ?>

      </div>
      <div class="form-group">
        <label for="content">Contenu de la réalisation</label>
        <?= textarea('content'); ?>

      </div>
      <div class="form-group">
        <label for="category_id">Categorie</label>
        <?= select('category_id', $categories_list); ?>

      </div>

      <?= csrfInput(); ?>
      <button type="submit" class="btn btn-default">Enregistrer</button>

  </div>
  <div class="col-sm-4">
<?php foreach ($images as $k => $image): ?>
  <p>
    <img src="<?= WEBROOT; ?>imagess/works/<?= $image['name']; ?>" width="100">
    <a href="?delete_image=<?= $image['id']; ?>&<?= csrf(); ?>" onclick="return confirm('Sur ?');">Supprimer</a>
    <a href="?highlight_image=<?= $image['id']; ?>&id=<?= $_GET["id"]; ?>&<?= csrf(); ?>">Mettre à la une</a>
<?php endforeach ?>
<div class="form-group">
  <input type="file"  name="images[]">
  <input type="file" name="images[]" class="hidden" id="duplicate">
</div>
<p>
  <a href="#" class="btn btn-success" id="duplicatebtn">Ajouter une image</a>
</p>


  </div>
</form>
</div>
<?php ob_start(); ?>
<script src="<?= WEBROOT; ?>js/tinymce/tinymce.min.js"></script>
<script>
(function($)
{

    $('#duplicatebtn').click(function(e){
      e.preventDefault();
      var $clone = $('#duplicate').clone().attr('id', '').removeClass('hidden');
      $('#duplicate').before($clone);
    })
})(jQuery);
tinyMCE.init({
        // General options
        mode : "textareas",




});

</script>

<?php $script = ob_get_clean(); ?>
<?php include '../partials/footer.php'; ?>
