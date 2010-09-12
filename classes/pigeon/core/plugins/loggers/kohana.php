<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Logs to the Kohana logger
 *
 * @package    Pigeon
 * @category   Plugin
 * @author     Miodrag Tokić <mtokic@gmail.com>
 * @copyright  (c) 2010 Miodrag Tokić
 * @license    MIT
 */
abstract class Pigeon_Core_Plugins_Loggers_Kohana implements Swift_Plugins_Logger {

	public function add($entry)
	{
		// Add a log entry
		Kohana::$log->add(Kohana::DEBUG, $entry);
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
