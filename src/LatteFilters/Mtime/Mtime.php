<?php declare (strict_types = 1);

namespace Wavevision\LatteFilters\Mtime;

use Nette\Http\IRequest;
use Nette\SmartObject;
use Nette\Utils\Strings;
use Wavevision\DIServiceAnnotation\DIService;
use Wavevision\Utils\Path;

/**
 * @DIService(generateInject=true, params={"%wwwDir%"})
 */
class Mtime
{

	use SmartObject;

	private string $wwwDir;

	private IRequest $request;

	public function __construct(string $wwwDir)
	{
		$this->wwwDir = $wwwDir;
	}

	public function injectRequest(IRequest $request): void
	{
		$this->request = $request;
	}

	public function process(string $file): string
	{
		$basePath = $this->request->getUrl()->getBasePath();
		$path = Path::join($this->wwwDir, $file);
		if ($basePath !== Path::DELIMITER) {
			$path = Path::join($this->wwwDir, Strings::replace($file, '#' . $basePath . '#', ''));
		}
		return $file . '?v=' . filemtime($path);
	}

}
