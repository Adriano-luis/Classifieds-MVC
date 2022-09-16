<div class="container">
    <h1>My Advertisements</h1>
    <a href="<?= BASE_URL;?>advertisement/new" class="btn btn-default">New Advertisement</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Photo</th>
                <th>Title</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <?php foreach($list as $item): ?>
            <tr>
                <td>
                    <?php isset($item['url']) ? $img = $item['url'] : $img = 'default.png'; ?>
                    <img src="<?= BASE_URL;?>assets/images/advertisements/<?= $img ?>" alt="" height="75">
                </td>
                <td>
                    <?= $item['title']; ?>
                </td>
                <td>
                    <?= number_format($item['price'], 2); ?>
                </td>
                <td>
                    <a href="<?= BASE_URL;?>advertisement/edit/<?= $item['id'] ?>" class="btn btn-primary">Edit</a>
                    <a href="<?= BASE_URL;?>advertisement/delete/<?= $item['id'] ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php endforeach;  ?>
    </table>
</div>