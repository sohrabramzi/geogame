<div class="container">
    <?php foreach ($this->img as $img): ?>
        <div class="image">
        	<a href="<?php echo URL.'game/play/'.$img->id ?>">
           
                <img src="<?php echo URL.'public/uploads/'.$img->filename ?>" width=256 class="preview" alt="">
    	</a>
        </div>
    <?php endforeach ?>
</div>

