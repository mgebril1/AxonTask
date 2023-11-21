<?php

namespace App\Http\Controllers;

use App\Models\PhoneNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\PhoneNumberService;

class PhoneNumberController extends Controller
{
	public $phoneNumberService;

	public function __construct(PhoneNumberService $phoneNumberService)
	{
		$this->phoneNumberService = $phoneNumberService;
	}

    public function index(Request $request)
    {
    	$data = $this->phoneNumberService->getFilteredPhoneNumbers($request);

        return view('phone_numbers', $data); // ['phoneNumbersFiltered','allPhoneNumbers']
    }

}