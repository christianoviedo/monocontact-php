<?php

namespace Monocontact;

class MonoModel {

	protected $model;

	public function __construct(Monocontact $master) {
		$this->master = $master;
	}

	public function list() {
		if (!$this->model) throw new \Exception('You must enter a model');;
		$_params = ['model'=>$this->model];
		return $this->master->call('list', $_params);
	}

	public function view($id) {
		if (!$this->model) throw new \Exception('You must enter a model');;
		$_params = ['model'=>$this->model, 'id'=>$id];
		return $this->master->call('view', $_params);
	}

	public function find($columns) {
		if (!$this->model) throw new \Exception('You must enter a model');;
		$_params = ['model'=>$this->model, 'columns'=>$columns];
		return $this->master->call('find', $_params);
	}

	public function create($columns) {
		if (!$this->model) throw new \Exception('You must enter a model');;
		$_params = ['model'=>$this->model, 'columns'=>$columns];
		return $this->master->call('create', $_params);
	}

}