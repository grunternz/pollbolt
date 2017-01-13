<div class="jumbotron" data-ng-init="getPoll()">
	<h1 class="headline">{{ poll.title }}</h1>
	<h2>{{ poll.question }}</h2><hr>
	<div class="alert alert-info" ng-show="!show_graph" role="alert"><i class="fa fa-lightbulb-o"></i> {{ graph_info }}</div>

	<div id="chart" class="container">
		<div class="row" ng-show="show_graph">
			<div class="col-md-4">
				<canvas id="chart-area" width="300" height="300"/></canvas>
			</div>
			<div id="legend"></div>
			<button class="btn btn-danger" ng-click="resetPoll(poll.id)"><i class="fa fa-trash-o"></i> Reset poll</button>
		</div>
	</div>
</div>