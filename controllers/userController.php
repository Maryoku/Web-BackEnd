<?php

class userController extends Controller {
	
	public function index() {
		$examples=$this->model->load();
        $this->setResponce($examples);
	}
	
	public function view($data) {
		$example=$this->model->load($data['id']);
        $this->setResponce($example);
	}
	
	public function add() {
		if( (isset($_POST['id'])) && (isset($_POST['name'])) && (isset($_POST['score'])) ){
			// мы передаем в модель массив с данными
			// модель должна вернуть boolean
			$dataToSave=array('id'=>$_POST['id'], 'name'=>$_POST['name'], 'score'=>$_POST['score']);
			$addedItem=$this->model->create($dataToSave);
			$this->setResponce($addedItem);
		}
	}
	
	public function edit($data) {
		
		$_PUT=json_decode(file_get_contents('php://input'));
		
		if((isset($_PUT['id']))&&(isset($_PUT['name']))&&(isset($_PUT['score']))){
			// мы передаем в модель массив с данными
			// модель должна вернуть boolean
			$dataToUpd=array('id'=>$_PUT['id'], 'name'=>$_PUT['name'], 'score'=>$_PUT['score'] );
			$updItem=$this->model->save($dataToUpd, $data['id']);
			$this->setResponce($updItem);
		}
	}
	
	public function delete($data) {
		$example = $this->model->delete($data['id']);
        $this->setResponce($delItem);
	}
}