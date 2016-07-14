<?php

/**
*
*/

include '../models/News.php';
include '../controllers/BaseController.php';
class News extends BaseController
{


    public function index()
    {
        $news =  new NewsModel();
        $news = $news->getAll();
        $this->renderView(__METHOD__,compact('news'));
    }

    public function newone()
    {
        $this->renderView(__METHOD__);
    }

    public function add()
    {
        $news =  new NewsModel();
        $news = $news->insert([
            'title' =>$_POST['title'],
            'content' =>$_POST['content'],
            'author' =>$_POST['author'],
            ]);
        $this->renderView(__METHOD__,compact('news::add'));



    }

    public function edit()
    {
        if(!isset($_GET['id'])){
            header('location:/news');
        }

        $id= $_GET['id'];
        $news =  new NewsModel();
        $news = $news->find($id);
        $this->renderView(__METHOD__,compact('news'));

    }
    public function correction()
        {
        
        $id= $_POST['id'];
        $news =  new NewsModel();
        $news = $news->update([
            'title' =>$_POST['title'],
            'content' =>$_POST['content'],
            'author' =>$_POST['author']
            ],$id);
        header('location:/news');

        }
    public function delete()
        {
            $id= $_GET['id'];
            $news =  new NewsModel();
            $news = $news->delete($id);
            header('location:/news');
        }
    public function allDelete()
       {
            $news =  new NewsModel();
            $news = $news->deleteAll();
            header('location:/news');
        }
}
