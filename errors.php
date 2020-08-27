<?php if(count($errors) > 0) : ?>

<div class="container">

<?php foreach($errors as $error) : ?>

    <div class="alert alert-danger" role="alert">
        <?php echo $error?>
    </div> 
    <br>

<?php endforeach; ?>

</div>

<?php endif; ?>