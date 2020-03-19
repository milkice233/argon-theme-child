<?php
/*
Template Name: 友链页(OSU版)
*/
?>

<?php get_header(); ?>

<?php get_sidebar(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		while ( have_posts() ) :
			the_post();
		?>
<article class="post post-full card bg-white shadow-sm border-0" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="post-header text-center<?php if (has_post_thumbnail() && get_option('argon_show_thumbnail_in_banner_in_content_page') != 'true'){echo " post-header-with-thumbnail";}?>">
		<?php
			if (has_post_thumbnail() && get_option('argon_show_thumbnail_in_banner_in_content_page') != 'true'){
				$thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "full")[0];
				echo "<img class='post-thumbnail' src='" . $thumbnail_url . "'></img>";
				echo "<div class='post-header-text-container'>";
			}
			if (has_post_thumbnail() && get_option('argon_show_thumbnail_in_banner_in_content_page') == 'true'){
				$thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "full")[0];
				echo "
				<style>
					body section.banner {
						background-image: url(" . $thumbnail_url . ") !important;
					}
				</style>";
			}
		?>
		<a class="post-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		<div class="post-meta">
			<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
				<div class="post-meta-detail post-meta-detail-words">
					<i class="fa fa-thumb-tack" aria-hidden="true"></i>
					置顶
				</div>
				<div class="post-meta-devide">|</div>
			<?php endif; ?>
			<div class="post-meta-detail post-meta-detail-views">
				<i class="fa fa-eye" aria-hidden="true"></i>
				<?php get_post_views(get_the_ID()); ?>
			</div>
			<div class="post-meta-devide">|</div>
			<div class="post-meta-detail post-meta-detail-comments">
				<i class="fa fa-comments-o" aria-hidden="true"></i>
				<?php echo get_post(get_the_ID())->comment_count; ?>
			</div>
		</div>
		<?php
			if (has_post_thumbnail() && get_option('argon_show_thumbnail_in_banner_in_content_page') != 'true'){
				echo "</div>";
			}
		?>
	</header>
<style>
	.beatmapsets__content {
		padding: 5px 0px;
	}
	.beatmapsets__items {
		display: flex;
		flex-wrap: wrap;
	}
	.beatmapsets__items-row {
		display: flex;
		width: 100%;
	}

	.beatmapsets__item {
		margin: 5px;
		flex: none;
		width: calc(100% - 10px);
	}
	@media (min-width: 900px){
		.beatmapsets__item {
			width: calc(50% - 10px);
		}
		.beatmapsets__content {
			padding: 5px 15px;
		}
	}

	.beatmapset-panel {
		transform: translateZ(0);
	}
	.beatmapset-panel__panel {
		transform: translateZ(0);
		box-shadow: 0 1px 3px rgba(0,0,0,.25);
		border-radius: 6px 6px 4px 4px;
		width: 100%;
		background: hsl(var(--base-hue),10%,25%);
	}
	.beatmapset-panel__header {
		display: block;
		color: #fff;
		text-decoration: none;
		text-shadow: 0 1px 1px rgba(0,0,0,.75);
		background-image: url(data:image/jpeg;base64,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);
		background-size: auto auto;
		background-position: 50%;
		background-size: cover;
		font-weight: 400;
		height: 120px;
		border-radius: 4px 4px 0 0;
		overflow: hidden;
	}
	.beatmapset-panel__image {
		position: absolute;
		left: 0;
		top: 0;
		height: 100%;
		width: 100%;
		-o-object-fit: cover;
		object-fit: cover;
	}
	.beatmapset-panel__image-overlay {
		position: absolute;
		left: 0;
		top: 0;
		height: 100%;
		width: 100%;
		background-color: rgba(0,0,0,.4);
	}
	.beatmapset-panel:hover .beatmapset-panel__panel {
    	background: hsl(var(--base-hue),10%,30%);
	}
	.beatmapset-panel__title-artist-box {
		position: absolute;
		left: 10px;
		bottom: 10px;
		width: calc(100% - 20px);
	}
	.beatmapset-panel__header-text {
		font-weight: 600;
		font-size: 14px;
		line-height: 1.25;
	}
	.beatmapset-panel__header-text--title {
		font-size: 130%;
	}
	.u-ellipsis-overflow {
		white-space: nowrap!important;
		text-overflow: ellipsis!important;
		overflow: hidden!important;
	}
	.beatmapset-panel__preview-bar {
		background-color: #fc2;
		position: absolute;
		bottom: 0;
		left: 0;
		width: 0;
		height: 3px;
		transition-timing-function: linear;
	}
	.beatmapset-panel__content {
		height: 65px;
		padding: 10px;
	}
	.beatmapset-panel__row {
		display: flex;
	}
	.beatmapset-panel__mapper-source-box {
		font-size: 70%;
		font-weight: 600;
		flex: 1;
		min-width: 0;
	}
	.beatmapset-panel__icons-box {
		flex: none;
	}
	.beatmapset-panel__difficulties {
		position: absolute;
		bottom: 10px;
		left: 10px;
		display: flex;
		align-items: center;
		font-size: 12px;
	}
	.beatmapset-panel__difficulty-icon {
		margin-right: 8px;
	}
	.beatmap-icon {
		font-size: 17px !important;
		display: flex;
		color: #525f7f;
	}
	html.darkmode .beatmap-icon {
		font-size: 17px !important;
		display: flex;
        color: #eee;
	}
	html.darkmode .beatmapset-panel__header {
    	color: #eee;
	}
	/* These rules are against argon theme*/
	a.beatmap-icon:hover::before {
		transform: scaleX(0) !important;
	}
	/* Setting backface-visibility to hidden cause Chrome lagging */
	a.beatmapset-panel__header::before {
		backface-visibility: visible !important;
		transform: none !important;
		transition: none !important;
	}
