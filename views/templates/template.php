<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=BASE_URL;?>assets/css/style.css">
    <title>Classifild - MVC</title>
</head>
<body>
    <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="<?= BASE_URL;?>" class="navbar-brand">Classifieds</a>
                </div>
                <ul class="nav navbar-nav navbar-right mr-auto">
                    <?php if(isset($_SESSION['user_id'])): ?>
                        <li class="nav-item">
                            <a class="nav-link"><?= $_SESSION['user_name']; ?></a> 
                        </li>
                        <li class="nav-item">
                            <a href="<?= BASE_URL;?>advertisement" class="nav-link">My items</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= BASE_URL;?>user/logout" class="nav-link">Logout</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a href="<?= BASE_URL;?>user/subscribe" class="nav-link">Sign Up</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= BASE_URL;?>user" class="nav-link">Login</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>

    <?php $this->loadViewInTemplate($viewName, $viewData) ?>

    <script src="<?=BASE_URL;?>assets/js/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="<?=BASE_URL;?>assets/js/script.js"></script>
</body>
</html>