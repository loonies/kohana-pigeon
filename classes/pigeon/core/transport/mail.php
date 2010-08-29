<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Mail Transport loader
 *
 * @package    Pigeon
 * @category   Transport
 * @author     Miodrag Tokić <mtokic@gmail.com>
 * @copyright  (c) 2010 Miodrag Tokić
 * @license    MIT
 */
abstract class Pigeon_Core_Transport_Mail extends Pigeon_Transport {

	/**
	 * Returns Mail Transport object
	 *
	 * @param   array   Mail Transport options
	 * @return  Swift_MailTransport
	 */
	public function load($options = NULL)
	{
		$transport = Swift_MailTransport::newInstance();

		if (isset($options['params']))
		{
			// Set extra parameters [PHP mail() - additional_parameters](http://php.net/manual/en/function.mail.php)
			$transport->setExtraParams($options['params']);
		}

		return $transport;
	}
}
