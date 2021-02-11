@extends('layouts.master')
@section('title') @lang('translation.Clients') @endsection
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <form action="{{ route('clientsCreateStepThreeSave') }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-body">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <h4 class="card-title mb-4">General data about the project</h4>

                            <div id="progrss-wizard" class="twitter-bs-wizard">
                                <ul class="twitter-bs-wizard-nav nav-justified">
                                    <li class="nav-item">
                                        <a href="#progress-seller-details" class="nav-link" data-toggle="tab">
                                            <span class="step-number mr-2">01</span>
                                            Client Details
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#progress-company-document" class="nav-link" data-toggle="tab">
                                            <span class="step-number mr-2">02</span>
                                            General Data about the institution
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#progress-bank-detail" class="nav-link" data-toggle="tab">
                                            <span class="step-number mr-2">03</span>
                                            General data about the project
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#progress-confirm-detail" class="nav-link" data-toggle="tab">
                                            <span class="step-number mr-2">04</span>
                                            Confirm Detail
                                        </a>
                                    </li>
                                </ul>

                                <div id="bar" class="progress mt-4">
                                    <div class="progress-bar bg-success progress-bar-striped progress-bar-animated"></div>
                                </div>
                                <div class="tab-content twitter-bs-wizard-tab-content">
                                    <div class="tab-pane" id="progress-seller-details">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="investmentSystem">Investment system</label>
                                                    <select class="form-control" id="investmentSystem"
                                                        name="investmentSystem"
                                                        value="{{ $client->investmentSystem ?? '' }}" required focus>
                                                        <option value="" disabled selected>Please Select Investment system
                                                        </option>
                                                        <option value="Internal market">Internal market</option>
                                                        <option value="Holistic source">Holistic source</option>
                                                    </select>
                                                    @error('investmentSystem')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="projectNature">The nature of the project</label>
                                                    <select class="form-control" id="projectNature" name="projectNature"
                                                        value="{{ $client->projectNature ?? '' }}" required focus>
                                                        <option value="" disabled selected>Please Select The nature of the
                                                            project
                                                        </option>
                                                        <option value="Creating">Creating</option>
                                                        <option value="Expanding">Expanding</option>
                                                        <option value="Restoring">Restoring</option>
                                                    </select>
                                                    @error('projectNature')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="sector">Sector</label>
                                                    <input type="text" value="{{ $client->sector ?? '' }}"
                                                        class="form-control" placeholder="Enter sector" id="sector" required
                                                        name="sector">
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="activity">Activity</label>
                                                    <input type="text" value="{{ $client->activity ?? '' }}"
                                                        class="form-control" placeholder="Enter activity" id="activity"
                                                        required name="activity">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="isEconomicSystem">The project is part of an
                                                        economic system</label>
                                                    <input type="text" value="{{ $client->isEconomicSystem ?? '' }}"
                                                        class="form-control" placeholder="Enter firstname"
                                                        id="isEconomicSystem" required name="isEconomicSystem">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="systemName">System Name</label>
                                                    <input type="text" value="{{ $client->systemName ?? '' }}"
                                                        class="form-control" placeholder="Enter systemName" id="systemName"
                                                        required name="systemName">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="informationProject">Detailed information about the
                                                        project</label>
                                                    <textarea id="informationProject" name="informationProject"
                                                        value="{{ $client->informationProject ?? '' }}"
                                                        class="form-control" rows="2"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <label>The licenses / necessary specifications for the project</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="licenseBrochure1">License / brochure number
                                                        1</label>
                                                    <textarea class="form-control" name="licenseBrochure1"
                                                        class="form-control" id="licenseBrochure1"
                                                        value="{{ $client->licenseBrochure1 ?? '' }}"
                                                        placeholder="Enter licenseBrochure1" required focus
                                                        rows="2"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="licenseBrochure2">License / brochure number
                                                        2</label>
                                                    <textarea class="form-control" name="licenseBrochure2"
                                                        class="form-control" id="licenseBrochure2"
                                                        value="{{ $client->licenseBrochure2 ?? '' }}"
                                                        placeholder="Enter licenseBrochure2" required focus
                                                        rows="2"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="licenseBrochure3">License / brochure number
                                                        3</label>
                                                    <textarea class="form-control" name="licenseBrochure3"
                                                        class="form-control" id="licenseBrochure3"
                                                        value="{{ $client->licenseBrochure3 ?? '' }}"
                                                        placeholder="Enter licenseBrochure3" required focus
                                                        rows="2"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <label>The location of the project</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="cityAgent">City</label>
                                                    <select class="form-control" id="cityAgent" name="cityAgent"
                                                        value="{{ $client->cityAgent ?? '' }}" required focus>
                                                        <option value="" disabled selected>Please Select City
                                                        </option>
                                                        <option value="Creating">Creating</option>
                                                        <option value="Expanding">Expanding</option>
                                                        <option value="Restoring">Restoring</option>
                                                    </select>
                                                    @error('cityAgent')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="accreditationAgent">Accreditation</label>
                                                    <select class="form-control" id="accreditationAgent"
                                                        name="accreditationAgent"
                                                        value="{{ $client->accreditationAgent ?? '' }}" required focus>
                                                        <option value="" disabled selected>Please Select Accreditation
                                                        </option>
                                                        <option value="Creating">Creating</option>
                                                        <option value="Expanding">Expanding</option>
                                                        <option value="Restoring">Restoring</option>
                                                    </select>
                                                    @error('accreditationAgent')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="deanshipAgent">Deanship</label>
                                                    <select class="form-control" id="deanshipAgent" name="deanshipAgent"
                                                        value="{{ $client->deanshipAgent ?? '' }}" required focus>
                                                        <option value="" disabled selected>Please Select Deanship
                                                        </option>
                                                        <option value="Creating">Creating</option>
                                                        <option value="Expanding">Expanding</option>
                                                        <option value="Restoring">Restoring</option>
                                                    </select>
                                                    @error('deanshipAgent')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <label>Area (hec)</label><br>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="area">Total</label>
                                                    <input type="text" value="{{ $client->area ?? '' }}"
                                                        class="form-control" placeholder="Enter area" id="area" name="area">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exploited">Exploited</label>
                                                    <input type="text" value="{{ $client->exploited ?? '' }}"
                                                        class="form-control" placeholder="Enter exploited" id="exploited"
                                                        required name="exploited">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="covered">Covered</label>
                                                    <input type="text" value="{{ $client->covered ?? '' }}"
                                                        class="form-control" placeholder="Enter covered" id="covered"
                                                        required name="covered">
                                                </div>
                                            </div>
                                        </div>
                                        <label>Exploitation formula</label><br>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <label>Property</label>
                                                <input type="radio" name="property" value="Property">
                                            </div>
                                            <div class="col-lg-4">
                                                <label>Authorization</label>
                                                <input type="radio" name="authorization" value="Authorization">
                                            </div>
                                            <div class="col-lg-4">
                                                <label>Rent private land</label>
                                                <input type="radio" name="authorizationrentPrivateLand" value="Rent private land">
                                            </div>
                                            <div class="col-lg-4">
                                                <label>International land lease</label>
                                                <input type="radio" name="internationalLandLease" value="International land lease">
                                            </div>
                                            <div class="col-lg-4">
                                                <label>Exploitation of a public maritime property</label>
                                                <input type="radio" name="exploitationPublicProperty"
                                                    value="Exploitation of a public maritime property">
                                            </div>
                                            <div class="col-lg-4">
                                                <label>Other formulas</label>
                                                <input type="radio" name="otherFormulas" value="Other formulas">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 text-left">
                                            <a href="{{ route('clientsCreateStepTwo') }}" class="btn btn-danger pull-right">Previous</a>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <button type="submit" class="btn btn-primary">Next</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <!-- twitter-bootstrap-wizard js -->
    <script src="{{ URL::asset('assets/libs/twitter-bootstrap-wizard/twitter-bootstrap-wizard.min.js') }}"></script>

    <!-- form mask init -->
    <script src="{{ URL::asset('assets/js/pages/form-wizard.init.js') }}"></script>

@endsection
