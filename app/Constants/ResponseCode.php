<?php

namespace App\Constants;

class ResponseCode
{
    // error system
    const MODEL_NOT_FOUND = 'CDA-E-001';

    const INTERNAL_SERVER_ERROR = 'CDA-E-002';

    const RESOURCE_NOT_FOUND = 'CDA-E-003';

    // success
    const SUCCESS_GET_DATA = 'CDA-S-001';

    const SUCCESS_EDIT_DATA = 'CDA-S-002';

    const SUCCESS_DELETE_DATA = 'CDA-S-003';

    const SUCCESS_REVOKE_TOKEN = 'CDA-S-004';

    const SUCCESS_UPDATE = 'CDA-S-005';

    const SUCCESS_CREATE_DATA = 'CDA-S-006';

    // input validation
    const FORM_VALIDATION = 'CDA-V-001';

    // error access
    const UNAUTHORIZED = 'CDA-A-001';

    const FORBIDDEN = 'CDA-A-002';

    const METHOD_NOT_ALLOWED = 'CDA-A-003';
}
