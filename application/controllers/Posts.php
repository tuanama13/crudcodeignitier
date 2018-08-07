<?php
	class Posts extends CI_Controller{
		public function view($page = 'home'){
			
			$data['title'] ='Latest Post';
			$this->load->view('templates/header');
			$this->load->view('post/index'.$page, $data);
			$this->load->view('templates/footer');
		}
	}