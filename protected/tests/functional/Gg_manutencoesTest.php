<?php

class Gg_manutencoesTest extends WebTestCase
{
	public $fixtures=array(
		'gg_manutencoes'=>'Gg_manutencoes',
	);

	public function testShow()
	{
		$this->open('?r=gg_manutencoes/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=gg_manutencoes/create');
	}

	public function testUpdate()
	{
		$this->open('?r=gg_manutencoes/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=gg_manutencoes/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=gg_manutencoes/index');
	}

	public function testAdmin()
	{
		$this->open('?r=gg_manutencoes/admin');
	}
}
