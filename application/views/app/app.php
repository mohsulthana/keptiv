<?php
$sumHeadline = -1;
if (isset($articles)) {
	$b_num_headline = $b_num_subHeadline = $num_headline = $num_subHeadline = $num_trend = $num_viral = $num_tekno = $num_humor = $num_opini = $num_unik = $num_sport = $num_ragam = $num_video = $num_foto = $num_umum = $num_sorotan = $num_rekomendasi = $num_kutipan = $num_HeadlineList = $num_pilihanredaksi = $num_spesial = -1;
	if ($numArticles >= 2) {
		
		foreach ($articles->result() as $key => $value) {
			// echo $value->categori_name;
			if ($value->categori_name == 'HEADLINE' || $value->is_publish == 4 || $value->is_headline == '1') {
				$sumHeadline++;
				if ($sumHeadline < 3) {
					$num_headline++;
					$headline_l['id'][] = $value->id_artikel;
					$headline_l['image'][] = $value->article_img;
					$headline_l['title'][] = $value->title;
					$headline_l['categori'][] = $value->categori_name;
					$headline_l['type_categori'][] = $value->category_type;
				}elseif ($sumHeadline > 2 && $sumHeadline < 6) {
					$num_subHeadline++;
					$subHeadline_l['id'][] = $value->id_artikel;
					$subHeadline_l['image'][] = $value->article_img;
					$subHeadline_l['title'][] = $value->title;
					$subHeadline_l['categori'][] = $value->categori_name;
					$subHeadline_l['type_categori'][] = $value->category_type;
				}

				$num_HeadlineList++;
				$HeadlineList['id'][] = $value->id_artikel;
				$HeadlineList['image'][] = $value->article_img;
				$HeadlineList['title'][] = $value->title;
				$HeadlineList['categori'][] = $value->categori_name;
				$HeadlineList['type_categori'][] = $value->category_type;
			}
			if ($value->categori_name == 'TREND') {
				$num_trend++;
				$trend['id'][] = $value->id_artikel;
				$trend['image'][] = $value->article_img;
				$trend['title'][] = $value->title;
				$trend['created_at'][] = $value->article_create;
				$trend['content'][] = $value->content;
				$trend['type_categori'][] = $value->category_type;
			}elseif ($value->categori_name == 'TEKNO') {
				$num_tekno++;
				$tekno['img'][] = $value->article_img;
			}elseif ($value->categori_name == 'HUMOR') {
				$num_humor++;
				$humor['id'][] = $value->id_artikel;
				$humor['image'][] = $value->article_img;
				$humor['title'][] = $value->title;
				$humor['content'][] = $value->content;
				$humor['categori'][] = $value->categori_name;
				$humor['created_at'][] = $value->article_create;
				$humor['type_categori'][] = $value->category_type;
			}elseif ($value->categori_name == 'OPINI') {
				$num_opini++;
				$opini['id'][] = $value->id_artikel;
				$opini['image'][] = $value->article_img;
				$opini['title'][] = $value->title;
				$opini['categori'][] = $value->categori_name;
				$opini['created_at'][] = $value->article_create;
				$opini['content'][] = $value->content;
				$opini['type_categori'][] = $value->category_type;
			}elseif ($value->categori_name == 'UNIK') {
				$num_unik++;
				$unik['id'][] = $value->id_artikel;
				$unik['image'][] = $value->article_img;
				$unik['title'][] = $value->title;
				$unik['created_at'][] = $value->article_create;
				$unik['content'][] = $value->content;
				$unik['type_categori'][] = $value->category_type;
			}elseif ($value->categori_name == 'VIRAL') {
				$num_viral++;
				$viral['id'][] = $value->id_artikel;
				$viral['id'][] = $value->id_artikel;
				$unik['image'][] = $value->article_img;
				$viral['title'][] = $value->title;
				$viral['created_at'][] = $value->article_create;
				$viral['content'][] = $value->content;
				$viral['type_categori'][] = $value->category_type;
			}elseif ($value->categori_name == 'SPORT') {
				$num_sport++;
				$sport['id'][] = $value->id_artikel;
				$sport['image'][] = $value->article_img;
				$sport['title'][] = $value->title;
				$sport['categori'][] = $value->categori_name;
				$sport['created_at'][] = $value->article_create;
				$sport['content'][] = $value->content;
				$sport['type_categori'][] = $value->category_type;
			}elseif ($value->categori_name == 'RAGAM') {
				$num_ragam++;
				$ragam['id'][] = $value->id_artikel;
				$ragam['image'][] = $value->article_img;
				$ragam['title'][] = $value->title;
				$ragam['content'][] = $value->content;
				$ragam['categori'][] = $value->categori_name;
				$ragam['created_at'][] = $value->article_create;
				$ragam['type_categori'][] = $value->category_type;
			}elseif ($value->categori_name == 'VIDEO_b') {
				$num_video++;
				$video['id'][] = $value->id_artikel;
				$video['image'][] = $value->article_img;
				$video['title'][] = $value->title;
				$video['created_at'][] = $value->article_create;
				$video['type_categori'][] = $value->category_type;
			}elseif ($value->categori_name == 'FOTO_b') {
				$num_foto++;
				$foto['id'][] = $value->id_artikel;
				$foto['image'][] = $value->article_img;
				$foto['title'][] = $value->title;
				$foto['created_at'][] = $value->article_create;
				$foto['type_categori'][] = $value->category_type;		
			}
			if ($value->categori_name == 'UMUM' || $value->is_umum == '1') {
				$num_umum++;
				$umum['id'][] = $value->id_artikel;
				$umum['image'][] = $value->article_img;
				$umum['title'][] = $value->title;
				$umum['created_at'][] = $value->article_create;	
				$umum['type_categori'][] = $value->category_type;		
			}
			if ($value->categori_name == 'SOROTAN' || $value->is_sorotan == '1') {
				$num_sorotan++;
				$sorotan['id'][] = $value->id_artikel;
				$sorotan['image'][] = $value->article_img;
				$sorotan['video'][] = $value->is_video;
				$sorotan['title'][] = $value->title;
				$sorotan['created_at'][] = $value->article_create;	
				$sorotan['type_categori'][] = $value->category_type;		
			}
			if ($value->categori_name == 'PILIHAN REDAKSI' || $value->is_pilihanredaksi == '1') {
				$num_pilihanredaksi++;
				$pilihanredaksi['id'][] = $value->id_artikel;
				$pilihanredaksi['image'][] = $value->article_img;
				$pilihanredaksi['title'][] = $value->title;
				$pilihanredaksi['created_at'][] = $value->article_create;	
				$pilihanredaksi['type_categori'][] = $value->category_type;		
			}
			if ($value->categori_name == 'REKOMENDASI' || $value->is_publish == 3) {
				$num_rekomendasi++;
				$rekomendasi['id'][] = $value->id_artikel;
				$rekomendasi['image'][] = $value->article_img;
				$rekomendasi['title'][] = $value->title;
				$rekomendasi['created_at'][] = $value->article_create;	
				$rekomendasi['type_categori'][] = $value->category_type;		
			}
			if ($value->categori_name == 'SPECIAL' || $value->is_spesial == '1') {
				$num_spesial++;
				$spesial['id'][] = $value->id_artikel;
				$spesial['image'][] = $value->article_img;
				$spesial['title'][] = $value->title;
				$spesial['created_at'][] = $value->article_create;	
				$spesial['type_categori'][] = $value->category_type;		
			}
			if ($value->categori_name == 'KUTIPAN' || $value->is_kutipan == '1') {
				$num_kutipan++;
				$kutipan['id'][] = $value->id_artikel;
				$kutipan['image'][] = $value->article_img;
				$kutipan['title'][] = $value->title;
				$kutipan['created_at'][] = $value->article_create;	
				$kutipan['type_categori'][] = $value->category_type;		
			}
		}

	}
}

