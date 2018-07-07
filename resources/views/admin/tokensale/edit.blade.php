<div class="form-group form-md-line-input form-md-floating-label">


    <input type="text" class="form-control" id="title" name="title" id="form_control_title" value="{{ $tokensale ? $tokensale->title:''}}">
    <label for="form_control_title">Title</label>
    <span class="help-block">Enter the  tokensale title ...</span>


</div>



<div class="form-group form-md-line-input form-md-floating-label">
    <textarea class="form-control" rows="5" name="description" id="description">{{ $tokensale ? $tokensale->description:''}}</textarea>
    <label for="form_control_minimum">description</label>
    <span class="help-block">Enter the  tokensale description  ...</span>
</div>
