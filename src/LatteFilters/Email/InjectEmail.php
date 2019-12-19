<?php declare (strict_types = 1);

namespace Wavevision\LatteFilters\Email;

trait InjectEmail
{

	protected Email $email;

	public function injectEmail(Email $email): void
	{
		$this->email = $email;
	}

}
