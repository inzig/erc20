<div class="form-group form-md-line-input form-md-floating-label">
    <input type="hidden" name="title" value="Team"/>
    <input type="text" class="form-control" id="name" name="name" id="form_control_title" value="{{ $member ? $member->name:''}}">
    <label for="form_control_title"><span class="red-color">* </span>Username</label>
    <span class="help-block">Enter the  member username ...</span>
</div>

<div class="form-group form-md-line-input form-md-floating-label">
    <input type="text" class="form-control" name="designation_en" id="form_control_address" value="{{ $member ? $member->designation_en:''}}">
    <label for="form_control_address"><span class="red-color">* </span>Designation</label>
    <span class="help-block">Enter the  member designation ...</span>
</div>



<div class="form-group form-md-line-input form-md-floating-label">
    <textarea class="form-control" rows="5" name="description_en" id="description">{{ $member ? $member->description_en:''}}
    </textarea>
    <label for="form_control_minimum"><span class="red-color">* </span>Description </label>
    <span class="help-block">Enter the  member description  ...</span>
</div>


<div class="form-group" style="color: #250C3D">
    <label>Image <span class="image-spinner"><i class="fa fa-repeat fa-spin"></i></span></label>
    <input type="file" class="image-selector" style="color:#fff">
    <span id="avatar_image"></span>
    <input type="hidden" name="avatar" value="{{ $member ? $member->avatar:''}}">
</div>

<div class="form-group form-md-line-input form-md-floating-label">
    <input type="url" class="form-control" name="linkedin" id="form_control_address" value="{{ $member ? $member->linkedin:''}}">
    <label for="form_control_address"><span class="red-color">* </span>linkedin</label>
    <span class="help-block">Enter the  member linkedin link ...</span>
</div>

