<?php

namespace App;


class Parser
{

    public function __construct($pdo)
    {
      $this->insertData($pdo);
    }

    public function insertData($pdo)
    {
      if (isset($_POST['data'])) {
          $data = json_decode($_POST['data']);
          for ($i=2; $i < count($data->peopleArray); $i++) {

              $sql = "INSERT INTO people (name, occupation, born, died, summary)
                      VALUES ('".$data->peopleArray[$i]->name."', '".$data->peopleArray[$i]->occupation."', '".$data->peopleArray[$i]->born."', '".$data->peopleArray[$i]->died."', '".$data->peopleArray[$i]->summary."')";

              $stmt = $pdo->prepare($sql);
              $stmt->execute();
          }
          echo "came here";
      }
    }

}
