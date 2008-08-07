    <div id="sidebar">
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
    
        <?php include (TEMPLATEPATH . '/searchform.php'); ?>
        
        <?php if (is_single()) { ?>
            
            <h3>About This Post</h3>
            <p class="postmetadata alt">
                <small>
                    This entry was posted on <?php the_time('l, F jS, Y') ?> at <?php the_time() ?> and is filed under <?php the_category(', ') ?>. You can follow any responses to this entry through the <?php comments_rss_link('RSS 2.0'); ?> feed.
                    
                    <?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
                        // Both Comments and Pings are open ?>
                        You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(true); ?>" rel="trackback">trackback</a> from your own site.
                    
                    <?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
                        // Only Pings are Open ?>
                        Responses are currently closed, but you can <a href="<?php trackback_url(true); ?> " rel="trackback">trackback</a> from your own site.
                    
                    <?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
                        // Comments are open, Pings are not ?>
                        You can skip to the end and leave a response. Pinging is currently not allowed.
                    
                    <?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
                        // Neither Comments, nor Pings are open ?>
                        Both comments and pings are currently closed.
                    
                    <?php } edit_post_link('Edit this entry.','',''); ?>
                    
                </small>
            </p>
            
            <h3>Navigate</h3>
            
            <ul class="navigation">
                <?php previous_post_link('<li>Previous: <strong>%link</strong></li>') ?>
                <?php next_post_link('<li>Next: <strong>%link</strong></li>') ?>
            </ul>   
            
        <?php } else { ?>
            
            <?php /* If this is a 404 page */ if (is_404()) { ?>
            <?php /* If this is a category archive */ } elseif (is_category()) { ?>
            <h3>About This Page</h3>
            <p>You are currently browsing the archives for the <?php single_cat_title(''); ?> category.</p>
            
            <?php /* If this is a yearly archive */ } elseif (is_day()) { ?>
            <h3>About This Page</h3>
            <p>You are currently browsing the <a href="<?php bloginfo('home'); ?>/"><?php echo bloginfo('name'); ?></a> weblog archives
            for the day <?php the_time('l, F jS, Y'); ?>.</p>
            
            <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
            <h3>About This Page</h3>
            <p>You are currently browsing the <a href="<?php bloginfo('home'); ?>/"><?php echo bloginfo('name'); ?></a> weblog archives
            for <?php the_time('F, Y'); ?>.</p>
            
            <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
            <h3>About This Page</h3>
            <p>You are currently browsing the <a href="<?php bloginfo('home'); ?>/"><?php echo bloginfo('name'); ?></a> weblog archives
            for the year <?php the_time('Y'); ?>.</p>
            
            <?php /* If this is a monthly archive */ } elseif (is_search()) { ?>
            <h3>About This Page</h3>
            <p>You have searched the <a href="<?php echo bloginfo('home'); ?>/"><?php echo bloginfo('name'); ?></a> weblog archives
            for <strong>'<?php echo wp_specialchars($s); ?>'</strong>. If you are unable to find anything in these search results, you can try one of these links.</p>
            
            <?php /* If this is a monthly archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
            <h3>About This Page</h3>
            <p>You are currently browsing the <a href="<?php echo bloginfo('home'); ?>/"><?php echo bloginfo('name'); ?></a> weblog archives.</p>
            
            <?php } ?>
            
            <h3>Pages</h3>
            <ul>
            <?php wp_list_pages('title_li='); ?>
            </ul>
            
            <h3>Archives</h3>
            <ul>
            <?php wp_get_archives('type=monthly'); ?>
            </ul>
            
            <h3>Categories</h3>
            <ul>
            <?php wp_list_cats('sort_column=name&optioncount=1&hierarchical=0'); ?>
            </ul>
            
        <?php } ?>
    
    <?php endif; ?>
    </div>