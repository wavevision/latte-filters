<?php declare(strict_types = 1);

namespace Wavevision\LatteFiltersTests\Email;

use Wavevision\LatteFilters\Email\InjectEmail;
use Wavevision\LatteFilters\Email\ProtectedEmail;
use Wavevision\LatteFiltersTests\UnitTestCase;

class EmailTest extends UnitTestCase
{

	use InjectEmail;

	public function testProcess(): void
	{
		$this->assertInstanceOf(ProtectedEmail::class, $this->email->process('jakub@jakub.jakub', 'jakub'));
	}

}
