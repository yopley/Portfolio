<!--MAIN CONTENT-->
<?php
$auth = 0;
include 'lib/includes.php';
include 'lib/image.php';


$condition = '';
$category = false;
if(isset($_GET['category'])){
  $slug  = $db->quote($_GET['category']);
  $select = $db->query("SELECT * FROM categories WHERE slug=$slug");
  if(!isset($_GET['category'])){
    header("HTTP/1.1 301 Moved Permanently");
    header('Location:' . WEBROOT);
    die();
  }
  $category = $select->fetch();
  $condition = " WHERE works.category_id={$category['id']}";
}
$works = $db->query("
  SELECT works.name, works.id, works.slug, images.name as image_name
  FROM works
  LEFT JOIN images ON images.id = works.image_id
  $condition
")->fetchAll();
$categories = $db->query('SELECT slug, name FROM categories')->fetchAll();

if($category){
  $title = "Mes réalisations {$category['name']}";
}else{
  $title = "PORTFOLIO";
}
include 'partials/header.php';
?>
<main>
<section id="portfolios">
  <div id="espace"></div>
<p class="partie"><?= $title; ?></p>
<hr class="star-light">
</section>


    <section>
      <div>
        <ul class="categories">
          <?php foreach ($categories as $category): ?>
            <li>
              <a href="<?= WEBROOT ?>categories/<?= $category['slug']; ?>">
                <?= $category['name']; ?>
              </a>
            </li>
          <?php endforeach ?>
        </ul>

      </div>
      <div class="portfolio">
        <?php foreach ($works as $key => $work): ?>
          <div class="table-image">
                <a href="<?= WEBROOT; ?>realisation/<?= $work['slug']; ?>" target="blank">

                  <div>
                        <i class="fa fa-search-plus fa-4x"></i>
                  </div>
                  <img src="<?= WEBROOT; ?>imagess/works/<?= resizedName($work['image_name'], 420, 220); ?>" alt="">
                  <h2><?= $work['name']; ?><h2>

                </a>

          </div>
        <?php endforeach ?>
      </div>


  </section>
  <section id="moi">
    <div id="espace"></div>
    <p class="partie">Moi</p>
    <hr class="star-light">
    <div id="espace2"></div>
    <div class="resume">
        <div class="ds"><p>Je suis Carl Rousseau j'ai 26 ans et je suis
            Développeur Web junior.

            Je suis autodidacte en intégration et developpement web et je souhaite développer mes compétences dans ces deux domaines.



            Je pratique souvent du sport, j'aime les animations manga, les jeux vidéos et faire du développement personnel.

            Ce que je souhaite c'est  developper un jour , un jeu en ligne comme ogame  et dofus.

          </p>
        </div>
        <div id="espace2"></div>
        <div class="ds">

          <ul>
              <h3><a href="http://hotel-belvu.esy.es/new-site/" target="blank">Mon CV</a></h3>
          <p>Objectifs</p>
            <li>Développer des sites web attractif et dynamique</li>

            <li>Développer des applications</li>

            <li>Développer des compétences de développement en dehors du web</li>
          </ul>

    </div>
    </div>
  </section>
  <section id="contact">
    <div id="espace"></div>
    <p class="partie">contact</p>
    <hr class="star-light">
    <p>Si vous avez besoin d'un renseignement n'hesitez pas à m'envoyer un message via le formulaire</p>
      <div class="container">
          <div class="starter-template">

            <?php if(array_key_exists('errors', $_SESSION)):  ?>
              <div class="alert alert-danger">
              <?= implode('<br>', $_SESSION['errors']); ?>
              </div>
            <?php unset($_SESSION['errors']); endif; ?>
              <form class="" action="post_contact.php" method="POST">
                <div class="column">
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label for="inputname">Votre nom</label>
                      <input type="text" name="name" placeholder="Votre nom" class="form-control" id="inputname" value="<?= isset($_SESSION['inputs']['name']) ? $_SESSION['inputs']['name'] :''; ?>">
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label for="inputmail">Votre email</label>
                      <input type="text" name="email" placeholder="Votre email" class="form-control" id="inputmail" value="<?= isset($_SESSION['inputs']['email']) ? $_SESSION['inputs']['email'] :''; ?>">
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <div class="form-group">
                      <label for="inputmessage">Votre message</label>
                      <textarea id="inputmessage" name="message"placeholder="Votre message" class="form-control"><?= isset($_SESSION['inputs']['message']) ? $_SESSION['inputs']['message'] :''; ?></textarea>
                    </div>
                    <button type="submit" class="btn-lg btn-block" name="button">Envoyer</button>
                  </div>
              </div>
              </form>

          </div>
      </div>
  </section>
  <?php
  unset($_SESSION['inputs']);
  unset($_SESSION['errors']);
  ?>
  </main>

<?php include 'partials/footer.php'; ?>
