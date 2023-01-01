<?php
    $posttags = get_the_tags();
    if ($posttags):
    ?>
    <p class="card-text">Tags: 
<?php
        foreach($posttags as $tag) {
            echo $tag->name . ', ';
        }
?>
    </p>
<?php endif; ?>
</p>