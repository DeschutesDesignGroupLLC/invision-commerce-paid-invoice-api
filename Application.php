<?php
/**
 * @brief		Commerce Paid API Endpoint Application Class
 * @author		<a href='https://www.deschutesdesigngroup.com'>Deschutes Design Group LLC</a>
 * @copyright	(c) 2023 Deschutes Design Group LLC
 * @package		Invision Community
 * @subpackage	Commerce Paid API Endpoint
 * @since		13 Feb 2023
 * @version
 */
namespace IPS\commercepaidapi;

/**
 * Commerce Paid API Endpoint Application Class
 */
class _Application extends \IPS\Application
{
	/**
	 * [Node] Get Icon for tree
	 *
	 * @note    Return the class for the icon (e.g. 'globe')
	 * @return    string|null
	 */
	protected function get__icon()
	{
		// Return the application icon
		return 'dollar';
	}
}