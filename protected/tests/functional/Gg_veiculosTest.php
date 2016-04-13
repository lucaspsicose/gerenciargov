<?php

class Gg_veiculosTest extends WebTestCase
{
	public $fixtures=array(
		'gg_veiculoses'=>'Gg_veiculos',
	);

	public function testShow()
	{
		$this->open('?r=gg_veiculos/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=gg_veiculos/create');
	}

	public function testUpdate()
	{
		$this->open('?r=gg_veiculos/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=gg_veiculos/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=gg_veiculos/index');
	}

	public function testAdmin()
	{
		$this->open('?r=gg_veiculos/admin');
	}
}
