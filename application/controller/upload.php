<?php

class Upload extends Controller
{
    public function index()
    {
        $this->model = $this->loadModel('upload');

        $this->view->message = '';
        $this->view->uploaded = '';
        $this->view->image = '';

        if (isset($_SESSION['message'])){
            $this->view->message = $_SESSION['message'];
            $_SESSION['message'] = null;
        }
        if (isset($_SESSION['uploaded'])){
            $this->view->uploaded = $_SESSION['uploaded'];
            $_SESSION['uploaded'] = null;
        }
        if (isset($_SESSION['image'])){
            $this->view->image = URL .$_SESSION['image'];
            $_SESSION['image'] = null;
        }

        $this->view->render('upload/index');
    }


    public function addImage()
    {
        $this->model = $this->loadModel('upload');

        $result = $this->model->addImage($_FILES['fileToUpload']);

        $_SESSION['uploaded'] = $result[0];
        $_SESSION['message'] = $result[1];
        $_SESSION['image'] = $result[2];

        header('location: ' . URL . 'upload/index');
    }


    public function showImages(){
        $this->model = $this->loadModel('upload');
        $this->view->img = $this->model->getImages();

        $this->view->render('images/index');
    }


    public function deleteImage($id)
    {
        $this->model = $this->loadModel('upload');

        if (isset($id)) {
            $this->model->deleteImage($id);
        }

        header('location: ' . URL . 'images/index');
    }

}