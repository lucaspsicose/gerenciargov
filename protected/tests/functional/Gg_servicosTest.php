<?php

class Gg_servicosTest extends WebTestCase
{
	public $fixtures=array(
		'gg_servicoses'=>'Gg_servicos',
	);

	public function testShow()
	{
		$this->open('?r=gg_servicos/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=gg_servicos/create');
	}

	public function testUpdate()
	{
		$this->open('?r=gg_servicos/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=gg_servicos/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=gg_servicos/index');
	}

	public function testAdmin()
	{
		$this->open('?r=gg_servicos/admin');
	}
}
