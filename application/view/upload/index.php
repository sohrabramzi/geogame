<div class="container">
<?php
if ($this->uploaded == "succes") {
    echo "<p class='message'>File uploaded succesfully.</p><br>";
} else if ($this->uploaded == "fail") {
    echo "<p class='message'>File couldn't be uploaded.</p><br>";
}

echo $this->message;
?>

    <form action="<?php echo URL?>upload/addImage" method="post" enctype="multipart/form-data" class="upload">
        <p>Select image to upload: </p>
        <input type="file" name="fileToUpload" onchange="readURL(this);" id="fileToUpload" required>
        <input type="submit" value="Upload Image" name="submit">
    </form>
<?php if ($this->image >= '') {
    echo '<img class="preview" src="' . $this->image . '">';
}?>
</div>

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>