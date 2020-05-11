<?php
function check($var)
{
    // returns, ha az értéke "on", vagyis a kiválasztva a checkbox
    return $var == "on";
}

if(filter_input(INPUT_POST, 'megrendeles', FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE)){
    $ids = array_keys(array_filter($_POST, "check")); //-- letárolja a rendelt pizzak azonosítóját
    //-- kiiras az adatbázisba
}


?>

<script type="text/javascript"> 
    $(document).ready(function(){
        $('#valasztott').hide();
        
        $('input[type="checkbox"]').click(function(){
            //-- Kigyűjtjük a jelölt checkbox-ok azonositoit -----
            var searchIDs = $('input:checked').map(function(){
                return $(this).attr('id');
            });
//            console.log(searchIDs.get());
            
            $('#valasztott').show();
            
//            $.getJSON("ajax_process/getar_ajax.php", { ids: searchIDs.get() }, function(data) {
//                console.log(data);
//                $.each(data, function(index, element) {
//                    $('#osszes').append($('<p>', {
//                        text: element.pazon
//                    }));
//                });
//            });
                               
            $.ajax({ 
                dataType: 'html',
                data: {ids: searchIDs.get()},
                url: "ajax_process/getar_ajax.php",
                cache: false,
                success: function(data) { 
//                        console.log(data);
                        $("#valasztott").html(data); 
                    }
            });
        });
    });
</script> 
<form action="" method="post">
    <div style="text-align: right;">
        <div id="valasztott" class="col-3">
            <!--<button type="submit" class="btn btn-dark" name="megrendeles" value="1">Megrendelem</button>-->
        </div>
    </div>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">kép</th>
          <th scope="col">név</th>
          <th scope="col">leírás</th>
          <th scope="col">ár</th>
          <th scope="col">kiválasztva</th>
        </tr>
      </thead>
      <tbody>      
          <?php
                $sql = "SELECT `pazon`, `pimages`,`pnev`,`pleiras`,`par` FROM `ppizza`";
                if ($result = $conn->query($sql)) {
                    while ($row = mysqli_fetch_array($result)) {
                        echo '<tr>';
                        echo '<td><img src="images/'.$row['pimages'].'" height="80"></td>';
                        echo '<td>'.$row['pnev'].'</td>';
                        $hozzavalok = explode(",", $row['pleiras']);
                        echo '<td><ul>';
                        foreach ($hozzavalok as $value) {
                            echo '<li>'.$value.'</li>';
                        }
                        echo '</ul></td>';
                        echo '<td>'.$row['par'].'</td>';
                        echo '<td>';
                        echo '<div class="form-group form-check">';
                        echo '<input type="checkbox" class="form-check-input" id="'.$row['pazon'].'" name="'.$row['pazon'].'">';
                        echo '</div>';
                        echo '</td>';
                        echo '</tr> ';
                    }
                   $result->close();
               }
            ?>
      </tbody>
    </table>
</form>


