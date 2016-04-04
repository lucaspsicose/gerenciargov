<?php

class Gg_solicitantesTest extends WebTestCase
{
	public $fixtures=array(
		'gg_solicitantes'=>'Gg_solicitantes',
	);

	public function testShow()
	{
		$this->open('?r=gg_solicitantes/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=gg_solicitantes/create');
	}

	public function testUpdate()
	{
		$this->open('?r=gg_solicitantes/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=gg_solicitantes/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=gg_solicitantes/index');
	}

	public function testAdmin()
	{
		$this->open('?r=gg_solicitantes/admin');
	}
}
