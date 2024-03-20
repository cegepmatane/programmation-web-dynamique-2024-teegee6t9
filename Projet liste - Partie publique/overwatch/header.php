<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css"/>
    <link rel="shortcut icon" href="images/overwatch_icon.png" type="image/x-icon">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="style/liste-heros.css"/>
    <link rel="stylesheet" href="style/heros.css"/>
    <title><?=$titre?></title>
</head>
<body>
    <header>
      <nav class="navbar">
        <ul class="menu">
          <li>
            <a href="index.php" class="actif">
              <i class="fa-solid fa-house icone"></i> Accueil</a
            >
          </li>
          <li>
            <a href="liste-heros.php">
                <i class="fa-solid fa-person icone"></i> Personnages</a>
          </li>
          <li>
            <a href="membre.php">
              <i class="fa-solid fa-user icone"></i> Membre</a
            >
          </li>
          <li>
            <a href="recherche-avancee.php">
              <i class="fa-solid fa-magnifying-glass icone"></i> Recherche</a
            >
          </li>
          <li>
            <a href="contact.php">
              <i class="fa-solid fa-phone icone"></i> Contact</a
            >
          </li>
          <li>
            <div id="recherche-rapide">
                <form action="recherche-rapide-traitement.php" method="get">
                    <input type="text" name="mot" id="recherche" placeholder="Recherche">
                </form>
            </div>
          </li>

        </ul>
      </nav>
    </header>