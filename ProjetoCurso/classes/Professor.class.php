<?php
    class Professor{
        private $nome;
        private $especialidade;
        private $idade;
        private $email;

        public function setNome($nome){
            $this->nome = $nome;
        }
        public function setEspecialidade($especialidade){
            $this->especialidade = $especialidade;
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
        public function getEspecialidade(){
            return $this->especialidade;
        }
        public function getIdade(){
            return $this->idade;
        }

        public function getEmail(){
            return $this->email;
        }
        public function adicionar(){
            $sql = "INSERT INTO professor(nome, especialidade, idade, email) VALUES (:nome, :especialidade, :idade, :email)";

            $stmt = DB::conexao()->prepare($sql);
            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':especialidade', $this->especialidade);
            $stmt->bindParam(':idade', $this->idade);
            $stmt->bindParam(':email', $this->email);
            $stmt->execute();
        }
        public static function listar(){

            $sql ="SELECT * FROM professor";
            $stmt = DB::conexao()->prepare($sql);
            $stmt->execute();
            $registros = $stmt->fetchAll();

            if($registros){

                $itens = array();

                foreach($registros as $registro){
                    $temporario = new Professor();
                    $temporario->setNome($registro['Nome']);
                    $temporario->setEspecialidade($registro['especialidade']);
                    $temporario->setIdade($registro['Idade']);
                    $temporario->setEmail($registro['Email']);
                    $itens[]= $temporario;  
                }
                return $itens;
            }
            return false; 
        }

    }

?>