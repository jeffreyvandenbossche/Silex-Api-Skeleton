<?php

namespace skeleton\Repositories;

abstract class BaseRepository extends \Knp\Repository
{
	/**
	 * Inserts a row into this repositories table and returns the auto increment id generated by that row
	 * @param  array  	$data 	An array of the columns and their respective data to insert
	 * @return int       		The auto increment id of the new row		
	 */
	public function insert(array $data)
	{
		$this->db->insert($this->getTableName(), $data);
		return $this->db->lastInsertId();
	}

	/**
	 * Finds a row based on the value of the given column
	 * @param  string 	$column 	Columnname (NOT ESCAPED, WE TRUST DEVELOPER INPUT)
	 * @param  mixed	$value  	The value to search for in the column
	 * @return array         		Assosiative array containing one result
	 */
	public function findByColumn($column, $value)
	{
		return $this->db->fetchAssoc('SELECT * FROM ' . $this->getTableName() . ' WHERE ' . $column . ' = ? LIMIT 1;', array($value));
	}

	/**
	 * Finds all rows that have the specified value in the specified column
	 * @param  string 	$column 	Columnname (NOT ESCAPED, WE TRUST DEVELOPER INPUT)
	 * @param  mixed	$value  	The value to search for in the column
	 * @return array         		Assosiative array containing all results
	 */
	public function findAllByColumn($column, $value)
	{
		return $this->db->fetchAll('SELECT * FROM ' . $this->getTableName() . ' WHERE ' . $column . ' = ?;', array($value));
	}
}