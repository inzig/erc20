<div class="form-group form-md-line-input form-md-floating-label">
    @if($setting->name=='payment_disabled')
        <select id="form_control_value" class="form-control" name="{{$setting->name}}">
            <option {{$setting->value=='yes'?'selected':''}}>yes</option>
            <option {{$setting->value=='no'?'selected':''}}>no</option>
        </select>
    @else
        <input type="text" class="form-control" name="{{$setting->name}}" id="form_control_value" value="{!! $setting->value !!}">
    @endif
    <label for="form_control_value">Value of setting</label>
    <span class="help-block">update setting of {{$setting->name}} ...</span>
</div>
