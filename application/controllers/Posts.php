<?php
	class Posts extends CI_Controller{
		public function index(){
			
			$data['title'] ='Latest Post';
			$data['posts'] = $this->post_model->get_posts();
			// print_r($data['posts']);

			$this->load->helper('ckeditor_helper');
 
 
			//Ckeditor's configuration
			$this->data['ckeditor'] = array(
	 
				//ID of the textarea that will be replaced
				'id' 	=> 	'content',
				'path'	=>	'js/ckeditor',
	 
				//Optionnal values
				'config' => array(
					'toolbar' 	=> 	"Full", 	//Using the Full toolbar
					'width' 	=> 	"550px",	//Setting a custom width
					'height' 	=> 	'100px',	//Setting a custom height
	 
				),
	 
				//Replacing styles from the "Styles tool"
				'styles' => array(
	 
					//Creating a new style named "style 1"
					'style 1' => array (
						'name' 		=> 	'Blue Title',
						'element' 	=> 	'h2',
						'styles' => array(
							'color' 	=> 	'Blue',
							'font-weight' 	=> 	'bold'
						)
					),
	 
					//Creating a new style named "style 2"
					'style 2' => array (
						'name' 	=> 	'Red Title',
						'element' 	=> 	'h2',
						'styles' => array(
							'color' 		=> 	'Red',
							'font-weight' 		=> 	'bold',
							'text-decoration'	=> 	'underline'
						)
					)				
				)
			);
	 
			$this->data['ckeditor_2'] = array(
	 
				//ID of the textarea that will be replaced
				'id' 	=> 	'content_2',
				'path'	=>	'js/ckeditor',
	 
				//Optionnal values
				'config' => array(
					'width' 	=> 	"100%",	//Setting a custom width
					'height' 	=> 	'100px',	//Setting a custom height
					'toolbar' 	=> 	array(	//Setting a custom toolbar
						array('Bold', 'Italic'),
						array('Underline', 'Strike', 'FontSize'),
						array('Smiley'),
						'/'
					)
				),
	 
				//Replacing styles from the "Styles tool"
				'styles' => array(
	 
					//Creating a new style named "style 1"
					'style 3' => array (
						'name' 		=> 	'Green Title',
						'element' 	=> 	'h3',
						'styles' => array(
							'color' 	=> 	'Green',
							'font-weight' 	=> 	'bold'
						)
					)
	 
				)
			);		

			$this->load->view('templates/header');
			$this->load->view('posts/index', $data);
			$this->load->view('templates/footer');
		}

		public function view($slug= NULL)
		{
			$data['post'] = $this->post_model->get_posts($slug);

			if (empty($data['post'])) {
				show_404();
			}

			$data['title']=$data['post']['title'];
			$this->load->view('templates/header');
			$this->load->view('posts/view', $data);
			$this->load->view('templates/footer');
		}

		public function create()
		{
			// $this->session->set_userdata('file_manager',true);
			$data['title']='Create Post';

			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('body', 'Body', 'required');
			if ($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('posts/create', $data);
				// $this->load->view('posts/ad');
				$this->load->view('templates/footer');
			} else{
				$this->post_model->create_post();
				redirect('posts');
			}
			

		}
	}