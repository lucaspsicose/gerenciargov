<?php

class Gg_configuracoesTest extends WebTestCase
{
	public $fixtures=array(
		'gg_configuracoes'=>'Gg_configuracoes',
	);

	public function testShow()
	{
		$this->open('?r=gg_configuracoes/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=gg_configuracoes/create');
	}

	public function testUpdate()
	{
		$this->open('?r=gg_configuracoes/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=gg_configuracoes/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=gg_configuracoes/index');
	}

	public function testAdmin()
	{
		$this->open('?r=gg_configuracoes/admin');
	}
}
