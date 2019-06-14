<?php

class M_Dashboard extends CI_Model
{
    function __construct()
	{
		parent::__construct();
    }
    
    public function insert($table, $data)
	{
		return $this->db->insert($table, $data);
	}

	public function get($table)
	{
		return $this->db->get($table)->result();
	}

	public function where($where, $value)
	{
		return $this->db->where($where, $value);
	}

	public function delete($table, $where, $id)
	{
		$this->db->where($where,$id);
		return $this->db->delete($table);
	}

	public function update($table, $where, $id, $data)
	{
		$this->db->get($table);
		$this->db->where($where, $id);
		return $this->db->update($table, $data);
  }
    
  public function query($query)
  {		
		return $this->db->query($query)->result();
	}
	
	public function time_elapsed_string($datetime, $full = false) {
		$now = new DateTime;
		$ago = new DateTime($datetime);
		$diff = $now->diff($ago);
	
		$diff->w = floor($diff->d / 7);
		$diff->d -= $diff->w * 7;
	
		$string = array(
			'y' => 'year',
			'm' => 'month',
			'w' => 'week',
			'd' => 'day',
			'h' => 'hour',
			'i' => 'minute',
			's' => 'second',
		);
		foreach ($string as $k => &$v) {
			if ($diff->$k) {
				$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
			} else {
				unset($string[$k]);
			}
		}
	
		if (!$full) $string = array_slice($string, 0, 1);
		return $string ? implode(', ', $string) . ' ago' : 'just now';
	}

	// public function getBerita($limit, $start=0, $where)
	// {
	// 	// $this->db->order_by('id', 'desc');
	// 	// $this->db->limit(2, $start);

	// 	$query = "SELECT *, `berita`.id AS `id_berita`, `user`.`id` AS `id_user`, `kategori`.`id` AS `id_kategori`
	// 	FROM `berita`
	// 	LEFT JOIN `user` AS `user`
	// 	ON `berita`.`user_id` = `user`.`id`
	// 	LEFT JOIN `kategori` AS `kategori`
	// 	ON `berita`.`kategori_id` = `kategori`.`id`
	// 	WHERE `berita`.`kategori_id` = $where
	// 	ORDER BY `id_berita` DESC LIMIT $start,$limit";
		
	// 	return $this->db->query($query)->result();
	// }

	// function jumlah_data($where){
	// 	$query = "SELECT *, `berita`.id AS `id_berita`, `user`.`id` AS `id_user`, `kategori`.`id` AS `id_kategori`
	// 	FROM `berita`
	// 	LEFT JOIN `user` AS `user`
	// 	ON `berita`.`user_id` = `user`.`id`
	// 	LEFT JOIN `kategori` AS `kategori`
	// 	ON `berita`.`kategori_id` = `kategori`.`id`
	// 	WHERE `berita`.`kategori_id` = $where";
		
	// 	return $this->db->query($query)->num_rows();
	// }
}