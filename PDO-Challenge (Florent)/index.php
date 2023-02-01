<?php
    require "./Template/header.php";
?>
<?php
    // if (isset($_POST['submit']) && !empty($_POST['titre'])) {
    //     $err = 'Renseignez un titre!';
    // }

    // $sql = "SELECT * FROM todo";
    // $todos = $db->query($sql)->fetchAll();
?>
   
   <h1>Ma TODO en PHP !</h1> <br><br>

   <form action="db.php?traitement=ajouter" method="post">
        <input type="text" id="titre" name="titre" placeholder="Ici votre Todo...">
        <button type="submit">Soumettre Todo</button>
   </form>
   <a href="affichage.php">TODOLIST</a>



<?php
    require "./Template/footer.php";
?>