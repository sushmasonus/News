<?php
include 'header.php';
?>
<?php
?>
<form class="form-horizontal" action="/news/correction/" method="post">
<input type="hidden" value="<?php echo $news['id'];?>" name="id">
				<fieldset>

				<!-- Form Name -->
				<!-- Text input-->
				<div class="control-group">
				  <label class="control-label" for="name">Name</label>
				  <div class="controls">
				    <input id="name" name="title" value="<?php echo $news['title'];?>"placeholder="enter the name" class="input-large" type="text">
				    
				  </div>
				</div>
				<!-- Textarea -->
				<div class="control-group">
				  <label class="control-label" for="content">Content</label>
				  <div class="controls">                     
				    <textarea id="content" name="content"><?php echo $news['content'];?></textarea>
				  </div>
				</div>
               <!-- Text input-->
				<div class="control-group">
				  <label class="control-label" for="name">Author</label>
				  <div class="controls">
				    <input id="name" name="author" value="<?php echo $news['author'];?>" placeholder="enter the author" class="input-large" type="text" >
				    
				  </div>
				</div>
				<!-- Button (Double) -->
				<div class="control-group">
				  <label class="control-label" for="button1"></label>
				  <div class="controls">
				    <button id="button1" name="button1" class="btn btn-success">Update</button>
				    <button id="button2" name="button2" type="reset" class="btn btn-danger">Reset</button>
				  </div>
				</div>

				</fieldset>
				</form>
			
<?php 
include 'footer.php';