/**
 * postcardmania
 *
 * @author      Michael Pawlowsky <mikepmtl@me.com>
 * @copyright   2016
 *              File: Public/Home/_Index.js
 */


Public.Home.Index = function () {

	"use strict";

	// private methods
	var _init = function () {


		//Private vars
		var _spaceship_url = '';

		// Attache event listener to More Info buttons
		$(".show-spaceship-details").on('click', function ( event ) {
			_spaceship_url = $(this).data('spaceship-url');
			console.log('Spaceship URL: ' + _spaceship_url);
			_getSpaceshipData(_spaceship_url);

		});

		/**
		 *  Fetch the spaceship data from the API
		 * @param url
		 * @private
		 */
		function _getSpaceshipData( url ){

			$.getJSON({
				dataType: "json",
				method: "GET",
				url: url,
				timeout: 5000,
				cache: false
			}).fail(function (response) {

				alert(response.statusText);

			}).done(function (response) {

				_showModalSpaceshipSpecs( response );

			});


		}

		/**
		 * Format a number with commas
		 * @param x
		 * @returns {string}
		 */
		function _numberWithCommas(x) {
			var parts = x.toString().split(".");
			parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
			return parts.join(".");
		}

		/**
		 * @param str
		 * @returns {*|string|XML|void}
		 */
		// function _toTitleCase(str)
		// {
		// 	return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
		// }



		/**
		 *  Show the modal dailog box with spaceship specs
		 * @param spaceship
		 * @private
		 */
		function _showModalSpaceshipSpecs(spaceship) {

			var modal = $("#modal-spaceship-specs");

			modal.find('.modal-title').text(spaceship.name);
			modal.find('.modal-body').html(
				'<div>'
				+ '<strong>Manufacturer:</strong><span class="title"> ' + spaceship.manufacturer + '</span><br />'
				+ '<strong>Starship Class:</strong><span class="title"> ' + spaceship.starship_class + '</span><br />'
				+ '<strong>Hyperdrive Rating:</strong> ' + spaceship.hyperdrive_rating + '<br />'
				+ '<strong>Cargo Capacity:</strong> ' + _numberWithCommas(spaceship.cargo_capacity) + '<br />'
				+ '<strong>Cost in Credits:</strong> ' + _numberWithCommas(spaceship.cost_in_credits) + '<br />'
				+ '<strong>Max Atmosphering Speed:</strong> ' + _numberWithCommas(spaceship.max_atmosphering_speed) + '<br />'
				+ '<strong>MGLT:</strong> ' + spaceship.MGLT + '<br />'
				+ '</div>'
			);

			modal.modal('toggle', $(this));

			modal.on('hidden.bs.modal', function () {
				$(this).removeData('bs.modal');
			});

		}

	};

	return {

		init: _init

	};

};
