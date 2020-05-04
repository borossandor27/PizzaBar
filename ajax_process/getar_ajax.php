<?php
require_once '../kapcsolat.php';
$ids = $_REQUEST['ids'];

if($ids) {
    $sql = "SELECT `pazon`,`pnev`,`par` FROM `ppizza` WHERE `pazon` IN (".join(",", $ids).");";
    $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
    $data = '<table class="table table-sm"><tbody>';

    $sum = 0;
    while( $rows = mysqli_fetch_assoc($resultset) ) {
        $data .= '<tr><td>'.$rows['pnev'].'</td><td><p class="text-right">'.number_format($rows['par'], 0, ',', ' ').' Ft</p></td></tr>';
        $sum += $rows['par'];
    }
    
    $data .= '</tbody><tfoot><tr><td colspan=2><p class="text-right"><strong>'.number_format($sum, 0, ',', ' ').' Ft</strong></p></td></tr></tfoot></table>';
    $data .= '<p class="text-center"><button type="submit" class="btn btn-primary" name="megrendeles" value="1">Megrendelem</button></p>';
    echo $data;
} else {
    echo 0;
}