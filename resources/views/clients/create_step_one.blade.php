@extends('layouts.master')
@section('title') @lang('translation.Clients') @endsection
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <form action="{{ route('clientsCreateStepOneSave') }}" method="POST">
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

                            <h4 class="card-title mb-4">Add Client</h4>

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
                                                    <label for="firstName">First name</label>
                                                    <input type="text" value="{{ $client->firstName ?? '' }}"
                                                        class="form-control" placeholder="Enter firstname" id="firstName"
                                                        required name="firstName">
                                                    @error('firstName')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="lastName">Last name</label>
                                                    <input type="text" value="{{ $client->lastName ?? '' }}"
                                                        class="form-control" placeholder="Enter lastName" id="lastName"
                                                        required name="lastName">
                                                    @error('lastName')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" value="{{ $client->email ?? '' }}"
                                                        class="form-control" placeholder="Enter email" id="email" required
                                                        name="email">
                                                    @error('email')
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
                                                    <label for="nationality">Nationality</label>
                                                    <input type="text" value="{{ $client->nationality ?? '' }}"
                                                        class="form-control" placeholder="Enter nationality"
                                                        id="nationality" required name="nationality">
                                                    @error('nationality')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>"{{ $message }}"</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">

                                                    <label for="tunisianResiding">A Tunisian residing
                                                        abroad</label>
                                                    <input type="checkbox" value="{{ $client->tunisianResiding ?? '' }}"
                                                        class="form-control" id="tunisianResiding" required
                                                        name="tunisianResiding">
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label for="country">Country of residencee</label>
                                                    <select class="form-control" id="country" name="country"
                                                        value="{{ $client->country ?? '' }}" focus>
                                                        <option value="" disabled selected>Please select country
                                                        </option>
                                                        <option value="Sfax">Sfax</option>
                                                        <option value="Tunis">Tunis</option>
                                                        <option value="Ben Arous">Ben Arous</option>
                                                        <option value="Gafsa">Gafsa</option>
                                                    </select>
                                                    @error('country')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="dateOfBirth">Date of birth</label>
                                                    <input type="date" value="{{ $client->dateOfBirth ?? '' }}"
                                                        class="form-control" id="dateOfBirth" required name="dateOfBirth">
                                                    @error('dateOfBirth')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>"{{ $message }}"</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="placeOfBirth">Place of birth</label>
                                                    <input type="text" value="{{ $client->placeOfBirth ?? '' }}"
                                                        class="form-control" id="placeOfBirth"
                                                        placeholder="Enter Place Of Birth" required name="placeOfBirth">
                                                    @error('placeOfBirth')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>"{{ $message }}"</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="levelEducation">Educational level</label>
                                                    <select class="form-control" id="levelEducation"
                                                        value="{{ $client->levelEducation ?? '' }}" name="levelEducation"
                                                        required focus>

                                                        <option value="" disabled selected>your level</option>
                                                        <option value="primary">Primary</option>
                                                        <option value="secondary">Secondary</option>
                                                        <option value="high">High</option>
                                                    </select>
                                                    @error('levelEducation')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">

                                                    <label for="academicCertificate">Academic certification</label>
                                                    <input type="text" value="{{ $client->academicCertificate ?? '' }}"
                                                        class="form-control" id="academicCertificate"
                                                        placeholder="Enter academicCertificate" required
                                                        name="academicCertificate">
                                                    @error('academicCertificate')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="attribute">Attribute</label>
                                                    <select class="form-control" value="{{ $client->attribute ?? '' }}"
                                                        id="attribute" name="attribute" required focus>

                                                        <option value="" disabled selected>your Attribute</option>
                                                        <option value="agent">Agent</option>
                                                        <option value="emitter">Emitter</option>
                                                    </select>
                                                    @error('attribute')
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
                                                    <label for="rne">RNE</label>
                                                    <input type="text" value="{{ $client->rne ?? '' }}"
                                                        class="form-control" id="rne" placeholder="Enter RNE" required
                                                        name="rne">
                                                    @error('rne')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="cin">CIN</label>
                                                    <input type="text" value="{{ $client->cin ?? '' }}"
                                                        class="form-control" id="cin" placeholder="Enter CIN" required
                                                        name="cin" pattern="[0-9]{8}">
                                                    @error('cin')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="passeport">Passeport</label>
                                                    <input type="text" value="{{ $client->passeport ?? '' }}"
                                                        class="form-control" id="passeport" placeholder="Enter passeport"
                                                        required name="passeport" pattern="[0-9]{8}">
                                                    @error('passeport')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="dateOfIssue">Date Of Issue</label>
                                                    <input type="date" value="{{ $client->dateOfIssue ?? '' }}"
                                                        class="form-control" id="dateOfIssue" required name="dateOfIssue">
                                                    @error('dateOfIssue')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>"{{ $message }}"</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="placeOfIssue">Place Of Issue</label>
                                                    <input type="text" value="{{ $client->placeOfIssue ?? '' }}"
                                                        class="form-control" id="placeOfIssue"
                                                        placeholder="Enter Place Of Issue" required name="placeOfIssue">
                                                    @error('placeOfIssue')
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
                                                    <label for="city">City</label>
                                                    <select class="form-control" id="city" name="city"
                                                        value="{{ $client->city ?? '' }}" required focus>
                                                        <option value="" disabled selected>Please select city</option>
                                                        <option value="Sfax">Sfax</option>
                                                        <option value="Tunis">Tunis</option>
                                                        <option value="Ben Arous">Ben Arous</option>
                                                        <option value="Gafsa">Gafsa</option>
                                                    </select>
                                                    @error('city')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="codePostal">Postal code</label>
                                                    <input type="text" value="{{ $client->codePostal ?? '' }}"
                                                        class="form-control" id="codePostal" placeholder="Enter Code Postal"
                                                        required name="codePostal" pattern="[0-9]{4}">
                                                    @error('codePostal')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>"{{ $message }}"</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="phone">Phone</label>
                                                    <input type="text" value="{{ $client->phone ?? '' }}"
                                                        class="form-control" id="phone"
                                                        placeholder="Enter Your Phone Number" required name="phone"
                                                        pattern="[0-9]{8}">
                                                    @error('phone')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>"{{ $message }}"</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="fax">Fax</label>
                                                    <input type="text" value="{{ $client->fax ?? '' }}"
                                                        class="form-control" id="fax" placeholder="Enter Your Fax Number"
                                                        name="fax" pattern="[0-9]{8}">
                                                    @error('fax')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>"{{ $message }}"</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="adress">Address</label>
                                                    <textarea class="form-control" name="adress" class="form-control"
                                                        id="adress" value="{{ $client->adress ?? '' }}"
                                                        placeholder="Enter adress" required focus rows="2"></textarea>
                                                    @error('adress')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>"{{ $message }}"</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 text-left">
                                           
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
