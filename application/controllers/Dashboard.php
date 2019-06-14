<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Nama class haru sama persis dengan nama file, termasuk besar kecil nya
class Dashboard extends CI_Controller {

    /**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Dashboard', 'mdashboard');

        if($this->session->userdata('status') != "login"){
			echo "<script>alert('Anda harus masuk terlebih dahulu !!');
                window.location.href='".base_url()."';</script>";
        }

        $this->mdashboard->where('id', $this->session->userdata('id'));
		$user = $this->mdashboard->get('users');
        if(0 >= $user[0]->is_admin && $user[0]->is_admin >= 2) {
            echo "<script>alert('Anda tidak memiliki hak akses !!');
			    window.location.href='".base_url()."';</script>";
        }
    }
	
	/*Berita*/
	public function index()
	{
        $this->mdashboard->where('id', $this->session->userdata('id'));
		$user = $this->mdashboard->get('users');
		$id_logedin = $this->session->userdata('id');
		if ($this->session->userdata('level') == 'Member') {
			$query = "SELECT *,
			articles.`id` AS `idArtikel`,
			categories.`id` AS `idCategory`,
			articles.`slug` AS `slug_article`,
			categories.`slug` AS `slug_category`,
			articles.created_at AS `created_article`,
			categories.created_at AS `created_category`,
			articles.updated_at AS `updated_article`,
			categories.updated_at AS `updated_category`,
			articles.deleted_at AS `deleted_article`,
			categories.deleted_at AS `deleted_category`
			FROM `articles`
			LEFT JOIN `categories` ON `articles`.`category_id` = `categories`.`id`
			WHERE articles.user_id = $id_logedin
			ORDER BY `idArtikel` DESC";
		}else {
			$query = "SELECT *,
			articles.`id` AS `idArtikel`,
			categories.`id` AS `idCategory`,
			articles.`slug` AS `slug_article`,
			categories.`slug` AS `slug_category`,
			articles.created_at AS `created_article`,
			categories.created_at AS `created_category`,
			articles.updated_at AS `updated_article`,
			categories.updated_at AS `updated_category`,
			articles.deleted_at AS `deleted_article`,
			categories.deleted_at AS `deleted_category`
			FROM `articles`
			LEFT JOIN `categories` ON `articles`.`category_id` = `categories`.`id`
			ORDER BY `idArtikel` DESC";
		}
        $data = array('data_berita' => $this->mdashboard->query($query),
        'user' => $user);
        
        $this->load->view('app/dashboard', $data);
	}
	
	public function DetailBerita()
	{
		if ( ! $this->input->get('id')) {
			echo "<script>alert('ID tidak ditemukan !');
			window.location.href='".base_url()."Dashboard';</script>";
		}

		$id = $this->input->get('id');
		$this->mdashboard->where('id', $this->session->userdata('id'));
		$user = $this->mdashboard->get('users');
		$query = "SELECT *,
        articles.`id` AS `idArtikel`,
        categories.`id` AS `idCategory`,
        users.id AS `idUser`,
        articles.`slug` AS `slug_article`,
        categories.`slug` AS `slug_category`,
        articles.created_at AS `created_article`,
        categories.created_at AS `created_category`,
        users.created_at AS `created_user`,
        articles.updated_at AS `updated_article`,
        categories.updated_at AS `updated_category`,
        users.updated_at AS `updated_user`,
        articles.deleted_at AS `deleted_article`,
        categories.deleted_at AS `deleted_category`,
        categories.name AS `category_name`,
        users.name AS `user_name`,
        articles.image AS `img_article`,
        users.image AS `img_user`
        FROM `articles`		
        LEFT JOIN `categories` ON `articles`.`category_id` = `categories`.`id`
		LEFT JOIN `users` ON `articles`.`user_id` = `users`.`id`
		WHERE `articles`.`id` = '$id'";

		$data = array('detail_berita' => $this->mdashboard->query($query),
		'user' => $user);
		
		$this->load->view('app/detailBerita', $data);
	}

    public function ViewAddBerita()
    {
		// $data = array('user' => $this->mdashboard->get('user') );
		// $this->load->view('addBerita', $data);
		$this->mdashboard->where('id', $this->session->userdata('id'));
		$user = $this->mdashboard->get('users');
		$data = array('user' => $user );
        $this->load->view('app/addBerita', $data);
	}
	
