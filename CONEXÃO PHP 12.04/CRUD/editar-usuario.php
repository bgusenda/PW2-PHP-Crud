<h1>Editar Usuário</h1>
<?php
    $sql = "SELECT * FROM usuarios WHERE id=".$_REQUEST["id"];
    $res = $conn->query($sql);
    $row = $res->fetch_object();
?>
<form action="?page=salvar" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id" value="<?php print $row->id; ?>">
    <div class="mb-3">
        <label for="nome">Nome</label>
        <input type="text" name="nome"  value="<?php print $row->nome; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label for="email">E-mail</label>
        <input type="text" name="email"  value="<?php print $row->email; ?>"  class="form-control">
    </div>
    <div class="mb-3">
        <label for="senha">Senha</label>
        <input type="password" name="senha" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="data">Data de Nascimento</label>
        <input type="date" name="data"  value="<?php print $row->data; ?>"  class="form-control">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>