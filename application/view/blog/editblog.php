<div class="container">
    <div>
        <h3>Edit a song</h3>
        <form action="<?php echo URL; ?>blog/updateBlog/<?php echo $this->blog->id ?>" method="POST">
            <label>Username</label>
            <input autofocus type="text" name="username" value="<?php echo htmlspecialchars($this->blog->username, ENT_QUOTES, 'UTF-8'); ?>" required />
            <label>Blog</label>
            <input type="text" name="blog" value="<?php echo htmlspecialchars($this->blog->blog, ENT_QUOTES, 'UTF-8'); ?>" required />
            <input type="submit" name="submit_update_blog" value="Update" />
        </form>
    </div>
</div>