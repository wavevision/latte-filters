<?php declare (strict_types = 1);

namespace Wavevision\LatteFilters\Mtime;

trait InjectMtime
{

	protected Mtime $mtime;

	public function injectMtime(Mtime $mtime): void
	{
		$this->mtime = $mtime;
	}

}
