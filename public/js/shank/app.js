angular.module('myApp', [ 'ngResource' ])
.service('UsersService',function($http, $log, $resource) {
	var initLink = "http://localhost:8083/resapp/";	
			return {
			
				
			}
		})

.controller('kamarieri', function($scope, $window,  $log, UsersService,$http) {
	
	var i=0;
	var notification = null;
	var img = null;
	
	$scope.mapa = {};
	$scope.keysOfMap = [];
	$scope.arr = [];
	$scope.orderByTable = {};

	$scope.drawImage = function(){
		var canvas = document.createElement("canvas");
		var ctx = canvas.getContext("2d");
		ctx.fillStyle = "#d03";
		ctx.fillRect(0, 0, canvas.width, canvas.height);
		ctx.font = canvas.height+"px Arial MS";
		ctx.fillStyle = "white";
		ctx.textAlign = "center";
		ctx.fillText(i+"", canvas.width/2,  canvas.height*0.83); 
		img  = document.createElement("img");
		img.src = canvas.toDataURL("image/png");
	};
	
	window.onload = function() {		
	
			setInterval(function() {
			var clientid=document.getElementById("clientid").value;  	
			
				var settings = {
				  "async": true,
				  "crossDomain": true,
				  "url": "http://api.kamarieri.com/unseen/"+clientid,
				  "method": "GET",
				  "headers": {
					"authorization": "Basic c3V1YWQtQGxpdmUuY29tOjEyMzQ1Njc4",
					"cache-control": "no-cache"
				  }
				}

				$.ajax(settings).done(function (data) {
						if(data.length > 0){			
							$scope.arr = data;
							$scope.groupByTables2();
							var prev = Object.keys($scope.mapa).length;
							if(i!=prev){
								i = prev;
								$scope.drawImage();
								$scope.notifyMe(i);
							}
						}else{
							if(notification != null){
								notification.close();
							  }
							  i=0;
						}
				});
	
			  
			}, 5000);
	};
	
	$scope.groupByTables2 = function (){
		$scope.mapa = {};
		$scope.keysOfMap = [];
		$scope.orderByTable = {};
		
		$scope.arr.forEach(function(element) {
			if (element.table_nr in $scope.mapa){
				$scope.mapa[element.table_nr].push(element);
				if($scope.orderByTable[element.table_nr].indexOf(element.order_id) !== -1) {
					
				}else{
					$scope.orderByTable[element.table_nr] += "," + element.order_id;
				}
			}else {
				$scope.niza = [];
				$scope.niza.push(element);
				$scope.mapa[element.table_nr] = $scope.niza;
				$scope.keysOfMap.push(element.table_nr);
				
				// $scope.nizaOrder = [];
				// $scope.nizaOrder.push(element.order_id);
				$scope.orderByTable[element.table_nr] = element.order_id+"";
			}
		});		

		$scope.$apply();
	};
	
	
	$scope.groupByTables = function (){
		$scope.mapa = {};

		$scope.arr.forEach(function(element) {
			if (element.table_nr in $scope.mapa){
				$scope.mapa[element.table_nr].push(element);
			}else {
				var niza = [];
				niza.push(element);
				$scope.mapa[element.table_nr] = niza;
			}
		});
	};	
	
	$scope.notifyMe = function(i) {
		  if (Notification.permission !== "granted")
			Notification.requestPermission();
		  else {
			  if(notification != null){
				notification.close();
			  }
			  notification = new Notification('Notification title', {
				  icon: img.src,
				  body: "Hey there! You've been notified!"+i+" times;",
				  requireInteraction: true 
				});
				//setTimeout(notification.close(), 2000000);
				notification.onclick = function () {
					//$scope.process(arr);
					window.open("/shank/open","","width=650, height=450"); 					
				};

		  }

	};
	
	$scope.btnklik = function(tableNr){			
		
		 $http({
					        url: "http://api.kamarieri.com/seen/"+$scope.orderByTable[tableNr],
					        method: "POST",
					        headers: {
					            "authorization": "Basic c3V1YWQtQGxpdmUuY29tOjEyMzQ1Njc4",
								"cache-control": "no-cache"	
					        }
					        
		}).success(function(data, status, headers, config) {
						if(data){
							$("#"+tableNr).hide();
						}
					    }).error(function(data, status, headers, config) {
							alert("error" + data);
					    });;

		
	};
	
}).controller('kamarieriTwo', function($scope, $window,  $log, UsersService, $http) {
	$scope.mapa = {};
	$scope.keysOfMap = [];
	$scope.arr = [];
	$scope.orderByTable = {};
	
	window.onload = function() {	
		var clientid=document.getElementById("clientid").value; 
		var settings = {
		  "async": true,
		  "crossDomain": true,
		  "url": "http://api.kamarieri.com/unseen/"+clientid,
		  "method": "GET",
		  "headers": {
			"authorization": "Basic c3V1YWQtQGxpdmUuY29tOjEyMzQ1Njc4",
			"cache-control": "no-cache"
		  }
		}

		$.ajax(settings).done(function (data) {
				if(data.length > 0){			
					$scope.arr = data;
					$scope.groupByTables2();						
				}
		});		
	};
	
	$scope.groupByTables2 = function (){
		$scope.mapa = {};
		$scope.keysOfMap = [];
		$scope.orderByTable = {};
		
		$scope.arr.forEach(function(element) {
			if (element.table_nr in $scope.mapa){
				$scope.mapa[element.table_nr].push(element);
				if($scope.orderByTable[element.table_nr].indexOf(element.order_id) !== -1) {
					
				}else{
					$scope.orderByTable[element.table_nr] += "," + element.order_id;
				}
			}else {
				$scope.niza = [];
				$scope.niza.push(element);
				$scope.mapa[element.table_nr] = $scope.niza;
				$scope.keysOfMap.push(element.table_nr);
				
				// $scope.nizaOrder = [];
				// $scope.nizaOrder.push(element.order_id);
				$scope.orderByTable[element.table_nr] = element.order_id+"";
			}
		});		

		$scope.$apply();
	};
	
	$scope.btnklik = function(tableNr){			
		
		 $http({
					        url: "http://api.kamarieri.com/seen/"+$scope.orderByTable[tableNr],
					        method: "POST",
					        headers: {
					            "authorization": "Basic c3V1YWQtQGxpdmUuY29tOjEyMzQ1Njc4",
								"cache-control": "no-cache"	
					        }
					        
		}).success(function(data, status, headers, config) {
						if(data){
							$("#"+tableNr).hide();
						}
					    }).error(function(data, status, headers, config) {
							alert("error" + data);
					    });;

		
	};
	
	
});
angular.module('myApp').filter('pagination', function() {
	return function(input, start) {
		start = +start;
		return input.slice(start);
	};
});



