<?php

class BlogModel
{
	public function getBlogs()
	{
		$sql = "SELECT * FROM blog";

		$query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
	}


	public function postBlog($username, $blog)
	{
		$date = date('H:i:s / d-m-Y');
		$sql = "INSERT INTO `mini`.`blog` (`username`, `blog`, `date`) VALUES ('$username', '$blog','$date');";

		$query = $this->db->prepare($sql);
        $query->execute();

        return header("Location: ".URL."blog");
	}

	    public function deleteBlog($blog_id)
    {
        $sql = "DELETE FROM blog WHERE id = :blog_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':blog_id' => $blog_id);

        $query->execute($parameters);
    }

        public function getBlog($blog_id)
    {
        $sql = "SELECT * FROM blog WHERE id = :blog_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':blog_id' => $blog_id);

        $query->execute($parameters);

        return $query->fetch();
    }

        public function updateBlog($username, $blog, $blog_id)
    {
        $sql = "UPDATE blog SET username = :username, blog = :blog WHERE id = :blog_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':username' => $username, ':blog' => $blog, ':blog_id' => $blog_id);

        $query->execute($parameters);
    }

}