<?php

namespace App\Constants;

class ResponseCode
{
	// error system
	const MODEL_NOT_FOUND = 'CDA-E-001';
	const INTERNAL_SERVER_ERROR = 'CDA-E-002';

	// success
	const SUCCESS_GET_DATA = 'CDA-S-001';

	// input validation
	const VALIDATION_ERROR = 'CDA-V-001';
	const UNAUTHORIZED = 'CDA-V-002';
}