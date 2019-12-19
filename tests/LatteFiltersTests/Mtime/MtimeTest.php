<?php declare(strict_types = 1);

namespace Wavevision\LatteFiltersTests\Mtime;

use Nette\Http\Request;
use Nette\Http\UrlScript;
use PHPUnit\Framework\TestCase;
use Wavevision\LatteFilters\Mtime\InjectMtime;
use Wavevision\LatteFilters\Mtime\Mtime;

class MtimeTest extends TestCase
{

	use InjectMtime;

	public function testWithBasePath(): void
	{
		$this->createMtime('/path/to/repo/');
		$this->assertEquals('nested/style.css?v=1576761307', $this->mtime->process('nested/style.css'));
		$this->assertEquals(
			'/path/to/repo/nested/style.css?v=1576761307',
			$this->mtime->process('/path/to/repo/nested/style.css')
		);
	}

	public function testWithoutBasePath(): void
	{
		$this->createMtime('/');
		$this->assertEquals('nested/style.css?v=1576761307', $this->mtime->process('nested/style.css'));
	}

	private function createMtime(string $basePath): Mtime
	{
		$mtime = new Mtime(__DIR__);
		$url = $this->createMock(UrlScript::class);
		$url->expects($this->any())->method('getBasePath')->willReturn($basePath);
		$request = $this->createMock(Request::class);
		$request->expects($this->any())->method('getUrl')->willReturn($url);
		$mtime->injectRequest($request);
		$this->injectMtime($mtime);
		return $mtime;
	}

}
