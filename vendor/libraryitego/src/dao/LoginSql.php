<?php 
namespace Controller\dao;

/**
* 
*/
class LoginSql extends CrudSql
{
	public function login($usuario)
	{
		$res = $this->executeSql($usuario);
		if (count($res) > 0) {
			return "sucesso!!";
		}
		else{
			return "Usuario ou senha incorretos!!";
		}

	}

	private function select($usuario, $params = array()):array
	{
		$rawQuery = "SELECT ". $usuario->getFieldsName() ." FROM ".$usuario->getTableName()." WHERE username = '".$usuario->getUsername(). "' and senha = '".$usuario->getSenha()."'";
		// echo $rawQuery;
		$stmt = $this->query($rawQuery, $params);

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
}
$usuario = new Usuario();
$usuario->setUsername("vinialves08");
$usuario->setSenha("1234567890");

$loginSql = new LoginSql();
$res = $loginSql->login($usuario);

echo json_encode($res);

?>