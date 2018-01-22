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
		$this->assertJson('{"headers":{},"original":{"status":"OK","result":{"message":"1 deleted"},"errors":[]},"exception":null}', $actual);
	}
}