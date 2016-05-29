<?php

class Gg_obrasTest extends WebTestCase
{
	public $fixtures=array(
		'gg_obrases'=>'Gg_obras',
	);

	public function testShow()
	{
		$this->open('?r=gg_obras/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=gg_obras/create');
	}

	public function testUpdate()
	{
		$this->open('?r=gg_obras/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=gg_obras/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=gg_obras/index');
	}

	public function testAdmin()
	{
		$this->open('?r=gg_obras/admin');
	}
}
