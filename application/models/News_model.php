<?php
class News_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_news($slug = FALSE)
    {
        // 引数がない場合は、テーブルの内容をすべて取得する
        if ($slug === FALSE) {
            $query = $this->db->get('news');

            // 結果を配列で取得する
            return $query->result_array();
        }

        // 引数がある場合は、条件に合うレコードを取得する
        $query = $this->db->get_where('news', array('slug' => $slug));

        // 結果を1行、配列で取得する（デフォルトは0行目）
        return $query->row_array();
    }
}
