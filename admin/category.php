<?php
include '../lib/includes.php';
 include '../partials/admin_header.php';

/*
      $select = $db->query('SELECT id, name, slug FROM categories');
      $categories = $select-> fetchAll();
*/
//SUPPRESSION

  if(isset($_GET['delete'])){
      checkCsrf();
      $id = $db->quote($_GET['delete']);
      $db->query("DELETE FROM categories WHERE id=$id");
      setFlash('La categorie a bien été supprimé');
      header('Location:category.php');
      die();
  }

  $select = $db->query('SELECT id, name, slug FROM categories');
  $categories = $select->fetchAll();
 ?>


<h1>Les categories</h1>
<p><a href="category_edit.php" class="btn btn-success">Ajouter une nouvelle categorie</a></p>
<table  class="table table-striped">
  <thead>
    <tr>
      <th>Id</th>
      <th>Nom</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($categories as $category):?>
      <tr>
        <td><?= $category['id']; ?></td>
        <td><?= $category['name']; ?></td>
        <td>
          <a href="category_edit.php?id= <?= $category['id']; ?>" class="btn btn-default">Edits</a>
          <a href="?delete=<?= $category['id']; ?>&<?= csrf(); ?>" class="btn btn-error" onclick="return confirm('En etes vous sûr?');">Supprimer</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php include '../partials/footer.php'; ?>
