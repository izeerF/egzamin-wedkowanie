<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styl_1.css">
</head>
<body>
    <header>
        <h1>Portal dla wędkarzy</h1>
    </header>
    <main>
        <div class="left">
            <div>
                <h3>Ryby zamieszkujące rzeki</h3>
                <ol>
                <?php
                    $db = mysqli_connect('localhost', 'root', '', 'wedkowanie');
                    $q = "SELECT nazwa, akwen, wojewodztwo FROM ryby, lowisko WHERE lowisko.rodzaj = 3 AND ryby.id = lowisko.ryby_id";
                    $r = mysqli_query($db, $q);
                    if (mysqli_num_rows($r) > 0) {
                        while($row = mysqli_fetch_assoc($r)) {
                          echo "<li>". $row["nazwa"]. " pływa w rzece " . $row["akwen"]. ", " . $row["wojewodztwo"]. "</li>";
                        }
                      } else {
                        echo "0 results";
                      }
                ?>
                </ol>
            </div>
            <div>
                <h3>Ryby drapieżne naszych wód</h3>
                <table>
                    <tr>
                        <th>L.p.</th>
                        <th>Gatunek</th>
                        <th>Występowanie</th>
                    </tr>
                    <?php
                        $q = "SELECT id, nazwa, wystepowanie FROM ryby WHERE styl_zycia = 1";
                        $r = mysqli_query($db, $q);
                        if (mysqli_num_rows($r) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($r)) {
                              echo '<tr>'.'<td>'.$row["id"].'</td>'.'<td>'.$row["nazwa"].'</td>'.'<td>'.$row["wystepowanie"].'</td>'.'</tr>';
                            }
                          } else {
                            echo "0 results";
                          }
                    ?>
                </table>
            </div>
        </div>
        <div class="right">
            <img src="ryba1.jpg" alt="">
            <br>
            <a href="./kwerendy.txt">Pobierz kwerendy</a>
        </div>
    </main>
    <footer>
        <p>Stronę wykonał: Kacper Hinz</p>
    </footer>
</body>
</html>
