<?php

class Gg_abastecimentosTest extends WebTestCase
{
	public $fixtures=array(
		'gg_abastecimentoses'=>'Gg_abastecimentos',
	);

	public function testShow()
	{
		$this->open('?r=gg_abastecimentos/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=gg_abastecimentos/create');
	}

	public function testUpdate()
	{
		$this->open('?r=gg_abastecimentos/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=gg_abastecimentos/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=gg_abastecimentos/index');
	}

	public function testAdmin()
	{
		$this->open('?r=gg_abastecimentos/admin');
	}
}