	public function AddActionBerita()
	{
		$uploadOK = false;
		if ($this->input->post('submit')) {
			$config['upload_path']    = './assets/uploads/';
			$config['allowed_types']  = 'gif|jpg|png|JPG';
			$config['max_size']       = 100000;
			// $config['overwrite'] 			= TRUE;
			// $config['max_width']            = 1024;
			// $config['max_height']           = 768;
			
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if (!$this->upload->do_upload('berkas')){
				$error = array('error' => $this->upload->display_errors());
				// echo "<script>alert(".$this->upload->display_errors().");
				// window.location.href='".base_url()."Dashboard/ViewAddBerita';</script>";
				// $this->load->view('v_upload', $error);

				$configVideo['upload_path'] = './assets/videos/'; # check path is correct
				$configVideo['max_size'] = '102400';
				$configVideo['allowed_types'] = 'mp4'; # add video extenstion on here
				$configVideo['overwrite'] = FALSE;
				$configVideo['remove_spaces'] = TRUE;

				$this->load->library('upload', $configVideo);
				$this->upload->initialize($configVideo);

				if (!$this->upload->do_upload('berkas')) # form input field attribute
				{
					# Upload Failed
					$this->session->set_flashdata('error', $this->upload->display_errors());
					echo "<script>alert('Sertakan Gambar Berita!');
					window.location.href='".base_url()."Dashboard/ViewAddBerita';</script>";
				}
				else
				{
					# Upload Successfull for video
					$data = $this->upload->data();
					$this->session->set_flashdata('success', 'Video Has been Uploaded');
					$uploadOK = "video";
					$ket = 'Done';
				}
			}else {
				# Upload Successfull for image
				$uploadOK = "img";
			}

			if ($this->input->post('is_publish')) {
				$is_publish = $this->input->post('is_publish');
			}else {
				$is_publish = 0;
			}
			
			if ($uploadOK == "img") {
				$data = $this->upload->data();
				$data_berita = array('title' => $this->input->post('title'),
				'content' => $this->input->post('content'),
				'sub_content' => $this->input->post('subContent'),
				'image' => $data['file_name'],
				'meta_description' => $this->input->post('meta_description'),
				'meta_author' => $this->input->post('meta_author'),
				'meta_keywords' => $this->input->post('meta_keywords'),
				'meta_location' => $this->input->post('meta_location'),
				'tag_article' => $this->input->post('tag_article'),
				'slug' => $this->input->post('slug'),
				'category_id' => $this->input->post('kategori'),
				'category_type' => $this->input->post('category_type'),
				'user_id' => $this->session->userdata('id'),
				'is_publish' => $is_publish,
				'created_at' => date("Y-m-d H:i:s"));

				$insert = $this->db->insert('articles', $data_berita);
				if ($insert) {
					echo "<script>alert('Data Berhasil ditambahkan !');
					window.location.href='".base_url()."Dashboard';</script>";
				}else{
					echo "<script>alert('Data Gagal ditambahkan !');
					window.location.href='".base_url()."Dashboard/ViewAddBerita';</script>";
				}

			}elseif ($uploadOK == "video") {
				$data = $this->upload->data();
				$data_berita = array('title' => $this->input->post('title'),
				'content' => $this->input->post('content'),
				'sub_content' => $this->input->post('subContent'),
				'image' => $data['file_name'],
				'is_video' => 1,
				'meta_description' => $this->input->post('meta_description'),
				'meta_author' => $this->input->post('meta_author'),
				'meta_keywords' => $this->input->post('meta_keywords'),
				'meta_location' => $this->input->post('meta_location'),
				'tag_article' => $this->input->post('tag_article'),
				'slug' => $this->input->post('slug'),
				'category_id' => $this->input->post('kategori'),
				'category_type' => $this->input->post('category_type'),
				'user_id' => $this->session->userdata('id'),
				'is_publish' => $is_publish,
				'created_at' => date("Y-m-d H:i:s"));

				$insert = $this->db->insert('articles', $data_berita);
				if ($insert) {
					echo "<script>alert('Data Berhasil ditambahkan !');
					window.location.href='".base_url()."Dashboard';</script>";
				}else{
					echo "<script>alert('Data Gagal ditambahkan !');
					window.location.href='".base_url()."Dashboard/ViewAddBerita';</script>";
				}
			}
		}else{
			echo "<script>alert('Data Gagal dikirim !');
			window.location.href='".base_url()."Dashboard/ViewAddBerita';</script>";
		}		
	}
	
	public function ViewEditBerita()
	{
		if ( ! $this->input->get('id')) {
			echo "<script>alert('ID tidak ditemukan !');
			window.location.href='".base_url()."Dashboard';</script>";
		}
		$id = $this->input->get('id');
		$this->mdashboard->where('id', $this->session->userdata('id'));
		$user = $this->mdashboard->get('users');
		$this->mdashboard->where('id', $id);
		$data_berita = $this->mdashboard->get('articles');
		$data = array('data_berita' => $data_berita, 'user' => $user );
		$this->load->view('app/editBerita', $data);
	}

