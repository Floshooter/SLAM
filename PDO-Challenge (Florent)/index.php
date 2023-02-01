<?php
    require "./Template/header.php";
?>
<?php
    if (isset($_POST['submit']) && !empty($_POST['titre'])) {
        $err = 'Renseignez un titre!';
    }

    $sql = "SELECT * FROM todo";
    $todos = $db->query($sql)->fetchAll();
?>
   
   <h1>Ma TODO en PHP !</h1> <br><br>

   <form action="db.php?traitement=ajouter" method="post">
        <input type="text" id="titre" name="titre" placeholder="Ici votre Todo...">
        <button type="submit">Soumettre Todo</button>
   </form>
   <a href="affichage.php">TODOLIST</a>

<?php if (isset($err)) : ?>
    <h3><?= $err ?></h3>
<?php endif ?>

<div class="todos-list">
    <?php foreach ($todos as $todo) : ?>
        <div class="todo">
            <a class='delete-btn' href="?delete=<?= $todo['id'] ?>">X</a>
            <p><?= $todo['title'] ?></p>
        </div>
    <? endforeach ?>
</div>

<?php
    require "./Template/footer.php";
?>