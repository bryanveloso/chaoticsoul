<?php get_header(); ?>
    
    <div id="content" class="widecolumn">
    
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        
        <div class="post" id="post-<?php the_ID(); ?>">
            <h2 class="title"><a href="<?php echo get_permalink(); ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h2>
            
            <div class="entrytext">
                <?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
                <?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
                <p class="authormeta">~ by <?php the_author(); ?> on <? the_date(); ?>.</p>
                <?php if (the_category(', ')): ?><p class="postmetadata">Posted in <?php the_category(', '); ?> | <?php edit_post_link('Edit', '', ' | '); ?></p><?php endif; ?>
                <?php if (get_the_tags()): ?><p class="postmetadata"><?php the_tags(); ?></p><?php endif; ?>
            </div>
        </div>
        
    <?php comments_template(); ?>
    
    <?php endwhile; else: ?>
    
        <p>Sorry, no posts matched your criteria.</p>
    
    <?php endif; ?>
    
    </div>
    
<?php get_sidebar(); ?>

<?php get_footer(); ?>
