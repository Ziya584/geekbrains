<?php
	include_once 'config.php';
	class DB{

		public static function connection(){
			$conn = mysqli_connect(HOST, USER, PASSWORD, DB);
			if(!$conn){
				return false;
			}else{
				return $conn;
			}
		}

		public static function getAll($tablename,$orderByColumnDesc){
			$sql = "SELECT * FROM ".$tablename." order by ".$orderByColumnDesc." DESC";
			$conn = DB::connection();
			return mysqli_fetch_all(mysqli_query($conn,$sql));
		}

		public static function getById($tablename, $id){
			$sql = "SELECT * FROM ".$tablename." WHERE id=".$id;
			$conn = DB::connection();
//			$res = mysqli_fetch_assoc(mysqli_query($conn,$sql));
			$res = [];
			if($row = mysqli_query($conn,$sql)){
				while ($result = mysqli_fetch_assoc($row)){
					$res[]=$result;
				}
			}
			return $res;
		}

		public static function insert($tablename, $columns, $values){
			$values = explode(',',$values);
			$val = [];
			foreach ($values as $k => $v){
				$val[]="'$v'";
			}
			$values = implode(',',$val);
			$sql = "INSERT INTO ".$tablename." ( ".$columns." ) VALUES (".$values." )";
			$conn = DB::connection();
			mysqli_query($conn,$sql);
			$res = DB::get("SELECT id FROM ".$tablename." ORDER BY id DESC LIMIT 1");
			return $res[0][0];
		}

		public static function get($sql){
			$conn = DB::connection();
			$res =[];
			if($row = mysqli_query($conn,$sql)){
				while ($result = mysqli_fetch_assoc($row)){
					$res[]=$result;
				}
			}
			return $res;
		}


	}