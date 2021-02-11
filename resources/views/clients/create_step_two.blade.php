@extends('layouts.master')
@section('title') @lang('translation.Clients') @endsection
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <form action="{{ route('clientsCreateStepTwoSave') }}" method="POST">
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

                            <h4 class="card-title mb-4">General Data about the institution</h4>

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
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" value="{{ $client->name ?? '' }}"
                                                        class="form-control" placeholder="Enter name" id="name" name="name">
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="agent">Agent</label>
                                                    <input type="text" value="{{ $client->agent ?? '' }}"
                                                        class="form-control" placeholder="Enter agent" id="agent"
                                                        name="agent">
                                                    @error('agent')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="socialHeadquarters">Social Headquarters</label>
                                                    <input type="text" value="{{ $client->socialHeadquarters ?? '' }}"
                                                        class="form-control" placeholder="Enter socialHeadquarters"
                                                        id="socialHeadquarters" name="socialHeadquarters">
                                                    @error('socialHeadquarters')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="commercialRegistrationNo">Commercial Registration No</label>
                                                    <input type="text"
                                                        value="{{ $client->commercialRegistrationNo ?? '' }}"
                                                        class="form-control" placeholder="Enter commercialRegistrationNo"
                                                        id="commercialRegistrationNo" name="commercialRegistrationNo">
                                                    @error('commercialRegistrationNo')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="taxCustomersIdentifier">Tax Customers Identifier</label>
                                                    <input type="text"
                                                        value="{{ $client->taxCustomersIdentifier ?? '' }}"
                                                        class="form-control" placeholder="Enter taxCustomersIdentifier"
                                                        id="taxCustomersIdentifier" name="taxCustomersIdentifier">
                                                    @error('taxCustomersIdentifier')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>"{{ $message }}"</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="capital">Capital</label>
                                                    <input type="text" value="{{ $client->capital ?? '' }}"
                                                        class="form-control" placeholder="Enter capital" id="capital"
                                                        name="capital">
                                                    @error('capital')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>"{{ $message }}"</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="legalNature">Legal Nature</label>
                                                    <input type="text" value="{{ $client->legalNature ?? '' }}"
                                                        class="form-control" placeholder="Enter legalNature"
                                                        id="legalNature" required name="legalNature">
                                                    @error('legalNature')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>"{{ $message }}"</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="enrollmentNumberNationalSSF">Enrollment Number National
                                                        SSF</label>
                                                    <input type="text"
                                                        value="{{ $client->enrollmentNumberNationalSSF ?? '' }}"
                                                        class="form-control" placeholder="Enter enrollmentNumberNationalSSF"
                                                        id="enrollmentNumberNationalSSF" name="enrollmentNumberNationalSSF">
                                                    @error('enrollmentNumberNationalSSF')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>"{{ $message }}"</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="foreignContibution">Foreign Contibution</label>
                                                    <input type="text" value="{{ $client->foreignContibution ?? '' }}"
                                                        class="form-control" placeholder="Enter foreignContibution"
                                                        id="foreignContibution" name="foreignContibution">
                                                    @error('foreignContibution')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>"{{ $message }}"</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="phoneAgent">Phone Agent</label>
                                                    <input type="text" value="{{ $client->phoneAgent ?? '' }}"
                                                        class="form-control" id="phoneAgent"
                                                        placeholder="Enter Your Phone Number" required name="phoneAgent"
                                                        pattern="[0-9]{8}">
                                                    @error('phoneAgent')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>"{{ $message }}"</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="faxAgent">Fax Agent</label>
                                                    <input type="text" value="{{ $client->faxAgent ?? '' }}"
                                                        class="form-control" id="faxAgent"
                                                        placeholder="Enter Your Fax Number" name="faxAgent"
                                                        pattern="[0-9]{8}">
                                                    @error('faxAgent')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>"{{ $message }}"</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="emailAgent">Email Agent</label>
                                                    <input type="emailAgent" value="{{ $client->emailAgent ?? '' }}"
                                                        class="form-control" placeholder="Enter email" id="emailAgent"
                                                        required name="emailAgent">
                                                    @error('emailAgent')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 text-left">
                                            <a href="{{ route('clientsCreateStepOne') }}" class="btn btn-danger pull-right">Previous</a>
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
