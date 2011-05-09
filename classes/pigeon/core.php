<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Wrapper class around SwiftMailer
 *
 * @package    Pigeon
 * @category   Base
 * @author     Miodrag Tokić <mtokic@gmail.com>
 * @copyright  (c) 2010-2011 Miodrag Tokić
 * @license    MIT
 */
abstract class Pigeon_Core {

	// Current version
	const VERSION = '0.1';

	// Default mailer group
	public static $default = 'default';

	// Is SwiftMailer loaded?
	protected static $_loaded = FALSE;

	// Mailer instances
	protected static $_instances = array();

	/**
	 * Load the SwiftMailer
	 *
	 * @return  void
	 */
	public static function load()
	{
		if (Pigeon::$_loaded)
		{
			// Do not allow loading twice
			return;
		}

		if ( ! class_exists('Swift_Mailer', FALSE))
		{
			if (($path = Kohana::find_file('vendor', 'swiftmailer/lib/swift_required')) === FALSE)
				throw new Kohana_Exception('SwiftMailer could not be found');

			// Load SwiftMailer
			require $path;
		}

		// Sets the default charset
		Swift_Preferences::getInstance()->setCharset(Kohana::$charset);

		// SwiftMailer is loaded
		Pigeon::$_loaded = TRUE;
	}

	/**
	 * Returns a new mailer instance
	 *
	 *     // Create a new SwiftMailer's Mailer object
	 *     $mailer = Pigeon::mailer('external');
	 *
	 * @param   string  Configuration group name
	 * @return  Swift_Mailer
	 */
	public static function mailer($group = NULL)
	{
		if ($group === NULL)
		{
			// Use the default group
			$group = Pigeon::$default;
		}

		if ( ! isset(Pigeon::$_instances[$group]))
		{
			// Make sure SwiftMailer is loaded
			Pigeon::load();

			// Create a new transport instance
			$transport = Pigeon_Transport::factory($group);

			// Create a new mailer instance
			Pigeon::$_instances[$group] = Swift_Mailer::newInstance($transport);
		}

		return Pigeon::$_instances[$group];
	}
}
