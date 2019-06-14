<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Nama class haru sama persis dengan nama file, termasuk besar kecil nya
class Viral extends CI_Controller {

    // Fungsi yang automatis di eksekusi oleh CI
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Home', 'mhome');
    }

    // Fungsi yang dieksekusi oleh controller ketika url tidak memilih fungsi yang ada di controller untuk di eksekusi
	public function index($page = '')
	{
		// Memuat atau menampilkan file php yang terdapat di dalam folder views
		$data = $this->mhome->getArticles();
		if ($data != false) {
			$result['articles'] = $this->mhome->getArticles();
			$result['numArticles'] = $this->mhome->getArticles()->num_rows();
			$result['popular_data'] = $this->mhome->popularSeminggu();
			if ($page != '') {
				$result['sub_page'] = $page;
			}else {
				$result['sub_page'] = 'viral';
			}
			$this->load->view('viral', $result);
		}
	}

	public function getViral()
	{
		$page = $_GET['page'];
		$sub_page = $_GET['sub_page'];
		if ($sub_page != 'viral') {
			$categories = $this->mhome->whereCategories('viral');
			$sub_category = $categories[0]['sub_category'.$sub_page];
			$viral = $this->mhome->getViralSubCategory($page, $sub_category);
		}else {
			// $viral = $this->mhome->getViral($page);
			$viral = $this->mhome->getViralSubCategory($page, 'Viral');
		}
		echo json_encode($viral);
	}

	/* Populer Seminggu */
	public function popularSeminggu()
	{
		$n = 0;
		$a = 0;
		$insert = true;
		$index = '';
		$article[$index] = 0;
		// $date_now = date('Y-m-d H:i:s');
		foreach ($this->mhome->getViewers()->result() as $key => $value) {
			if ($n < 10) {
				for ($i=0; $i < $n; $i++) { 
					if ($value->article_id == $article['id'][$i]) {
						$index = $value->article_id;
						$article['jumlah'][$index] += 1;
						$insert = false;
					}
				}
				if ($insert) {
					// echo date('d', strtotime($value->created_at))."<br>";
					$index = $value->article_id;
					$article['id'][] = $value->article_id;
					$article['jumlah'][$index] = 1;
					$n++;
				}else {
					$insert = true;
				}
			}
		}

		for ($i=0; $i < 10; $i++) { 
			$jumlah_popular[] = $article['jumlah'][$article['id'][$i]];
			$id_popular[] = $article['id'][$i];
		}

		$popular_seminggu = $this->insertion_sort($jumlah_popular, $id_popular);
		for ($i=0; $i < 6; $i++) { 
			$id_popular = $popular_seminggu['id'][$i];
			$query = "SELECT * FROM `articles` WHERE `articles`.`id` = $id_popular";
			$popular_data[] = $this->db->query($query)->result();
		}

		return $popular_data;

		// /* Logic echo data popular seminggu */
		// for ($a=0; $a < 6; $a++) { 
		// 	for ($s=0; $s < count($popular_data[$a]); $s++) { 
		// 		echo $popular_data[$a][$s]->image."<br>";
		// 	}
		// }
	}

	function insertion_sort($data, $id){
		$n=count($data);
		for ($i = 1;$i<$n;$i++){
			for ($k = $i; $k>0; $k--) {
				if($data[$k]>$data[$k-1]){
					$dummy=$data[$k];
					$dummy_id = $id[$k];
					$data[$k]=$data[$k-1];
					$id[$k] = $id[$k-1];
					$data[$k-1]=$dummy;
					$id[$k-1] = $dummy_id;
				}
			}
		}
		$result = array('id' => $id, 'jumlah' => $data );
		return $result;
	}
	/* End of Popular Seminggu */
}
