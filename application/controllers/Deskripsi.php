<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Nama class haru sama persis dengan nama file, termasuk besar kecil nya
class Deskripsi extends CI_Controller {

    // Fungsi yang automatis di eksekusi oleh CI
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Home', 'mhome');
		$this->load->model('M_Dashboard', 'mdashboard');
		date_default_timezone_set('Asia/Jakarta');
    }

    // Fungsi yang dieksekusi oleh controller ketika url tidak memilih fungsi yang ada di controller untuk di eksekusi
	public function index()
	{
		// Memuat atau menampilkan file php yang terdapat di dalam folder views
		if ($this->input->get('id') == '') {
			$id = $this->input->post('id');
		}else {
			$id = $this->input->get('id');
		}

		if ($this->input->post('sum_comment')) {
			$sumComment = $this->input->post('sum_comment');
		}else {
			$sumComment = 4;
		}

		if ($id == '') {
			echo "<script>alert('ID Tidak ada');
				window.location.href='".base_url()."';</script>";
		}

		if ($this->input->post('comment') || $this->input->post('reply')) {
			if ($this->session->userdata('id') == '') {
				// echo "<script>alert('Anda Harus login terlebih dahulu');
				// window.location.href='".base_url()."deskripsi?id=".$id."';</script>";
			}
		}

		$identifier_viewer = self::run_key();
		$ip_address = $this->input->ip_address();
		$browser_name = $this->agent->browser();
		$browser_ver = $this->agent->version();
		$user_agent = $browser_name.", ".$browser_ver;

		$id_user = $this->session->userdata('id');
		$comment = $this->input->post('comment');
		$comment_id = $this->input->post('comment_id');
		$reply = $this->input->post('reply');

		$article_viewer = array('article_id' => $id,
		'identifier' => $identifier_viewer,
		'user_id' => $this->session->userdata('id'),
		'ip_address' => $ip_address,
		'user_agent' => $user_agent,
		'created_at' => date('Y-m-d H:i:s') );

		$article_comment = array('article_id' => $id,
		'user_id' => $id_user,
		'comment' => $comment,
		'created_at' => date("Y-m-d H:i:s") );

		$reply_comment = array('comment_id' => $comment_id,
		'user_id' => $id_user,
		'replay' => $reply,
		'created_at' => date("Y-m-d H:i:s") );

		$get_comment = "SELECT *,
		comment_articles.id AS `commentId`,		
		users.id AS `userId`,
		comment_articles.user_id AS `userComment`,
		comment_articles.created_at AS `createdComment`,
		users.created_at AS `createdUser`,
		users.image AS `user_img`
		FROM `comment_articles`
		LEFT JOIN users ON users.id = comment_articles.user_id 
		WHERE comment_articles.article_id = '$id'
		ORDER BY `commentId` DESC
		LIMIT $sumComment";

// $get_comment = "SELECT *,
// comment_articles.id AS `commentId`,
// reply_comments.id AS `replyId`,	
// users.id AS `userId`,
// comment_articles.user_id AS `userComment`,
// reply_comments.user_id AS `userReplay`,
// comment_articles.created_at AS `createdComment`,
// reply_comments.created_at AS `createdReply`,
// users.created_at AS `createdUser`
// FROM `comment_articles`
// LEFT JOIN reply_comments ON reply_comments.comment_id = comment_articles.id
// LEFT JOIN users ON users.id = comment_articles.user_id 
// WHERE comment_articles.article_id = '$id'";

		$get_trend = "SELECT *,
        `articles`.`id` AS `id_artikelTrend`,
		`articles`.`title` AS `titleTrend`,
		`articles`.`content` AS `contentTrend`,
        `articles`.`created_at` AS `article_createTrend`,
        `categories`.`name` AS `categori_nameTrend`,
        `users`.`name` AS `user_nameTrend`,
		`articles`.`image` AS `article_img`,
		`users`.`image` AS `user_img`
        FROM `articles`
        LEFT JOIN `categories` ON `categories`.`id` = `articles`.`category_id`
        LEFT JOIN `users` ON `users`.`id` = `articles`.`user_id`
        WHERE articles.category_id = 26
        ORDER BY `articles`.`id` DESC";

		$get_viewer = $this->mhome->getViewers()->result();
		$viewing = true;
		foreach ($get_viewer as $key => $value) {
			if ($value->article_id == $id && $value->ip_address == $ip_address && $value->user_agent == $user_agent) {
				$viewing = false;
			}
		}
		if ($viewing) {
			$this->mdashboard->insert('articles_viewers', $article_viewer);
		}

		$postComment = $postReply = 0;
		foreach ($this->db->query($get_comment)->result() as $key => $value) {
			if ($value->article_id == $id && $value->userComment == $id_user && $value->comment == $comment) {
				$postComment++;				
			}else {
				$postComment = $postComment;
			}
		}

		foreach ($this->db->get('reply_comments')->result() as $key => $value) {
			if ($value->comment_id == $comment_id && $value->user_id == $id_user && $value->replay == $reply) {
				$postReply++;	
			}else {
				$postReply = $postReply;
			}
		}

		if ($postComment == 0 && $id_user != NULL && $comment != NULL) {
			$insertComment = $this->mdashboard->insert('comment_articles', $article_comment);
		}

		if ($postReply == 0 && $id_user != NULL && $reply != NULL) {
			$insertReply = $this->mdashboard->insert('reply_comments', $reply_comment);
		}

		$sql_numViewers = "SELECT * FROM `articles_viewers` WHERE articles_viewers.article_id = $id";

		$data = $this->mhome->whereArticle($id);
		if ($data != false) {
			$result = array('artikelID' => $id,
			'article_trend' => $this->db->query($get_trend),
			'descArticle' => $this->mhome->whereArticle($id),
			'numArticle' => $this->mhome->whereArticle($id)->num_rows(),
			'comments' => $this->db->query($get_comment)->result(),
			'numComment' => $this->db->query($get_comment)->num_rows(),
			'sumComment' => $sumComment,
			'popular_data' => $this->mhome->popularSeminggu(),
			'num_viewers' => $this->db->query($sql_numViewers)->num_rows() );
			$result['articles'] = $this->mhome->getArticles();
			$result['numArticles'] = $this->mhome->getArticles()->num_rows();
			
			$this->load->view('deskripsi', $result);
			// print_r($result);
		}else {
			echo "<script>alert('ID Tidak ditemukan');
				window.location.href='".base_url()."';</script>";
		}
	}

	public function run_key() {

		$chars = array(
			'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm',
			'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
			'0', '1', '2', '3', '4', '5', '6', '7', '8', '9'
		);
	
		shuffle($chars);
	
		$num_chars = 32;
		$token = '';
	
		for ($i = 0; $i < $num_chars; $i++){ // <-- $num_chars instead of $len
			$token .= $chars[mt_rand(0, $num_chars)];
		}
	
		return $token;
	}

	public function getComments()
	{
		$get_comment = "SELECT *,
		comment_articles.id AS `commentId`,		
		users.id AS `userId`,
		comment_articles.user_id AS `userComment`,
		comment_articles.created_at AS `createdComment`,
		users.created_at AS `createdUser`
		FROM `comment_articles`
		LEFT JOIN users ON users.id = comment_articles.user_id 
		WHERE comment_articles.article_id = '$id'
		ORDER BY `commentId` DESC";

		$comments = $this->db->query($get_comment)->result();
		$i=-1;
		foreach ($comments as $key => $value) {
			$i++;
			$comment['user_name'][$i] = $value->name;
			$comment['comment'][$i] = $value->comment;
			$this->db->where('comment_id', $value->commentId);
			$comment['numReply'][$i] = $this->db->get('reply_comments')->num_rows();
			$this->db->where('comment_id', $value->commentId);
			$reply_comment = $this->db->get('reply_comments')->result();
			$numReply = $this->db->get('reply_comments')->num_rows();
			$r=-1;
			foreach ($reply_comment as $key => $value_reply) {
				$r++;
				$reply['user_reply'][$r] = $value_reply->user_id;
				$reply['reply'][$r] = $value_reply->replay;
			}
		}

		$komen = array('comments' => $comments,
		'comment' => $comment,
		'replys' =>$reply );
		echo json_encode($komen);
	}
}