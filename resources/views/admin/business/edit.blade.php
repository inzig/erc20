<div class="form-group form-md-line-input form-md-floating-label">


    <input type="text" class="form-control" id="title" name="title" id="form_control_title" value="{{ $business ? $business->title:''}}">
    <label for="form_control_title">Title</label>
    <span class="help-block">Enter the  business title ...</span>


</div>



<div class="form-group form-md-line-input form-md-floating-label">
    <textarea class="form-control" rows="5" name="description" id="description">{{ $business ? $business->description:''}}</textarea>
    <label for="form_control_minimum">description</label>
    <span class="help-block">Enter the  business description  ...</span>
</div>
