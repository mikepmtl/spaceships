<?php
/**
 * postcardmania
 *
 * @author      Michael Pawlowsky <mikepmtl@me.com>
 * @copyright   2016
 */


namespace Core;


use Core\Exceptions\ExceptionCacheInvalidURL;
use Core\Exceptions\ExceptionCacheInvalidHttpResponse;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;


/**
 * Class Cache - Cache API response for quicker response times.
 *
 * @package Core
 */
class Cache {


	// Contains the raw data
	private $data;
	// URL to fetch data from;
	private $url = "http://swapi.co/api/starships/";
	// MD5 of the URL
	private $hash;


	/**
	 *
	 * Get the data from a URL. If it exists in cache and not expired return that instead.
	 *
	 * @param $url
	 *
	 * @throws \Core\Exceptions\ExceptionCacheInvalidURL
	 */
	public function getCache($url){

		// Validate format of URL
		if( !filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_SCHEME_REQUIRED | FILTER_FLAG_HOST_REQUIRED |FILTER_FLAG_PATH_REQUIRED) ){
			Log::info('Invalid URL passed.');
			throw new ExceptionCacheInvalidURL('Invalid URL');
		}

		$this->url = $url;
		// Create  a hash of the URL for the filename
		$this->hash  = md5($url);

		// Look to see if we have a valid cache file and use it.
		if( ! $this->hasValidCache() ){

			if (! $this->loadData() ){
				Log::info("Unable to load data");
			}

		}

		return $this->data;


	}


	/**
	 *
	 * Load up a URL and save it to a cache file.
	 *
	 * @throws ExceptionCacheInvalidHttpResponse
	 */
	private function loadData(){

		try {

			// Create a new GuzzleHttp client
			$client = new Client([
				'timeout'  => 5.0,
			]);

			// send out the request
			$response = $client->request('GET', $this->url);

			// Make sure we have a valid response
			$code = $response->getStatusCode();
			if($code !== 200){
				Log::info('Received HTTP Error Response');
				throw new ExceptionCacheInvalidHttpResponse('Received HTTP Error Response', $code);
			}

			// Write the response to cache file
			if ($response->getBody()->isReadable()){

				$body = $response->getBody();

				Log::info('Writing new cache file.');

				$this->data = $body->getContents();

				// Write the cache file
				$cache_file = CACHE_DIR . "/" . $this->hash;

				if(! file_put_contents( $cache_file, $this->data, LOCK_EX) ){
					Log::info("Unable to write to cache file: " . CACHE_DIR . "/" . $this->hash);
				}

				return true;


			} else {

				throw new ExceptionCacheInvalidHttpResponse('Invalid Response Body');

			}

		} catch (RequestException $e) {

			Log::info( $e->getMessage() );

			return false;

		}

	}


	/**
	 * Look to see if we have the cache file and if so load it into $data
	 *
	 * @param null $hash The hash of the URL for the file name.
	 *
	 * @return bool
	 */
	private function hasValidCache($hash=null){

		if( !$hash ) $hash = $this->hash;

		if( !$hash ){
			Log::info( "Received empty hash for Cache." );
			return false;
		}

		$cache_file = CACHE_DIR . "/" . $hash;

		if( file_exists( $cache_file ) ){

			// Get last modified timestamp
			$last_modified = filemtime( $cache_file );
			if(!$last_modified){
				Log::info( "Unable to get age of cache file "  . $cache_file );
				return false;
			}

			// Check the age of the cache
			if( is_file($cache_file) && time() > $last_modified + CACHE_TTL ){
				Log::info( "Cache file expired. Deleting: "  . $cache_file );
				unlink ( $cache_file );
				return false;
			}

			$cache = file_get_contents($cache_file);
			if (!$cache) {
				return false;
			}

			Log::info( "Using cache file: "  . $cache_file . " Timestamp: " . $last_modified);
			$this->data = $cache;

			return true;

		} else {

			return false;

		}

	}



}