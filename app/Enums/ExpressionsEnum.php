<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static FINANCE()
 * @method static static ADMINISTRATIVE()
 */
final class ExpressionsEnum extends Enum
{
    const Cameroon   = '+237'; //| regex = '/^\+237[2368]\d{7,8}$/' 
	const Ethiopia   = '+251'; //| regex = '/^\+251[1-59]\d{8}$/'
	const Morocco    = '+212'; //| regex = '/^\+212[5-9]\d{8}$/'
	const Mozambique = '+258';// | regex = '/^\+258[28]\d{7,8}$/'
	const Uganda     = '+256';// | regex = '/^\+256\d{7,8}$/'

    public static function getDBExpression($code)
    {

    	if ($code == self::Cameroon) {
    		return '^\+237[2368]\d{7,8}$';
    	}

    	if ($code == self::Ethiopia) {
    		return '^\+251[1-59]\d{8}$';
    	}

    	if ($code == self::Morocco) {
    		return '^\+212[5-9]\d{8}$';
    	}

    	if ($code == self::Mozambique) {
    		return '^\+258[28]\d{7,8}$';
    	}

    	if ($code == self::Uganda) {
    		return '^\+256\d{7,8}$';
    	}

    	return 0;
    }

    public static function getExpression($code)
    {

    	if ($code == self::Cameroon) {
    		return '/^\+237[2368]\d{7,8}$/';
    	}

    	if ($code == self::Ethiopia) {
    		return '/^\+251[1-59]\d{8}$/';
    	}

    	if ($code == self::Morocco) {
    		return '/^\+212[5-9]\d{8}$/';
    	}

    	if ($code == self::Mozambique) {
    		return '/^\+258[28]\d{7,8}$/';
    	}

    	if ($code == self::Uganda) {
    		return '/^\+256\d{7,8}$/';
    	}

    	return 0;
    }
}
