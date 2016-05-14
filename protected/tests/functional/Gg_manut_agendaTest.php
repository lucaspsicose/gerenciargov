<?php

class Gg_manut_agendaTest extends WebTestCase
{
	public $fixtures=array(
		'gg_manut_agendas'=>'Gg_manut_agenda',
	);

	public function testShow()
	{
		$this->open('?r=gg_manut_agenda/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=gg_manut_agenda/create');
	}

	public function testUpdate()
	{
		$this->open('?r=gg_manut_agenda/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=gg_manut_agenda/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=gg_manut_agenda/index');
	}

	public function testAdmin()
	{
		$this->open('?r=gg_manut_agenda/admin');
	}
}
