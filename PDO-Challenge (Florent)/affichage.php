<?php
    require "./Template/header.php";
?>

<?php
define('dbhost','localhost');
define('dbuser','root');
define('dbpass','');
define('dbname','testpdo');

try {

    $dsn = "mysql:dbname=".dbname.";host=".dbhost;
    $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
    $db = new  PDO($dsn, dbuser, dbpass, $options);
    
    $req = "SELECT * FROM todo";
    $resultats = $db->query($req);
    ?>
    <h1><a href="index.php">Liste des utilisateurs inscris sur le site.</a></h1>
    <?php 
        foreach($resultats->fetchAll() as $todolist){
            echo "ID" .$todolist['id']. " | " .$todolist['titre']. " - " .$todolist['created_at']. " - " .$todolist['done']. " | "; ?> <input type="checkbox"> <?php
            echo "<br>";
            ?> <a href="db.php?traitement=modifier">Modifier</a> | <a href="db.php?traitement=supprimer&id=<?=$todolist['id'] ?>">Supprimer</a><br> <?php
        }

}catch (PDOException $e) {
    die("Erreur : ". $e->getMessage());
}

?>
<?php
    require "./Template/footer.php";
?>