$meta_description = "Keptiv.com adalah portal yang ngomongin kepedulian-kepedulian dan tindakan-tindakan baik orang Indonesia saat ini.";
$meta_keywords = "";
$meta_author = "";
$meta_location = "";
$meta_img = "";
$meta_tag = "";

if (isset($descArticle)) { 
	foreach ($descArticle->result() as $key => $value) {
		$title = $value->title;
		$created_at = $value->article_create;
		$creator = $value->user_name;
		$content = $value->content;
		$category = $value->categori_name;
		$sub_category = $value->category_type;
		$article_img = $value->article_img;
		$is_video = $value->is_video;
		$articleImages[] = $value->image_name;
		$articleImagesDesc[] = $value->description;

		$meta_description = $value->meta_description;
		$meta_keywords = $value->meta_keywords;
		$meta_author = $value->meta_author;
		$meta_location = $value->meta_location;
		$meta_img = $value->article_img;
		$meta_tag = $value->tag_article;
	}
}

$this->db->where('id', $this->session->userdata('id'));
$data_user_logedin = $this->db->get('users')->result();
foreach ($data_user_logedin as $key => $value) {
	$img_profile_logedin = $value->image;
}
if (isset($id)) {
	for ($i=0; $i < 10; $i++) { 
		echo $id[$i]." jumlahnya = ".$jumlah[$id[$i]]."<br>";
	}
	
	echo "aslinya <br>";
	echo json_encode($id)."<br>";
	echo json_encode($jumlah)."<br>";
}
if (isset($article_trend)) {
	$num_trendDesc = -1;
	foreach ($article_trend->result() as $key => $value) {
		$num_trendDesc++;
		$trendDesc['idTrend'][] = $value->id_artikelTrend;
		$trendDesc['titleTrend'][] = $value->titleTrend;
		$trendDesc['created_atTrend'][] = $value->article_createTrend;
		$trendDesc['contentTrend'][] = $value->contentTrend;
		$trendDesc['image'][] = $value->article_img;
	}
}
if (isset($comments)) {
	$i=-1;
	foreach ($comments as $key => $value) {
		$i++;
		$query = "SELECT *,
		`users`.`image` AS `user_img`
		FROM `reply_comments` WHERE comment_id = $value->commentId
		LEFT JOIN `users` ON `reply_comments`.`user_id` = `users`.`id`";
		$comment['user_name'][$i] = $value->name;
		$comment['user_img'][$i] = $value->user_img;
		$comment['comment'][$i] = $value->comment;
		$this->db->where('comment_id', $value->commentId);
		$comment['numReply'][$i] = $this->db->get('reply_comments')->num_rows();
		$this->db->where('comment_id', $value->commentId);
		$reply_comment = $this->db->get('reply_comments')->result();
		$this->db->where('comment_id', $value->commentId);
		$numReply = $this->db->get('reply_comments')->num_rows();
		$r=-1;
		foreach ($reply_comment as $key => $value_reply) {
			$r++;
			$reply['user_reply'][$r] = $value_reply->user_id;
			$reply['reply'][$r] = $value_reply->replay;
		}
	}
}

