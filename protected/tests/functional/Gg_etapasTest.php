<?php

class Gg_etapasTest extends WebTestCase
{
	public $fixtures=array(
		'gg_etapases'=>'Gg_etapas',
	);

	public function testShow()
	{
		$this->open('?r=gg_etapas/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=gg_etapas/create');
	}

	public function testUpdate()
	{
		$this->open('?r=gg_etapas/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=gg_etapas/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=gg_etapas/index');
	}

	public function testAdmin()
	{
		$this->open('?r=gg_etapas/admin');
	}
}
