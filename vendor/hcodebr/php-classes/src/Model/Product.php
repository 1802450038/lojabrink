<?php

namespace Hcode\Model;

use \Hcode\DB\Sql;
use \Hcode\Model;
use \Hcode\Mailer;

const HASH_ID = "idsalvo";

class Product extends Model
{

	public static function listAll()
	{

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_products ORDER BY desproduct");
	}

	public static function checkList($list)
	{

		foreach ($list as &$row) {

			$p = new Product();
			$p->setData($row);
			$row = $p->getValues();
		}

		return $list;
	}

	public function save()
	{

		$sql = new Sql();


		$results = $sql->select("
		CALL sp_products_save(
			:idproduct, :desproduct, :vlprice, :pricetimes, :productquantity, :vlwidth, :vlheight, :vllength, :vlweight, :desurl, :infoproduct)",
			 array(
			":idproduct" => $this->getidproduct(),
			":desproduct" => $this->getdesproduct(),
			":vlprice" => $this->getvlprice(),
			":pricetimes" => $this->getpricetimes(),
			":productquantity" => $this->getproductquantity(),
			":vlwidth" => $this->getvlwidth(),
			":vlheight" => $this->getvlheight(),
			":vllength" => $this->getvllength(),
			":vlweight" => $this->getvlweight(),
			":desurl" => $this->getdesproduct() . $this->getIdHash($this->getidproduct()),
			":infoproduct" => htmlspecialchars($this->getinfoproduct())
		));
		
	}

	public function update()
	{


		$sql = new Sql();

		$results = $sql->select(
			"UPDATE  tb_products SET 
			desproduct = :desproduct, 
			vlprice = :vlprice, 
			pricetimes = :pricetimes,
			productquantity = :productquantity,
			vlwidth = :vlwidth, 
			vlheight = :vlheight, 
			vllength = :vllength, 
			vlweight = :vlweight, 
			infoproduct = :infoproduct,
			photoone = :photoone,
			phototwo = :phototwo,
			photothree = :photothree,
			photofour = :photofour	
		WHERE 
		idproduct = :idproduct",
			array(
				"idproduct" => $this->getidproduct(),
				"desproduct" => $this->getdesproduct(),
				"vlprice" => $this->getvlprice(),
				"pricetimes" => $this->getpricetimes(),
				"productquantity" => $this->getproductquantity(),
				"vlwidth" => $this->getvlwidth(),
				"vlheight" => $this->getvlheight(),
				"vllength" => $this->getvllength(),
				"vlweight" => $this->getvlweight(),
				"infoproduct" => $this->getinfoproduct(),
				"photoone" => $this->getphotoone(),
				"phototwo" => $this->getphototwo(),
				"photothree" => $this->getphotothree(),
				"photofour" => $this->getphotofour()
			)
		);
	}

