<?php

class kittenController extends Controller {
	
	public function index() {
		$kittens=$this->model->load();
        $this->setResponce($kittens);
	}
	
	public function view($data) {
		$kitten=$this->model->load($data['id']);
        $this->setResponce($kitten);
	}
	
	public function add() {
		
		$_POST=json_decode(file_get_contents('php://input'), true);
		
		if( (isset($_POST['id'])) && (isset($_POST['name'])) && (isset($_POST['image'])) 
			&& (isset($_POST['power'])) && (isset($_POST['speed'])) ) {
				
				$dataToSave=array(
					'id'=>$_POST['id'], 
					'name'=>$_POST['name'],
					'image'=>$_POST['image'],
					'power'=>$_POST['power'],
					'speed'=>$_POST['speed']);
				
				$addedItem=$this->model->create($dataToSave);
				$this->setResponce($addedItem);
			}
	}
	
	public function edit($data) {
		
		$_PUT=json_decode(file_get_contents('php://input'), true);
		
		if( (isset($_POST['id'])) && (isset($_POST['name'])) && (isset($_POST['image'])) 
			&& (isset($_POST['power'])) && (isset($_POST['speed'])) ) {
			// мы передаем в модель массив с данными
			// модель должна вернуть boolean
			$dataToUpd=array(
					'id'=>$_POST['id'], 
					'name'=>$_POST['name'],
					'image'=>$_POST['image'],
					'power'=>$_POST['power'],
					'speed'=>$_POST['speed']);
			$updItem=$this->model->save($data['id'], $dataToUpd);
			$this->setResponce($updItem);
			}
	}
	
	public function delete($data) {
		$delItem = $this->model->delete($data['id']);
        $this->setResponce($delItem);
	}
}