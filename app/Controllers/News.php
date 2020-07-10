<?php

namespace App\Controllers;

use App\Models\NewsModel;

class News extends BaseController
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

    public function create()
    {
        $model = new NewsModel();

        if (!$this->validate([
            'title' => 'required|min_length[3]|max_length[255]',
            'body'  => 'required'
        ])) {

            return view('news/create');
        } else {
            $model->save([
                'title' => $this->request->getVar('title'),
                'slug'  => url_title($this->request->getVar('title'), '-', TRUE),
                'body'  => $this->request->getVar('body'),
            ]);

            return redirect()->to('/');
        }
    }

    public function view($slug = null)
    {
        $model = new NewsModel();

        $data['news'] = $model->getNews($slug);

        if (empty($data['news'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: ' . $slug);
        }

        $data['title'] = $data['news']['title'];

        return view('news/view', $data);
    }

    public function newsById($id = 0)
    {
        $model = new NewsModel();
        $data['news'] = $model->asArray()
            ->where(['id' => $id])
            ->first();
        return view('news/edit', $data);
    }

    public function update($id = 0)
    {
        $model = new NewsModel();
        $data = [
            'title' => $this->request->getVar('title'),
            'slug'  => url_title($this->request->getVar('title'), '-', TRUE),
            'body'  => $this->request->getVar('body'),
        ];
        $query = "UPDATE news SET title='" . $data['title'] . "',";
        $query .= "slug='" . $data['slug'] . "',";
        $query .= "body='" . $data['body'] . "' ";
        $query .= "WHERE id=" . $id . ";";
        echo $query;

        $model->query($query);

        return redirect()->to('/');
    }

    public function delete($id = 0)
    {
        $model = new NewsModel();
        $model->delete(['id' => $id]);
        return redirect()->to('/');
    }
}
