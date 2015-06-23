<div class="container">
    <div class="page-header">
        <h1>Contato</h1>
    </div>

    <form action="/success" method="POST">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="nome" class="form-control" name="nome" id="nome" placeholder="Nome">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="assunto">Assunto</label>
            <input type="text" class="form-control" name="assunto" id="assunto" placeholder="Assunto">
        </div>
        <div class="form-group">
            <label for="mensagem">Mensagem</label>
            <textarea class="form-control" name="mensagem" id="mensagem" cols="30" rows="10"></textarea>
        </div>

        <button type="submit" class="btn btn-default">Enviar</button>
        <br><br>
    </form>
</div>