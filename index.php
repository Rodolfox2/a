<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>COC FUSION MK2</title>
	<!-- Latest compiled and minified CSS -->
	<script   src="http://code.jquery.com/jquery-2.2.4.js"   integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="   crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<!-- Latest compiled and minified JavaScript -->	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>	
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs-3.3.6/jq-2.2.3/dt-1.10.12/af-2.1.2/r-2.1.0/datatables.min.css"/>
 	<script type="text/javascript" src="https://cdn.datatables.net/v/bs-3.3.6/jq-2.2.3/dt-1.10.12/af-2.1.2/r-2.1.0/datatables.min.js"></script>
 	<script>
 		$(document).ready(function() {
    $('#example').DataTable({
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        "order": [[ 1, 'asc' ]],
        "language": {
            "lengthMenu": "Mostrando _MENU_ Registros por pagina",
            "zeroRecords": "Sin Registros",
            "info": "Mostrando pagina _PAGE_ de _PAGES_",
            "infoEmpty": "Sin Registros",
            "infoFiltered": "(Filtrado de _MAX_ registros totales)"
        }
    });
} );
 	</script>
</head>
<body>
	<?php
function obtenerInfo(){
$url = 'https://api.clashofclans.com/v1/clans/' . urlencode('#PYUUULQU');
$header = array(
'authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6ImYzZGUzZDlmLTBjZWEtNDM5ZS04ZDA2LTZhNGQzNWZkOWNmOSIsImlhdCI6MTQ3NjgwODUxNiwic3ViIjoiZGV2ZWxvcGVyL2FkNjNiZWI2LWJlZWItODgxZi0wOWMzLTg1ZDgzODM0Njc3OCIsInNjb3BlcyI6WyJjbGFzaCJdLCJsaW1pdHMiOlt7InRpZXIiOiJkZXZlbG9wZXIvc2lsdmVyIiwidHlwZSI6InRocm90dGxpbmcifSx7ImNpZHJzIjpbIjE5MS4xMTQuNzMuOTMiXSwidHlwZSI6ImNsaWVudCJ9XX0._USnCIpLd6eKignIUAsWKFwzEVX0Oh13sqZr1ksp7L8Kx4nCnT5T8nk81MrDniKU6kIPqrB2oqrRPMcNK_ziiA',

// This line is to make the content as json it is not needed
'Content-type: application/json',
);
$c = curl_init();
curl_setopt($c, CURLOPT_URL, $url);
curl_setopt($c, CURLOPT_HTTPHEADER, $header);
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
$page = curl_exec($c);
curl_close($c);
return $page;	
}
$valores = obtenerInfo();
$valores = json_decode($valores);

$miembros = $valores->memberList; 
// print_r($miembros);
?>
<br>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<table id="example" class="table">
				<caption>Miembros</caption>
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Rol</th>
						<th>Experiencia</th>
						<th>Donaciones</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					foreach ($miembros as $key ) {
						echo '<tr>';
							echo '<td>'.$key->name.'</td><td>'.$key->role.'</td><td>'.$key->expLevel.'</td><td>'.$key->donations.'</td>';
					}	echo '</tr>';
					?>
				</tbody>
			</table>	
		</div>
	</div>
</div>
</body>
</html>







