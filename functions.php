<?php 

Class Connexion{

    public function dbConnect(){
        try
        {
            $db = New PDO('mysql:host=localhost;dbname=card;charset=utf8', 'root', '');
            return $db;
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e-getMessage());
        }
    }
}

Class Card extends Connexion{
    function showCard(){
        $pdoStat = $this->dbConnect()->prepare('SELECT * FROM `list`');
        $executeIsOk =$pdoStat->execute();
        $card = $pdoStat->fetchAll();
        return $card;
    }

    function addCard(){
        $add = $this->dbConnect()->prepare('INSERT INTO `list` (`name`,`img`, `collection`) VALUES (:name, :img, :collection)');
        $add->bindParam(':name', $_GET['name'],PDO::PARAM_STR);
        $add->bindParam(':img', $_GET['img'],PDO::PARAM_STR);
        $add->bindParam(':collection', $_GET['collection'], PDO::PARAM_STR);
        $more = $add->execute();
        
            if($more){
                echo 'La carte a été ajouté avec succès';
            }else{
                echo 'Erreur !';
            }
    }
}