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

	/**
	 * @param array<string, string> $attributes
	 */
	public function process(string $email, ?string $text = null, array $attributes = []): ProtectedEmail
	{
		return (new ProtectedEmail($email, $text))->setAttributes($attributes);
	}

}
