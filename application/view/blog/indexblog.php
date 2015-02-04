<div class="container">
<h1>Blog</h1>
<form action="<?php echo URL ?>blog/postBlog" method="post" class="blog">
	<p><input type="text" name="username" placeholder="Username" autocomplete="off"></p>
	<p><textarea name="blog" id="" cols="30" rows="3" placeholder="Type hier uw text in"></textarea></p>
	<p><input type="submit"></p>
	<?php foreach ($this->blogs as $blog) { ?>
		<article>
			<header>
				<h1><?php echo $blog->username ?></h1>
				<h2><i><?php echo $blog->date ?></i></h2>
			</header>
			<p><?php echo $blog->blog ?></p>
			<div class="buttons">
			<a href="<?php echo URL . 'blog/deleteBlog/' . htmlspecialchars($blog->id, ENT_QUOTES, 'UTF-8'); ?>"><img width="14" src="http://png-4.findicons.com/files/icons/1580/devine_icons_part_2/128/trash_recyclebin_empty_closed.png" alt=""></a>
			<a href="<?php echo URL . 'blog/editBlog/' . htmlspecialchars($blog->id, ENT_QUOTES, 'UTF-8'); ?>"><img width="14" src="https://cdn3.iconfinder.com/data/icons/edition/100/pen_paper_2-512.png" alt=""></a>
			</div>
		</article>
		
	<?php } ?>
</form>
</div>