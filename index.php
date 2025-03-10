<?php
$textLinkToProject = "Lien vers ";
$projects = [
  [
    "title" => "CineZen",
    "description" => "Site de référencement de films, de séries et d'acteurs...",
    "full_description" => "Depuis la fin de ma formation de développeur web, j'ai créé mon site dédiée au référencement de films et de séries du monde entier. Il offre aux utilisateurs la possibilité de consulter des fiches détaillées sur les médias, incluant des informations sur les acteurs, des biographies, ainsi que des critiques et des recommandations mises à jour quotidiennement. Avec un compte, ils peuvent noter et commenter les films et séries, les ajouter à des listes personnalisées, et suivre leurs séries en cours, mais aussi avoir des statistiques sur le visionnage des films et des séries. CineZen s’adresse autant aux cinéphiles occasionnels qu’aux passionnés cherchant une expérience plus approfondie",
    "technologies" => "PHP, HTML, CSS, JavaScript",
    "link" => "https://cinezen.fr/",
    "image" => "public/images/cinezen.png",
    "progression" => "90%"
  ],
  [
    "title" => "Skyjo",
    "description" => "Jeu du Skyjo",
    "full_description" => "J'ai recrée le jeu original du Skyjo avec un websocket pour pouvoir jouer en multijoueur.",
    "technologies" => "NodeJS, Socket.io",
    "link" => "https://github.com/Maganor22/mySkyjo",
    "image" => "public/images/skyjo.png",
    "progression" => "75%"
  ]
];

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Portfolio de Jérémy</title>
  <link rel="stylesheet" href="public/styles/style.css" />
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet" />
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" />
  <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
</head>

<body>
  <div id="life-background"></div>
  <!-- <div id="particles-js" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: -1;"></div> -->
  <header
    class="bg-dark text-white py-2 d-flex justify-content-between align-items-center px-4">
    <div class="d-flex align-items-center">
      <!-- <img src="https://via.placeholder.com/50" alt="Logo" class="me-3" /> -->
      <div>
        <h1 class="m-0">Jérémy</h1>
        <p class="m-0">Développeur Web</p>
      </div>
    </div>
    <button id="theme-toggle" class="btn btn-warning">
      <i class="bi bi-sun"></i>
    </button>
  </header>
  <main class="container py-4">
    <section id="about" class="fade-in content-box">
      <h2 class="border-bottom pb-2">
        <i class="bi bi-person-fill me-2"></i>À propos de moi
      </h2>
      <p>
        Je m'appelle Jérémy, j'ai 31 ans.
      </p>
      <p>Je suis développeur web depuis juin 2022.</p>
      <p>
        Avant de me lancer dans le développement web, j'étais menuisier
        pendant 10 ans. J'ai décidé de faire une reconversion professionnelle
        pour suivre ma passion pour le développement.
      </p>
      <h5>
        Diplomes :
      </h5>
      <ul>
        <li>
          BEP Bois (Menuiserie Agencement) (2012)
        </li>
        <li>
          Bac +2 (Developpement Web & Web Mobile) (2024)
        </li>
        <li>
          Bac +3 (Concepteur Developpeur d'Applications) (2025)
        </li>
      </ul>
      <a href="/public/download/CV_2025.pdf" download="CV_2025.pdf" class="btn btn-secondary mt-3">
        <i class="bi bi-download"></i> Télécharger mon CV
      </a>
    </section>

    <section id="projects" class="fade-in content-box">
      <h2 class="border-bottom pb-2">
        <i class="bi bi-folder-fill me-2"></i>Mes Projets
      </h2>
      <?php foreach ($projects as $project) { ?>
        <div class="project card mb-3">
          <div class="card-body">
            <div class="d-flex align-items-center gap-3 mb-3">
              <img src="<?= $project['image'] ?>" alt="<?= $project['title'] ?>" class="imgProject" />
              <h3 class="cinezen card-title mb-0"><?= $project['title'] ?></h3>
            </div>
            <h5 class="card-subtitle mb-2 text-muted"><?= $project['description'] ?></h5>
            <p class="card-text"><?= $project['full_description'] ?></p>
            <p class="card-text">Technologies utilisées : <?= $project['technologies'] ?></p>
            <p class="card-text">
              Progression :
            <div class="progress" style="height: 20px;">
              <div class="progress-bar" role="progressbar" style="width: <?= $project['progression'] ?>;" aria-valuenow="<?= str_replace('%', '', $project['progression']) ?>" aria-valuemin="0" aria-valuemax="100"><?= $project['progression'] ?></div>
            </div>
            </p>
            <?php
            $host = parse_url($project['link'], PHP_URL_HOST);
            $host = preg_replace('/^www\./', '', $host);
            $host = explode('.', $host)[0];
            $host = ucfirst($host);
            ?>
            <a href="<?= $project['link'] ?>" class="text-primary text-decoration-none" target="_blank"><?= $textLinkToProject . $host ?></a>.
          </div>
        </div>
      <?php } ?>


    </section>
    <section id="skills" class="fade-in content-box">
      <h2 class="border-bottom pb-2">
        <i class="bi bi-tools me-2"></i>Compétences
      </h2>
      <div class="row justify-content-between">
        <div class="col-md-6 text-center">
          <i class="bi bi-code-slash display-4"></i>
          <h3>Développement Web</h3>
          <p>
            <img
              src="https://www.php.net/images/logos/new-php-logo.svg"
              alt="PHP"
              width="24"
              height="24" />
            PHP,
            <img
              src="https://www.w3.org/html/logo/downloads/HTML5_Logo_512.png"
              alt="HTML"
              width="24"
              height="24" />
            HTML,
            <img
              src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d5/CSS3_logo_and_wordmark.svg/640px-CSS3_logo_and_wordmark.svg.png"
              alt="CSS"
              width="24"
              height="24" />
            CSS,
            <img
              src="https://upload.wikimedia.org/wikipedia/commons/6/6a/JavaScript-logo.png"
              alt="JavaScript"
              width="24"
              height="24" />
            JavaScript,
            <img
              src="https://upload.wikimedia.org/wikipedia/fr/thumb/2/2e/Java_Logo.svg/1200px-Java_Logo.svg.png"
              alt="Java"
              width="24"
              height="24" />
            Java,
            <img
              src="https://angular.io/assets/images/logos/angular/angular.svg"
              alt="Angular"
              width="24"
              height="24" />
            Angular,
            <img
              src="https://symfony.com/logos/symfony_black_03.svg"
              alt="Symfony"
              width="24"
              height="24" />
            Symfony
          </p>
        </div>
        <div class="col-md-6 text-center">
          <i class="bi bi-laptop display-4"></i>
          <h3>Autres Compétences</h3>
          <p>Gestion de projet, Design UI/UX</p>
        </div>
      </div>
    </section>
  </main>
  <footer class="bg-dark text-white text-center">
    <p>&copy; 2025 Jérémy. Tous droits réservés.</p>
  </footer>
  <script src="public/js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>