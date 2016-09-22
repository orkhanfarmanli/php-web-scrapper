<?php

namespace App;


// simple search class that echoes a table of elements

class Search
{
    public function __construct($pdo, $searchParameter, $searchWord)
    {

        switch ($searchParameter) {
          case 'name':
            $sql = "SELECT * FROM people WHERE name LIKE :searchWord";
            break;
          case 'born':
            $sql = "SELECT * FROM people WHERE born LIKE :searchWord";
            break;
          case 'occupation':
            $sql = "SELECT * FROM people WHERE occupation LIKE :searchWord";
            break;
        }
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':searchWord', '%' . $searchWord . '%');
        $stmt->execute();
        $users = $stmt->fetchAll();
        echo "<div class='container'><div class='row'><table class='table'>";
          foreach ($users as $user) {
            echo "<tr>";
              echo "<td>".$user['name']."<td>";
              echo "<td>".$user['occupation']."<td>";
              echo "<td>".$user['born']."<td>";
            echo "<tr>";
          }
        echo "</table></div></div>";
      }

}