</style>
	<div class="post-content" id="post_content">
		<?php
			the_content();
		?>
<div class="beatmapsets__content">
    <div class="beatmapsets__items">
		<?php 
			$bookmarks = get_bookmarks( array(
                                    'orderby'        => 'rand',
                                    'order'          => 'ASC'
                                ));
			$item_rows = <<<EOS
				<div class="beatmapsets__items-row">
EOS;
			foreach ( $bookmarks as $bookmark ) {
				$attr = array();
				$name = esc_html($bookmark->link_name);
				$blog_url = esc_url($bookmark->link_url);
				$description = esc_html($bookmark->link_description);
				foreach(explode("\n",$bookmark->link_notes) as $line){
					$split = explode(":",$line,2);
					$key = trim($split[0]);
					$value = trim($split[1]);
					if(!empty($key) && !empty($value)){
						$attr[$key] = $value;
					}
				}
				$banner = $attr['banner'] ?: $bookmark->link_image;
				$banner = esc_url($banner);
				$owner = esc_html($attr['owner']);
				
				$icons_HTML = "";
				foreach($attr as $icon => $url){
					if(stripos($icon,"fa-") !== 0) continue;
					$surl = esc_url($url);
					$sicon = sanitize_html_class($icon);
					$icon_HTML = <<<EOH
						<div class="beatmapset-panel__difficulty-icon">
							<a href="$surl" class="beatmap-icon beatmap-icon--with-hover">
								<i class="fa $sicon"></i>
							</a>
						</div>
EOH;
					$icons_HTML .= $icon_HTML;
				}

				$content = <<<EOC
					<div class="beatmapsets__item">
						<div class="beatmapset-panel">
							<div class="beatmapset-panel__panel">
								<a href="$blog_url" class="beatmapset-panel__header">
									<img src="$banner" class="beatmapset-panel__image">
									<div class="beatmapset-panel__image-overlay"></div>
									<div class="beatmapset-panel__title-artist-box">
										<div
											class="u-ellipsis-overflow beatmapset-panel__header-text beatmapset-panel__header-text--title">
											$name</div>
										<div class="beatmapset-panel__header-text">$owner</div>
									</div>
									<div class="beatmapset-panel__preview-bar" style="transition-duration: 0s; width: 0px;"></div>
								</a>
								<div class="beatmapset-panel__content">
									<div class="beatmapset-panel__row">
										<div class="beatmapset-panel__mapper-source-box">
											<div class="u-ellipsis-overflow">$description</div>
										</div>
										<div class="beatmapset-panel__icons-box"></div>
									</div>
									<div class="beatmapset-panel__difficulties">
										$icons_HTML
									</div>
								</div>
							</div>
							<div class="beatmapset-panel__shadow"></div>
						</div>
					</div>
EOC;
				echo $content;
			}
		?>
	</div>
</div>

</article>
		<?
		    //get_template_part( 'template-parts/content', 'page' );
			if (get_option("argon_show_sharebtn") != 'false') {
				get_template_part( 'template-parts/share' );
			}

			if (comments_open() || get_comments_number()) {
				comments_template();
			}

		endwhile;
		?>

<?php get_footer(); ?>
