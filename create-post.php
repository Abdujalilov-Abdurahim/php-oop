<?php
$title = "Post yaratish";
require_once "config/bootstrap.php";
require "header/navbar.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $title = $_POST["title"];
    $body = $_POST["body"];

    $result = Post::create($title, $body);
    if($result == 1) {
        header("Location: index.php");
		exit;
}
}

?>

<div class="container">
	<div class="row">
	    
	    <div class="col-md-8 col-md-offset-2">
	        
    		<h1>Create post</h1>
    		
    		<form action="" method="POST">  		    
    		    <div class="form-group">
    		        <label for="title">Title <span class="require">*</span></label>
    		        <input type="text" class="form-control" name="title" placeholder="title" />
    		    </div>
    		    
    		    <div class="form-group">
    		        <label for="description">Description</label>
    		        <textarea rows="5" class="form-control" name="body" placeholder="body" ></textarea>
    		    </div>
    		    
    		    
    		    <div class="form-group">
    		        <button type="submit" class="btn btn-primary">
    		            Create
    		        </button>
    		    </div>
    		    
    		</form>
		</div>
		
	</div>
</div>

<?php require "header/footer.php"; ?>