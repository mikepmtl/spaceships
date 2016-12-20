<?php
/**
 * postcardmania
 *
 * @author      Michael Pawlowsky <mikepmtl@me.com>
 * @copyright   2016
 *              File: Pagination.php
 */


namespace Core;


/**
 * Class Pagination - Creates Bootstrap pagination links.
 *
 * @package Core
 */
class Pagination {


	private $total_items;
	private $per_page;
	private $current_page;
	private $base_url;


	/**
	 * Pagination constructor.
	 *
	 * @param array $params Required params are ['total_items => 37', 'per_page' => 10, 'current_page' => 1, 'base_url' => 'http://mysite.com/page=']
	 *
	 */
	public function __construct( $params = [] ) {

		if( count( $params) > 0 ){
			foreach ( $params as $key => $val ){
				if( property_exists( 'Core\\Pagination', $key) ){
					$this->$key = $val;
				}
			}
		}

	}


	/**
	 *
	 * Create the html for pagination links
	 *
	 * @return string
	 */
	public function createLinks(){

		$html = '';

		// If our item count or per-page total is 0 bail out.
		if ( $this->total_items == 0 || $this->per_page == 0)
		{
			return $html;
		}

		// Calculate the total number of pages
		$num_pages = (int) ceil( $this->total_items / $this->per_page );

		// If there's only one page, no need for pagination
		if ( $num_pages == 1)
		{
			return $html;
		}

		// Open our pagination item
		$html = '<nav aria-label="Page navigation"><ul class="pagination">';

		// Create the back item
		$previous_page = $this->current_page > 1 ? $this->current_page - 1 : 1;
		$disabled = (int) $this->current_page === 1 ? true : false;
		if( $disabled ){
			$html .= '<li class="disabled"><span><span aria-hidden="true">&laquo;</span></span></li>';
		} else {
			$html .= '<li><a href="' . $this->base_url . $previous_page . '" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
		}

		// Create the individual page links
		for($i=1; $i < $num_pages + 1; $i++){
			$active = $i === (int) $this->current_page;
			$html .= '<li' . ($active ? ' class="active"' : '') . '><a href="' . $this->base_url . $i . '">' . $i . ($active ? '<span class="sr-only">(current)</span>' : '') . '</a></li>';
		}

		// Create the forward item
		$next_page = $this->current_page < $num_pages ? $this->current_page + 1 : $this->current_page;
		$disabled = (int) $this->current_page === (int) $num_pages ? true : false;
		if( $disabled ){
			$html .= '<li class="disabled"><span><span aria-hidden="true">&raquo;</span></span></li>';
		} else {
			$html .= '<li><a href="' . $this->base_url . $next_page . '" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
		}

		// Close our pagination item
		$html .= '</ul></nav>';

		return $html;

	}

}