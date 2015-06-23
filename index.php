<?php
function getPage() {
    $route = parse_url("http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]);
    
    if(strlen($route["path"]) > 1) {
        $page = preg_replace("/^(\/)/", "", $route["path"]);
    } else {
        $page = "home";
    }

    if(strlen($page) == 0 || file_exists("pages/{$page}.php") == 0) {
        http_response_code(404);
        $page = "404";
    }

    return "pages/{$page}.php";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Projeto1</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
    <div id="container">
        <header>
            <?php require_once("inc/menu.php"); ?>
        </header>
        <main>
            <?php require_once(getPage()); ?>
        </main>
        <footer>
            <div class="container">
                <?php require_once("inc/copyright.php"); ?>
            </div>
        </footer>
    </div>
</body>
</html>
