<?php declare (strict_types = 1);

namespace Wavevision\LatteFilters\Email;

use Nette\SmartObject;
use Wavevision\DIServiceAnnotation\DIService;

/**
 * @DIService(generateInject=true)
 */
class Email
{

	use SmartObject;

	public function process(string $email, ?string $text = null): ProtectedEmail
	{
		return new ProtectedEmail($email, $text);
	}

}
