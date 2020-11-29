<?php
namespace App;

use Core\Database;

class Sondage extends Database
{
    function createSond(array $data)
    {
        $myId =  $_SESSION["user"]["id"];
        $prepare = $this->pdo->prepare("INSERT INTO sondages (sondage_title, sondage_question1, sondage_question2, sondage_question3, sondage_question4, creation_date, status_sondage, sondage_creator)
                                        VALUES (:sondage_title, :sondage_question1, :sondage_question2, :sondage_question3, :sondage_question4, NOW(), 'On', $myId)");
        $prepare->execute($data);

        //init result datas
        $query = $this->pdo->query("SELECT sondage_id FROM sondages ORDER BY sondage_id DESC");
        $id = $query->fetch(\PDO::FETCH_OBJ);
        $this->pdo->query("INSERT INTO results (sondage_id, result_1, result_2, result_3, result_4, total_entries) VALUES ($id->sondage_id, 0, 0, 0, 0, 0) ");
    }
    
    function getSonds()
    {
        $query = $this->pdo->query("SELECT * FROM sondages");
        $response = $query->fetchAll(\PDO::FETCH_OBJ);
        
        echo json_encode($response);
    }

    function getOneSond($id)
    {
        $query = $this->pdo->query("SELECT * FROM sondages WHERE sondage_id = $id");
        $response = $query->fetch(\PDO::FETCH_OBJ);

        return($response);
    }
    
    function getSondsNoAjax()
    {
        $query = $this->pdo->query("SELECT * FROM sondages");
        $response = $query->fetchAll(\PDO::FETCH_OBJ);

        return($response);
    }


    function getActiveSonds()
    {
        $query = $this->pdo->query("SELECT * FROM sondages WHERE status_sondage = 'On'");
        $response = $query->fetchAll(\PDO::FETCH_OBJ);

        return($response);
    }

    function getInactiveSonds()
    {
        $query = $this->pdo->query("SELECT * FROM sondages WHERE status_sondage = 'Off'");
        $response = $query->fetchAll(\PDO::FETCH_OBJ);

        return($response);
    }

    function getMySonds($myId)
    {
        $query = $this->pdo->query("SELECT * FROM sondages 
                                    INNER JOIN user
                                    WHERE sondage_creator = $myId
                                    AND sondage_creator = user_id");
        $response = $query->fetchAll(\PDO::FETCH_OBJ);

        return($response);
    }

    function getMyParticipate($myId){
        $query = $this->pdo->query("SELECT * FROM sondages 
                                    INNER JOIN user
                                    INNER JOIN participation
                                    WHERE participation.user_id = $myId 
                                    AND participation.sondage_id = sondages.sondage_id 
                                    AND participation.user_id = user.user_id");
        $response = $query->fetchAll(\PDO::FETCH_OBJ);

        return($response);
    }

    function getResults($sondId){
        $query = $this->pdo->query("SELECT * FROM results
                                    INNER JOIN sondages
                                    WHERE sondages.sondage_id = $sondId
                                    AND results.sondage_id = sondages.sondage_id");
        $response = $query->fetch(\PDO::FETCH_OBJ);

        return($response);
    }

}
