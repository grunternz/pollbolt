<div class="jumbotron">
	<form name="voteForm">
		<h1 class="headline">{{ poll.title }}</h1>
		<h2>{{ poll.question }}</h2>

		<ul class="undecorated-list">
			<li ng-repeat="option in poll.answers">
				<label>
					<input type="radio" name="name" ng-click="radioClicked(option)" value="{{ option }}" ng-disabled = "!enabled" /> {{ option }}
				</label>
			</li>
		</ul>

		<button class="btn btn-default btn-lg" ng-click="buttonClicked(poll, option)" ng-disabled="!checked" ng-show="enabled">Submit</button>

		<div class="alert alert-success" role="alert" ng-show="!enabled"><i class="fa fa-check"></i> Your vote has been recorded.</div><hr>

		<a href="#/poll/{{ poll.id }}/results"><i class="fa fa-pie-chart"></i> View results</a>

	</form>

</div>