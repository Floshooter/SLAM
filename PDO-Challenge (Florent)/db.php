<?php
define('dbhost','localhost');
define('dbuser','root');
define('dbpass','');
define('dbname','testpdo');

try {

    $dsn = "mysql:dbname=".dbname.";host=".dbhost;
    $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
    $db = new  PDO($dsn, dbuser, dbpass, $options);

    echo "Nous sommes bien connectés <br><br>";

    switch($_GET['traitement']){
        case "ajouter":
            $tdtitre = $_POST['titre'];

            $addtodo = "INSERT INTO todo(titre,created_at,done) VALUES ('$tdtitre','current_timestamp()','false')";
            $pdostatement = $db->exec($addtodo);

            if ($pdostatement) {
                echo "Ajout réussi !";
            } else {
                print_r($db->errorInfo());
                exit();
            }
            header('location: ./affichage.php');
            break;
        case "supprimer":
            $id = $_GET['id'];
            $deletestmt = "DELETE FROM `todo` WHERE id=$id";
            $pdostmt = $db->exec($deletestmt);

            if ($pdostmt){
                echo "Suppression réussie !";
            } else {
                print_r($db->erroInfo());
                exit();
            }
            header('Location: ./affichage.php');
            break;
        case "modifier":
            $id = $_GET['id'];
            $todo = $_POST['titre'];
            
            $req ="UPDATE todo SET titre='$todo' WHERE id=$id";
            $db->query($req);
            header('Location: ./affichage.php');
            break;


    }

}catch (PDOException $e) {
    die("Erreur : ". $e->getMessage());
}

?>