<html lang="en" >
   <head>
      <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/angular_material/1.0.0/angular-material.min.css">
      <link href="css/toaster.css" rel="stylesheet">
      <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
      <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-animate.min.js"></script>
      <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-aria.min.js"></script>
      <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-messages.min.js"></script>
      <script src="http://ajax.googleapis.com/ajax/libs/angular_material/1.0.0/angular-material.min.js"></script>
      <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-route.js"></script>
      <script src="js/toaster.js"></script>
   </head>
   <body ng-app="firstApplication" ng-cloak>
      <md-toolbar class="md-warn">
         <div class="md-toolbar-tools">
            <h2 class="md-flex">AngularJS + AngularMaterial Login/Signup</h2>
         </div>
      </md-toolbar>
      <md-content flex layout-padding style="margin-top: 5%;">
         <div data-ng-view="" id="ng-view" class="slide-animation"></div>
      </md-content>
   </body>   
   <toaster-container toaster-options="{'time-out': 3000}"></toaster-container>
   <script src="js/app.js"></script>
   <script src="js/directive.js"></script>
   <script src="js/authCtrl.js"></script>
</html>