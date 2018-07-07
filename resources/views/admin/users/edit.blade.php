<div class="form-group form-md-line-input form-md-floating-label">
    <input type="text" class="form-control" name="name" id="form_control_first_name" value="{!! $user->name !!}">
    <label for="form_control_first_name">Name</label>
    <span class="help-block">update name of user...</span>
</div>

<div class="form-group form-md-line-input form-md-floating-label">
    <input type="text" class="form-control" name="email" id="form_control_email" value="{!! $user->email !!}">
    <label for="form_control_email">Email</label>
    <span class="help-block">update user's email ...</span>
</div>

<div class="form-group form-md-line-input form-md-floating-label">
    <input type="text" class="form-control" name="icos[ethereum]" id="form_control_phone_number" value="{!! $eth->address !!}">
    <label for="form_control_phone_number">Ethereum address</label>
    <span class="help-block">update ethereum address of user...</span>
</div>
