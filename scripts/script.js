(function () {
    // create the module
	var app = angular.module('app', ['ngRoute']);
	var base_url = 'http://csse-studweb3.canterbury.ac.nz/~ceo17/365/polls/';

	// configure routes
	app.config(function($routeProvider) {
		$routeProvider

			// route for the polls page
			.when('/', {
				templateUrl : 'index.php/pages/load_poll_view',
				controller  : 'pollsController'
			})

			// route for the about page
			.when('/about', {
				templateUrl : 'index.php/pages/load_about_view',
				controller  : 'aboutController'
			})

			// route for the vote page
			.when('/poll/:id', {
				templateUrl : 'index.php/pages/load_vote_view',
				controller  : 'voteController'
			})

			// route for the results page
			.when('/poll/:id/results', {
				templateUrl : 'index.php/pages/load_results_view',
				controller  : 'resultsController'
			})

	});

	app.controller('navController', function($scope, $location) {
    	$scope.isActive = function(route) {
        	return route === $location.path();
    	}
	});

	app.controller('pollsController', function($scope, $http) {
		$http({method: 'GET', url: base_url + '/index.php/services/polls'})
			.success(function(data) {
				$scope.polls = data;
  			}).
  			error(function(data) {
  				alert("polls get error");
  			});

	});

	app.controller('voteController', function($scope, $http, $routeParams) {
		$scope.checked = false;
		$scope.answer_id = null;
		$scope.enabled = true;

		$http({method: 'GET', url: base_url + '/index.php/services/polls/' + $routeParams.id})
			.success(function(data) {
				$scope.poll = data;
  			}).
  			error(function(data) {
  				alert("poll get error");
  		});

  		$scope.radioClicked = function (option) {
  			$scope.checked = true;
  			var optionIndex = $scope.poll.answers.indexOf(option);
  			$scope.answer_id = optionIndex;
  		};

  		$scope.buttonClicked = function (poll, option) {
  			$http({method: 'POST', url: base_url + '/index.php/services/votes/' + poll.id + '/' + $scope.answer_id})
			.success(function() {
				$scope.enabled = false;
  			}).
  			error(function() {
  				alert("poll post error");
  			});
  		};

	});

	app.controller('resultsController', function($scope, $http, $routeParams, $route) {
		$scope.show_results = false;
		$scope.pieData = [];

		$scope.getPoll = function() {
			$http({method: 'GET', url: base_url + '/index.php/services/polls/' + $routeParams.id})
			.success(function(data) {
				$scope.poll = data;
				$scope.getResults();
  			}).
  			error(function(data) {
  				alert("poll get error");
  			});
		};

		$scope.getRandomColour = function() {
			var letters = '23456789ABCD'.split('');
		    var color = '#';
		    for (var i = 0; i < 6; i++ ) {
		        color += letters[Math.floor(Math.random() * 12)];
		    }
		    return color;
		};

		$scope.getHighlightColour = function(colour, percent) {
    		var f=parseInt(colour.slice(1),16),t=percent<0?0:255,p=percent<0?percent*-1:percent,R=f>>16,G=f>>8&0x00FF,B=f&0x0000FF;
    		return "#"+(0x1000000+(Math.round((t-R)*p)+R)*0x10000+(Math.round((t-G)*p)+G)*0x100+(Math.round((t-B)*p)+B)).toString(16).slice(1);
		};

		$scope.getResults = function() {
  			$http({method: 'GET', url: base_url + '/index.php/services/votes/' + $routeParams.id})
			.success(function(data) {
				$scope.results = data;

				for (i = 0; i < $scope.results.length; i++) {
					var colour = $scope.getRandomColour();
					$scope.pieData.push(
						{
							value: $scope.results[i],
							color: colour,
							highlight: $scope.getHighlightColour(colour, 0.2),
							label: $scope.poll.answers[i]
						});
				}

				$scope.loadChart();
  			}).
  			error(function(data) {
  				alert("votes get error");
  			});
  		}

		$scope.loadChart = function() {
			var valid = false;
			for (i = 0; i < $scope.results.length; i++) {
				if ($scope.results[i] !== 0) {
					valid = true;
				}
			}

			if (valid) {
				$scope.graph_info = "";
				$scope.show_graph = true;

				// Create the chart
	            var ctx = document.getElementById("chart-area").getContext("2d");
				window.myPie = new Chart(ctx).Pie($scope.pieData);

				// Populate the legend
				legend(document.getElementById("legend"), $scope.pieData);
			}
			else {
				$scope.graph_info = "There are no results to show yet.";
				$scope.show_graph = false;
			}
		};

		$scope.resetPoll = function(poll_id) {
			$http({method: 'DELETE', url: base_url + '/index.php/services/votes/' + poll_id})
			.success(function(data) {
				$route.reload();
  			}).
  			error(function(data) {
  				alert("poll delete error");
  			});
		};
	});

	app.controller('aboutController', function($scope) {
		$scope.message = "The hottest poll site on the Intersphere!";
	});

}());