
<?php
     class Curso{
        private $nome;
        private $preco;
        

        public function setNome($nome){
            $this->nome =  $nome;
        }

        public function setPreco($preco){
            $this->preco =  $preco;
        }


        public function getNome(){
            return $this->nome;
        }

        public function getPreco(){
            return $this->preco;
        }

        public function adicionar(){
            $sql = "INSERT INTO curso(nome, preco) VALUES (:nome, :preco)";

            $stmt = DB::conexao()->prepare($sql);
            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':preco', $this->preco);
            $stmt->execute();
        }


        public static function listar(){
            $sql ="SELECT * FROM curso";
            $stmt = DB::conexao()->prepare($sql);
            $stmt->execute();
            $registros = $stmt->fetchAll();

            if($registros){

                $itens = array();

                foreach($registros as $registro){
                    $temporario = new Curso();
                    $temporario->setNome($registro['nome']);
                    $temporario->setPreco($registro['Preco']);
                    $itens[] = $temporario;  
                }
                return $itens;
            }
            return false; 
        }

    }
?>