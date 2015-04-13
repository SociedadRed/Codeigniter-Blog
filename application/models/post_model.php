<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post_model extends CI_Model
{       
    public $id;
    public $title;
    public $content;
    public $created;
     
    public function __construct() 
    {
        parent::__construct();
    }
 
    public function getAll()
    {
        $query = $this->db->get('post');
        return $query->result();
    }
 
    private function create($post) 
    {
        return $this->db->insert('post', $this);
    }
	
	public function read($id) 
    {
        $query = $this->db->get_where('post', array('id' => $id));
        return $query->row();
    }
     
    public function update($post) 
    {
        $this->db->set('title', $this->title);
        $this->db->set('content', $this->content);
        $this->db->where('id', $this->id);
        return $this->db->update('post');
    }
 
    public function delete() 
    {
        $this->db->where('id', $this->id);
        return $this->db->delete('post');
    }
     
    public function save() 
    {
        if (isset($this->id)) {  
            return $this->update();
        } else {
            return $this->create();
        }
    }
}