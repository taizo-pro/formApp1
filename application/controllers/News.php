<?php
class News extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // データベース接続モデルをロード
        $this->load->model('news_model');

        $this->load->helper('url_helper');
    }

    public function index()
    {
        // 登録されているデータを全件取得
        $data['news'] = $this->news_model->get_news();

        $data['title'] = 'News archive';

        // 第2引数にオブジェクトとしてviewに渡す。つまり、$dataは配列出ない場合、記述不要
        $this->load->view('templates/header', $data);
        $this->load->view('news/index', $data);
        $this->load->view('templates/footer');
    }

    // 個々のニュースページ
    public function view($slug = null)
    {
        //　指定された記事を呼び出す
        $data['news_item'] = $this->news_model->get_news($slug);

        // 記事が見つからない場合に呼び出す
        if (empty($data['news_item'])) {
            show_404();
        }

        $data['title'] = $data['news_item']['title'];

        $this->load->view('templates/header', $data);
        $this->load->view('news/view', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Create a news item';

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'Text', 'required');

        if ($this->form_validation->run() === false) {
            $this->load->view('templates/header', $data);
            $this->load->view('news/create');
            $this->load->view('templates/footer');
        } else {
            $this->news_model->set_news();
            $this->load->view('news/successs');
        }
    }
}
