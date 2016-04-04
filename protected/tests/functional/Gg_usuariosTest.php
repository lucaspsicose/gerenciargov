<?php

class Gg_usuariosTest extends WebTestCase
{
	public $fixtures=array(
		'gg_usuarioses'=>'Gg_usuarios',
	);

	public function testShow()
	{
		$this->open('?r=gg_usuarios/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=gg_usuarios/create');
	}

	public function testUpdate()
	{
		$this->open('?r=gg_usuarios/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=gg_usuarios/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=gg_usuarios/index');
	}

	public function testAdmin()
	{
		$this->open('?r=gg_usuarios/admin');
	}
}
