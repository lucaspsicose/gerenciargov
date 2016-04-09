<?php

class Gg_prefeiturasTest extends WebTestCase
{
	public $fixtures=array(
		'gg_prefeiturases'=>'Gg_prefeituras',
	);

	public function testShow()
	{
		$this->open('?r=gg_prefeituras/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=gg_prefeituras/create');
	}

	public function testUpdate()
	{
		$this->open('?r=gg_prefeituras/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=gg_prefeituras/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=gg_prefeituras/index');
	}

	public function testAdmin()
	{
		$this->open('?r=gg_prefeituras/admin');
	}
}
