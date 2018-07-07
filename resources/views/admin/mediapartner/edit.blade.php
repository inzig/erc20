
<div class="form-group form-md-line-input form-md-floating-label">
    <input type="hidden" name="title" value="mediaPartner"/>
    <input type="text" class="form-control" id="name" name="name" id="form_control_title" value="{{ $partner ? $partner->name:''}}">
    <label for="form_control_title"><span class="red-color">* </span>Partner name</label>
    <span class="help-block">Enter the  partner name ...</span>
</div>
<div class="form-group" style="color: #250C3D">
    <label> <span class="red-color">* </span>Partner Image
        size
        <span class="text-danger">
             (170 X 30)
           </span>
        <span class="image-spinner">
            <i class="fa fa-repeat fa-spin"></i>
           </span></label>
    <input type="file" class="image-selector" style="color:#fff">
    <span id="avatar_image"></span>
    <input type="hidden" name="avatar" value="{{ $partner ? $partner->avatar:''}}">
</div>

<div class="form-group form-md-line-input form-md-floating-label">
    <input type="text" class="form-control" id="url" name="url" id="form_control_title" value="{{ $partner ? $partner->url:''}}">
    <label for="form_control_title"><span class="red-color">* </span>Partner url</label>
    <span class="help-block">Enter the  partner url ...</span>
</div>
