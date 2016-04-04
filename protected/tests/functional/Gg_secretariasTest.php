<?php

class Gg_secretariasTest extends WebTestCase
{
	public $fixtures=array(
		'gg_secretariases'=>'Gg_secretarias',
	);

	public function testShow()
	{
		$this->open('?r=gg_secretarias/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=gg_secretarias/create');
	}

	public function testUpdate()
	{
		$this->open('?r=gg_secretarias/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=gg_secretarias/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=gg_secretarias/index');
	}

	public function testAdmin()
	{
		$this->open('?r=gg_secretarias/admin');
	}
}
