<?php

class Gg_check_listTest extends WebTestCase
{
	public $fixtures=array(
		'gg_check_lists'=>'Gg_check_list',
	);

	public function testShow()
	{
		$this->open('?r=gg_check_list/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=gg_check_list/create');
	}

	public function testUpdate()
	{
		$this->open('?r=gg_check_list/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=gg_check_list/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=gg_check_list/index');
	}

	public function testAdmin()
	{
		$this->open('?r=gg_check_list/admin');
	}
}
