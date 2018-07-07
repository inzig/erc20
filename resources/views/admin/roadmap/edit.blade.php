<div class="form-group form-md-line-input form-md-floating-label">
    <input type="text" class="form-control" id="year" name="year" id="form_control_title" value="{{ $roadmap ? $roadmap->year:''}}">
    <label for="form_control_title"><span class="red-color">* </span>year</label>
    <span class="help-block">Enter the  roadmap year ...</span>
</div>
<div class="form-group form-md-line-input form-md-floating-label">
    <input type="text" class="form-control" id="title" name="title" id="form_control_title" value="{{ $roadmap ? $roadmap->title:''}}">
    <label for="form_control_title"><span class="red-color">* </span>Title</label>
    <span class="help-block">Enter the  roadmap title ...</span>
</div>
<div class="form-group form-md-line-input form-md-floating-label">
    <textarea class="form-control" rows="5" name="description_en" id="description">{{ $roadmap ? $roadmap->description_en:''}}</textarea>
    <label for="form_control_minimum"><span class="red-color">* </span>Description</label>
    <span class="help-block">Enter the  roadmap description    ...</span>
</div>




