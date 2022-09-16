<div class="container">
    <div class="row">
        <div class="col-sm-5">
            <h1>My Advertisements - Edit</h1>
        </div>
        <div class="col" style="margin-top: 23px;">
            or 
            <a href="<?= BASE_URL;?>Advertisement"><div class="btn btn-default">See items</div></a>
        </div>
    </div>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="category">Category:</label>
            <select class="form-control" name="category" id="category">
                <?php 
                    foreach ($categories as $category): ?>
                        <option value="<?= $category['id'] ?>" 
                        <?= isset($category_id) && $category_id == $category['id'] ? "selected='selected'": '' ?>>
                            <?= $category['name'] ?>
                        </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" id="title" value="<?= $title ?? '' ?>">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <input type="text" class="form-control" name="description" id="description" value="<?= $description ?? '' ?>">
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="text" class="form-control" name="price" id="price" value="<?= $price ?? '' ?>">
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" name="status" id="status">
                <option value="0" <?= isset($status) && $status == 0 ? "selected='selected'": '' ?>>New</option>
                <option value="1" <?= isset($status) && $status == 1 ?"selected='selected'": '' ?>>Semi-new</option>
                <option value="2" <?= isset($status) && $status == 2 ?"selected='selected'": '' ?>>Used</option>
            </select>
        </div>
        <div class="form-group">
            <label for="photos">New Photos:</label>
            <input type="file" name="photos[]" id="photos" multiple><br>
            <div class="panel panel-default">
                <div class="panel-heading">Photos</div>
                <div class="panel-body">
                    <?php if(isset($photos)): ?>
                        <?php foreach($photos as $photo) : ?>
                            <div class="photo-item">
                                <img class="img-thumbnail" src="<?= BASE_URL;?>assets/images/advertisements/<?= $photo['url']; ?>" border="0" />
                                <a href="<?= BASE_URL;?>advertisement/deletePhoto/<?= $photo['id']; ?>" class="btn btn-danger">Delete</a>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <input type="submit" class="btn btn-success" value="Save">
    </form>
</div>
