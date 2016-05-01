<?php

class Gg_checklist_viagemTest extends WebTestCase
{
	public $fixtures=array(
		'gg_checklist_viagems'=>'Gg_checklist_viagem',
	);

	public function testShow()
	{
		$this->open('?r=gg_checklist_viagem/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=gg_checklist_viagem/create');
	}

	public function testUpdate()
	{
		$this->open('?r=gg_checklist_viagem/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=gg_checklist_viagem/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=gg_checklist_viagem/index');
	}

	public function testAdmin()
	{
		$this->open('?r=gg_checklist_viagem/admin');
	}
}
