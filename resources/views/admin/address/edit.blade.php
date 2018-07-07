
<div class="form-group form-md-line-input has-info">
    <label for="form_address_type">ICO type</label>
    <select class="form-control" id="form_address_type">
        @foreach(config('app.ico_types') as $type)
            <option value="{{$type}}" {!! $ico && $ico->type == $type ? 'selected=""' : '' !!}>{{ ucfirst($type) }}</option>
        @endforeach
    </select>
</div>

<div class="form-group form-md-line-input form-md-floating-label">
    <input type="text" class="form-control" name="title" id="form_control_title" value="{{ $ico ? $ico->title : '' }}">
    <label for="form_control_title">ICO title for user</label>
    <span class="help-block">update initial coin offering title for user's view ...</span>
</div>

<div class="form-group form-md-line-input form-md-floating-label">
    <input type="text" class="form-control" name="address" id="form_control_address" value="{{ $ico ? $ico->address : '' }}">
    <label for="form_control_address">ICO address token</label>
    <span class="help-block">update initial coin offering token address for user's ...</span>
</div>

<div class="form-group form-md-line-input form-md-floating-label">
    <input type="text" class="form-control" name="hard_cap" id="form_control_address" value="{{ $ico ? $ico->hard_cap : '' }}">
    <label for="form_control_address">Hard Cap value</label>
    <span class="help-block">update hard cap value for user's ...</span>
</div>

<div class="form-group form-md-line-input form-md-floating-label">
    <input type="text" class="form-control" name="minimum" id="form_control_minimum" value="{!! $ico ? $ico->minimum : '' !!}">
    <label for="form_control_minimum">ICO minimum points</label>
    <span class="help-block">update initial coin offering minimum btc ...</span>
</div>

<div class="form-group form-md-line-input form-md-floating-label">
    <input type="text" class="form-control" name="pre_ico_at" id="form_control_pre_ico_at" value="{!! $ico ? $ico->pre_ico_at : '' !!}">
    <label for="form_control_pre_ico_at">Pre ICO start date</label>
    <span class="help-block">update pre initial coin offering date ...</span>
</div>

<div class="form-group form-md-line-input form-md-floating-label">
    <input type="text" class="form-control" name="main_ico_at" id="form_control_main_ico_at" value="{!! $ico ? $ico->main_ico_at : '' !!}">
    <label for="form_control_main_ico_at">Main ICO start date</label>
    <span class="help-block">update main initial coin offering date ...</span>
</div>

<div class="form-group form-md-line-input form-md-floating-label">
    <input type="text" class="form-control" name="ico_expire_at" id="form_control_ico_expire_at" value="{!! $ico ? $ico->ico_expire_at : '' !!}">
    <label for="form_control_ico_expire_at">ICO expiry date</label>
    <span class="help-block">update initial coin offering expiry date ...</span>
</div>
