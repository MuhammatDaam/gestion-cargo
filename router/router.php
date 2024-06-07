<?php
// session_start();

// if (!isset($_SESSION['email'])) {
//     include "../templates/pages/connexion.html.php";
// } else {
    $page = isset($_GET['page']) ? $_GET['page'] : 'accueil';
    $pagePath = "../templates/pages/$page.html.php";

    if (file_exists($pagePath)) {
        include "../templates/menu/main.html.php";
        $data=["cargaisons"];
        include $pagePath;
        include "../templates/menu/footer.html.php";
    } else {
        include '../templates/menu/page404.html.php';
    }
// }