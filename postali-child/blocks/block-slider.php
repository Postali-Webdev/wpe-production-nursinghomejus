<div id="slider" class="slide">
    <?php $n=1 ?>
    <?php if( have_rows('awards','options') ): ?>
    <?php while( have_rows('awards','options') ): the_row(); ?>  
        <div class="column-50" id="award_<?php echo $n; ?>">
            Slider content in here.
        </div>
        <?php $n++; ?>
    <?php endwhile; ?>
    <?php endif; ?> 
    </div>
</div>