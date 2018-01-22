<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Model\ProductModel;
use Illuminate\Http\Request;

class ProductController extends BaseController
{
	private $model;

    public function __construct(ProductModel $model = null)
    {
        if (is_null($model)) {
            $this->model = new ProductModel();
        } else {
            $this->model = $model;
        }
    }

    public function create(Request $request)
    {
    	$result = [];
    	try {
    		$name = $request->input('name');
    		$price = $request->input('price');
            $imageurl = $request->input('imageurl');

            $fields = [
                'name' => $name,
                'price' => $price,
                'imageurl' => $imageurl,
                'created_at' => $this->dateTime()->format('Y-m-d\TH:i:s\Z'),
                'updated_at' => $this->dateTime()->format('Y-m-d\TH:i:s\Z'),
            ];

    		$data = $this->model->createData($fields);
    		if ($data) {
    			$result = [
                    'status' => 'OK',
                    'result' => [
                        'id' => $data,
                        'name' => $name,
                        'price' => $price,
                        'imageurl' => $imageurl,
                        'created_at' => $fields['created_at'],
                        'updated_at' => $fields['updated_at']
                    ],
                    'errors' => []
                ];
    		}
    	} catch (\Exception $ex) {
    		
    	}
    	
    	return response()->json($result);
    }

    public function get()
    {
        $result = [];
        try {
            $data = $this->model->getAllProducts();            
            if ($data) {
                foreach ($data as $key => $val) {
                    $data[$key]->created_at = $this->convertDate($val->created_at, 'Y-m-d\TH:i:s\Z');
                    $data[$key]->updated_at = $this->convertDate($val->updated_at, 'Y-m-d\TH:i:s\Z');
                }
                $result = [
                    'status' => 'OK',
                    'result' => $data,
                    'errors' => []
                ];
            }
        } catch (\Exception $ex) {
            
        }
        
        return response()->json($result);
    }

    public function getById($id)
    {
        $result = [];
        try {
            $data = $this->model->getProductById($id);  
            if ($data) {
                $data->created_at = $this->convertDate($data->created_at, 'Y-m-d\TH:i:s\Z');
                $data->updated_at = $this->convertDate($data->updated_at, 'Y-m-d\TH:i:s\Z');
                $result = [
                    'status' => 'OK',
                    'result' => $data,
                    'errors' => []
                ];
            }
        } catch (\Exception $ex) {
            
        }
        
        return response()->json($result);
    }

    public function update($id, Request $request)
    {
        $result = [];
        try {
            $fields = ['name' => $request->input('name')];
            $data = $this->model->updateProduct($id, $fields);
            if ($data) {
                $product = $this->model->getProductById($id);
                $product->created_at = $this->convertDate($product->created_at, 'Y-m-d\TH:i:s\Z');
                $product->updated_at = $this->convertDate($product->updated_at, 'Y-m-d\TH:i:s\Z');
                $result = [
                    'status' => 'OK',
                    'result' => $product,
                    'errors' => []
                ];
            }
        } catch (\Exception $ex) {
            
        }
        
        return response()->json($result);
    }

    public function delete($id)
    {
        $result = [];
        try {
            $data = $this->model->deleteProduct($id);
            if ($data) {
                $result = [
                    'status' => 'OK',
                    'result' => ['message' => $id . ' deleted'],
                    'errors' => []
                ];
            }
        } catch (\Exception $ex) {
            
        }
        
        return response()->json($result);
    }

    public function getV2()
    {
        return response()->json(['message' => 'Hello there']);
    }

    private function dateTime()
    {
        return new \DateTime();
    }

    private function convertDate($date, $format = 'Y-m-d')
    {
        return (new \DateTime($date))->format($format);
    }
}