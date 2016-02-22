<?php

if (!function_exists('bakeryslider')) {
	function bakeryslider($items = 0, $view_order = 0, $visible = 5) {

		// Register outside object
		global $database;

		// Initialize vars
		$output = "\n";
		$n      = "\n";

		// Convert all numeric inputs to integer
		$num_items = (int) $items;
		if ($view_order == 2) {
			$order = " ORDER BY RAND()";
		} elseif ($view_order == 1) {
			$order = " ORDER BY item_id DESC";
		}
		else {
			$order = " ORDER BY item_id ASC";
		}

		// Query the bakery items
		$sql = "SELECT item_id, link, title FROM ".TABLE_PREFIX."mod_bakery_items WHERE active = '1' AND title != ''";
		if ($num_items == 0) {
			$query_files = $database->query($sql.$order);
		} else {
			$query_files = $database->query($sql.$order." LIMIT ".$num_items);
		}
		$number_found = $query_files->numRows();

		// HTML output
		if ($number_found) {
			$output  = '<script src="'.WB_URL.'/modules/bakeryslider/jquery.jcarousellite.min.js" type="text/javascript" ></script>'.$n;
			$output .= '<script type="text/javascript">'.$n;
			$output .= '$(function() {'.$n;
			$output .= '	$(".slider").jCarouselLite({'.$n;
			$output .= '		auto: 2000,'.$n;
			$output .= '		speed: 2000,'.$n;
			$output .= '		visible: '.$visible.$n;
			$output .= '	});'.$n;
			$output .= '});'.$n;
			$output .= '</script>'.$n;
	
			$output .= '<div id="jCarouselLite">'.$n;
			$output .= '<div class="slider">'.$n;
			$output .= '<ul>'.$n;

			while ($item = $query_files->fetchRow()) {

				$item['title'] = strip_tags($item['title']);
				$item_link     =  WB_URL . '/pages' .$item['link'].'.php';

				// Query the main image
				$img_filename = $database->get_one("SELECT filename FROM ".TABLE_PREFIX."mod_bakery_images WHERE item_id = '".$item['item_id']."' AND active = '1' ORDER BY position ASC LIMIT 1");
				if (!$img_filename) {
					continue;
				}

				if ($item['title'] != '') {
					$output .='<li><span><a href="'.$item_link .'" title="'.$item['title'].'"><img src="'.WB_URL.MEDIA_DIRECTORY.'/bakery/thumbs/item'.$item['item_id'].'/'.$img_filename.'" /></a></span></li>';
					$output .= $n;
				}
			}
			$output .= '</ul>'.$n;
			$output .= '</div>'.$n;
			$output .= '</div>'.$n;
	
			echo $output;

		} else {
			echo '<p><strong>Kein Shopartikel eingetragen</strong></p>'.$n;
		}
	}
}

?>