<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		
		// Load libraries
        $this->load->database();
		
		$this->load->helper('url');
		$this->load->helper('form');
		
		// Load models
        $this->load->model('Post_model', 'post');
	}
	
	public function index()
	{
		// Get posts from database
		$data['posts'] = $this->post->getAll();
		 
		// Load page view
		$this->load->view('blog/index', $data);
	}
	
	public function create()
	{
		if($_POST)
		{
			// Build post object
			$this->post->title = $this->input->post('title', TRUE);
			$this->post->content = $this->input->post('content', TRUE);
			 
			// Save post to database
			if ($this->post->save()) {
				redirect(base_url());
			}
		}
	 
		// Initialize form
		$data['action'] = site_url('blog/create');
		$data['title'] = NULL;
		$data['content'] = NULL;
		 
		// Load views   
		$this->load->view('blog/create', $data);
	}
	
	public function read( $id = NULL )
	{
		$data['post'] = $this->post->read( $id );
		
		// Initialize form
		$data['action'] = site_url('blog/read');
		$data['title'] = NULL;
		$data['content'] = NULL;
		
		$this->load->view('blog/read', $data);
	}
	
	public function update( $id = NULL )
	{
		if($_POST)
		{
			// Build post object
			$this->post->id 		= $this->input->post('id', TRUE);
			$this->post->title 		= $this->input->post('title', TRUE);
			$this->post->content 	= $this->input->post('content', TRUE);
			 
			// Save post to database
			if ($this->post->update()) {
				redirect(base_url());
			}
		}
		$data['post'] = $this->post->read( $id );
		
		// Initialize form
		$data['action'] = site_url('blog/update/'.$id);
		$data['title'] = $data['post']->title;
		$data['content'] = $data['post']->content;
		
		$this->load->view('blog/update', $data);
	}
	
	public function delete( $id = NULL )
	{
		$data['post'] = $this->post->delete( $id );
		
		redirect(base_url());
	}
}
