<?php declare(strict_types = 1);

namespace Wavevision\LatteFiltersTests\CzechMonth;

use Wavevision\LatteFilters\CzechMonth\InjectCzechMonth;
use Wavevision\LatteFiltersTests\UnitTestCase;

class CzechMonthTest extends UnitTestCase
{

	use InjectCzechMonth;

	public function testProcess(): void
	{
		$this->assertEquals('leden', $this->czechMonth->process(1));
		$this->assertEquals('ledna', $this->czechMonth->process(1, true));
	}

}
