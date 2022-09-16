<div class="container">
    <div class="row">
        <div class="col-sm-5">    
            <h1>My Advertisements - New</h1>
        </div>
        <div class="col" style="margin-top: 23px;">
            or 
            <a href="<?= BASE_URL;?>advertisement"><div class="btn btn-default">See items</div></a>
        </div>
    </div>
    <?php if(isset($success) && $success === true):?>
        <div class="alert alert-success alert-dismiss">Advertisement added!</div>
    <?php endif;?>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="category">Category:</label>
            <select class="form-control" name="category" id="category">
                <?php 
                    foreach ($categories as $category): ?>
                        <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" id="title">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <input type="text" class="form-control" name="description" id="description">
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="text" class="form-control" name="price" id="price">
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" name="status" id="status">
                <option value="0">New</option>
                <option value="1">Semi-new</option>
                <option value="2">Used</option>
            </select>
        </div>
        <input type="submit" class="btn btn-success"value="Add">
    </form>
</div>