<?php
/**
 * postcardmania
 *
 * @author      Michael Pawlowsky <mikepmtl@me.com>
 * @copyright   2016
 *              File: Spaceship.php
 */


namespace App\Controllers;


use App\Models\SpaceshipResponse;
use Core\Cache;
use Core\Exceptions\ExceptionCacheInvalidUrl;
use Core\Exceptions\ExceptionCacheInvalidHttpResponse;
use Core\Input;
use Core\Log;
use Core\Pagination;
use Core\Template;


/**
 * Class Home - Our main home page controller
 *
 * @package App\Controllers
 */
class Home {


	/**
	 *  Display our web page of Spaceships
	 *
	 */
	public static function index(){

		Log::info('RUNNING HOME');

		// Look to see what page number we are on for pagination
		$page = Input::get('page', 1);

		// Get the contents from the Cache if it is still fresh.
		try{

			$cache = new Cache();
			$data = $cache->getCache( API_BASE_URL . $page);

		} catch( ExceptionCacheInvalidUrl $e ){
			return self::prepareError( $e->getMessage() );
		} catch(ExceptionCacheInvalidHttpResponse $e){
			return self::prepareError( $e->getMessage() );
		}


		// if for some reason we have no data create an empty object with an empty results array
		$response = SpaceshipResponse::createFromJson($data);

		$view = new Template();

		// Build the pagination links
		$pagination = new Pagination([
			'current_page'  => (int) $page,
			'total_items'   => $response->count,
			'per_page'      => 10,
			'base_url'      => '/?page='
		]);

		$view->ships = $response->results;
		$view->page_links = $pagination->createLinks();
		$view->content = $view->render( TEMPLATE_DIR . '/home.php');

		return $view->render( TEMPLATE_DIR . '/template.php');

	}


	/**
	 *
	 * Return the template with an error msg in it.
	 *
	 * @param $message
	 *
	 * @return string
	 */
	private static function prepareError($message){
		$view = new Template();
		$view->error_msg = $message;
		$view->content = $view->render( TEMPLATE_DIR . '/error.php');
		return $view->render( TEMPLATE_DIR . '/template.php');
	}


}


