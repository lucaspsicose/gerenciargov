<?php

class Gg_responsaveisTest extends WebTestCase
{
	public $fixtures=array(
		'gg_responsaveises'=>'Gg_responsaveis',
	);

	public function testShow()
	{
		$this->open('?r=gg_responsaveis/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=gg_responsaveis/create');
	}

	public function testUpdate()
	{
		$this->open('?r=gg_responsaveis/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=gg_responsaveis/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=gg_responsaveis/index');
	}

	public function testAdmin()
	{
		$this->open('?r=gg_responsaveis/admin');
	}
}
