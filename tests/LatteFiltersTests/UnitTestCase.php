<?php declare(strict_types = 1);

namespace Wavevision\LatteFiltersTests;

use PHPUnit\Framework\TestCase;
use Wavevision\NetteTests\Setup\AllowInjects;

class UnitTestCase extends TestCase
{

	protected function setUp(): void
	{
		parent::setUp();
		(new AllowInjects())->fromCallback(
			$this,
			function (string $className): object {
				return new $className();
			}
		);
	}

}
