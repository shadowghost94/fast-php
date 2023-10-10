<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple page de connection à la base de données</title>
</head>
<body>
    <h1>
        Interrogation de la table carnet avec PDO
    </h1>

    <?php
        require("connect.php");
        $dsn="mysql:dbname=".BASE.";host=".SERVER;

        try{
            $connexion= new PDO($dsn,USER,PASSWD);
        }catch(PDOException $e){
            printf("Echec de la connexion: $s\n", $e->getMessage() );
            exit();
        }

        $sql="select * from carnet";

        if(!$connexion->query($sql))echo "Problème de connexion à la base de données CARNET";
        else{
            foreach($connexion->query($sql) as $row)
            {
                echo $row['NOM']." ".$row['PRENOM']." né(e) le ".$row['NAISSANCE']."<br/>\n";
            }
        }
    ?>
</body>
</html>