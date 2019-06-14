<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Testing extends CI_Controller {

    function __construct()
	{
		parent::__construct();
        $this->load->model('M_Home', 'mhome');
        $this->load->model('M_Testing', 'welcome_model');
    }

    public function index()
    {
        $this->load->view('testing');
    }
    public function getCountry(){
        $page =  $_GET['page'];
        $countries = $this->welcome_model->getCountry($page);
        foreach($countries as $country){
            echo "<tr><td>".$country->id."</td><td>".$country->title."</td><td>".$country->image."</td></tr>";
        }
        exit;
    }
    public function getArticles()
    {
        $page = $_GET['page_articles'];
        $articles = $this->welcome_model->getArticles($page);
        $i = 0;
        foreach ($articles as $key => $value) {
            $data['id'][$i++] = $value->id;
            $data['title'][$i++] = $value->title;
        }
        echo json_encode($articles);
    }
}
