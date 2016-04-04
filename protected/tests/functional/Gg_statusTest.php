<?php

class Gg_statusTest extends WebTestCase
{
	public $fixtures=array(
		'gg_statuses'=>'Gg_status',
	);

	public function testShow()
	{
		$this->open('?r=gg_status/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=gg_status/create');
	}

	public function testUpdate()
	{
		$this->open('?r=gg_status/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=gg_status/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=gg_status/index');
	}

	public function testAdmin()
	{
		$this->open('?r=gg_status/admin');
	}
}
