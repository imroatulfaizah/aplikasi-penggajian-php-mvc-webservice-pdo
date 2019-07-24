<?php
	require_once 'Model/ModelHome.php';

	/**
	 *  Programmer imroatul faizah
	 */ 
	class ControllerHome{
		public $modelhome;

		function __construct(){
			$this->modelhome = new ModelHome();
		}


		public function tarikmang($location){
			header('location:'.$location);
		}

		public function tampilnodata(){
			//$data = $this->modelhome->jukokdata();
			include 'View/ViewHome.php';
		}

}

  ?>