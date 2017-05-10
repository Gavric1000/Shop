<ul class="jshop_menu">
<?php
  foreach($categories_arr as $curr){
      $class = "level_".$curr->level;
      if ($categories_id[$curr->level]==$curr->category_id) $class = $class."_a";      
      ?>
      <li class = "<?php print $class?>">
            <a href = "<?php print $curr->category_link?>"><?php print $curr->name?>
                <?php if ($show_image && $curr->category_image){?>
                    <img align = "absmiddle" src = "<?php print $jshopConfig->image_category_live_path."/".$curr->category_image?>" alt = "<?php print $curr->name?>" />
                <?php } ?>
            </a>
      </li>
  <?php
  }
?>
</ul>