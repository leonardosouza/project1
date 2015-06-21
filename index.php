<?php
error_reporting(0);

function getPage($page) {
    if(isset($page)) {
        switch ($page) {
            case "home":
            case "business":
            case "products":
            case "services":
            case "contact":
            case "success":
                return "pages/" . $page . ".php";
                break;
            default:
                return "pages/404.php";
        }
    } else {
        return "pages/home.php";
    }
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
            <?php require_once(getPage($_GET["page"])); ?>
        </main>
        <footer>
            <div class="container">
                <?php require_once("inc/copyright.php"); ?>
            </div>
        </footer>
    </div>
</body>
</html>