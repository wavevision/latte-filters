<?php declare (strict_types = 1);

namespace Wavevision\LatteFilters\Email;

use Nette\SmartObject;

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

	public function __toString(): string
	{
		return sprintf('<a href="%s">%s</a>', $this->getHref(), $this->getText());
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

}
