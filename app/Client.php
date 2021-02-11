<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
     /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    protected $fillable = [

        'firstName','lastName','email','nationality','tunisianResiding','country','dateOfBirth',
        'placeOfBirth','levelEducation','academicCertificate','attribute','rne','cin',
        'passeport','dateOfIssue','placeOfIssue','adress','city','codePostal','phone','fax','userId',
        'agencyId','name','agent','socialHeadquarters','commercialRegistrationNo',
        'taxCustomersIdentifier','capital','legalNature','enrollmentNumberNationalSSF',
        'foreignContibution','phoneAgent','faxAgent','emailAgent','investmentSystem',
        'projectNature','sector','activity','isEconomicSystem','systemName','informationProject',
        'licenseBrochure1','licenseBrochure2','licenseBrochure3','cityAgent','accreditationAgent',
        'deanshipAgent','deanshipAgentexploitation','area','exploited','covered','property',
        'authorization','authorizationrentPrivateLand','internationalLandLease',
        'exploitationPublicProperty','otherFormulas'

    ];
}