	public function EditActionBerita()
	{
		$uploadOK = false;
		$gambar = '';
		$config['upload_path']    = './assets/uploads/';
		$config['allowed_types']  = 'gif|jpg|png';
		$config['max_size']       = 100000;
		// $config['overwrite'] 			= TRUE;
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;
		
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if ($this->input->post('edit_berita')) {
			$id = $this->input->post('id');			
			if ($_FILES['berkas']['name'] != '') {
				$gambar = $_FILES['berkas']['name'];
				$this->mdashboard->where('id', $id);
				foreach ($this->mdashboard->get('articles') as $value) {
					if( file_exists("./assets/uploads/".$value->image)){
						unlink("./assets/uploads/".$value->image);
					}elseif (file_exists("./assets/videos/".$value->image)) {
						unlink("./assets/videos/".$value->image);
					}
				}

				if (!$this->upload->do_upload('berkas')){
					$error = array('error' => $this->upload->display_errors());
					// echo "<script>alert(".$this->upload->display_errors().");
					// window.location.href='".base_url()."Dashboard/ViewAddBerita';</script>";
					// $this->load->view('v_upload', $error);

					$configVideo['upload_path'] = './assets/videos/'; # check path is correct
					$configVideo['max_size'] = '102400';
					$configVideo['allowed_types'] = 'mp4'; # add video extenstion on here
					$configVideo['overwrite'] = FALSE;
					$configVideo['remove_spaces'] = TRUE;

					$this->load->library('upload', $configVideo);
					$this->upload->initialize($configVideo);

					if (!$this->upload->do_upload('berkas')) # form input field attribute
					{
						# Upload Failed
						$this->session->set_flashdata('error', $this->upload->display_errors());
					}
					else
					{
						# Upload Successfull for video
						$data = $this->upload->data();
						$gambar = $data['file_name'];
						$this->session->set_flashdata('success', 'Video Has been Uploaded');
						$uploadOK = "video";
						$ket = 'Done';
					}

				}else{
					$nama_gambar = $this->upload->data();
					$gambar = $nama_gambar['file_name'];
					$uploadOK = "img";
				}

			}else {
				$this->mdashboard->where('id', $id);
				foreach ($this->mdashboard->get('articles') as $value) {
					$gambar = $value->image;
					if ($value->is_video == 1) {
						$uploadOK = "video";
					}elseif ($value->is_video == 0) {
						$uploadOK = "img";
					}

				}
			}

			if ($this->input->post('is_publish')) {
				$is_publish = $this->input->post('is_publish');
			}else {
				$is_publish = 0;
			}

			if ($uploadOK == "img" ) {
				$data = array('title' => $this->input->post('title'),
				'content' => $this->input->post('content'),
				'sub_content' => $this->input->post('subContent'),
				'image' => $gambar,
				'is_video' => 0,
				'meta_description' => $this->input->post('meta_description'),
				'meta_author' => $this->input->post('meta_author'),
				'meta_keywords' => $this->input->post('meta_keywords'),
				'meta_location' => $this->input->post('meta_location'),
				'tag_article' => $this->input->post('tag_article'),
				'slug' => $this->input->post('slug'),
				'category_id' => $this->input->post('kategori'),
				'category_type' => $this->input->post('category_type'),
				'user_id' => $this->session->userdata('id'),
				'is_publish' => $is_publish,
				'created_at' => date("Y-m-d H:i:s"));
				$insert = $this->mdashboard->update('articles', 'id', $id, $data);

				if ($insert) {
					echo "<script>alert('Data Berhasil diubah !');
					window.location.href='".base_url()."Dashboard/';</script>";
				}else{
					echo "<script>alert('Data Gagal diubah !');
					window.location.href='".base_url()."Dashboard/ViewEditBerita?id=$id';</script>";
				}
			}elseif ($uploadOK == "video") {
				$data = array('title' => $this->input->post('title'),
				'content' => $this->input->post('content'),
				'sub_content' => $this->input->post('subContent'),
				'image' => $gambar,
				'is_video' => 1,
				'meta_description' => $this->input->post('meta_description'),
				'meta_author' => $this->input->post('meta_author'),
				'meta_keywords' => $this->input->post('meta_keywords'),
				'meta_location' => $this->input->post('meta_location'),
				'tag_article' => $this->input->post('tag_article'),
				'slug' => $this->input->post('slug'),
				'category_id' => $this->input->post('kategori'),
				'category_type' => $this->input->post('category_type'),
				'user_id' => $this->session->userdata('id'),
				'is_publish' => $is_publish,
				'created_at' => date("Y-m-d H:i:s"));
				$insert = $this->mdashboard->update('articles', 'id', $id, $data);

				if ($insert) {
					echo "<script>alert('Data Berhasil diubah !');
					window.location.href='".base_url()."Dashboard/';</script>";
				}else{
					echo "<script>alert('Data Gagal diubah !');
					window.location.href='".base_url()."Dashboard/ViewEditBerita?id=$id';</script>";
				}
			}

		}else {
			echo "<script>alert('Data Gagal dikirim !');
			window.location.href='".base_url()."Dashboard/ViewEditBerita?id=$id';</script>";
		}
	}

	public function DeleteBerita()
	{
		$is_video = false;
		if (! $this->input->get('id')) {
			echo "<script>alert('ID tidak ditemukan !');
			window.location.href='".base_url()."Dashboard';</script>";
		}
		$id = $this->input->get('id');
		$gambar = '';
		$this->mdashboard->where('id', $id);
		$data_gambar = $this->mdashboard->get('articles');
		foreach ($data_gambar as $value) {
			$gambar = $value->image;
			if ($value->is_video == 1) {
				$is_video = true;
			}else {
				$is_video = false;
			}
		}
		$data = $this->mdashboard->delete('articles', 'id', $id);
		if ($data) {
			if ($is_video) {
				unlink("./assets/videos/".$gambar);
			}else{
				unlink("./assets/uploads/".$gambar);
			}
			echo "<script>alert('Data Berhasil dihapus !');
				window.location.href='".base_url()."Dashboard/';</script>";
		}else{
			echo "<script>alert('Data Gagal dihapus !');
				window.location.href='".base_url()."Dashboard/';</script>";
		}
	}

	public function Gambar()
	{
		$this->mdashboard->where('id', $this->session->userdata('id'));
		$user = $this->mdashboard->get('users');

		$data = array('data_image' => $this->mdashboard->get('articles_images'),
		'user' => $user);
		
		$this->load->view('app/gambarBerita', $data);
	}

	public function DetailImage()
	{
		if (! $this->input->get('id')) {
			echo "<script>alert('ID tidak ditemukan !');
			window.location.href='".base_url()."Dashboard/Gambar';</script>";
		}

		$this->mdashboard->where('id', $this->session->userdata('id'));
		$user = $this->mdashboard->get('users');

		$id = $this->input->get('id');
		$this->mdashboard->where('id', $id);
		$data_gambar = $this->mdashboard->get('articles_images');
		$data = array('detail_image' => $data_gambar, 'user' => $user);

		$this->load->view('app/detailGambar', $data);
	}

