<?php

namespace App;

// the reason I do insert in another class is that this action is kind of complex and needs to be derived from scraper class
// it is easier to read it like this

class Insert
{
    public function __construct($pdo)
    {
        $this->insertData($pdo);
    }

    public function insertData($pdo)
    {
        if (isset($_POST['data'])) {
            $data = json_decode($_POST['data']);
            for ($i = 0; $i < count($data->peopleArray); ++$i) {
                $sql = "INSERT INTO people (name, occupation, born, died, summary)
                      VALUES ('".$data->peopleArray[$i]->name."', '".$data->peopleArray[$i]->occupation."', '".$data->peopleArray[$i]->born."', '".$data->peopleArray[$i]->died."', '".$data->peopleArray[$i]->summary."')";

                $stmt = $pdo->prepare($sql);
                $stmt->execute();
            }
        }
    }
}
