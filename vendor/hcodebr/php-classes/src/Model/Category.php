<?php

namespace Hcode\Model;

use \Hcode\DB\Sql;
use \Hcode\Model;
use \Hcode\Mailer;

class Category extends Model
{

	public static function listAll()
	{

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_categories ORDER BY descategory");
	}

	// public function save()
	// {

	// 	$sql = new Sql();

	// 	$results = $sql->select("CALL sp_categories_save(:idcategory, :descategory)", array(
	// 		":idcategory" => $this->getidcategory(),
	// 		":descategory" => $this->getdescategory()
	// 	));

	// 	$this->setData($results[0]);

	// 	Category::updateFile();
	// }

	public function save()
	{
		$sql = new Sql();

		$results = $sql->query("INSERT INTO tb_categories(
			descategory, iconcategory) VALUES (
				'{$this->getdescategory()}',
				'{$this->geticoncategory()}'
		)",);

		// $this->setData($results[0]);
	}



	public function update()
	{


		$sql = new Sql();

		$results = $sql->select(
			"UPDATE  tb_categories SET 
			descategory = :descategory, 
			iconcategory = :iconcategory,
			photocategory = :photocategory 
		WHERE 
		idcategory = :idcategory",
			array(
				"idcategory" => $this->getidcategory(),
				"iconcategory" => $this->geticoncategory(),
				"descategory" => $this->getdescategory(),
				"photocategory" => $this->getphotocategory()
			)
		);

		// $this->setData($results[0]);
	}

	public function get($idcategory)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_categories WHERE idcategory = :idcategory", [
			':idcategory' => $idcategory
		]);

		$this->setData($results[0]);
	}

	public function delete()
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_categories WHERE idcategory = :idcategory", [
			':idcategory' => $this->getidcategory()
		]);

		Category::updateFile();
	}

	public static function updateFile()
	{

		$categories = Category::listAll();

		$html = [];

		foreach ($categories as $row) {
			array_push($html, '<li><a href="/categories/' . $row['idcategory'] . '">' . $row['descategory'] . '</a></li>');
		}

		file_put_contents($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "views" . DIRECTORY_SEPARATOR . "categories-menu.html", implode('', $html));
	}

	public function getProducts($related = true)
	{

		$sql = new Sql();

		if ($related === true) {

			return $sql->select("
				SELECT * FROM tb_products WHERE idproduct IN(
					SELECT a.idproduct
					FROM tb_products a
					INNER JOIN tb_productscategories b ON a.idproduct = b.idproduct
					WHERE b.idcategory = :idcategory
				);
			", [
				':idcategory' => $this->getidcategory()
			]);
		} else {

			return $sql->select("
				SELECT * FROM tb_products WHERE idproduct NOT IN(
					SELECT a.idproduct
					FROM tb_products a
					INNER JOIN tb_productscategories b ON a.idproduct = b.idproduct
					WHERE b.idcategory = :idcategory
				);
			", [
				':idcategory' => $this->getidcategory()
			]);
		}
	}

	public function getProductsPage($page = 1, $itemsPerPage = 8)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_products a
			INNER JOIN tb_productscategories b ON a.idproduct = b.idproduct
			INNER JOIN tb_categories c ON c.idcategory = b.idcategory
			WHERE c.idcategory = :idcategory
			LIMIT $start, $itemsPerPage;
		", [
			':idcategory' => $this->getidcategory()
		]);

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data' => Product::checkList($results),
			'total' => (int)$resultTotal[0]["nrtotal"],
			'pages' => ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];
	}

	public function addProduct(Product $product)
	{

		$sql = new Sql();

		$sql->query("INSERT INTO tb_productscategories (idcategory, idproduct) VALUES(:idcategory, :idproduct)", [
			':idcategory' => $this->getidcategory(),
			':idproduct' => $product->getidproduct()
		]);
	}

	public function removeProduct(Product $product)
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_productscategories WHERE idcategory = :idcategory AND idproduct = :idproduct", [
			':idcategory' => $this->getidcategory(),
			':idproduct' => $product->getidproduct()
		]);
	}

	public static function getPage($page = 1, $itemsPerPage = 10)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_categories 
			ORDER BY descategory
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
			FROM tb_categories 
			WHERE descategory LIKE :search
			ORDER BY descategory
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

	public function checkphoto()
	{
		if (file_exists(
			$_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR .
				"res" . DIRECTORY_SEPARATOR .
				"site" . DIRECTORY_SEPARATOR .
				"img" . DIRECTORY_SEPARATOR .
				"categories" . DIRECTORY_SEPARATOR .
				"category_" . $this->getidcategory() . ".jpg"
		)) {

			$url = "/res/site/img/categories/category_" . $this->getidcategory() . ".jpg";
		} else {

			$url = "/res/site/img/categories/category_default.jpg";
		}

		$this->setphotocategory($url);

		return $url;
	}

	public function setPhoto($photo)
	{

		$extension = explode('.', $photo['photocategory']['name']);
		$extension = end($extension);
		echo "Extensiomn => ";
		var_dump($extension);

		switch ($extension) {

			case "jpg":
			case "jpeg":
				$image = imagecreatefromjpeg($photo['photocategory']["tmp_name"]);
				break;

			case "gif":
				$image = imagecreatefromgif($photo['photocategory']["tmp_name"]);
				break;

			case "png":
				$image = imagecreatefrompng($photo['photocategory']["tmp_name"]);
				break;
		}



		$dist =  $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR .
			"res" . DIRECTORY_SEPARATOR .
			"site" . DIRECTORY_SEPARATOR .
			"img" . DIRECTORY_SEPARATOR .
			"categories" . DIRECTORY_SEPARATOR .
			"category_" . $this->getidcategory() . ".jpg";

		imagejpeg($image, $dist);

		imagedestroy($image);

		$this->checkphoto();
	}
}
