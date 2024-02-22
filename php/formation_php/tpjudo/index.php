<?php
    // on charge la config
    require "./config.php";

    // on charge le router
    require "./services/router.php";

    // on charge le controller
    require "./controllers/controller_{$page}.php"; // require $controller ; autre synthax
?>