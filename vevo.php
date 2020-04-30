<script type="text/javascript"> 
    $(document).ready(function(){
        
        $('input[type="checkbox"]').click(function(){
            ids = [];
            alert("ok");
            $.ajax({ 
                type: "POST", 
                data: {ids : ids},
                url: "getar_ajax.php",
                success: function( data ) { 
                        var string='Rendelések összege: '+data; 
                        $("#osszeg").html("ghfjhgf"); 
                    }); 
        });
    });
 
</script> 
<?php
//var_dump($_POST);
?>
<p id="osszeg">Rendelések összege:</p>
<form action="" method="post">
<table class="table">
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
                    echo '<td>'.$row['pleiras'].'</td>';
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
    <button type="submit" class="btn btn-primary" name="megrendeles" value="1">Megrendelem</button>
</form>


