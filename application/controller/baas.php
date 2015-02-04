<?php

class Baas extends Controller
{
	public function index()
	{
		$this->model = $this->loadModel('baas');

		$this->view->naam = $this->model->getBoss();

		$this->view->render('baas/index');
	}
}