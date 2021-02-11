<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email');
            $table->string('nationality');
            $table->boolean('tunisianResiding')->default(false);
            $table->string('country');
            $table->date('dateOfBirth');
            $table->string('placeOfBirth');
            $table->string('levelEducation');
            $table->string('academicCertificate');
            $table->string('attribute');
            $table->string('rne');
            $table->bigInteger('cin')->nullable();
            $table->string('passeport')->nullable();
            $table->date('dateOfIssue')->nullable();
            $table->string('placeOfIssue')->nullable();
            $table->string('adress');
            $table->string('city');
            $table->bigInteger('codePostal');
            $table->bigInteger('phone');
            $table->bigInteger('fax')->nullable();

             //part 2
             $table->string('name')->nullable();
             $table->string('agent')->nullable();
             $table->string('socialHeadquarters')->nullable();
             $table->string('commercialRegistrationNo')->nullable();
             $table->string('taxCustomersIdentifier')->nullable();
             $table->string('capital')->nullable();
             $table->string('legalNature')->nullable();
             $table->string('enrollmentNumberNationalSSF')->nullable();
             $table->string('foreignContibution')->nullable();
             $table->bigInteger('phoneAgent')->nullable();
             $table->bigInteger('faxAgent')->nullable();
             $table->string('emailAgent')->nullable();
             //part 3
             $table->longText('investmentSystem')->nullable();
             $table->longText('projectNature')->nullable();
             $table->longText('sector')->nullable();
             $table->longText('activity')->nullable();
             $table->longText('isEconomicSystem')->nullable();
             $table->longText('systemName')->nullable();
             $table->longText('informationProject')->nullable();
             $table->longText('licenseBrochure1')->nullable();
             $table->longText('licenseBrochure2')->nullable();
             $table->longText('licenseBrochure3')->nullable();           
             $table->longText('cityAgent')->nullable();
             $table->longText('accreditationAgent')->nullable();
             $table->longText('deanshipAgent')->nullable();
             $table->longText('deanshipAgentexploitation')->nullable();
             $table->longText('area')->nullable();
             $table->longText('exploited')->nullable();
             $table->longText('covered')->nullable();
             $table->longText('property')->nullable();
             $table->longText('authorization')->nullable();
             $table->longText('authorizationrentPrivateLand')->nullable();
             $table->longText('internationalLandLease')->nullable();
             $table->longText('exploitationPublicProperty')->nullable();
             $table->longText('otherFormulas')->nullable();

             
            $table->longText('userId');
            $table->longText('agencyId');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
