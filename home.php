<?php get_header(); ?>
    
    <div id="content" class="narrowcolumn">
    
    <?php if (have_posts()) : ?>
    
        <!-- First Post -->
        <?php $top_query = new WP_Query('showposts=1'); ?>
        <?php while($top_query->have_posts()) : $top_query->the_post(); $first_post = $post->ID; ?>
            <?php 
            $url    = $_SERVER['REQUEST_URI'];
            $find = "page";
            $pos    = strpos($url, $find); 
            if ( $pos == false ) : ?>
            <div class="post top" id="post-<?php the_ID(); ?>">
                <h2 class="first"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
                <span class="postmetadata">&nbsp;<?php the_date() ?>  &bull; <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?> <?php edit_post_link('Edit', '(', ')'); ?></span>
                
                <div class="entry">
                    <?php the_content("<span class=\"continue\">" . __('Continue reading','') . " '" . the_title('', '', false) . "'</span>"); ?>
                </div>
            </div>
            <?php endif; ?>
        <?php endwhile; ?>
        
        <!-- Next few posts -->
        <?php while(have_posts()) : the_post(); if(!($first_post == $post->ID)) : ?>
        
            <div class="post lastfive" id="post-<?php the_ID(); ?>">
                <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
                <span class="postmetadata">&nbsp;<?php the_date() ?> &bull; <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?> <?php edit_post_link('Edit', '(', ')'); ?></span>
                
                <div class="entry">
                    <?php the_content("<span class=\"continue\">" . __('Continue reading','') . " '" . the_title('', '', false) . "'</span>"); ?>
                </div>
            </div>
            
        <?php endif; endwhile; ?>
        
    <?php else : ?>
        
        <h2 class="center">Not Found</h2>
        <p class="center">Sorry, but you are looking for something that isn't here.</p>
        <?php include (TEMPLATEPATH . "/searchform.php"); ?>
        
    <?php endif; ?>
    
    <div class="navigation clearfix">
    <?php $_SERVER['REQUEST_URI']  = preg_replace("/(.*?).php(.*?)&(.*?)&(.*?)&_=/","$2$3",$_SERVER['REQUEST_URI']); ?>
        <div class="left"><?php next_posts_link('<span>&laquo;</span> '.__('Previous Entries','').''); ?></div>
        <div class="right"><?php previous_posts_link(''.__('Next Entries','').' <span>&raquo;</span>'); ?></div>
        <div class="clear"></div>
    </div>
    
    </div>
    
<?php get_sidebar(); ?>

<?php get_footer(); ?>
