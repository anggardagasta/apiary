<?php

use App\Http\Controllers\ProductController;

class ProductTest extends TestCase
{
	public function testDelete()
	{
		$model = \Mockery::mock('App\Model\ProductModel');
		$model->shouldReceive('deleteProduct')->andReturn(true);

		$controller = new ProductController($model);
		$data = $controller->delete(1);
		$actual = json_encode($data);
		$this->assertJsonStringEqualsJsonString('{"headers":{},"original":{"status":"OK","result":{"message":"1 deleted"},"errors":[]},"exception":null}', $actual);
	}

	public function testFailDelete()
	{
		$model = \Mockery::mock('App\Model\ProductModel');
		$model->shouldReceive('deleteProduct')->andThrow(new \Exception('test error when delete'));

		$controller = new ProductController($model);
		$data = $controller->delete(1);
		$actual = json_encode($data);
		$this->assertJsonStringEqualsJsonString('{"headers":{},"original":{"errors":{"message":"Unexpected error"}},"exception":null}', $actual);
	}

	public function testCreate()
	{
		$request = ['name' => '', 'price' => 3240, 'imageurl' => 'www.example.com'];

		$model = \Mockery::mock('App\Model\ProductModel');
		$model->shouldReceive('createData')->andReturn(2);

		$request = \Mockery::mock('Illuminate\Http\Request');
        $request->shouldReceive('input')->once()->andReturn('Test');
        $request->shouldReceive('input')->once()->andReturn(3240);
        $request->shouldReceive('input')->once()->andReturn('www.example.com');

        $controller = \Mockery::mock('App\Http\Controllers\ProductController[dateTime]', [$model]);
        $controller->shouldReceive('dateTime')->andReturn(new \DateTime('2018-01-01'));
        $result = $controller->create($request);
        $actual = json_encode($result);

        $this->assertJsonStringEqualsJsonString('{"headers":{},"original":{"status":"OK","result":{"id":2,"name":"Test","price":3240,"imageurl":"www.example.com","created_at":"2018-01-01T00:00:00Z","updated_at":"2018-01-01T00:00:00Z"},"errors":[]},"exception":null}', $actual);
	}
}