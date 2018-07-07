
<div class="form-group form-md-line-input form-md-floating-label">
    <input type="text" class="form-control" id="name" name="name" id="form_control_title" value="{{ $kyc ? $kyc->first_name." ".$kyc->middle_name." ".$kyc->last_name:''}}" readonly>
    <label for="form_control_title">KYC  username</label>
    <span class="help-block">Enter the  KYC name ...</span>
</div>

<div class="form-group form-md-line-input form-md-floating-label">
    <input type="text" class="form-control" id="name" name="name" id="form_control_title" value="{{ $kyc ? $kyc->dob:''}}"
           readonly>
    <label for="form_control_title">Date of Birth</label>
    <span class="help-block">Enter the  Date of Birth ...</span>
</div>

<div class="form-group form-md-line-input form-md-floating-label">
    <input type="text" class="form-control" id="name" name="name" id="form_control_title" value="{{ $kyc ? $kyc->country:''}}"
           readonly>
    <label for="form_control_title">Country name</label>
    <span class="help-block">Enter the  Country name ...</span>
</div>

<div class="form-group form-md-line-input form-md-floating-label">
    <input type="text" class="form-control" id="name" name="name" id="form_control_title" value="{{ $kyc ? $kyc->nationality:''}}"
           readonly>
    <label for="form_control_title">Nationality </label>
    <span class="help-block">Enter the  Nationality ...</span>
</div>

<div class="form-group form-md-line-input form-md-floating-label">
    <input type="text" class="form-control" id="name" name="name" id="form_control_title" value="{{ $kyc ? $kyc->address:''}}"
           readonly>
    <label for="form_control_title"></label>
    <span class="help-block">Enter the  Address detail ...</span>
</div>

<div class="form-group form-md-line-input form-md-floating-label">
    <input type="text" class="form-control" id="name" name="name" id="form_control_title" value="{{ $kyc ? $kyc->city:''}}"
           readonly>
    <label for="form_control_title">City</label>
    <span class="help-block">Enter the  City name ...</span>
</div>

<div class="form-group form-md-line-input form-md-floating-label">
    <input type="text" class="form-control" id="name" name="name" id="form_control_title" value="{{ $kyc ? $kyc->state:''}}"
           readonly>
    <label for="form_control_title">State</label>
    <span class="help-block">Enter the  State name ...</span>
</div>

<div class="form-group form-md-line-input form-md-floating-label">
    <input type="text" class="form-control" id="name" name="name" id="form_control_title" value="{{ $kyc ? $kyc->doc_type:''}}"
           readonly>
    <label for="form_control_title">Document Type</label>
    <span class="help-block">Enter the  Document Type ...</span>
</div>

<div class="form-group form-md-line-input ">
    <a href="/{!!$kyc ? $kyc->document: '' !!}" target="_blank">
    <img src="/{!!$kyc ? $kyc->document: '' !!}" width="100%" height="300px" alt="Kyc image"/>
    </a>
    <label for="form_control_title">Image</label>
</div>

