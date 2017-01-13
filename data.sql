insert into Polls
	values(null, "Pets", "What kind of pet person are you?")
	values(1, "Lunar Eclipse", "Did you see the lunar eclipse on the 8th of October, 2014?")
	values(2, "Transport", "What is your most common means of transport to and from university?")

insert into Options
	values(null, 3, 0, "Cat"), (null, 3, 1, "Dog"), (null, 3, 2, "Other")
	values(null, 1, 0, "Yes"), (null, 1, 1, "No")
	values(null, 2, 0, "Walking"), (null, 2, 1, "Bicycle"), (null, 2, 2, "Bus"), (null, 2, 3, "Car"), (null, 2, 4, "Other");

insert into Votes
	values(null, 1, "192.168.0.1", 0), (null, 1, "192.168.0.1", 0), (null, 1, "192.168.0.1", 0);
	values(null, 1, "192.168.0.1", 1), (null, 1, "192.168.0.2", 2), (null, 1, "192.168.0.3", 2), (null, 2, "192.168.0.4", 7);