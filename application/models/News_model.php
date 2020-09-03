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

    public function set_news()
    {
        // URLヘルパーをロード
        $this->load->helper('url');

        // 組み込み関数 urlencode() を使うことで、日本語等マルチバイト文字の入力にも対応する。
        $slug = urlencode(url_title($this->input->post('title'), '-', TRUE));

        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'text' => $this->input->post('text')
        );

        return $this->db->insert('news', $data)
    }
}
