<?php

require_once "clases/Admin.php";
require_once "clases/Alumno.php";
require_once "clases/Invitado.php";

$usuarios = [];

try {

$usuarios[] = new Admin("Alfonso Calderon","alfonsocal@gmail.com");

$usuarios[] = new Alumno("Yaritza Laureano","yaritzal@gmail.com","YAL123");

$usuarios[] = new Invitado("Pedro Gomez","pedro@empresa.com","Google");

$usuarios[] = new Alumno("Usuario Error","correo-malo","B123");

}catch(Exception $e){

echo "<p style='color:red'>Error controlado: ".$e->getMessage()."</p>";

}

?>

<table border="1">

<tr>
<th>Nombre</th>
<th>Correo</th>
<th>Rol</th>
<th>Matricula</th>
<th>Empresa</th>
</tr>

<?php

foreach($usuarios as $u){

echo "<tr>";

echo "<td>".$u->getNombre()."</td>";
echo "<td>".$u->getCorreo()."</td>";
echo "<td>".$u->getRol()."</td>";

if(method_exists($u,'getMatricula')){
echo "<td>".$u->getMatricula()."</td>";
}else{
echo "<td>—</td>";
}

if(method_exists($u,'getEmpresa')){
echo "<td>".$u->getEmpresa()."</td>";
}else{
echo "<td>—</td>";
}

echo "</tr>";

}

?>

</table>

