<?php

class Blog extends Controller
{
	public function index()
	{
		$this->model = $this->loadModel('blog');
		$this->view->blogs = $this->model->getBlogs();
		$this->view->render('blog/indexblog');
	}

	public function postBlog()
	{
		$username = $_POST['username'];
		$blog = $_POST['blog'];

		$this->model = $this->loadModel('blog');

		$this->model->postBlog($username,$blog); // DIT IS EEN FUNCTIE DIE VERWACHT 2 PARAMETERS

	}

	   public function deleteBlog($blog_id)
    {
        $this->model = $this->loadModel('blog');

        if (isset($blog_id)) {
            $this->model->deleteBlog($blog_id);
        }
        header('location: ' . URL . 'blog/index');
    }

        public function editBlog($blog_id)
    {

        $this->model = $this->loadModel('blog');

        if (isset($blog_id)) {
            $this->view->blog = $this->model->getBlog($blog_id);

            $this->view->render('blog/editblog');
        } else {
            header('location: ' . URL . 'blog/index');
        }
    }

        public function updateBlog($blog_id)
    {
        $this->model = $this->loadModel('blog');

        if (isset($_POST["submit_update_blog"])) {
            $this->model->updateBlog($_POST["username"], $_POST["blog"],$blog_id);
        }

        header('location: ' . URL . 'blog/index');
    }

}