<?php

class menuController extends Controller {
	
	public function index() {
		$examples=$this->model->load(); // просим все записи
		$this->setResponce($examples); // возвращаем ответ
	}
}