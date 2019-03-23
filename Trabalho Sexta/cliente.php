<?php
	require_once 'conexao.php';
	class cliente{
		private $usuario;
		private $senha;
		
		
		public function getusuario(){
			return $this->usuario;
		}
		public function setusuario($usuario){
			$this->usuario=$usuario;
		}
		public function getsenha(){
			return $this->senha;
		}
		public function setsenha($senha){
			$this->senha=$senha;
		}		
		
		
		public function buscarTodos(){
			$c= new conexao();
			try{
				$stmt=$c->conn->prepare(
					"select * from cliente order by usuario"
				);
				$stmt->execute();
				$r=$stmt->fetchAll();
				return $r;
			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}
		public function inserir(){
			$c= new conexao();
			try{
				$stmt=$c->conn->prepare(
					"insert into cliente(usuario,senha) values(:u,:s)"
				);
				$stmt->bindValue(":u",$this->getusuario());
				$stmt->bindValue(":s",$this->getsenha());
				
				return  $stmt->execute();
			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}	
	}
?>