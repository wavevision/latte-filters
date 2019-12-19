<?php declare(strict_types = 1);

namespace Wavevision\LatteFiltersTests\Email;

use PHPUnit\Framework\TestCase;
use Wavevision\LatteFilters\Email\ProtectedEmail;

class ProtectedEmailTest extends TestCase
{

	public function testRender(): void
	{
		$this->assertEquals(
			'<a href="&#x6D;&#x61;&#x69;&#x6C;&#x74;&#x6F;&#x3A;&#x61;">&#x62;</a>',
			(string)(new ProtectedEmail('a', 'b'))
		);
	}

}