/*
if (0 <= $key && $key <= 2) {
	$b_num_headline++;
	$b_headline_l['id'][] = $value->id_artikel;
	$b_headline_l['image'][] = $value->article_img;
	$b_headline_l['title'][] = $value->title;
	$b_headline_l['categori'][] = $value->categori_name;
}elseif (3 <= $key && $key <= 5) {
	$b_num_subHeadline++;
	$b_subHeadline_l['id'][] = $value->id_artikel;
	$b_subHeadline_l['image'][] = $value->article_img;
	$b_subHeadline_l['title'][] = $value->title;
	$b_subHeadline_l['categori'][] = $value->categori_name;
}
*/

if (isset($article)) {
	echo $article;
}

$num_foto_b=0;
if (isset($limit_foto)) {
	foreach ($limit_foto as $key => $value) {
		$num_foto_b++;
		$foto['id'][] = $value->id_artikel;
		$foto['image'][] = $value->article_img;
		$foto['title'][] = $value->title;
		$foto['created_at'][] = $value->article_create;
		$foto['type_categori'][] = $value->category_type;
	}
}

if (isset($foto)) {
	for ($i=0; $i < $num_foto_b; $i++) { 
		$artikelID_foto = $foto['id'][$i];
		$sql = "SELECT * FROM `articles_images` WHERE articles_images.id_article = $artikelID_foto";
		$foto_subIMG[] = $this->db->query($sql)->result();
	}

	/* Logic echo image_name */
	// for ($n=0; $n < 5; $n++) { 
	// 	for ($i=0; $i < count($foto_subIMG[$n]); $i++) { 
	// 		echo $foto_subIMG[$n][$i]->image_name."<br>";
	// 	}
	// }

}

$num_video_b=0;
if (isset($limit_video)) {
	foreach ($limit_video as $key => $value) {
		$num_video_b++;
		$video['id'][] = $value->id_artikel;
		$video['image'][] = $value->article_img;
		$video['title'][] = $value->title;
		$video['created_at'][] = $value->article_create;
		$video['type_categori'][] = $value->category_type;
		$video['is_video'][] = $value->is_video;
	}
}

if (isset($video)) {
	for ($i=0; $i < $num_video_b; $i++) { 
		$artikelID_video = $video['id'][$i];
		$sql = "SELECT * FROM `articles_images` WHERE articles_images.id_article = $artikelID_video";
		$video_subIMG[] = $this->db->query($sql)->result();
	}

	/* Logic echo image_name */
	// for ($n=0; $n < 5; $n++) { 
	// 	for ($i=0; $i < count($foto_subIMG[$n]); $i++) { 
	// 		echo $foto_subIMG[$n][$i]->image_name."<br>";
	// 	}
	// }

}

// if (isset($video)) {
// 	for ($i=0; $i < 5; $i++) { 
// 		$artikelID_video = $video['id'][$i];
// 		$sql = "SELECT * FROM `articles_videos` WHERE articles_videos.id_article = $artikelID_video";
// 		$video_subVideo[] = $this->db->query($sql)->result();
// 	}

// 	/* Logic echo image_name */
// 	// for ($n=0; $n < 5; $n++) { 
// 	// 	for ($i=0; $i < count($foto_subIMG[$n]); $i++) { 
// 	// 		echo $foto_subIMG[$n][$i]->image_name."<br>";
// 	// 	}
// 	// }

// }

/* Hot Tag */
$hottag = $this->db->get('settings')->result_array();
$hottag_result[] = '';
for ($i=0; $i < count($hottag); $i++) { 
	if ($hottag[$i]['key'] == 'hottag1') {
		$hottag_result[0] = $hottag[$i]['value'];
	}elseif ($hottag[$i]['key'] == 'hottag2') {
		$hottag_result[1] = $hottag[$i]['value'];
	}elseif ($hottag[$i]['key'] == 'hottag3') {
		$hottag_result[2] = $hottag[$i]['value'];
	}
}

/* Space Iklan */
$iklan = $this->db->get('advertisements')->result_array();

/* Settings */
$settings = $this->db->get('settings')->result_array();
?>