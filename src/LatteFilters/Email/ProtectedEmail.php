<?php declare (strict_types = 1);

namespace Wavevision\LatteFilters\Email;

use Nette\SmartObject;
use function dechex;
use function ord;
use function sprintf;
use function str_repeat;
use function strlen;
use function strtoupper;

class ProtectedEmail
{

	use SmartObject;

	private string $text;

	private string $email;

	public function __construct(string $email, ?string $text = null)
	{
		$this->email = $this->encode($email);
		$this->text = $this->encode($text ?? $email);
	}

	public function getHref(): string
	{
		return $this->encode('mailto:') . $this->getEmail();
	}

	public function getEmail(): string
	{
		return $this->email;
	}

	public function getText(): string
	{
		return $this->text;
	}

	private function encode(string $ascii): string
	{
		$hexadecimal = '';
		for ($i = 0; $i < strlen($ascii); $i++) {
			$byte = strtoupper(dechex(ord($ascii[$i])));
			$byte = str_repeat('0', 2 - strlen($byte)) . $byte;
			$hexadecimal .= '&#x' . $byte . ';';
		}
		return $hexadecimal;
	}

	public function __toString(): string
	{
		return sprintf('<a href="%s">%s</a>', $this->getHref(), $this->getText());
	}

}
