<div class="jumbotron">
	<h1 class="headline"><i class="fa fa-archive"></i> Polls</h1>

	<ul class="undecorated-list">
		<li ng-repeat="poll in polls" class="li-polls"><a href="#/poll/{{ poll.id }}">{{ poll.title }}</a></li>
	</ul>
</div>