	public function get($idproduct)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_products WHERE idproduct = :idproduct", [
			':idproduct' => $idproduct
		]);

		$this->setData($results[0]);
	}

	public function delete()
	{
		$sql = new Sql();


		var_dump($this->getidproduct());

		$res = $sql->query("DELETE FROM tb_cartsproducts WHERE idproduct = '{$this->getidproduct()}'",[
		]);

		$res = $sql->query("DELETE FROM tb_products WHERE idproduct = '{$this->getidproduct()}'",[
		]);


		$this->removePhoto("photoone");
		$this->removePhoto("phototwo");
		$this->removePhoto("photothree");
		$this->removePhoto("photofour");
	}

	public function checkPhoto($photo_number)
	{

		if (file_exists(
			$_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR .
				"res" . DIRECTORY_SEPARATOR .
				"site" . DIRECTORY_SEPARATOR .
				"img" . DIRECTORY_SEPARATOR .
				"products" . DIRECTORY_SEPARATOR .
				$photo_number . "_" . $this->getidproduct() . ".jpg"
		)) {

			$url = "/res/site/img/products/" . $photo_number . "_" . $this->getidproduct() .  ".jpg";
		} else {

			$url = "/res/site/img/product.jpg";
		}

		if ($photo_number ==  "photoone") {

			return $this->setphotoone($url);
		} else if ($photo_number == "phototwo") {

			return $this->setphototwo($url);
		} else if ($photo_number == "photothree") {

			return $this->setphotothree($url);
		} else if ($photo_number == "photofour") {

			return $this->setphotofour($url);
		}
	}

	public function getValues()
	{


		$this->checkPhoto("photoone");
		$this->checkPhoto("phototwo");
		$this->checkPhoto("photothree");
		$this->checkPhoto("photofour");

		$values = parent::getValues();

		return $values;
	}

	public function setPhoto($file, $photo_number)
	{

		$extension = explode('.', $file[$photo_number]['name']);
		$extension = end($extension);

		switch ($extension) {

			case "jpg":
			case "jpeg":
				$image = imagecreatefromjpeg($file[$photo_number]["tmp_name"]);
				break;

			case "gif":
				$image = imagecreatefromgif($file[$photo_number]["tmp_name"]);
				break;

			case "png":
				$image = imagecreatefrompng($file[$photo_number]["tmp_name"]);
				break;
		}

		$dist = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR .
			"res" . DIRECTORY_SEPARATOR .
			"site" . DIRECTORY_SEPARATOR .
			"img" . DIRECTORY_SEPARATOR .
			"products" . DIRECTORY_SEPARATOR .
			$photo_number . "_" . $this->getidproduct() . ".jpg";

		imagejpeg($image, $dist);

		imagedestroy($image);

		$this->checkPhoto($photo_number);
	}

	public function removePhoto($photo_number)
	{
		$path = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR .
			"res" . DIRECTORY_SEPARATOR .
			"site" . DIRECTORY_SEPARATOR .
			"img" . DIRECTORY_SEPARATOR .
			"products" . DIRECTORY_SEPARATOR .
			$photo_number . "_" . $this->getidproduct() . ".jpg";


		if (!is_readable($path)) {
			return;
		}
		if (is_file($path)) {

			unlink($path);
		} else {
			return;
		}
	}

	public function getFromURL($desurl)
	{

		$sql = new Sql();

		$rows = $sql->select("SELECT * FROM tb_products WHERE desurl = :desurl LIMIT 1", [
			':desurl' => $desurl
		]);

		$this->setData($rows[0]);
	}

	public function getCategories()
	{

		$sql = new Sql();

		return $sql->select("
			SELECT * FROM tb_categories a INNER JOIN tb_productscategories b ON a.idcategory = b.idcategory WHERE b.idproduct = :idproduct
		", [

			':idproduct' => $this->getidproduct()
		]);
	}

	public static function getPage($page = 1, $itemsPerPage = 10)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_products 
			ORDER BY desproduct
			LIMIT $start, $itemsPerPage;
		");

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data' => $results,
			'total' => (int)$resultTotal[0]["nrtotal"],
			'pages' => ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];
	}

	public static function getPageSearch($search, $page = 1, $itemsPerPage = 10)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_products 
			WHERE desproduct LIKE :search
			ORDER BY desproduct
			LIMIT $start, $itemsPerPage;
		", [
			':search' => '%' . $search . '%'
		]);

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data' => $results,
			'total' => (int)$resultTotal[0]["nrtotal"],
			'pages' => ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];
	}


	public static function getIdHash($id)
	{
		$hashUrl =  password_hash($id, PASSWORD_DEFAULT, [
			'cost' => 4
		]);

		$hashUrl = str_split($hashUrl);

		foreach ($hashUrl as $key => $value) {
			if ($hashUrl[$key] == "/" || $hashUrl[$key] == ".") {
				$hashUrl[$key] = '!';
			}
		}

		return implode($hashUrl);
	}
}
