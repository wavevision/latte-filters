<?php declare (strict_types = 1);

namespace Wavevision\LatteFilters\CzechMonth;

use Nette\SmartObject;
use Wavevision\DIServiceAnnotation\DIService;

/**
 * @DIService(generateInject=true, name="czechMonthFilter")
 */
class CzechMonth
{

	use SmartObject;

	public const NAMES = [
		1 => 'leden',
		'únor',
		'březen',
		'duben',
		'květen',
		'červen',
		'červenec',
		'srpen',
		'září',
		'říjen',
		'listopad',
		'prosinec',
	];

	public const NAMES_INFLECTED = [
		1 => 'ledna',
		'února',
		'března',
		'dubna',
		'května',
		'června',
		'července',
		'srpna',
		'září',
		'října',
		'listopadu',
		'prosince',
	];

	public function process(int $month, bool $inflection = false): string
	{
		if ($inflection) {
			return self::NAMES_INFLECTED[$month];
		}
		return self::NAMES[$month];
	}

}
