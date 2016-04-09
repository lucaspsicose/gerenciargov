<?php

class Gg_motoristasTest extends WebTestCase
{
	public $fixtures=array(
		'gg_motoristases'=>'Gg_motoristas',
	);

	public function testShow()
	{
		$this->open('?r=gg_motoristas/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=gg_motoristas/create');
	}

	public function testUpdate()
	{
		$this->open('?r=gg_motoristas/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=gg_motoristas/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=gg_motoristas/index');
	}

	public function testAdmin()
	{
		$this->open('?r=gg_motoristas/admin');
	}
}
