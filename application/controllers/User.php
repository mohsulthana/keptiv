<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Nama class haru sama persis dengan nama file, termasuk besar kecil nya
class User extends CI_Controller {

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
        $this->load->model('m_user');
        $this->load->library(['google', 'fb']);
        
    }
    /* User Controller */
    public function Masuk()
    {
        if ($this->input->post('email')) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $this->db->where('email', $email);
            $query = $this->db->get('users');
            $data = $query->row_array(); // get the row first
            

            if (!empty($data) && password_verify($password, $data['password'])) {
                $this->mdashboard->where('id', $data['id']);
                $user = $this->mdashboard->get('users');
                foreach ($user as $key => $value) {
                    if ($value->is_admin == 0) {
                        $data_session = array('id' => $data['id'], 'status' => "login", 'name' => $data['name'], 'img-profile' => $data['image'], 'level' => 'Member');
                        $this->session->set_userdata($data_session);
                    }elseif ($value->is_admin == 1) {
                        $data_session = array('id' => $data['id'], 'status' => "login", 'name' => $data['name'], 'img-profile' => $data['image'], 'level' => 'Admin');
                        $this->session->set_userdata($data_session);
                    }elseif ($value->is_admin == 2) {
                        $data_session = array('id' => $data['id'], 'status' => "login", 'name' => $data['name'], 'img-profile' => $data['image'], 'level' => 'Super Admin');
                        $this->session->set_userdata($data_session);
                    }
                }
                // if this username exists, and the input password is verified using password_verify
                redirect(base_url());
            } else {
                echo "<script>alert('Username dan Password salah !');
                window.location.href='".base_url()."';</script>";
            }
        }else {
            echo "<script>alert('Username dan Password salah !');
                window.location.href='".base_url()."';</script>";
        }
    }

    /* Redirect URI from login google */
    public function google_login_callback() {
        $client = $this->google->get_client();

        $access_token = $this->session->userdata('goggle_access_token');
		$code 		  = $this->input->get('code');
		if (!empty($access_token)) {
			$client->setAccessToken($access_token);
		} elseif (!empty($code)) {
			$token = $client->fetchAccessTokenWithAuthCode($code);
			$this->session->set_userdata('goggle_access_token', $token);
		} else {
			redirect('auth');
		}
		$oAuth    = new Google_Service_Oauth2($client);
        $userdata = $oAuth->userinfo_v2_me->get();

        $username = explode('@',$userdata->email);
        $username = $username[0];

        $name = $userdata->name;

        if ($name == NULL) {
            $name = $username;
        }

        $data = [
            'username' => $username,
            'name' => $name,
            'email' => $userdata->email,
            'image' => $userdata->picture,
            'is_admin' => 0,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $login = $this->m_user->check_login_google($data);

        if($login) {
            $data_session = array('id' => $login['id'], 'status' => "login", 'name' => $login['name'], 'img-profile' => $login['image'], 'level' => 'Member');
            $this->session->set_userdata($data_session);
            redirect(base_url());
        }
    }

    function fb_callback() {
        $client = $this->fb->get_client();

        $helper = $client->getRedirectLoginHelper();

        try {
            $accessToken = $helper->getAccessToken();
          } catch(Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
          } catch(Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
          }
          
          if (! isset($accessToken)) {
            if ($helper->getError()) {
              header('HTTP/1.0 401 Unauthorized');
              echo "Error: " . $helper->getError() . "\n";
              echo "Error Code: " . $helper->getErrorCode() . "\n";
              echo "Error Reason: " . $helper->getErrorReason() . "\n";
              echo "Error Description: " . $helper->getErrorDescription() . "\n";
            } else {
              header('HTTP/1.0 400 Bad Request');
              echo 'Bad request';
            }
            exit;
          }
          
          // Logged in
        //   echo '<h3>Access Token</h3>';
        //   var_dump($accessToken->getValue());
          
          // The OAuth 2.0 client handler helps us manage access tokens
          $oAuth2Client = $client->getOAuth2Client();
          
          // Get the access token metadata from /debug_token
        //   $tokenMetadata = $oAuth2Client->debugToken($accessToken);
        //   echo '<h3>Metadata</h3>';
        //   var_dump($tokenMetadata);
          
          // Validation (these will throw FacebookSDKException's when they fail)
          $this->load->config('fb');
          $tokenMetadata->validateAppId($this->config->item('fb_client_id')); // Replace {app-id} with your app id
          // If you know the user ID this access token belongs to, you can validate it here
          //$tokenMetadata->validateUserId('123');
          $tokenMetadata->validateExpiration();
          
          if (! $accessToken->isLongLived()) {
            // Exchanges a short-lived access token for a long-lived one
            try {
              $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
            } catch (Facebook\Exceptions\FacebookSDKException $e) {
              echo "<p>Error getting long-lived access token: " . $e->getMessage() . "</p>\n\n";
              exit;
            }
          
            // echo '<h3>Long-lived</h3>';
            // var_dump($accessToken->getValue());

            try {
                // Returns a `Facebook\FacebookResponse` object
                $response = $client->get('/me?fields=id,name', $accessToken->getValue());
              } catch(Facebook\Exceptions\FacebookResponseException $e) {
                echo 'Graph returned an error: ' . $e->getMessage();
                exit;
              } catch(Facebook\Exceptions\FacebookSDKException $e) {
                echo 'Facebook SDK returned an error: ' . $e->getMessage();
                exit;
              }
              
              $user = $response->getGraphUser();

              if($user) {
                var_dump($user);
              }
          }
          
    }
    
    public function Daftar()
    {
        if ($this->input->post('submit')) {
            if ($this->input->post('is_admin') != '') {
                $is_admin = $this->input->post('is_admin');
            }else {
                $is_admin = 0;
            }
            $input = array('username' => $this->input->post('username'),
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'password' => password_hash($this->input->POST('password'), PASSWORD_DEFAULT),
            'is_admin' => $is_admin,
            'created_at' => date('Y-m-d H:i:s'));

            $password = $this->input->post('password');
            $conf_password = $this->input->post('conf_password');

            if ($password === $conf_password) {
                $post = $this->mdashboard->insert('users', $input);
            }else {
                $post = false;
            }
            if ($post) {
                echo "<script>alert('Anda Berhasil Daftar');
                window.location.href='".base_url()."';</script>";
            }else {
                echo "<script>alert('Anda gagal daftar !!');
                window.location.href='".base_url()."';</script>";
            }
        }
    }

    public function logout(){
        $gclient = $this->google->get_client();

        $gclient->revokeToken();
        $this->session->unset_userdata('goggle_access_token');

		$this->session->sess_destroy();
		echo "<script>alert('Anda dikeluarkan oleh sistem !!');
            window.location.href='".base_url()."';</script>";
    }

    public function editActionUser()
    {
        $gambar = '';
		$config['upload_path']    = './assets/avatar/';
		$config['allowed_types']  = 'gif|jpg|png';
		$config['max_size']       = 100000;
		// $config['overwrite'] 			= TRUE;
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;
		
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if ($this->input->post('edit_user')) {
            $id = $this->input->post('id');
            if ($this->input->post('is_admin') != '') {
                $is_admin = $this->input->post('is_admin');
            }else {
                $is_admin = 0;
            }
			if ($_FILES['berkas']['name'] != '') {
				$gambar = $_FILES['berkas']['name'];
				$this->mdashboard->where('id', $id);
				foreach ($this->mdashboard->get('users') as $value) {
					if( file_exists("./assets/avatar/".$value->image)){
						unlink("./assets/avatar/".$value->image);
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
				foreach ($this->mdashboard->get('users') as $value) {
					$gambar = $value->image;
				}
			}

            $input = array('username' => $this->input->post('username'),
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'image' => $gambar,
            'about_me' => $this->input->post('about_me'),
            'is_admin' => $is_admin,
            'updated_at' => date('Y-m-d H:i:s'));

			$insert = $this->mdashboard->update('users', 'id', $id, $input);

			if ($insert) {
				echo "<script>alert('Data Berhasil diubah !');
				window.location.href='".base_url()."Dashboard/user';</script>";
			}else{
				echo "<script>alert('Data Gagal diubah !');
				window.location.href='".base_url()."Dashboard/ViewEditUser?id=$id';</script>";
			}
		}else {
			echo "<script>alert('Data Gagal dikirim !');
			window.location.href='".base_url()."Dashboard/ViewEditUser?id=$id';</script>";
		}
    }

    public function DeleteUser()
    {
        if (! $this->input->get('id')) {
			echo "<script>alert('ID tidak ditemukan !');
			window.location.href='".base_url()."Dashboard/user';</script>";
		}
		$id = $this->input->get('id');
		$gambar = '';
		$this->mdashboard->where('id', $id);
		$data_user = $this->mdashboard->get('users');
		foreach ($data_user as $value) {
			$gambar = $value->image;
		}
		$data = $this->mdashboard->delete('users', 'id', $id);
		if ($data) {
			unlink("./assets/avatar/".$gambar);
			echo "<script>alert('Data Berhasil dihapus !');
				window.location.href='".base_url()."Dashboard/user';</script>";
		}else{
			echo "<script>alert('Data Gagal dihapus !');
				window.location.href='".base_url()."Dashboard/user';</script>";
		}
    }

    public function UnlockUser()
    {
        if ($this->input->get('id') == '') {
            echo "<script>alert('ID tidak ditemukan !');
				window.location.href='".base_url()."Dashboard/user';</script>";
        }

        $id = $this->input->get('id');
        $unlock_user = array('is_banned' => 0);
        $insert = $this->mdashboard->update('users', 'id', $id, $unlock_user);

        if ($insert) {
            echo "<script>alert('User aktif !');
				window.location.href='".base_url()."Dashboard/user';</script>";
        }else {
            echo "<script>alert('ID tidak ditemukan !');
				window.location.href='".base_url()."Dashboard/user';</script>";
        }
    }

    public function LockUser()
    {
        if ($this->input->get('id') == '') {
            echo "<script>alert('ID tidak ditemukan !');
				window.location.href='".base_url()."Dashboard/user';</script>";
        }

        $id = $this->input->get('id');
        $lock_user = array('is_banned' => 1);
        $insert = $this->mdashboard->update('users', 'id', $id, $lock_user);

        if ($insert) {
            echo "<script>alert('User Locked !');
				window.location.href='".base_url()."Dashboard/user';</script>";
        }else {
            echo "<script>alert('ID tidak ditemukan !');
				window.location.href='".base_url()."Dashboard/user';</script>";
        }
    }

    public function UpPosition()
    {
        if ($this->input->get('id') == '') {
            echo "<script>alert('ID tidak ditemukan !');
				window.location.href='".base_url()."Dashboard/user';</script>";
        }

        $id = $this->input->get('id');
        $this->mdashboard->where('id', $id);
        $data_user = $this->mdashboard->get('users');
        foreach ($data_user as $key => $value_user) {
            if ($value_user->is_admin == 0) {
                $up_position = array('is_admin' => 1);
            }elseif ($value_user->is_admin == 1) {
                $up_position = array('is_admin' => 2);
            }
        }
        $insert = $this->mdashboard->update('users', 'id', $id, $up_position);

        if ($insert) {
            echo "<script>alert('User Level up !');
				window.location.href='".base_url()."Dashboard/user';</script>";
        }else {
            echo "<script>alert('ID tidak ditemukan !');
				window.location.href='".base_url()."Dashboard/user';</script>";
        }
    }

    public function LowPosition()
    {
        if ($this->input->get('id') == '') {
            echo "<script>alert('ID tidak ditemukan !');
				window.location.href='".base_url()."Dashboard/user';</script>";
        }

        $id = $this->input->get('id');
        $this->mdashboard->where('id', $id);
        $data_user = $this->mdashboard->get('users');
        foreach ($data_user as $key => $value_user) {
            if ($value_user->is_admin == 2) {
                $low_position = array('is_admin' => 1);
            }elseif ($value_user->is_admin == 1) {
                $low_position = array('is_admin' => 0);
            }
        }
        $insert = $this->mdashboard->update('users', 'id', $id, $low_position);

        if ($insert) {
            echo "<script>alert('User Level down !');
				window.location.href='".base_url()."Dashboard/user';</script>";
        }else {
            echo "<script>alert('ID tidak ditemukan !');
				window.location.href='".base_url()."Dashboard/user';</script>";
        }
    }
    /* End of User Controller */
}