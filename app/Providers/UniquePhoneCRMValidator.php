<?php
namespace App\Providers;
use Illuminate\Validation\Validator;

class UniquePhoneCRMValidator extends Validator
{
    public function validateUniquePhoneCRM($attribute, $value, $parameters){
        $has_contractor = str_replace(' ', '', file_get_contents('http://system.graam.ru/api/contractor/findContractroToPhone?api_token=jM4E53HiO03uSLb19YDwqA1RRUtpfXwN6jP1STm1EZTRITXdpRbHnRBOFuxE4ICOgLEcywicOvMyopDm&phone=' . $value));
        if ($has_contractor == 'false') {
            return true;
        } else {
            return false;
        }
    }
}