	public function TambahGambarBerita()
	{
		if ($this->input->post('submit')) {
			$config['upload_path']    = './assets/uploads/';
			$config['allowed_types']  = 'gif|jpg|png';
			$config['max_size']       = 100000;
			// $config['overwrite'] 			= TRUE;
			// $config['max_width']            = 1024;
			// $config['max_height']           = 768;
			
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload('berkas')){
				$error = array('error' => $this->upload->display_errors());
				echo "<script>alert(".$this->upload->display_errors().");
				window.location.href='".base_url()."Dashboard/ViewAddBerita';</script>";
				// $this->load->view('v_upload', $error);
			}else{
				$data = $this->upload->data();
				$data_gambar = array('id_article' => $this->input->post('id_article'),
				'image_name' => $data['file_name'],
				'description' => $this->input->post('description'),
				'created_at' => date("Y-m-d H:i:s"));

				$insert = $this->db->insert('articles_images', $data_gambar);
				if ($insert) {
					echo "<script>alert('Data Berhasil ditambahkan !');
					window.location.href='".base_url()."Dashboard/Gambar';</script>";
				}else{
					echo "<script>alert('Data Gagal ditambahkan !');
					window.location.href='".base_url()."Dashboard/Gambar';</script>";
				}
			}
		}else{
			echo "<script>alert('Data Gagal dikirim !');
			window.location.href='".base_url()."Dashboard/ViewAddBerita';</script>";
		}
	}

	public function ViewEditImage()
	{
		if ( ! $this->input->get('id')) {
			echo "<script>alert('ID tidak ditemukan !');
			window.location.href='".base_url()."Dashboard';</script>";
		}
		$id = $this->input->get('id');
		$this->mdashboard->where('id', $this->session->userdata('id'));
		$user = $this->mdashboard->get('users');
		$this->mdashboard->where('id', $id);
		$data_image = $this->mdashboard->get('articles_images');
		$data = array('data_image' => $data_image, 'user' => $user );
		$this->load->view('app/editImage', $data);
	}

	public function EditActionImage()
	{
		$gambar = '';
		$config['upload_path']    = './assets/uploads/';
		$config['allowed_types']  = 'gif|jpg|png';
		$config['max_size']       = 100000;
		// $config['overwrite'] 			= TRUE;
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;
		
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if ($this->input->post('edit_image')) {
			$id = $this->input->post('id');			
			if ($_FILES['berkas']['name'] != '') {
				$gambar = $_FILES['berkas']['name'];
				$this->mdashboard->where('id', $id);
				foreach ($this->mdashboard->get('articles_images') as $value) {
					if( file_exists("./assets/uploads/".$value->image_name)){
						unlink("./assets/uploads/".$value->image_name);
					}
				}

				if ( ! $this->upload->do_upload('berkas')){
					$error = array('error' => $this->upload->display_errors());
					echo "<script>alert(".$this->upload->display_errors().");
					window.location.href='".base_url()."Dashboard/ViewAddBerita';</script>";
					// $this->load->view('v_upload', $error);
				}else{
					$nama_gambar = $this->upload->data();
					$gambar = $nama_gambar['file_name'];
				}

			}else {
				$this->mdashboard->where('id', $id);
				foreach ($this->mdashboard->get('articles_images') as $value) {
					$gambar = $value->image_name;
				}
			}

			$data_gambar = array('id_article' => $this->input->post('id_article'),
				'image_name' => $gambar,
				'description' => $this->input->post('description'),
				'created_at' => date("Y-m-d H:i:s"));

			$insert = $this->mdashboard->update('articles_images', 'id', $id, $data_gambar);

			if ($insert) {
				echo "<script>alert('Data Berhasil diubah !');
				window.location.href='".base_url()."Dashboard/Gambar';</script>";
			}else{
				echo "<script>alert('Data Gagal diubah !');
				window.location.href='".base_url()."Dashboard/ViewEditImage?id=$id';</script>";
			}
		}else {
			echo "<script>alert('Data Gagal dikirim !');
			window.location.href='".base_url()."Dashboard/ViewEditImage?id=$id';</script>";
		}
	}

	public function DeleteImage()
	{
		if (! $this->input->get('id')) {
			echo "<script>alert('ID tidak ditemukan !');
			window.location.href='".base_url()."Dashboard/Gambar';</script>";
		}
		$id = $this->input->get('id');
		$gambar = '';
		$this->mdashboard->where('id', $id);
		$data_gambar = $this->mdashboard->get('articles_images');
		foreach ($data_gambar as $value) {
			$gambar = $value->image_name;
		}
		$data = $this->mdashboard->delete('articles_images', 'id', $id);
		if ($data) {
			unlink("./assets/uploads/".$gambar);
			echo "<script>alert('Data Berhasil dihapus !');
				window.location.href='".base_url()."Dashboard/Gambar';</script>";
		}else{
			echo "<script>alert('Data Gagal dihapus !');
				window.location.href='".base_url()."Dashboard/Gambar';</script>";
		}
	}

	public function User()
	{
		$this->mdashboard->where('id', $this->session->userdata('id'));
		$user = $this->mdashboard->get('users');
        $data = array('all_user' => $this->mdashboard->get('users'),
        'user' => $user);
        
        $this->load->view('app/user', $data);
	}

	public function viewEditUser()
	{
		if ( ! $this->input->get('id')) {
			echo "<script>alert('ID tidak ditemukan !');
			window.location.href='".base_url()."Dashboard/user';</script>";
		}
		$id = $this->input->get('id');
		$this->mdashboard->where('id', $this->session->userdata('id'));
		$user = $this->mdashboard->get('users');
		$this->mdashboard->where('id', $id);
		$data_user = $this->mdashboard->get('users');
		$data = array('data_user' => $data_user, 'user' => $user );
		$this->load->view('app/editUser', $data);
	}

	public function Kategori()
	{
		$this->mdashboard->where('id', $this->session->userdata('id'));
		$user = $this->mdashboard->get('users');
        $data = array('data_kategori' => $this->mdashboard->get('categories'),
        'user' => $user);
        
        $this->load->view('app/kategori', $data);
	}

	public function addActionKategori()
	{
		if ($this->input->post('submit')) {
            
            $input = array('name' => $this->input->post('name'),
            'slug' => $this->input->post('slug'),
			'created_at' => date('Y-m-d H:i:s'));

            $post = $this->mdashboard->insert('categories', $input);
            if ($post) {
                echo "<script>alert('Data Berhasil Ditambahkan');
                window.location.href='".base_url()."dashboard/kategori';</script>";
            }else {
                echo "<script>alert('Data gagal ditambahkan !!');
                window.location.href='".base_url()."dashboard/kategori';</script>";
            }
        }
	}

	public function viewEditKategori()
	{
		if ( ! $this->input->get('id')) {
			echo "<script>alert('ID tidak ditemukan !');
			window.location.href='".base_url()."Dashboard/kategori';</script>";
		}
		$id = $this->input->get('id');
		$this->mdashboard->where('id', $this->session->userdata('id'));
		$user = $this->mdashboard->get('users');
		$this->mdashboard->where('id', $id);
		$data_kategori = $this->mdashboard->get('categories');
		$data = array('data_kategori' => $data_kategori, 'user' => $user );
		$this->load->view('app/editKategori', $data);
	}

	public function editActionKategori()
	{
		if ($this->input->post('edit_kategori')) {
			$id = $this->input->post('id');		

			$input = array('name' => $this->input->post('name'),
			'sub_category1' => $this->input->post('sub_category1'),
			'sub_category2' => $this->input->post('sub_category2'),
			'sub_category3' => $this->input->post('sub_category3'),
			'sub_category4' => $this->input->post('sub_category4'),
			'sub_category5' => $this->input->post('sub_category5'),
            'slug' => $this->input->post('slug'),
			'updated_at' => date('Y-m-d H:i:s'));

			$insert = $this->mdashboard->update('categories', 'id', $id, $input);

			if ($insert) {
				echo "<script>alert('Data Berhasil diubah !');
				window.location.href='".base_url()."Dashboard/kategori';</script>";
			}else{
				echo "<script>alert('Data Gagal diubah !');
				window.location.href='".base_url()."Dashboard/ViewEditKategori?id=$id';</script>";
			}
		}else {
			echo "<script>alert('Data Gagal dikirim !');
			window.location.href='".base_url()."Dashboard/ViewEditKategori?id=$id';</script>";
		}
	}

	public function DeleteKategori()
	{
		if (! $this->input->get('id')) {
			echo "<script>alert('ID tidak ditemukan !');
			window.location.href='".base_url()."Dashboard/Gambar';</script>";
		}
		$id = $this->input->get('id');
		$data = $this->mdashboard->delete('categories', 'id', $id);
		if ($data) {
			echo "<script>alert('Data Berhasil dihapus !');
				window.location.href='".base_url()."Dashboard/kategori';</script>";
		}else{
			echo "<script>alert('Data Gagal dihapus !');
				window.location.href='".base_url()."Dashboard/kategori';</script>";
		}
	}

	public function test()
	{
		$query = "SELECT id FROM `articles`
		WHERE created_at >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY
		AND created_at < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY";
		$query1 = "SELECT id from tbname
		where date between date_sub(now(),INTERVAL 1 WEEK) and now()";
		
		$data = $this->db->query($query);

		foreach ($data->result() as $key => $value) {
			echo $value->created_at."<br>";
		}
	}

	public function Setting()
	{
		$this->mdashboard->where('id', $this->session->userdata('id'));
		$user = $this->mdashboard->get('users');
        $data = array('data_setting' => $this->mdashboard->get('settings'),
        'user' => $user);
        
        $this->load->view('app/setting', $data);
	}

	public function addActionSetting()
	{
		if ($this->input->post('submit')) {
            
            $input = array('key' => $this->input->post('key'),
            'value' => $this->input->post('value'),
			'created_at' => date('Y-m-d H:i:s'));

            $post = $this->mdashboard->insert('settings', $input);
            if ($post) {
                echo "<script>alert('Data Berhasil Ditambahkan');
                window.location.href='".base_url()."dashboard/setting';</script>";
            }else {
                echo "<script>alert('Data gagal ditambahkan !!');
                window.location.href='".base_url()."dashboard/setting';</script>";
            }
        }
	}

	public function viewEditSetting()
	{
		if ( ! $this->input->get('id')) {
			echo "<script>alert('ID tidak ditemukan !');
			window.location.href='".base_url()."Dashboard/setting';</script>";
		}
		$id = $this->input->get('id');
		$this->mdashboard->where('id', $this->session->userdata('id'));
		$user = $this->mdashboard->get('users');
		$this->mdashboard->where('id', $id);
		$data_setting = $this->mdashboard->get('settings');
		$data = array('data_setting' => $data_setting, 'user' => $user );
		$this->load->view('app/editSetting', $data);
	}

	public function editActionSetting()
	{
		if ($this->input->post('edit_setting')) {
			$id = $this->input->post('id');		

			$input = array('key' => $this->input->post('key'),
			'value' => $this->input->post('value'),
			'updated_at' => date('Y-m-d H:i:s'));

			$insert = $this->mdashboard->update('settings', 'id', $id, $input);

			if ($insert) {
				echo "<script>alert('Data Berhasil diubah !');
				window.location.href='".base_url()."Dashboard/Setting';</script>";
			}else{
				echo "<script>alert('Data Gagal diubah !');
				window.location.href='".base_url()."Dashboard/ViewEditSetting?id=$id';</script>";
			}
		}else {
			echo "<script>alert('Data Gagal dikirim !');
			window.location.href='".base_url()."Dashboard/ViewEditSetting?id=$id';</script>";
		}
	}

	public function Complain()
	{
		$this->mdashboard->where('id', $this->session->userdata('id'));
		$user = $this->mdashboard->get('users');
        $data = array('data_complain' => $this->mdashboard->get('complains'),
        'user' => $user);
        
        $this->load->view('app/complain', $data);
	}

	public function ReplyComplain()
	{
		if ($this->input->post('submit')) {

			//Load email library
			$this->load->library('email');

			//SMTP & mail configuration
			$config = array(
				'protocol'  => 'smtp',
				'smtp_host' => 'mail.sebuahlabs.online',
				'smtp_port' => 587,
				'smtp_user' => 'pengaduan@sebuahlabs.online',
				'smtp_pass' => 'qQY4EPPLUWgy6un',
				'mailtype'  => 'html',
				'charset'   => 'utf-8'
			);
			$this->email->initialize($config);
			$this->email->set_mailtype("html");
			$this->email->set_newline("\r\n");

			//Email content
			$htmlContent = $this->input->post('reply_complain');
			$email_to = $this->input->post('email_to');
			$id_complain = $this->input->post('id');

			$this->email->to($email_to);
			$this->email->from('pengaduan@sebuahlabs.online','Keptiv Pengaduan');
			$this->email->subject('Reply Complain');
			$this->email->message($htmlContent);

			//Send email
			if ($this->email->send()) {
				$input = array('reply' => $this->input->post('reply_complain'),
				'status' => 1,
				'updated_at' => date('Y-m-d H:i:s'));

				$post = $this->mdashboard->update('complains', 'id', $id_complain, $input);
				if ($post) {
					echo "<script>alert('Reply terkirim');
					window.location.href='".base_url()."dashboard/Complain';</script>";
				}else {
					echo "<script>alert('Reply gagal dikirim !!');
					window.location.href='".base_url()."dashboard/Complain';</script>";
				}
			}else {
				echo "<script>alert('Reply tidak dikirim oleh sistem  !!');
					window.location.href='".base_url()."dashboard/Complain';</script>";
			}
		}else {
			echo "<script>alert('Reply tidak dikirim !!');
				window.location.href='".base_url()."dashboard/Complain';</script>";
		}
	}

	public function Advertisement()
	{
		$this->mdashboard->where('id', $this->session->userdata('id'));
		$user = $this->mdashboard->get('users');
        $data = array('data_advertisement' => $this->mdashboard->get('advertisements'),
        'user' => $user);
        
        $this->load->view('app/advertisement', $data);
	}

	public function viewEditAdvertisement()
	{
		if ( ! $this->input->get('id')) {
			echo "<script>alert('ID tidak ditemukan !');
			window.location.href='".base_url()."Dashboard/advertisement';</script>";
		}
		$id = $this->input->get('id');
		$this->mdashboard->where('id', $this->session->userdata('id'));
		$user = $this->mdashboard->get('users');
		$this->mdashboard->where('id', $id);
		$data_advertisement = $this->mdashboard->get('advertisements');
		$data = array('data_advertisement' => $data_advertisement, 'user' => $user );
		$this->load->view('app/editAdvertisement', $data);
	}

	public function editActionAdvertisement()
	{
		$uploadOK = false;
		$gambar = '';
		$config['upload_path']    = './assets/advertisement/';
		$config['allowed_types']  = 'gif|jpg|png';
		$config['max_size']       = 100000;
		// $config['overwrite'] 			= TRUE;
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;
		
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if ($this->input->post('edit_advertisement')) {
			$id = $this->input->post('id');	
			if ($_FILES['berkas']['name'] != '') {
				$gambar = $_FILES['berkas']['name'];
				$this->mdashboard->where('id', $id);
				foreach ($this->mdashboard->get('advertisements') as $value) {
					if( file_exists("./assets/advertisement/".$value->image)){
						unlink("./assets/advertisement/".$value->image);
					}
				}

				if (!$this->upload->do_upload('berkas')){
					$error = array('error' => $this->upload->display_errors());
					echo "<script>alert(".$this->upload->display_errors().");
					window.location.href='".base_url()."Dashboard/advertisement';</script>";
					// $this->load->view('v_upload', $error);

				}else{
					$nama_gambar = $this->upload->data();
					$gambar = $nama_gambar['file_name'];
					$uploadOK = true;
				}

			}else {
				$this->mdashboard->where('id', $id);
				foreach ($this->mdashboard->get('advertisements') as $value) {
					$gambar = $value->image;
					$uploadOK = true;

				}
			}

			if ($uploadOK == true ) {
				$input = array('name' => $this->input->post('name'),
				'image' => $gambar,
				'url' => $this->input->post('url'),
				'status' => $this->input->post('status'),
				'position' => $this->input->post('position'),
				'updated_at' => date("Y-m-d H:i:s"));

				$insert = $this->mdashboard->update('advertisements', 'id', $id, $input);

				if ($insert) {
					echo "<script>alert('Data Berhasil diubah !');
					window.location.href='".base_url()."Dashboard/Advertisement';</script>";
				}else{
					echo "<script>alert('Data Gagal diubah !');
					window.location.href='".base_url()."Dashboard/ViewEditAdvertisement?id=$id';</script>";
				}
			}
		}else {
			echo "<script>alert('Data Gagal dikirim !');
			window.location.href='".base_url()."Dashboard/ViewEditAdevertisement?id=$id';</script>";
		}
	}

	public function BeritaReview()
	{
		$this->mdashboard->where('id', $this->session->userdata('id'));
		$user = $this->mdashboard->get('users');
		$query = "SELECT *,
        articles.`id` AS `idArtikel`,
        categories.`id` AS `idCategory`,
        articles.`slug` AS `slug_article`,
        categories.`slug` AS `slug_category`,
        articles.created_at AS `created_article`,
        categories.created_at AS `created_category`,
        articles.updated_at AS `updated_article`,
        categories.updated_at AS `updated_category`,
        articles.deleted_at AS `deleted_article`,
        categories.deleted_at AS `deleted_category`
        FROM `articles`
		LEFT JOIN `categories` ON `articles`.`category_id` = `categories`.`id`
        WHERE articles.is_publish != 1 AND articles.is_publish != 3 AND articles.is_publish != 4
		ORDER BY `idArtikel` DESC";
        $data = array('data_berita' => $this->mdashboard->query($query),
		'user' => $user);
        
        $this->load->view('app/berita_review', $data);
	}

	public function BeritaSugest()
	{
		if ($this->input->post('submit')) {
			$id = $this->input->post('id');		

			$input = array('sugest' => $this->input->post('sugest'),
			'is_publish' => 5,
			'updated_at' => date('Y-m-d H:i:s'));

			$insert = $this->mdashboard->update('articles', 'id', $id, $input);

			if ($insert) {
				echo "<script>alert('Sugest berhasil dikirim !');
				window.location.href='".base_url()."Dashboard/BeritaReview';</script>";
			}else{
				echo "<script>alert('Sugest gagal dikirim !');
				window.location.href='".base_url()."Dashboard/BeritaReview';</script>";
			}
		}else {
			echo "<script>alert('Sugest tidak terkirim !');
			window.location.href='".base_url()."Dashboard/BeritaReview';</script>";
		}
	}

	public function AcceptFor()
	{
		if ($this->input->post('publish')) {
			$id = $this->input->post('id');
			$accept = $this->input->post('publish');

			$input = array('is_publish' => $accept,
			'updated_at' => date('Y-m-d H:i:s'));

			$insert = $this->mdashboard->update('articles', 'id', $id, $input);

			if ($insert) {
				echo "<script>alert('Berita berhasil di publish !');
				window.location.href='".base_url()."Dashboard/BeritaReview';</script>";
			}else{
				echo "<script>alert('Berita gagal di publish !');
				window.location.href='".base_url()."Dashboard/BeritaReview';</script>";
			}
		}elseif ($this->input->post('submit')) {
			$id = $this->input->post('id');

			$is_headline = $is_umum = $is_sorotan = $is_pilihanredaksi = $is_spesial = $is_kutipan = 0;
			if ($this->input->post('is_headline') != '') {
				$is_headline = $this->input->post('is_headline');
			}
			if ($this->input->post('is_umum') != '') {
				$is_umum = $this->input->post('is_umum');
			}
			if ($this->input->post('is_sorotan') != '') {
				$is_sorotan = $this->input->post('is_sorotan');
			}
			if ($this->input->post('is_pilihanredaksi') != '') {
				$is_pilihanredaksi = $this->input->post('is_pilihanredaksi');
			}
			if ($this->input->post('is_spesial') != '') {
				$is_spesial = $this->input->post('is_spesial');
			}
			if ($this->input->post('is_kutipan') != '') {
				$is_kutipan = $this->input->post('is_kutipan');
			}

			$input = array('is_publish' => 1,
			'is_headline' => $is_headline,
			'is_umum' => $is_umum,
			'is_sorotan' => $is_sorotan,
			'is_pilihanredaksi' => $is_pilihanredaksi,
			'is_spesial' => $is_spesial,
			'is_kutipan' => $is_kutipan,
			'updated_at' => date('Y-m-d H:i:s'));

			$insert = $this->mdashboard->update('articles', 'id', $id, $input);

			if ($insert) {
				echo "<script>alert('Berita berhasil di accept !');
				window.location.href='".base_url()."Dashboard/BeritaReview';</script>";
			}else{
				echo "<script>alert('Berita gagal di accept !');
				window.location.href='".base_url()."Dashboard/BeritaReview';</script>";
			}
		}else {
			echo "<script>alert('Berita gagal di konfirmasi !');
			window.location.href='".base_url()."Dashboard/BeritaReview';</script>";
		}
	}

	public function BeritaPublished()
	{
		$this->mdashboard->where('id', $this->session->userdata('id'));
		$user = $this->mdashboard->get('users');
		$query = "SELECT *,
        articles.`id` AS `idArtikel`,
        categories.`id` AS `idCategory`,
        articles.`slug` AS `slug_article`,
        categories.`slug` AS `slug_category`,
        articles.created_at AS `created_article`,
        categories.created_at AS `created_category`,
        articles.updated_at AS `updated_article`,
        categories.updated_at AS `updated_category`,
        articles.deleted_at AS `deleted_article`,
        categories.deleted_at AS `deleted_category`
        FROM `articles`
		LEFT JOIN `categories` ON `articles`.`category_id` = `categories`.`id`
        WHERE articles.is_publish = 1 OR articles.is_publish = 3 OR articles.is_publish = 4
		ORDER BY `idArtikel` DESC";
        $data = array('data_berita' => $this->mdashboard->query($query),
		'user' => $user);
        
        $this->load->view('app/berita_published', $data);
	}

	public function Profile()
	{
		if ( ! $this->session->userdata('id')) {
			echo "<script>alert('ID tidak ditemukan !');
			window.location.href='".base_url()."Dashboard/';</script>";
		}

		// $id = $this->input->get('id');
		$this->mdashboard->where('id', $this->session->userdata('id'));
		$user = $this->mdashboard->get('users');
		// $this->mdashboard->where('id', $id);
		// $detail_profile = $this->mdashboard->get('users');

		$data = array('detail_profile' => $user,
		'user' => $user);
		
		$this->load->view('app/profile', $data);
	}

	public function ViewEditProfile()
	{
		if ( ! $this->session->userdata('id')) {
			echo "<script>alert('ID tidak ditemukan !');
			window.location.href='".base_url()."Dashboard/profile';</script>";
		}
		// $id = $this->input->get('id');
		$this->mdashboard->where('id', $this->session->userdata('id'));
		$user = $this->mdashboard->get('users');
		// $this->mdashboard->where('id', $id);
		// $data_profile = $this->mdashboard->get('users');
		$data = array('data_profile' => $user, 'user' => $user );
		$this->load->view('app/editProfile', $data);
	}

	public function EditActionProfile()
	{
		$uploadOK = false;
		$gambar = '';
		$config['upload_path']    = './assets/avatar/';
		$config['allowed_types']  = 'gif|jpg|png';
		$config['max_size']       = 100000;
		// $config['overwrite'] 			= TRUE;
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;
		
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if ($this->input->post('edit_profile')) {
			$id = $this->input->post('id');			
			if ($_FILES['berkas']['name'] != '') {
				$gambar = $_FILES['berkas']['name'];
				$this->mdashboard->where('id', $id);
				foreach ($this->mdashboard->get('articles') as $value) {
					if( file_exists("./assets/avatar/".$value->image)){
						unlink("./assets/avatar/".$value->image);
					}
				}

				if (!$this->upload->do_upload('berkas')){
					$error = array('error' => $this->upload->display_errors());
					echo "<script>alert(".$this->upload->display_errors().");
					window.location.href='".base_url()."Dashboard/ViewEditProfile?id=$id';</script>";
					// $this->load->view('v_upload', $error);

				}else{
					$nama_gambar = $this->upload->data();
					$gambar = $nama_gambar['file_name'];
					$uploadOK = true;
				}
			}else {
				$this->mdashboard->where('id', $id);
				foreach ($this->mdashboard->get('users') as $value) {
					$gambar = $value->image;
					$uploadOK = true;

				}
			}

			if ($uploadOK) {
				if ($this->input->post('new_pass') != '') {
					if ($this->input->post('new_pass') === $this->input->post('re_pass')) {
						$data = array('username' => $this->input->post('username'),
						'name' => $this->input->post('name'),
						'email' => $this->input->post('email'),
						'jenis_kelamin' => $this->input->post('jenis_kelamin'),
						'password' => password_hash($this->input->POST('new_pass'), PASSWORD_DEFAULT),
						'image' => $gambar,
						'about_me' => $this->input->post('about_me'),
						'updated_at' => date("Y-m-d H:i:s"));
					}else {
						echo "<script>alert('Data Gagal diubah!');
						window.location.href='".base_url()."Dashboard/ViewEditProfile?id=$id';</script>";
					}
				}else {
					$data = array('username' => $this->input->post('username'),
						'name' => $this->input->post('name'),
						'email' => $this->input->post('email'),
						'jenis_kelamin' => $this->input->post('jenis_kelamin'),
						'image' => $gambar,
						'about_me' => $this->input->post('about_me'),
						'updated_at' => date("Y-m-d H:i:s"));
				}
				$insert = $this->mdashboard->update('users', 'id', $id, $data);

				if ($insert) {
					echo "<script>alert('Data Berhasil diubah!');
					window.location.href='".base_url()."Dashboard/profile';</script>";
				}else{
					echo "<script>alert('Data Gagal diubah!');
					window.location.href='".base_url()."Dashboard/ViewEditProfile?id=$id';</script>";
				}
			}

		}else {
			echo "<script>alert('Data Gagal dikirim !');
			window.location.href='".base_url()."Dashboard/ViewEditProfile?id=$id';</script>";
		}
	}
}
