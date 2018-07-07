<div class="form-group form-md-line-input form-md-floating-label">
   <input type="text" class="form-control" id="title" name="title" id="form_control_title" value="{{ $bonuse ? $bonuse->title:''}}">
    <label for="form_control_title">Title</label>
    <span class="help-block">Enter the  bonuse title ...</span>
</div>



<div class="form-group form-md-line-input form-md-floating-label">
    <input type="text" class="form-control" id="first_offer" name="first_offer" id="form_control_title" value="{{ $bonuse ? $bonuse->first_offer:''}}">
    <label for="form_control_title">First Offer</label>
    <span class="help-block">Enter the  first offer ...</span>
</div>

<div class="form-group form-md-line-input form-md-floating-label">
   <input type="text" class="form-control" id="second_offer" name="second_offer" id="form_control_title" value="{{ $bonuse ? $bonuse->second_offer:''}}">
    <label for="form_control_title">Second Offer</label>
    <span class="help-block">Enter the  second offer ...</span>
</div>
