<?php

class Member extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];

	public static function listAll()
	{
		return (new Spreadsheet('members'))->readCSV();
	}
	
	public static function search($id)
	{
	    $datas = self::listAll();
	    foreach ($datas as $data)
	    {
	        foreach ($data as $value)
	        {
	            if (stripos($value, $id) !== false)
	            {
	                return $data;
	            }
	        }
	    }
	}
}