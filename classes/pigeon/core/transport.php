<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Transport system
 *
 * @package    Pigeon
 * @category   Transport
 * @author     Miodrag Tokić <mtokic@gmail.com>
 * @copyright  (c) 2010 Miodrag Tokić
 * @license    MIT
 */
abstract class Pigeon_Core_Transport {

	/**
	 * Returns a new Transport object
	 *
	 *     // Create a new transport, based on the `external` configuration group
	 *     $transport = Pigeon_Transport::factory('external');
	 *
	 * @param   string  Configuration group name
	 * @return  Swift_MailTransport
	 * @return  Swift_SmtpTransport
	 * @return  Swift_SendmailTransport
	 */
	public static function factory($group)
	{
		$config = Kohana::config('pigeon')->get($group);

		$class = 'Pigeon_Transport_'.ucfirst($config['transport']);

		$transport = new $class;

		return $transport->load($config['options']);
	}
}
