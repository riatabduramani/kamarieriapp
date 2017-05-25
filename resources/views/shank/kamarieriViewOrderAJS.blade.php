<html ng-app="myApp">
<head>
<meta charset="utf-8">
    <title>AngularJS Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
 	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<script src="https://code.jquery.com/jquery-3.1.1.min.js" defer></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" defer></script>
   
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"> </script>
  <script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
  <script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-resource.js"></script>
  <script type="text/javascript" src="/js/shank/app.js"></script>
<style>
.removePadd{
		padding-left: 0px;
		padding-right:0px;
	}
	
	.removeMarg{
		margin-left:0px;
		margin-right:0px;
	}
</style>
</head>
<body ng-controller="kamarieriTwo" style="background:#f5f8fa;">
<input type="hidden" id="clienid" value="{{ Auth::id() }}" />

<div id="main" class="container">

<div class="col-lg-7 removePadd removeMarg" style="border:1px ;padding-left:0px;padding-right:0px;margin-left:-9px;margin-top:21px;">

    <div class="row panel panel-default"  style="margin-left:0px;margin-right:0px;"  ng-repeat="val in keysOfMap" id="@{{val}}">
		<div class="panel-heading col-xs-12 col-sm-12 col-md-12 col-lg-12" style="color: #2aabd2;border:1px ;padding-left:8px;padding-right:0px;">
			<b><label class="fa fa-table"></label>&nbsp; Table @{{val}}</b><button style="margin-right:5px;" class="btn btn-info w3-right" ng-click="btnklik(val)">Seen</button>
		</div>
		<span ng-repeat="obj in mapa[val]">
		
		<div class="panel-heading col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top:3px;border:1px ;padding-left:8px;padding-right:0px;">
			<b>@{{ obj.product_name }}</b> <label ng-repeat="item in obj.ingredients.split(',')" style="margin-left: 3px;" class="label label-warning">@{{item}}></label>
		</div>
		
	  </span>
	</div>
	
	
</div>

</div>
	
</div>

</div>


</body>
</html>
