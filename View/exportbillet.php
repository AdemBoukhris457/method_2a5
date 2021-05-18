<?PHP
include "../Controller/BilletC.php";

	$billeterieC=new billeterieC();
	$listebilleterie=$billeterieC->afficherbilleterie(); 

?>

<!doctype html>
<html lang="en">

<head>
<title>billets</title>
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


		<div><a href="billeterieaff.php">Ajouter un billeterie</a></div>
<div class="container"> 


		<table id="mauexport" class="table table-bordered" width=100% collaspacing="0" >
        </div>
        </div>
       </div>
  <thead>

    <tr>
      <th scope="col">id</th>
      <th scope="col">email</th>
      <th scope="col">nombre</th>
      <th scope="col">cin</th>
	  
    </tr>
  </thead>
  <tbody>   <?php
  	$listebilleterie=$billeterieC->afficherbilleterie(); 
                                   
                                        foreach($listebilleterie as $row){
                                        ?>

                                        <tr>
										<td><?php echo $row['id_billet']; ?></td>
                                        
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['nombre']; ?></td>
                                            <td><?php echo $row['cni']; ?></td>
                                       
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