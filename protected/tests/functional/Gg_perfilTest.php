<?php

class Gg_perfilTest extends WebTestCase
{
	public $fixtures=array(
		'gg_perfils'=>'Gg_perfil',
	);

	public function testShow()
	{
		$this->open('?r=gg_perfil/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=gg_perfil/create');
	}

	public function testUpdate()
	{
		$this->open('?r=gg_perfil/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=gg_perfil/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=gg_perfil/index');
	}

	public function testAdmin()
	{
		$this->open('?r=gg_perfil/admin');
	}
}
