<?php

class M_Home extends CI_Model
{
    public function getArticles()
    {
        $query = "SELECT *,
        `articles`.`id` AS `id_artikel`,
        `articles`.`created_at` AS `article_create`,
        `articles`.`image` AS `article_img`,
        `users`.`image` AS `user_img`,
        `categories`.`name` AS `categori_name`,
        `users`.`name` AS `user_name`
        FROM `articles`
        LEFT JOIN `categories` ON `categories`.`id` = `articles`.`category_id`
        LEFT JOIN `users` ON `users`.`id` = `articles`.`user_id`
        ORDER BY `articles`.`id` DESC";
        $data = $this->db->query($query);
        if ($data->num_rows() != 0) {
            return $this->db->query($query);
        }else {
            return false;
        }
    }

    public function whereArticle($id='')
    {
        if ($id == '') {
            return false;
        }

        $query = "SELECT *,
        `articles`.`id` AS `id_artikel`,
        `articles`.`created_at` AS `article_create`,
        `categories`.`name` AS `categori_name`,
        `users`.`name` AS `user_name`,
        `articles`.`image` AS `article_img`,
        `users`.`image` AS `user_img`
        FROM `articles`
        LEFT JOIN `categories` ON `categories`.`id` = `articles`.`category_id`
        LEFT JOIN `users` ON `users`.`id` = `articles`.`user_id`
        LEFT JOIN `articles_images` ON `articles_images`.`id_article` = `articles`.`id`
        WHERE `articles`.`id` = '$id'
        ORDER BY `articles`.`id` DESC";
        $data = $this->db->query($query);

        if ($data->num_rows() != 0) {
            return $this->db->query($query);
        }else {
            return false;
        }
    }

    public function getViewers()
    {
        $query = "SELECT * FROM `articles_viewers` WHERE  articles_viewers.created_at >= DATE_SUB(CURDATE(), INTERVAL 7 DAY) ORDER BY `articles_viewers`.`id` DESC";
        $data = $this->db->query($query);
        if ($data->num_rows() != 0) {
            return $this->db->query($query);
        }else {
            return false;
        }
    }

    public function getUmum($page)
    {
        if (!$page) {
            $page = 1;
        }
        $limit = 8*$page;
        $query = "SELECT * FROM articles WHERE articles.category_id = 19 || articles.is_umum = 1 ORDER BY `id` DESC limit $limit";
        $result = $this->db->query($query)->result();
        return $result;
    }

    public function getPilihanRedaksi($page)
    {
        if (!$page) {
            $page = 1;
        }
        $limit = 5*$page;
        $query = "SELECT * FROM articles WHERE articles.category_id = 21 || articles.is_pilihanredaksi = 1 ORDER BY `id` DESC limit $limit";
        $result = $this->db->query($query)->result();
        return $result;
    }

    public function getSpecial($page)
    {
        if (!$page) {
            $page = 1;
        }
        $limit = 8*$page;
        $query = "SELECT * FROM articles WHERE articles.category_id = 23 || articles.is_spesial = 1 ORDER BY `id` DESC limit $limit";
        $result = $this->db->query($query)->result();
        return $result;
    }

    public function getIndeksBerita($page)
    {
        if (!$page) {
            $page = 1;
        }
        $limit = 5*$page;
        $query = "SELECT * FROM articles WHERE articles.category_id = 25 ORDER BY `id` DESC limit $limit";
        $result = $this->db->query($query)->result();
        return $result;
    }

    public function getViral($page)
    {
        if (!$page) {
            $page = 1;
        }
        $limit = 6*$page;
        $query = "SELECT * FROM articles WHERE articles.category_id = 6 ORDER BY `id` DESC limit $limit";
        $result = $this->db->query($query)->result();
        return $result;
    }

    public function getViralSubCategory($page, $where)
    {
        if (!$page) {
            $page = 1;
        }
        $limit = 6*$page;
        $query = "SELECT * FROM articles WHERE articles.category_id = 6 AND articles.category_type = '$where' ORDER BY `id` DESC limit $limit";
        $result = $this->db->query($query)->result();
        return $result;
    }

    public function getOpini($page)
    {
        if (!$page) {
            $page = 1;
        }
        $limit = 6*$page;
        $query = "SELECT * FROM articles WHERE articles.category_id = 4 ORDER BY `id` DESC limit $limit";
        $result = $this->db->query($query)->result();
        return $result;
    }

    public function getOpiniSubCategory($page, $where)
    {
        if (!$page) {
            $page = 1;
        }
        $limit = 6*$page;
        $query = "SELECT * FROM articles WHERE articles.category_id = 4 AND articles.category_type = '$where' ORDER BY `id` DESC limit $limit";
        $result = $this->db->query($query)->result();
        return $result;
    }

