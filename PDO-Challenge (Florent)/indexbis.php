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