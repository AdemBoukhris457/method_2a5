<?PHP
include "../Controller/EvenementC.php";

	$evenementC=new evenementC();
	$listeevenement=$evenementC->afficherevenement(); 

?>

<!doctype html>
<html lang="en">

<head>
<title>events</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>
    <body>


		<div><a href="addevenment.php">Ajouter un evenement</a></div>
<div class="container"> 


		<table id="mauexport" class="table table-bordered" width=100% collaspacing="0" >
        </div>
        </div>
       </div>
  <thead>

    <tr>
      <th scope="col">id</th>
      <th scope="col">titre</th>
      <th scope="col">description</th>
      <th scope="col">date_debut</th>
	  <th scope="col">date_fin</th>
	  <th scope="col">image</th>
    </tr>
  </thead>
  <tbody>   <?php
  	$listeevenement=$evenementC->afficherevenement(); 
                                   
                                        foreach($listeevenement as $row){
                                        ?>

                                        <tr>
										<td><?php echo $row['id_evenement']; ?></td>
                                            <td><?php echo $row['titre']; ?></td>
                                            <td><?php echo $row['description']; ?></td>
                                            <td><?php echo $row['date_debut']; ?></td>
                                            <td><?php echo $row['date_fin']; ?></td>
                                            
                                            <td><img src="../images/<?php echo $row['image']; ?>" heigth="" width=""></td>
                                            
                                      </tr>
                                <?php
                                }
                                ?>
                                    </tbody>
                                </table>

		

					 
				


                                <script>
$(document).ready(function() {
    $('#mauexport').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy','csv','excel', 'pdf', 'print'
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

	</body>
	</html> 