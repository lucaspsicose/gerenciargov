<?php

class Gg_veiculo_viagensTest extends WebTestCase
{
	public $fixtures=array(
		'gg_veiculo_viagens'=>'Gg_veiculo_viagens',
	);

	public function testShow()
	{
		$this->open('?r=gg_veiculo_viagens/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=gg_veiculo_viagens/create');
	}

	public function testUpdate()
	{
		$this->open('?r=gg_veiculo_viagens/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=gg_veiculo_viagens/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=gg_veiculo_viagens/index');
	}

	public function testAdmin()
	{
		$this->open('?r=gg_veiculo_viagens/admin');
	}
}
