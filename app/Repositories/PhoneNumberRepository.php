<?php

namespace App\Repositories;

use App\Models\PhoneNumber;

class PhoneNumberRepository
{

	public function fetchFilterDataPaginated($request , $countryExpression , $pagination = 10)
	{
		$phoneNumbersQuery = \DB::table('phone_numbers');
        
        if ($request->state == 1) {
        	$phoneNumbersQuery = $phoneNumbersQuery
        		->where('number', 'REGEXP', $countryExpression);
        }

        if ($request->state == 0) {
        	$phoneNumbersQuery = $phoneNumbersQuery
        		->whereNot('number', 'REGEXP', $countryExpression);
        }

    	$phoneNumbers = $phoneNumbersQuery->paginate(10);

        return $phoneNumbers; 
	}

	public function fetchAllDataPaginated($request , $countryExpression , $pagination = 10)
	{
		$phoneNumbersQuery = \DB::table('phone_numbers');

    	$phoneNumbers = $phoneNumbersQuery->paginate(10);

        return $phoneNumbers; 
	}
}





?>