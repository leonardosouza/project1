<div class="container">
    <div class="page-header">
        <h1>Dados enviados com sucesso</h1>
        <p>Abaixo os dados que você enviou:</p>
        <?php
        foreach($_POST as $key => $value) {
            echo strtoupper($key) . " : " . $value . "<br>";
        }
        ?>
    </div>
</div>