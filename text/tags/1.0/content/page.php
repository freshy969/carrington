<?php

// This file is part of the Carrington Text Theme for WordPress
// http://carringtontheme.com
//
// Copyright (c) 2008 Crowd Favorite, Ltd. All rights reserved.
// http://crowdfavorite.com
//
// Released under the GPL license
// http://www.opensource.org/licenses/gpl-license.php
//
// **********************************************************************
// This program is distributed in the hope that it will be useful, but
// WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. 
// **********************************************************************

if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); }
if (CFCT_DEBUG) { cfct_banner(__FILE__); }

global $previousday, $authordata;
$previousday = -1;

?>
<div id="post-content-<?php the_ID() ?>" <?php post_class('hentry full') ?>>
	<h1 class="entry-title full-title"><a href="<?php the_permalink() ?>" title="Permanent link to <?php the_title_attribute() ?>" rel="bookmark" rev="post-<?php the_ID(); ?>"><?php the_title() ?></a></h1>
	<div class="entry-content full-content">
<?php

the_content();
link_pages('<p class="pages-link">'.__('Pages: ', 'carrington-text'), "</p>\n", 'number');

?>
	</div><!--/entry-content-->
	<div class="clear"></div>
	<div class="by-line">
		<?php edit_post_link(__('Edit', 'carrington-text'), '<div class="entry-editlink">', '</div>'); ?>
		<span class="date full-date"><?php the_date(); _e(' at ', 'carrington-text'); the_time(); ?></span>
	</div><!--/by-line-->
</div><!-- .post -->