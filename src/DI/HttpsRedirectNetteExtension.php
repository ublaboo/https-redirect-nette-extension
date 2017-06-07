<?php

/**
 * @copyright   Copyright (c) 2015 ublaboo <ublaboo@paveljanda.com>
 * @author      Pavel Janda <me@paveljanda.com>
 * @package     Ublaboo
 */

namespace Ublaboo\HttpsRedirectNetteExtension\DI;

use Nette\DI\CompilerExtension;
use Nette\PhpGenerator\ClassType;

class HttpsRedirectNetteExtension extends CompilerExtension
{

	private $defaults = [
		'redirectTo' => 'https', // or http
		'redirectCode' => 301, // or any other http status code
		'enable' => true // of false
	];


	public function afterCompile(ClassType $class)
	{
		$config = $this->validateConfig($this->defaults, $this->config);

		$body = '
			$url = $this->getService(\'http.request\')->getUrl();

			if (? && ? !== $url->getScheme()) {
				$url->setPort(NULL);
				$url->setScheme(?);
				$this->getService(\'http.response\')->redirect((string) $url, ?);
				exit(0);
			}';

		$initialize = $class->methods['initialize'];

		$initialize->addBody($body, [
			$config['enable'],
			$config['redirectTo'],
			$config['redirectTo'],
			$config['redirectCode']
		]);
	}

}
