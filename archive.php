<?php get_header(); ?>
    
    <div id="content" class="widecolumn">
    <?php if (have_posts()) : ?>
        
        <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
        <?php /* If this is a category archive */ if (is_category()) { ?>
        <h2 class="title">Archive for the '<?php echo single_cat_title(); ?>' Category</h2>
        
        <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
        <h2 class="title">Archive for <?php the_time('F jS, Y'); ?></h2>
        
        <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
        <h2 class="title">Archive for <?php the_time('F, Y'); ?></h2>
        
        <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
        <h2 class="title">Archive for <?php the_time('Y'); ?></h2>
        
        <?php /* If this is a search */ } elseif (is_search()) { ?>
        <h2 class="title">Search Results</h2>
        
        <?php /* If this is an author archive */ } elseif (is_author()) { ?>
        <h2 class="title">Author Archive</h2>
        
        <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
        <h2 class="title">Blog Archives</h2>
        
        <?php } ?>
        
        <?php while (have_posts()) : the_post(); ?>
        <div class="post">
            <h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>
            &bull; <?php the_time('l, F jS, Y') ?>
            <p class="postmetadata">Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p> 
        </div>
        <br />
        <?php endwhile; ?>
        
        <div class="navigation">
            <div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
            <div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
        </div>
        
    <?php else : ?>
        
        <h2 class="center">Not Found</h2>
        <?php include (TEMPLATEPATH . '/searchform.php'); ?>
        
    <?php endif; ?>
    </div>
    
<?php get_sidebar(); ?>

<?php get_footer(); ?>