<?php
    include('classes/Aluno.class.php');
    include('classes/class.DB.php');
    $con = DB::conexao();

    //$alunos = array();
    //$alunos[] = array("id" => 1, "nome" => "Felipe Silva",  "idade" => 19,"email" => "felipesilva@gmail.com");
    //$alunos[] = array("id" => 2, "nome" => "Camila Eduarda","idade" => 18, "email" => "camilaeduarda@gmail.com");
    //$alunos[] = array("id" => 3, "nome" => "Pedro Monte",   "idade" => 23, "email" => "pedromonte@gmail.com");
    //$alunos[] = array("id" => 4, "nome" => "Caio Eduardo",  "idade" => 17,"email" => "caio@gmail.com");            
?>
<table class = "listarAluno" border = "1">

<tr>
    <th>Nome</th>
    <th>Idade</th>
    <th>Email</th>
</tr>

<?php
     $alunos = Aluno::Listar();
     if($alunos){
    foreach($alunos as $aluno){
?>
    <tr>
        <td><?php echo $aluno->getNome();?></td>
        <td><?php echo $aluno->getIdade();?></td>
        <td><?php echo $aluno->getEmail();?></td>

    </tr>
<?php
    }}
?>
</table>