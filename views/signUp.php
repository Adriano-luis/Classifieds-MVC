<?php if(isset($error) || isset($haveToFill)): ?>
    <div class="alert alert-danger">
        <?php 
            if(isset($error))
                echo $error;
                
            if(isset($haveToFill))
                echo $haveToFill;
        ?>  
    </div> 
<?php endif; ?>
<?php if(isset($success)): ?>
<div class="alert alert-success">
        <?php 
            if(isset($success))
                echo $success;
        ?>   
    </div> 
<?php endif; ?>     
<div class="container">
    <h1>Sign Up</h1>
    <form method="POST">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Type your name here!">
        </div>
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Type your e-mail here!">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Type your password here!">
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Type your phone here!">
        </div>

        <input type="submit" class="btn btn-success"value="Go">
    </form>
</div>
