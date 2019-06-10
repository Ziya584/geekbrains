<?php

	namespace application\lib;

	use PDO;

	class Db
	{

		protected $db;

		public function __construct()
		{
			$config = require 'application/config/db.php';
			$this->db = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['name'] . '', $config['user'], $config['password']);
		}


		public function query($sql, $params = [])
		{
			$stmt = $this->db->prepare($sql);
			if (!empty($params)) {
				foreach ($params as $key => $val) {
					if (is_int($val)) {
						$type = PDO::PARAM_INT;
					} else {
						$type = PDO::PARAM_STR;
					}
					$stmt->bindValue(':' . $key, $val, $type);
				}
			}
			$stmt->execute();
			return $stmt;
		}

		public function row($sql, $params = [])
		{
			$result = $this->query($sql, $params);
			return $result->fetchAll(PDO::FETCH_ASSOC);
		}

		public function column($sql, $params = [])
		{
			$result = $this->query($sql, $params);
			return $result->fetchColumn();
		}

		// returns int id
		public function insert($table, $object)
		{
			$columns = [];
			$masks = [];
			foreach ($object as $key => $value) {
				$columns[] = $key;
				$masks = ':' . $key;
				if ($value == null) {
					$object[$key] = null;
				}
			}
			$columns_s = implode(',', $columns);
			$masks_s = implode(',', $masks);
			$sql = "INSERT INTO $table ($columns_s) VALUES ($masks_s)";
			$this->query($sql, $object);
			return $this->db->lastInsertId();

		}

		//returns ubdated rows' count
		public function update($table, $object, $where = [])
		{
			$masks = [];
			foreach ($object as $key => $value) {
				$masks[] = "$key=:$key";
				($value == null) ? $object[$key] = null : '';
			}
			if (!empty($where)) {
				foreach ($where as $k => $v) {
					$where_masks[] = "$k=:$k";
					($v == null) ? $where[$k] = null : '';
				}
				$where_s = implode(' and ', $where);
			}
			$masks_s = implode(',', $masks);
			$sql = "UPDATE $table SET $masks_s WHERE $where_s";
			return $this->query($sql, $object)->rowCount();
		}

		public function select($what, $table, $object, $where = [])
		{


		}

		// update users set name=:name where id in(
		// update users set name=:name where id like(
		// update users set name=:name where id = :id
		//
		public function where()
		{

		}


	}