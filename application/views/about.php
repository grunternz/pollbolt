<div class="jumbotron">
	<p class="date">October 13<sup>th</sup>, 2014</p>
	<h1 class="headline"><i class="fa fa-info-circle"></i> About</h1>
	<p class="tag"><i class="fa fa-globe"></i> {{ message }}</p>

	<p>Poll Bolt is a single page application created using mainly CodeIgniter and AngularJS. It's creation was spawned 
	from an assignment in SENG365, a web computing architecture course at the University of Canterbury.</p>

	<div>
	<hr>
		<h2>Author</h2>
		<p>Colin O'Brien</p>

		<h2>Design</h2>
		<p>I decided to use CodeIgniter for handling the backend of my site, including all php and database queries. I achieved this through the use of models, which handle
		all the database queries, and a single controller to handle all web service requests. I used AngularJs to handle the views and interactivity between them. There is one 
		master page which other pages are injected into. This achieves the single page design the assignment is based around. Each page has it's own Angular controller to handle 
		it's respective functionality and interactivity. If I had more time, I would've added in the remaining web services for completeness, and then utilised them to add further 
		functionality such as poll creation, deletion and replacement. I also would've tidied up my Angular controllers into different files for a more modular, and manageable design.</p>

		<h2>Web Services</h2>
		<ul class="list-line-height undecorated-list">
			<li>GET polls: Returns a JSON list of polls, where each poll is a JSON object.</li>
			<li>GET polls/id: Returns a single JSON object representing the given poll.</li>
			<li>POST votes/pollId/vote: Posts a vote corresponding to the option number to the given poll.</li>
			<li>GET votes/pollId: Returns a JSON object containing a list of the number of votes for each option in the given poll.</li>
			<li>DELETE votes/pollId: Deletes all votes in the given poll.</li>
		</ul>

		<h2>Extra Features</h2>
		<p>I looked into several different graphing libraries to use for visually representing the results of each poll. Initially I tried Highcharts, 
		however I felt it was overly complicated which made it feel bloated. I ended up going with Chartjs, as it's light weight and open source.</p>
		<p>One difficulty I ran into was creating a legend for the graphs, however this was somewhat resolved when I discovered an out of date library 
		called chartjs legend, on github. I studied the provided code, updated it to work with the current version of chartjs and then extended it to also provide
		the field values for each answer within the legend itself.</p>

		<h2>Personal Perspective</h2>
		<p>I genuinely enjoyed this assignment, and as a result I put a lot of time into it. I believe this has paid off immensely, not
		only in my learning experience but also in the final result. AngularJS is extremely powerful and intuitive and I am glad it has been a part of the course. I strongly
		believe it should remain a part of the course in years to come, provided it survives.</p>

		<h2>Bugs</h2>
		<p>The colours on the graphs are randomly generated, and thus there is a chance (especially on graphs containing many different answers) of two fields
		having very similar if not almost the same colours. I thought of making the graph colours monochrome however this only shifts the problem which is still
		prevalent on graphs with a high number of answers.</p>



		<h2>Acknowledgements and Resources</h2>
		<ul class="list-line-height undecorated-list">
			<li><a href="https://ellislab.com/codeigniter">CodeIgniter</a></li>
			<li><a href="https://github.com/chriskacerguis/codeigniter-restserver">CodeIgniter RestServer</a></li>
			<li><a href="https://angularjs.org/">AngularJS</a></li>
			<li><a href="http://getbootstrap.com/">Bootstrap</a></li>
			<li><a href="http://fortawesome.github.io/Font-Awesome/">Font Awesome</a></li>
			<li><a href="http://jquery.com/">jQuery</a></li>
			<li><a href="http://www.chartjs.org/">Chartjs</a></li>
			<li><a href="https://github.com/bebraw/Chart.js.legend">Chartjs legend</a></li>
			<ul>
				<li>Modified to work with current version of Chartjs (as it hasn't been updated in approximately one year). Added further functionality for displaying field values in legend.</li>
			</ul>
		</ul>
	</div>
</div>


