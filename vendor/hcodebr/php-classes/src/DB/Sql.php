<?php 

namespace Hcode\DB;

class Sql {

	// const HOSTNAME = "localhost";
	// const USERNAME = "root";
	// const PASSWORD = "";
	// const DBNAME = "db_ecommerce";
	const HOSTNAME = "www.cptrucks.com.br";
	const USERNAME = "cptruc71_admin";
	const PASSWORD = "C@maro13";
	const DBNAME = "cptruc71_ecommerce";

	private $conn;

	public function __construct()
	{

		$this->conn = new \PDO(
			"mysql:dbname=".Sql::DBNAME.";host=".Sql::HOSTNAME, 
			Sql::USERNAME,
			Sql::PASSWORD
		);

	}

	private function setParams($statement, $parameters = array())
	{

		foreach ($parameters as $key => $value) {
			
			$this->bindParam($statement, $key, $value);

		}

	}

	private function bindParam($statement, $key, $value)
	{

		$statement->bindParam($key, $value);

	}

	public function query($rawQuery, $params = array())
	{

		$stmt = $this->conn->prepare($rawQuery);
		// $this->setParams($stmt, $params);

		if (!$stmt) {
			echo "\nPDO::errorInfo():\n";
			print_r($this->conn->errorInfo());
		} else {
			echo "good";

			$stmt->execute();
			return $this->conn->lastInsertId("returned_id");
		}
	}

	public function select($rawQuery, $params = array()):array
	{

		$stmt = $this->conn->prepare($rawQuery);

		$this->setParams($stmt, $params);

		$stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_ASSOC);

	}

}

 ?>