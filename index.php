<?php
require_once("conn.php");

function getData() {
    $conexao = connDb();

    $route = parse_url("http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]);

    if(strlen($route["path"]) > 1) {
        $page = $route["path"];
    } else {
        $page = "/home";
    }

    if(strlen($page) == 0 || file_exists("pages/{$page}.php") == 0) {
        http_response_code(404);
        $page = "/404";
    }

    if(isset($_GET["search"]) && strlen($_GET["search"]) > 3) {
        $texto = utf8_decode($_GET["search"]);
        $sql = "SELECT * FROM conteudo WHERE conteudo LIKE ?";
        $stmt = $conexao->prepare($sql);
        $stmt->execute(array('%'.$texto.'%'));
        $res = $stmt->fetchAll(PDO::FETCH_OBJ);
    } else {
        $sql = "SELECT * FROM conteudo WHERE url = :url";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue("url", $page);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_OBJ);    
    }

    if($res) {
        return $res;
    } else {
        return "pages".$page.".php";
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
            <?php 
            if(is_object(getData())) {  
            ?>
            <div class="container">
                <div class="page-header">
                    <h1><?php echo utf8_encode(getData()->secao); ?></h1>
                    <p><?php echo utf8_encode(getData()->conteudo); ?></p>
                </div>
            </div>
            <?php
            } elseif(is_array(getData())) {
                $data = getData();
            ?>
            <div class="container">
                <div class="page-header">
                    <h1>Foram encontradas <?php echo count($data); ?> páginas com o termo "<?php echo $_GET["search"]; ?>":</h1>
                    <ul>
                        <?php
                        foreach ($data as $key => $value):
                        ?>
                        <li><a href="<?php echo $value->url; ?>"><?php echo utf8_encode($value->secao); ?></a></li>
                        <?php
                        endforeach;
                        ?>
                    </ul>
                </div>
            </div>
            <?php
            } else { 
                require_once(getData()); 
            } 
            ?>
        </main>
        <footer>
            <div class="container">
                <?php require_once("inc/copyright.php"); ?>
            </div>
        </footer>
    </div>
</body>
</html>
