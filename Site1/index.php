<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Site1 PHP</title>
    <style>
    header, footer{
      background-color: orange;
      color: white;
      padding: 1em;
    }

      table{
        border-collapse: collapse;
        border: solid 2px black;
      }
      th, td{
        border: solid 1px black;
        padding: 1em;
      }
      .jaune{
        color: yellow;
      }
      .orange{
        color: orange;
      }
      .rouge{
        color: red;
      }
      .vert{
        color: green;
      }
    </style>
  </head>

  <body>
    <?php include 'includes/header.php'; ?>

    <main>
      <?php
        $message = "Bonjour";
        $age = 16;
        $fruits = ["Banane", "Fraise", "Orange", "Kiwi"];
        //echo "<pre>";
        //var_dump($fruits);
        //echo "</pre>";

        echo '<table>';
        echo '</tr>';
        echo '
        <th>Nom</th>
        <th>Couleur</th>
        </tr>
        ';

        foreach ($fruits as $fruit) {
          switch($fruit){
            case 'Banane':
                $couleur = 'jaune';
                break;
            case 'Fraise':
                $couleur = 'rouge';
                break;
            case 'Orange':
                $couleur = 'orange';
                break;
            case 'Kiwi':
                $couleur = 'vert';
                break;
            default:
                $couleur = 'indéterminé';
          }
          echo '<tr>
                  <td>' . $fruit . '</td>
                  <td class="' . $couleur . '">'. $couleur .'</td>
                </tr>';

        }
        echo '</table>';


        $user1 = [
          'name' => 'Sebag',
          'firstname' => 'Dan',
          'email' => 'test@gmail.com'
        ];
        $user2 = [
          'name' => 'Sebag1',
          'firstname' => 'Dan1',
          'email' => 'test@gmail.com'
        ];
        $user3 = [
          'name' => 'Sebag2',
          'firstname' => 'Dan2',
          'email' => 'test@gmail.com'
        ];
        $users = [];
        $users[] = $user1;
        $users[] = $user2;
        $users[] = $user3;
        echo '<table>';
        echo '</tr>';
        echo '
        <th>Nom</th>
        <th>Prénom</th>
        <th>Email</th>
        </tr>
        ';


        foreach ($users as $user => $value) {

        echo '<tr>

          <td>' . $value['name'] . '</td>
          <td>' . $value['firstname'] . '</td>
          <td><a href="mailto:'. $value['email'] . '">' . $value['email'] . '</a></td>
          </tr>';

        }
        echo '</table>';




        foreach($user1 as $user => $value){
          echo '
          <ul>
            <li>' . $user .': ' . $value .'</li>
            </ul>
          ';
        }

      ?>
      <h1><?= $message; ?></h1>
      <p><?= 'Tu as '. $age . ' an' . ($age > 1 ? 's':'') . '.'?></p>
      <?php

      ?>
      <p>
        <?php
          if($age >= 18){
            ?>
            <p>Tu es majeur</p>
       <?php }else{ ?>
         <p>Tu es mineur</p>
       <?php }?>
    </main>

     <?php include 'includes/footer.php'; ?>
  </body>
</html>
