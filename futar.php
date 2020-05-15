<?php
$sql = "SELECT vnev, datum, pnev, par, db\n"
    . "FROM (SELECT prendeles.vazon, prendeles.datum, ptetel.pazon, ptetel.db FROM ptetel JOIN prendeles ON ptetel.razon = prendeles.razon WHERE prendeles.fazon = ".$_SESSION["user_id"]." ) a\n"
    . "JOIN ppizza b ON a.pazon = b.pazon\n"
    . "	JOIN pvevo c ON c.vazon = a.vazon\n"
    . "    ORDER BY vnev";

function VevoRendeles($datum, $vnev, $plista, $fizet) {
    $tableRow =  '<tr>'
        . '<td>'.$datum.'</td>'
        . '<td>'.$vnev.'</td>'
        . '<td><table class="table  table-striped" style="background: none; border: none;">';
    foreach ($plista as $value) {
        $tableRow .= '<tr><td>'.$value['db'].' db</td><td>'.$value['pnev'].'</td><td>'.intval($value['par']) * intval($value['db']).' Ft</td></tr>';
    }
    $tableRow .= '</table></td>'
            . '<td>'.$fizet.' Ft</td></tr>';
    return $tableRow;
}

?>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">idő</th>
          <th scope="col">vevőnév</th>
          <th scope="col">rendelés</th>
          <th scope="col">fizetendő</th>
        </tr>
      </thead>
      <tbody>      
          <?php
                if ($result = $conn->query($sql)) {
                    $datum = '';
                    $vnev = '';
                    $plista = array();
                    $fizet = 0;
                    $tableRow = "";
                    
                    while ($row = mysqli_fetch_array($result)) {
                        if($row['vnev'] != $vnev){
                            if($vnev != ""){
                                echo VevoRendeles($datum, $vnev, $plista, $fizet); //-- kiirjuk az elkészült sort
                            }
                            //-- Elmentjük az új sor adatait -------------------
                            $datum = $row['datum'];
                            $vnev = $row['vnev'];
                            unset($plista);
                            $plista[] = array('db' => $row['db'], 'pnev' => $row['pnev'], 'par' => $row['par']);
                            $fizet = intval($row['par']) * intval($row['db']);
                        } else {
                            $plista[] = array('db' => $row['db'], 'pnev' => $row['pnev'], 'par' => $row['par']);
                            $fizet += intval($row['par']) * intval($row['db']);
                        }
                    }
                    echo VevoRendeles($datum, $vnev, $plista, $fizet);
//                    echo $tableRow; //-- kiirjuk az elkészült sort                                
                    $result->close();
               }
            ?>
      </tbody>
    </table>
<?php
?>
