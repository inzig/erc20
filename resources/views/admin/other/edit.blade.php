<div class="form-group form-md-line-input form-md-floating-label">
    <input type="text" class="form-control" id="title" name="title_en" id="form_control_title" value="{{ $other ? $other->title_en:''}}">
    <label for="form_control_title"><span class="red-color">* </span>Title</label>
    <span class="help-block">Enter the  faq title ...</span>
</div>

<div class="form-group form-md-line-input form-md-floating-label">
    <textarea class="form-control" rows="5" name="description_en" id="description">{{ $other ? $other->description_en:''}}</textarea>
    <label for="form_control_minimum"><span class="red-color">* </span>Description</label>
    <span class="help-block">Enter the  faq description  ...</span>
</div>



