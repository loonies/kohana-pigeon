<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Logs to the Kohana logger
 *
 * @package    Pigeon
 * @category   Plugins
 * @author     Miodrag Tokić <mtokic@gmail.com>
 * @copyright  (c) 2010-2011 Miodrag Tokić
 * @license    MIT
 */
abstract class Pigeon_Core_Plugins_Loggers_Kohana implements Swift_Plugins_Logger {

	public function add($entry)
	{
		// Split entry into messages
		$messages = explode(PHP_EOL, rtrim($entry));

		foreach ($messages as $message)
		{
			// Add a log message
			Kohana::$log->add(Log::DEBUG, '[Pigeon] '.rtrim($message));
		}
	}

	public function clear()
	{
		// Not implemented
	}

	public function dump()
	{
		// Not implemented
	}
}
