<?php
    class Aluno{
        private $nome;
        private $idade;
        private $email;

        public function setNome($nome){
            $this->nome = $nome;
        }
        public function setIdade($idade){
            $this->idade = $idade;
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function getNome(){
            return $this->nome;
        }
        public function getIdade(){
            return $this->idade;
        }

        public function getEmail(){
            return $this->email;
        }



        public function adicionar(){
            $sql = "INSERT INTO aluno(nome, idade, email) VALUES (:nome, :idade, :email)";

            $stmt = DB::conexao()->prepare($sql);
            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':idade', $this->idade);
            $stmt->bindParam(':email', $this->email);
            $stmt->execute();
        }



        public static function listar(){
            $sql ="SELECT * FROM aluno";
            $stmt = DB::conexao()->prepare($sql);
            $stmt->execute();
            $registros = $stmt->fetchAll();

            if($registros){
                $itens = array();

                foreach($registros as $registro){
                    $temporario = new Aluno();
                    $temporario->setNome($registro['Nome']);
                    $temporario->setIdade($registro['Idade']);
                    $temporario->setEmail($registro['Email']);
                    $itens[] = $temporario;  
                }
                return $itens;

            }
            return false; 
        }

    }

?>