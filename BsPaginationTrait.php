<?php namespace App\Model\Traits;

trait BsPaginationTrait
{
	/**
	 * Generate bootstrap pagination for anything 
	 * 
	 * @param  integer  $items_count Count of all items to paginate
	 * @param  integer  $take       Limit of items to shows
	 * @param  integer  $max_pages   Limit of max number of pages to show in pagination HTML ex: (5) ...4,5,6,7,8...
	 * @param  integer  $get_offset  Offset for show
	 * @param  string   $url         The url for generate pagination link 
	 * @param  string   $separator   The separator param for the pagination params '?' or '&' etc. You need this if in ex. your url have yet a ?params=your... and you need to atach the pagination by '?params=your'&'pagination=page'
	 * 
	 * @return string The generated HTML
	 */
    public static function getPagination($items_count, $take, $max_pages, $get_offset, $url, $separator = '?')
	{
        // pagination  = $items_count
        if ($items_count > $take) {
            $pages = ceil($items_count / $take);
            $lim = $take;
            $current_page = $get_offset / $take + 1;
            
            // start pagination page
            $calc_start_page = round($current_page - ($max_pages / 2));
            if ($calc_start_page <= 0) {
                // if negative to 1
                $start_page = 1;
            } else {
                $start_page = $calc_start_page;
            }
            // end page
            $calc_end_page = round($current_page + ($max_pages / 2));
            if (($calc_end_page - $start_page) < $max_pages) {
                // if less than half of max page to max page
                $end_page = $max_pages;
            } else {
                $end_page = $calc_end_page;
            }
            if ($end_page >= $pages) {
                // if more than all pages to all pages and start_page to 1 obviously
                $start_page = ($pages < $max_pages) ? 1 : $start_page;
                $end_page = $pages;
            } 
            // calc offset of this page ever -$limit because we have 0 to $limit for first page and the next are equal logic
            $off = $start_page * $take - $take;

            if ($get_offset == 0) {
                $pagin = '<li class="disabled"><a href="javascript:;">&laquo;</a></li>';
            } else {
                $pagin = '<li><a href="'.$url.$separator.'off='.($get_offset - $take).'&lim='.$lim.'">&laquo;</a></li>';
            }
            if ($pages > $max_pages) {
                $pagin .= '<li class="text-lgray"><a href="'.$url.$separator.'off=0&lim='.$lim.'"><small class="text-lgray glyphicon glyphicon-fast-backward"></small></a></li>';
            }
            for ($p = $start_page; $p <= $end_page; $p++) {
                //$active = ($off == $get_offset) ? 'active' : '';
                $active = ($p == $current_page) ? 'active' : '';

                $pagin .= '<li class="'.$active.'"><a href="'.$url.$separator.'off='.$off.'&lim='.$lim.'">'.$p.'</a></li>';
                $off += $lim;
            }
            if ($pages > $max_pages) {
                $pagin .= '<li class=""><a href="'.$url.$separator.'off='.($pages * $take - $take).'&lim='.$lim.'"><small class="text-lgray glyphicon glyphicon-fast-forward"></small></a></li>';
            }
            // end pagination >>
            if (($get_offset + $take) == ($pages * $take)) {
                $pagin .= '<li class="disabled"><a href="javascript:;">&raquo;</a></li>';
            } else {
                $pagin .= '<li><a href="'.$url.$separator.'off='.($get_offset + $take).'&lim='.$lim.'">&raquo;</a></li>';
            }

            return $pagin;
        } else {
            return '<li class="disabled"><a href="javascript:;">&laquo;</a></li><li class="disabled"><a href="javascript:;">1</a></li><li class="disabled"><a href="javascript:;">&raquo;</a></li>';
        }
    }
}
