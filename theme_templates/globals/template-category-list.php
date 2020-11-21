<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

?>

<div class="category-list-wrapper clearfix">
  <div class="container-lg">
    <nav class="category-scroll">
      <ul>
        <li class="<?php echo is_home()? 'active' : ''; ?>"><a href="<?php echo $blog_url ?>">All Makeovers</a></li>

        <?php foreach ($categories as $c):
          if('Uncategorized' === $c->name){continue;}
          ?>
        <li class="<?php echo is_category() && isset($obj->term_id ) && $c->term_id === $obj->term_id ? 'active' : '' ?>">
          <a href="<?php echo get_category_link($c) ?>"><?php echo $c->name ?></a>
        </li>

        <?php endforeach ?>
      </ul>
    </nav>
  </div>
</div>