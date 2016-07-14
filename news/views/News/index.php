<?php
include 'header.php';
?>

<div class="container">
<h1>NEWS PAGE</h1>
<div class="well">
<a class="btn btn-primary" href="/news/add"><i class="fa fa-plus"></i> Add News</a>
<a class="btn btn-danger" href="/news/allDelete" onclick="return confirm('Are you sure you want to delete all News?')"><i class="fa fa-trash"></i> Delete All</a>
</div>
<table  class="table table-striped">
<tr>
	<th>Title</th>
	<th>Content</th>
	<th>Author</th>
	<th>Options</th>
</tr>
<?php
if(empty($news)){
    ?>
    <tr>
        <td colspan="3" class="text-center">No news.</td>
    </tr>
 <?php
}else{
    foreach ($news as $value):
    ?>
	<tr>
		<td><?php echo $value['title']?></td>
		<td><?php echo substr(strip_tags($value['content']),0,20);?></td>
		<td><?php echo $value['author']?></td>
		<td>
			<a class="btn btn-danger" href="/news/delete?id=<?php echo $value['id']?>"><i class="fa fa-trash-o"></i> Delete</a>
			<a class="btn btn-warning"href="/news/edit?id=<?php echo $value['id']?>"><i class="glyphicon glyphicon-pencil"></i>Edit</a>
		</td>

	</tr>
<?php endforeach;
}
?>
</table>
				
								
<?php 
include 'footer.php';
?>