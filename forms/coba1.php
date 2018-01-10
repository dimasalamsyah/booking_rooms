<div ng-app="myApp">

  <div class="container" ng-controller="ctrlTags">
    <div class="row" id="exSelects">
      <div class="col-sm-6">
        <h4>Select with Search Filter</h4>
        <select id="mySel" class="form-control">
          <option ng-repeat="item in items" ng-selected="item.selected" ng-model="item.tag">{{item.tag}}</option>
        </select>
      </div><!--/col-->
    </div><!--/row-->
    
    <hr>
    
    <div class="row">
      <div class="col-sm-6">
        <h4>Tag Picker</h4>
        <select id="mySel2" class="form-control" multiple="multiple">
          <option ng-repeat="item in items" ng-selected="item.selected" ng-model="item.tag">{{item.tag}}</option>
        </select>
      </div><!--/col-->
    </div><!--/row-->
    
    <hr>
    
    <div class="row" id="exDateTime">
      <div class="col-sm-3">
        <h4>Date &amp; Time Inputs</h4>
        <div class="form-group">
          <label class="control-label">Date picker</label>
          <div class="input-group date" id="datepicker">
            <input type="text" class="form-control">
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
          </div>
        </div>
      </div><!--/col-->
      <div class="col-sm-3">
        <h4>&nbsp;</h4>
        <div class="form-group">
          <label class="control-label">Time picker</label>
          <div class="input-group" id="timepicker">
            <input type="text" class="form-control">
            <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
          </div>
        </div>
      </div><!--/col-->
      <div class="col-sm-6">
        <h4>Date Range Selector</h4>
        <div class="row">
          <div class="col-sm-6">
            <div class="input-daterange form-group has-feedback">
              <label class="control-label">Start</label>
              <input class="form-control" name="dateStart" type="text" placeholder="from">
              <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
            </div>
          </div><!--/col-->
          <div class="col-sm-6">
            <div class="input-daterange form-group has-feedback">
              <label class="control-label">End</label>
              <input class="form-control" name="dateEnd" type="text" placeholder="to">
              <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
            </div>
          </div><!--/col-->
        </div><!--/row-->
        
      </div><!--/col-->
    </div><!--/row-->
  
    <hr>
    
    <div class="row" id="exInputMasking">
      <div class="col-sm-6">
        <h4>Input Masking</h4>
        
        <h5>Phone Number</h5>
      	<input type="text" class="form-control" data-mask="(999) 999-9999 x9999" placeholder="(555) 111-2222">
        
        <h5>Credit Card</h5>
      	<input type="text" class="form-control" data-mask="9999-9999-9999-9999" placeholder="0000-0000-0000-0000">
        
        <h5>Tax Id</h5>
      	<input type="text" class="form-control" data-mask="99-9999999" placeholder="XX-XXXXXXX">
        
        <h5>Date</h5>
        <div class="form-group">
          	<div class="input-group">
        	 <input type="text" class="form-control" data-mask="99/99/9999" placeholder="MM/DD/YYYY">
        	 <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
          	</div>
        </div>
      
      </div><!--/col-->
      <div class="col-sm-6">
      
        <h4>&nbsp;</h4>
        
        <h5>Twitter</h5>
      	<input type="text" class="form-control" data-mask="@ww?wwwwwwwwwwwwwww" placeholder="@screename">
        
        <h5>Expiration Date</h5>
        <input type="text" class="form-control" data-mask="99/9999" placeholder="MM/YYYY">
        
        <h5>Social Security #</h5>
      	<input type="text" class="form-control" data-mask="999-99-9999" placeholder="123-23-1234">
        
        <h5>Time</h5>
        <div class="form-group">
          	<div class="input-group">
        	 <input type="time" class="form-control" placeholder="12:00 AM">
        	 <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
          </div>
        </div>
      
      </div><!--/col-->
    </div><!--/row-->
  
    <hr>
    
    <div class="row">
      <form class="col-sm-6" id="exHtml5Validation">
        <h4>HTML5 Validation</h4>
        <div class="form-group has-feedback">
         <label>Email</label>
      	 <input type="email" class="form-control" placeholder="you@validemail.com" required="" min="7" data-valid-pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
         <span class="glyphicon glyphicon-ok form-control-feedback fade"></span>
         <h6 class="help-block">Enter a valid email address.</h6>
        </div>
        <div class="form-group has-feedback">
         <label>Password</label>
      	 <input type="password" id="inputPassword" class="form-control has-feedback" required="" placeholder="xxxxxx" pattern="^[a-z,A-Z,0-9,_]{6,15}$" title="One word. No spaces or special characters." min="6">
         <span class="glyphicon glyphicon-ok form-control-feedback fade"></span>
         <h6 class="help-block">Enter a password of at least 6 alpha and numeric chars.</h6>
        </div>
        <div class="form-group has-feedback">
         <label>Verify</label>
      	 <input type="password" class="form-control has-feedback" placeholder="xxxxxx" required="" pattern="^[a-z,A-Z,0-9,_]{6,15}$" title="One word. No spaces or special characters." min="6" data-valid-match="inputPassword">
         <span class="glyphicon glyphicon-ok form-control-feedback fade"></span>
         <h6 class="help-block">Re-enter that same password for verification.</h6>
        </div>
        <div class="form-group has-feedback">
         <label>Username</label>
         <input type="text" class="form-control" placeholder="username" min="6" max="20" required="" pattern="^[a-z,A-Z,0-9,_]{6,20}$">
         <span class="glyphicon glyphicon-ok form-control-feedback fade"></span>
         <h6 class="help-block">Enter a username. No spaces or special characters.</h6>
        </div>
        <div class="form-group has-feedback">
         <label>Web URL</label>
         <input type="url" class="form-control" placeholder="username" data-valid-min="10" pattern="https?://.+">
         <span class="glyphicon glyphicon-ok form-control-feedback fade"></span>
         <h6 class="help-block">Enter a URL address. Include the http:// or https:// portion.</h6>
        </div>
        <button class="btn btn-default" type="submit">Validate</button>
      </form><!--/col-->
      <!--end html5 validation-->
      
      <!--file and image upload-->
      <div class="col-sm-6" id="exFileImageUpload">
        <h4>File &amp; Image Upload</h4>
        <div class="form-group">
        	<label>File selector</label>
            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Choose...</span><span class="fileinput-exists">Change</span><input type="file" name="..."></span>
                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
            </div>
        </div>
      	<hr>
        <div class="fileinput fileinput-new" data-provides="fileinput">
          <label>Image uploader</label>
          <div class="fileinput-new thumbnail">
            <img data-src="" src="/assets/example/bg_suburb.jpg" class="img-responsive">
          </div>
          <div class="fileinput-preview fileinput-exists thumbnail"></div>
          <div>
            <span class="btn btn-default btn-file"><span class="fileinput-new">Select image...</span><span class="fileinput-exists">Change</span><input type="file" name="..."></span>
            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
          </div>
        </div>
      </div><!--/col-->
      <!--end file and image upload-->
      
    </div><!--/row-->
    
  </div><!--/container-->
  
  <hr>
  
</div><!--/app-->

<script type="text/javascript">


</script>