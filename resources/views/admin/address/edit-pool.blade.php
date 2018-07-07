<div class="form-group form-md-line-input has-info">
    <label for="form_address_type">ICO type</label>
    <select class="form-control" id="form_address_type" name="type">
        @foreach(config('app.ico_types') as $type)
            <option value="{{$type}}" {!! $pool && $pool->crypto_type == strtoupper($type) ? 'selected=""' : '' !!}>{{ ucfirst($type) }}</option>
        @endforeach
    </select>
</div>

<div class="form-group form-md-line-input form-md-floating-label">
    <input type="text" class="form-control" name="address" id="form_control_address" value="{{ $pool ? $pool->address : '' }}">
    <label for="form_control_address">ICO address token</label>
    <span class="help-block">update initial coin offering token address for user's ...</span>
</div>
