<?php
/*
	Author: haodc
	Since: v1.0
*/

// Database 1
define('DB_HOST',   'localhost');
define('DB_NAME',   'mb26');
define('DB_USERNAME',   'root');
define('DB_PASS',   '12345678');

class Db {
	/*
		Initiate database connection
	*/

	public $dbc;	// Hold database connection resource
	public $r;
	
	public function __construct($db_no) {
		if ($db_no == 1) {	// Using database 1
			$this->dbc = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASS, DB_NAME);
		}
		//mysqli_set_charset($this->dbc, 'utf-8');
		mysqli_query ($this->dbc, "set names 'utf8'"); 
	}

	// Do query and return result
	public function doQuery($query) {
		$this->r = mysqli_query($this->dbc, $query) or die (mysqli_error($this->dbc));
	}
	public function loadListDetailArea($OrderBy, $ascdesc) {
		$query = "SELECT * FROM area ORDER BY ".$OrderBy." ".$ascdesc;
		$this->doQuery($query);
	}
	public function loadListDetailCategory($OrderBy, $ascdesc) {
		$query = "SELECT * FROM category AS c JOIN area AS a ON c.CategoryAreaID = a.AreaID ORDER BY ".$OrderBy." ".$ascdesc;
		$this->doQuery($query);
	}
	public function loadListDetailType($OrderBy, $ascdesc) {
		$query = "SELECT * FROM type AS t JOIN ";
        $query .= " area AS a ON t.TypeAreaID = a.AreaID JOIN ";
        $query .= " category AS c ON t.TypeCategoryID = c.CategoryID ORDER BY ".$OrderBy." ".$ascdesc;
		$this->doQuery($query);
	}
	public function loadListDetailUser() {
		$query = "SELECT * FROM user";
		$this->doQuery($query);
	}
	public function loadListDetailNews($OrderBy, $ascdesc) {
		$query = "SELECT * FROM news AS n ";
        $query .= " JOIN area AS a ON n.NewsAID = a.AreaID ";
        $query .= " JOIN category AS c ON n.NewsCID = c.CategoryID ";
        $query .= " JOIN type AS t ON n.NewsTID = t.TypeID ";
        $query .= " JOIN user AS u ON n.NewsUserID = u.UserID ORDER BY ".$OrderBy." ".$ascdesc;
		$this->doQuery($query);
	}
	public function loadListDetailProduct($OrderBy, $ascdesc) {
		$query = "SELECT * FROM product AS p ";
        $query .= " JOIN area AS a ON p.ProductAID = a.AreaID ";
        $query .= " JOIN category AS c ON p.ProductCID = c.CategoryID ";
        $query .= " JOIN type AS t ON p.ProductTID = t.TypeID ";
        $query .= " JOIN user AS u ON p.ProductUserID = u.UserID ORDER BY ".$OrderBy." ".$ascdesc;
		$this->doQuery($query);
	}
	public function loadListDetailContact($OrderBy, $ascdesc) {
		$query = "SELECT * FROM contact ORDER BY ".$OrderBy." ".$ascdesc;
		$this->doQuery($query);
	}
	public function loadListDetailApp($OrderBy, $ascdesc) {
		$query = "SELECT * FROM news AS n ";
        $query .= " JOIN area AS a ON n.NewsAID = a.AreaID ";
        $query .= " JOIN category AS c ON n.NewsCID = c.CategoryID ";
        $query .= " JOIN type AS t ON n.NewsTID = t.TypeID ";
        $query .= " JOIN user AS u ON n.NewsUserID = u.UserID WHERE a.AreaID = 2 ORDER BY ".$OrderBy." ".$ascdesc;
		$this->doQuery($query);
	}
	public function loadListDetailTechNews($OrderBy, $ascdesc) {
		$query = "SELECT * FROM news AS n ";
        $query .= " JOIN area AS a ON n.NewsAID = a.AreaID ";
        $query .= " JOIN category AS c ON n.NewsCID = c.CategoryID ";
        $query .= " JOIN type AS t ON n.NewsTID = t.TypeID ";
        $query .= " JOIN user AS u ON n.NewsUserID = u.UserID WHERE a.AreaID = 1 ORDER BY ".$OrderBy." ".$ascdesc;
		$this->doQuery($query);
	}
	public function loadListDetailTypeProduct($OrderBy, $ascdesc) {
		$query = "SELECT * FROM type WHERE TypeAreaID = 3 ORDER BY ".$OrderBy." ".$ascdesc;
		$this->doQuery($query);
	}

	public function loadLatestDetailApp($ExceptNoName, $OrderBy, $ascdesc, $num) {
		$query = "SELECT * FROM news AS n ";
        $query .= " JOIN area AS a ON n.NewsAID = a.AreaID ";
        $query .= " JOIN category AS c ON n.NewsCID = c.CategoryID ";
        $query .= " JOIN type AS t ON n.NewsTID = t.TypeID ";
        $query .= " JOIN user AS u ON n.NewsUserID = u.UserID ";
        $query .= " WHERE a.AreaID = 2 AND NewsNoName != '".$ExceptNoName."' ORDER BY ".$OrderBy." ".$ascdesc." LIMIT 0, ".$num;
		$this->doQuery($query);
	}
	public function loadLatestDetailTechNews($ExceptNoName, $OrderBy, $ascdesc, $num) {
		$query = "SELECT * FROM news AS n ";
        $query .= " JOIN area AS a ON n.NewsAID = a.AreaID ";
        $query .= " JOIN category AS c ON n.NewsCID = c.CategoryID ";
        $query .= " JOIN type AS t ON n.NewsTID = t.TypeID ";
        $query .= " JOIN user AS u ON n.NewsUserID = u.UserID ";
        $query .= " WHERE a.AreaID = 1 AND NewsNoName != '".$ExceptNoName."' ORDER BY ".$OrderBy." ".$ascdesc." LIMIT 0, ".$num;
		$this->doQuery($query);
	}
	public function loadLatestDetailProduct($ExceptNoName, $OrderBy, $ascdesc, $num) {
		$query = "SELECT * FROM product AS p ";
        $query .= " JOIN area AS a ON p.ProductAID = a.AreaID ";
        $query .= " JOIN category AS c ON p.ProductCID = c.CategoryID ";
        $query .= " JOIN type AS t ON p.ProductTID = t.TypeID ";
        $query .= " JOIN user AS u ON p.ProductUserID = u.UserID ";
        $query .= " WHERE a.AreaID = 3 AND ProductNoName != '".$ExceptNoName."' ORDER BY ".$OrderBy." ".$ascdesc." LIMIT 0, ".$num;
		$this->doQuery($query);
	}
	public function loadLatestProductIsHot($ExceptNoName, $OrderBy, $ascdesc, $num, $isHot) {
		$query = "SELECT * FROM product AS p ";
        $query .= " JOIN area AS a ON p.ProductAID = a.AreaID ";
        $query .= " JOIN category AS c ON p.ProductCID = c.CategoryID ";
        $query .= " JOIN type AS t ON p.ProductTID = t.TypeID ";
        $query .= " JOIN user AS u ON p.ProductUserID = u.UserID ";
        $query .= " WHERE p.ProductIsHot = ".$isHot." AND a.AreaID = 3 AND ProductNoName != '".$ExceptNoName."' ORDER BY ".$OrderBy." ".$ascdesc." LIMIT 0, ".$num;
		$this->doQuery($query);
	}
	// Select with criteria
	public function loadListDetailProductByType($TypeNoName, $OrderBy, $ascdesc) {
		$query = "SELECT * FROM product AS p ";
        $query .= " JOIN area AS a ON p.ProductAID = a.AreaID ";
        $query .= " JOIN category AS c ON p.ProductCID = c.CategoryID ";
        $query .= " JOIN type AS t ON p.ProductTID = t.TypeID ";
        $query .= " JOIN user AS u ON p.ProductUserID = u.UserID WHERE t.TypeNoName = '".$TypeNoName."' ORDER BY ".$OrderBy." ".$ascdesc;
		$this->doQuery($query);
	}
	public function loadListNewsByKW($kw, $OrderBy, $ascdesc) {
		$query = "SELECT * FROM news AS n ";
        $query .= " JOIN area AS a ON n.NewsAID = a.AreaID ";
        $query .= " JOIN category AS c ON n.NewsCID = c.CategoryID ";
        $query .= " JOIN type AS t ON n.NewsTID = t.TypeID ";
        $query .= " JOIN user AS u ON n.NewsUserID = u.UserID ";
        $query .= " WHERE (NewsContent LIKE '%".$kw."%' OR NewsName LIKE '%".$kw."%') ORDER BY ".$OrderBy." ".$ascdesc;
		$this->doQuery($query);
	}
	public function loadListProductByKW($kw, $OrderBy, $ascdesc) {
		$query = "SELECT * FROM product AS p ";
        $query .= " JOIN area AS a ON p.ProductAID = a.AreaID ";
        $query .= " JOIN category AS c ON p.ProductCID = c.CategoryID ";
        $query .= " JOIN type AS t ON p.ProductTID = t.TypeID ";
        $query .= " JOIN user AS u ON p.ProductUserID = u.UserID ";
        $query .= " WHERE (ProductContent LIKE '%".$kw."%' OR ProductName LIKE '%".$kw."%') ORDER BY ".$OrderBy." ".$ascdesc;
		$this->doQuery($query);
	}
}
?>