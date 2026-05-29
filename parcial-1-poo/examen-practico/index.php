<?php

require_once "Admin.php";
require_once "Alumno.php";

$usuarios = [];

try {

    $usuarios[] = new Admin("Alfonso Calderon","alfonsocal@gmail.com");

    $usuarios[] = new Alumno("Yaritza Laureano","yaritzal@gmail.com","YAL123");

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

echo "</tr>";

}

?>

</table>
