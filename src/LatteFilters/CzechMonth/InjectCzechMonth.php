<?php declare (strict_types = 1);

namespace Wavevision\LatteFilters\CzechMonth;

trait InjectCzechMonth
{

	protected CzechMonth $czechMonth;

	public function injectCzechMonth(CzechMonth $czechMonth): void
	{
		$this->czechMonth = $czechMonth;
	}

}
