<?php if(isset($error)): ?>
        <ul class="text-danger">
            <?php foreach($error as $err): ?>
            <li><?php echo $err ?></li>
            <?php endforeach; ?>
        </ul>  
        <?php endif; ?>