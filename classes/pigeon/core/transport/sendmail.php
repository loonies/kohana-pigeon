<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Sendmail Transport loader
 *
 * @package    Pigeon
 * @category   Transport
 * @author     Miodrag Tokić <mtokic@gmail.com>
 * @copyright  (c) 2010 Miodrag Tokić
 * @license    MIT
 */
abstract class Pigeon_Core_Transport_Sendmail extends Pigeon_Transport {

	/**
	 * Returns Sendmail Transport object
	 *
	 * @param   array   Sendmail Transport options
	 * @return  Swift_SendmailTransport
	 */
	public function load($options = NULL)
	{
		$transport = Swift_SendmailTransport::newInstance();

		if (isset($options['command']))
		{
			// Set command
			$transport->setCommand($options['command']);
		}

		return $transport;
	}
}
