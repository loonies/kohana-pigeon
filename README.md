## Introduction

Pigeon is wrapper module around SwiftMailer for Kohana 3.x.

Pigeon module also comes with logger plugin for Kohana.

## Instalation

	$ git submodule add git://github.com/loonies/kohana-pigeon.git modules/pigeon
	$ cd modules/pigeon
	$ git submodule update --init

## Configuration

The configuration file is divided into configuration group. For each of the group you define a transport connection settings. That way you can have different servers for sending the emails.

If you omit some option default value will be set. Take a look into configuration file for examples.

	'gmail' => array(
		'transport' => 'smtp',
		'options'   => array(
			'host'       => 'smtp.gmail.com',
			'port'       => 465,
			'timeout'    => 10,
			'encryption' => 'ssl',
			'username'   => 'user',
			'password'   => 'pass',
		),
	),
	'myserver' => array(
		'transport' => 'smtp',
		'options'   => array(
			'host'       => 'smtp.myserver.com',
			'timeout'    => 10,
			'username'   => 'user',
			'password'   => 'pass',
		),
	),

## Usage

Before using SwiftMailer you have to load it.

	Pigeon::load();

	// Continue with standard SwiftMailer usage
	$message = Swift_Message::newInstance();
	$message->setSubject()
	...

Create a mailer instance.

	$gmail = Pigeon::mailer('gmail');

**Note**: Pigeon::mailer() will internally call Pigeon::load().

Send the message.

	$gmail->send($message);


## Logging

Pigeon logger will pass SwiftMailer logs to the Kohana logging object.

	$logger = new Pigeon_Plugins_Loggers_Kohana;
	$gmail->registerPlugin(new Swift_Plugins_LoggerPlugin($logger));

