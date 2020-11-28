<?php
namespace App;
use Core\Database;
class Sondage extends Database{
    function createSond(array $data){
        $prepare = $this->pdo->prepare("INSERT INTO sondages (sondage_title, sondage_question1, sondage_question2, sondage_question3, sondage_question4, creation_date)
                            VALUES (:sondage_title, :sondage_question1, :sondage_question2, :sondage_question3, :sondage_question4, NOW())");
        $prepare->execute($data);
    }

    function getSonds(){
        $query = $this->pdo->query("SELECT * FROM sondages");
        $response = $query->fetchAll(\PDO::FETCH_OBJ);

        echo json_encode($response);
    }

    function getOneSond($id){
        $query = $this->pdo->query("SELECT * FROM sondages WHERE sondage_id = $id");
        $response = $query->fetch(\PDO::FETCH_OBJ);

        echo json_encode($response);
    }
}