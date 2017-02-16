<div class="errorMessages">
  <div class='alert alert-danger alert-dismissable' ng-show="show_error">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
     <strong>¡Vaya!</strong> Hubo algunos problemas con su entrada.<br><br>
      <ul><div  ng-repeat="error in message_error">
          <li >- @{{ error[0] }}</li>
      </div>
      </ul>
  </div>
</div>
<div class="successMessages" ng-show="message">
  <div class='alert alert-success alert-dismissable'>
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <p ng-bind="message"></p>
  </div>
</div>
