<?php

namespace App\Controllers;

use App\Models\NewsModel;
use CodeIgniter\Controller;
use CodeIgniter\Model;

class News extends Controller
{
    public function index()
    {
        $model  = new NewsModel();
        $data = [
            'news' => $model->getNews(),
            'title' => 'News Archive'
        ];

        return view('news/overview', $data);
    }

    public function view($slug = null)
    {
        $model = new NewsModel();

        $data['news'] = $model->getNews($slug);

        if (empty($data['news'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: ' . $slug);
        }

        $data['title'] = $data['news']['title'];

        echo view('news/view', $data);
    }
}
