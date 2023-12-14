<?php
session_start();
include_once 'includes/header.inc.php';
include_once 'includes/menu.inc.php';
?>

<div class="row container">
  <div class="col s12">
    <h5 class="light">Edição de Registros</h5><hr>
  </div>
</div>

<?php
include_once 'BD/conexao.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$_SESSION['id'] = $id;

$registros = $link->query("SELECT * FROM clientes WHERE id='$id'")->fetch_assoc();

$nome = $registros['nome'];
$email = $registros['email'];
$telefone = $registros['telefone'];
$fornecedor = $registros['fornecedor'];
$conferente = $registros['conferente'];
?>

<div class="row container">
  <p>&nbsp;</p>
  <form action="BD/update.php" method="post" class="col s12">
    <fieldset class="formulario" style="padding: 15px">
      <legend>
        <img src="img/user.png" alt="[image]" width="150">
      </legend>
      <h5 class="light center">Alteração</h5>

      <div class="input-field col s12">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" value="<?php echo $nome; ?>" required>
      </div>

      <div class="input-field col s12">
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" value="<?php echo $email; ?>" required>
      </div>

      <div class="input-field col s12">
        <label for="telefone">Telefone</label>
        <input type="tel" name="telefone" id="telefone" value="<?php echo $telefone; ?>" required>
      </div>

      <div class="input-field col s12">
        <label for="fornecedor">Fornecedor</label>
        <input type="text" name="fornecedor" id="fornecedor" value="<?php echo $fornecedor; ?>" required>
      </div>


      <div class="input-field col s12">
        <label for="conferente">Conferente</label>
        <input type="text" name="conferente" id="conferente" value="<?php echo $conferente; ?>" required>
      </div>
      <div class="input-field col s12">
        <a href="consultas.php" class="btn red">cancelar</a>
        <button type="submit" class="btn blue">alterar</button>
      </div>
    </fieldset>
  </form>
</div>
<?php include_once 'includes/footer.inc.php' ?>
