<?php 

namespace App\Services;

use App\Enums\ExpressionsEnum;
use App\Repositories\PhoneNumberRepository;
use App\Models\PhoneNumber;
	
class PhoneNumberService
{
	public $phoneNumberRepository;

	function __construct(PhoneNumberRepository $phoneNumberRepository)
	{
		$this->phoneNumberRepository = $phoneNumberRepository;
	}

	public function getFilteredPhoneNumbers($request) :array
	{
		$data = [];
        $countryDBExpression = ExpressionsEnum::getDBExpression('+'.$request->country);

        $phoneNumbersFiltered = $this->phoneNumberRepository->fetchFilterDataPaginated($request,$countryDBExpression,10);

        $data['phoneNumbersFiltered'] = $this->applyState($phoneNumbersFiltered,$request);

        $allPhoneNumbers = $this->phoneNumberRepository->fetchAllDataPaginated($request,$countryDBExpression,10);

        $data['allPhoneNumbers'] = $this->applyState($allPhoneNumbers,$request);

        return $data;
	}

	//apply result to have status (1=>Valid) (0=>Not Valid)
	private function applyState($phoneNumbers,$request)
	{

        $countryExpression = ExpressionsEnum::getExpression('+'.$request->country);

	    foreach ($phoneNumbers as $phoneNumber) {

        	if ($countryExpression  != 0) {

	            $state = preg_match( $countryExpression , $phoneNumber->number);
	            $phoneNumber->state = ($state) ? 'Valid' : 'Not Valid' ;

	        }else{

	            $phoneNumber->state = 'Not Valid' ;

	        }

        }
		return $phoneNumbers;
	}
}
	



?>