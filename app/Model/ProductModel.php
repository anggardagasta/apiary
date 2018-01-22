<?php

namespace App\Model;

class ProductModel
{
	public function createData($fields)
	{
		try {
            return \DB::table('products')->insertGetId($fields);
		} catch (\Exception $ex) {
            throw $ex;
        }
	}

	public function getAllProducts()
	{
		try {
			// return DB::select("SELECT * FROM products");
            return \DB::table('products')->get();
        } catch (\Exception $ex) {
            throw $ex;
        }
	}

	public function getProductById($id)
    {
        try {
            return \DB::table('products')
                ->where('id', '=', $id)
                ->first();
        } catch (\Exception $ex) {
            throw $ex;
        }
    }

    public function updateProduct($id, $fields)
    {
    	try {
            return \DB::table('products')
                ->where('id', $id)
                ->update($fields);
        } catch (\Exception $ex) {
            throw $ex;
        }
    }

    public function deleteProduct($id)
    {
    	try {
            return \DB::table('products')->where('id', '=', $id)->delete();;
        } catch (\Exception $ex) {
            throw $ex;
        }
    }
}