    public function getUnik($page)
    {
        if (!$page) {
            $page = 1;
        }
        $limit = 6*$page;
        $query = "SELECT * FROM articles WHERE articles.category_id = 5 ORDER BY `id` DESC limit $limit";
        $result = $this->db->query($query)->result();
        return $result;
    }

    public function getUnikSubCategory($page, $where)
    {
        if (!$page) {
            $page = 1;
        }
        $limit = 6*$page;
        $query = "SELECT * FROM articles WHERE articles.category_id = 5 AND articles.category_type = '$where' ORDER BY `id` DESC limit $limit";
        $result = $this->db->query($query)->result();
        return $result;
    }

    public function getSport($page)
    {
        if (!$page) {
            $page = 1;
        }
        $limit = 6*$page;
        $query = "SELECT * FROM articles WHERE articles.category_id = 7 ORDER BY `id` DESC limit $limit";
        $result = $this->db->query($query)->result();
        return $result;
    }

    public function getSportSubCategory($page, $where)
    {
        if (!$page) {
            $page = 1;
        }
        $limit = 6*$page;
        $query = "SELECT * FROM articles WHERE articles.category_id = 7 AND articles.category_type = '$where' ORDER BY `id` DESC limit $limit";
        $result = $this->db->query($query)->result();
        return $result;
    }

    public function getComment($page)
    {
        if (!$page) {
            $page = 1;
        }
        $limit = 8*$page;
        $query = "SELECT * FROM `comment_articles` ORDER BY `id` DESC limit $limit";
        $result = $this->db->query($query)->result();
        return $result;
    }

    public function getSearch($where, $page)
    {
        if (!$page) {
            $page = 1;
        }
        $limit = 8*$page;
        $sql = "SELECT * FROM `articles` WHERE
        is_publish NOT LIKE 0 AND
        (id = '%$where%' OR
        title LIKE '%$where%' OR
        content LIKE '%$where%' OR
        sub_content LIKE '%$where%' OR
        meta_description LIKE '%$where%' OR
        meta_author LIKE '%$where%' OR
        meta_keywords LIKE '%$where%' OR
        meta_location LIKE '%$where%' OR
        tag_article LIKE '%$where%' OR
        slug LIKE '%$where%')
        ORDER BY `id` DESC
        LIMIT $limit";
        $result = $this->db->query($sql)->result();
        return $result;
    }

    public function getFoto($page)
    {
        if (!$page) {
            $page = 1;
        }
        $limit = 2*$page;

        $query = "SELECT *,
        `articles`.`id` AS `id_artikel`,
        `articles`.`created_at` AS `article_create`,
        `articles`.`image` AS `article_img`,
        `users`.`image` AS `user_img`,
        `categories`.`name` AS `categori_name`,
        `users`.`name` AS `user_name`
        FROM `articles`
        LEFT JOIN `categories` ON `categories`.`id` = `articles`.`category_id`
        LEFT JOIN `users` ON `users`.`id` = `articles`.`user_id`
        WHERE articles.category_id = 17
        ORDER BY `articles`.`id` DESC
        LIMIT $limit";
        $data = $this->db->query($query);
        if ($data->num_rows() != 0) {
            return $this->db->query($query)->result();
        }else {
            return false;
        }
    }

    public function getVideo($page)
    {
        if (!$page) {
            $page = 1;
        }
        $limit = 2*$page;

        $query = "SELECT *,
        `articles`.`id` AS `id_artikel`,
        `articles`.`created_at` AS `article_create`,
        `articles`.`image` AS `article_img`,
        `users`.`image` AS `user_img`,
        `categories`.`name` AS `categori_name`,
        `users`.`name` AS `user_name`
        FROM `articles`
        LEFT JOIN `categories` ON `categories`.`id` = `articles`.`category_id`
        LEFT JOIN `users` ON `users`.`id` = `articles`.`user_id`
        WHERE articles.category_id = 10
        ORDER BY `articles`.`id` DESC
        LIMIT $limit";
        $data = $this->db->query($query);
        if ($data->num_rows() != 0) {
            return $this->db->query($query)->result();
        }else {
            return false;
        }
    }

    public function whereCategories($where)
    {
        $this->db->select('*');
        $this->db->from('categories');
        $this->db->where('categories.name', $where);
        return $this->db->get()->result_array();
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
		$num_row_viewers = $this->mhome->getViewers()->num_rows();
		foreach ($this->mhome->getViewers()->result() as $key => $value) {
			if ($n < $num_row_viewers) {
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

		for ($i=0; $i < $n; $i++) { 
			$jumlah_popular[] = $article['jumlah'][$article['id'][$i]];
			$id_popular[] = $article['id'][$i];
		}

		$popular_seminggu = $this->insertion_sort($jumlah_popular, $id_popular);
		for ($i=0; $i < $n; $i++) { 
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