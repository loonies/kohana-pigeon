<?php defined('SYSPATH') or die('No direct script access.');
/**
 * SMTP Transport loader
 *
 * @package    Pigeon
 * @category   Transport
 * @author     Miodrag Tokić <mtokic@gmail.com>
 * @copyright  (c) 2010 Miodrag Tokić
 * @license    MIT
 */
abstract class Pigeon_Core_Transport_Smtp extends Pigeon_Transport {

	/**
	 * Returns SMTP Transport object
	 *
	 * @param   array   SMTP Transport options
	 * @return  Swift_SmtpTransport
	 */
	public function load($options = NULL)
	{
		$transport = Swift_SmtpTransport::newInstance();

		if (isset($options['host']))
		{
			// Set hostname
			$transport->setHost($options['host']);
		}

		if (isset($options['port']))
		{
			// Set port number
			$transport->setPort($options['port']);
		}

		if (isset($options['timeout']))
		{
			// Set connection timeout
			$transport->setTimeout($options['timeout']);
		}

		if (isset($options['encryption']))
		{
			// Set encription type (ssl, tls)
			$transport->setEncryption($options['encryption']);
		}

		if (isset($options['username']))
		{
			// Set username
			$transport->setUsername($options['username']);
		}

		if (isset($options['password']))
		{
			// Set password
			$transport->setPassword($options['password']);
		}

		return $transport;
	}
}
