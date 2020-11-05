<?php declare (strict_types = 1);

namespace Wavevision\LatteFilters\Email;

use Nette\SmartObject;
use Wavevision\Utils\Arrays;
use function dechex;
use function implode;
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

	/**
	 * @var array<string, string>
	 */
	private array $attributes;

	public function __construct(string $email, ?string $text = null)
	{
		$this->email = $this->encode($email);
		$this->text = $text ? $this->encode($text) : $this->getEmail();
		$this->attributes = [];
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

	public function addAttribute(string $attribute, string $value): self
	{
		$this->attributes[$attribute] = $value;
		return $this;
	}

	/**
	 * @return array<string, string>
	 */
	public function getAttributes(): array
	{
		return $this->attributes;
	}

	/**
	 * @param array<string, string> $attributes
	 */
	public function setAttributes(array $attributes): self
	{
		$this->attributes = $attributes;
		return $this;
	}

	private function encode(string $s): string
	{
		$hex = '';
		for ($i = 0; $i < strlen($s); $i++) {
			$ascii = strtoupper(dechex(ord($s[$i])));
			$byte = str_repeat('0', 2 - strlen($ascii)) . $ascii;
			$hex .= "&#x$byte;";
		}
		return $hex;
	}

	private function formatAttributes(): string
	{
		return implode(
			' ',
			Arrays::mapWithKeys(
				Arrays::mergeAllRecursive($this->getAttributes(), ['href' => $this->getHref()]),
				fn(string $attr, string $value): array => [$attr, sprintf('%s="%s"', $attr, $value)]
			)
		);
	}

	public function __toString(): string
	{
		return sprintf('<a %s>%s</a>', $this->formatAttributes(), $this->getText());
	}

}
