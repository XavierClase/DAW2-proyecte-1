<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Home</title> <link rel="stylesheet" href="./views/styles/css/style.css">
</head>
<body>
    <?php
        include_once('config/parameters.php');
        include_once('controllers/homeController.php');
        include_once('views/header.php');

        // Controlador por defecto
        $default_controller = "home";
        $default_action = "index";

        // Obtener el controlador y la acción desde la URL, o usa los valores por defecto
        $nombre_controller = isset($_GET['controller']) ? $_GET['controller'] . 'Controller' : $default_controller . 'Controller';
        $action = isset($_GET['action']) ? $_GET['action'] : $default_action;

        // Verifica si el controlador existe
        if (class_exists($nombre_controller)) {
            $controller = new $nombre_controller();

            // Verifica si el método (acción) existe en el controlador
            if (method_exists($controller, $action)) {
                $controller->$action();
            } else {
                echo "No existe la acción " . $action . " en el controlador " . $nombre_controller;
            }
        } else {
            echo "No existe el controlador " . $nombre_controller;
        }

        include_once('views/footer.php');
    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>