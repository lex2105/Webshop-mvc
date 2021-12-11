<div class="card">
    <div class="card-header">Delete confirmation!</div>
    <div class="card-body">Do you really want to delete <?php echo $objectType; ?> "<?php echo $objectTitle; ?>"?</div>
    <div class="card-footer">
        <a href="<?php echo $confirmUrl; ?>" class="btn btn-danger">Delete</a>
        <a href="<?php echo $abortUrl; ?>" class="btn btn-link">Cancel</a>
    </div>
</div>