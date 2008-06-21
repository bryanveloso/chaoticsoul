<?php get_header(); ?>

	<div id="content" class="narrowcolumn">

	<?php if (have_posts()) : ?>

		<?php while(have_posts()) : the_post() ?>	
		
			<div class="post lastfive" id="post-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<span class="postmetadata">&nbsp;<?php the_date() ?> &bull; <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?> <?php edit_post_link('Edit', '(', ')'); ?></span>

				<div class="entry">
					<?php the_content("<span class=\"continue\">" . __('Continue reading','') . " '" . the_title('', '', false) . "'</span>"); ?>
				</div>
			</div>

		<?php endwhile; ?>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>

	<div class="navigation">
	<?php $_SERVER['REQUEST_URI']  = preg_replace("/(.*?).php(.*?)&(.*?)&(.*?)&_=/","$2$3",$_SERVER['REQUEST_URI']); ?>
		<div class="left"><?php next_posts_link('<span>&laquo;</span> '.__('Previous Entries','').''); ?></div>
		<div class="right"><?php previous_posts_link(''.__('Next Entries','').' <span>&raquo;</span>'); ?></div>
		<div class="clear"></div>
	</div>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
