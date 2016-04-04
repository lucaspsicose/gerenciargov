<?php

class Gg_atendimentosTest extends WebTestCase
{
	public $fixtures=array(
		'gg_atendimentoses'=>'Gg_atendimentos',
	);

	public function testShow()
	{
		$this->open('?r=gg_atendimentos/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=gg_atendimentos/create');
	}

	public function testUpdate()
	{
		$this->open('?r=gg_atendimentos/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=gg_atendimentos/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=gg_atendimentos/index');
	}

	public function testAdmin()
	{
		$this->open('?r=gg_atendimentos/admin');
	}
}
