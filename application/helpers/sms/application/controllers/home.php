<?php

class home extends Controller {
	
	function index(){
		$template = $this->loadView('home');
		$template->render();
	}

}

?>
