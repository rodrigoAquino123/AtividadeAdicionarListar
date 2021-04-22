<?php include("classes/Curso.class.php");
      include("classes/class.DB.php");
      $con = DB::conexao();

  //  $cursos = array();

 //   $cursos[] = array("id" => 1, "curso" => "Assistente administrativo  ",     "preco" => "R$ 23,00");
 //   $cursos[] = array("id" => 2, "curso" => "Java do básico ao Avançado ",     "preco" => "R$ 23,00");
 //   $cursos[] = array("id" => 3, "curso" => "Photoshop  ",                     "preco" => "R$ 23,00");
  //  $cursos[] = array("id" => 4, "curso" => "InDesign   ",                     "preco" => "R$ 23,00");
 //   $cursos[] = array("id" => 5, "curso" => "Sql do zero ao avançado    ",     "preco" => "R$ 23,00");
//   $cursos[] = array("id" => 6, "curso" => "Informática Básica     ",         "preco" => "R$ 23,00");
// ?> 

<table class = "listarcurso" border = "1">

<tr>
    <th>Curso</th>
    <th>Preço</th>
</tr>

<?php
    $cursos = Curso::Listar();
    if($cursos){
    foreach($cursos as $curso){
?>
<tr>
        <td><?php echo $curso->getNome(); ?></td>
        <td><?php echo $curso->getPreco(); ?></td>
</tr>
<?php } } ?>
</table>