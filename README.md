# PSW-Internet-Petition
 The internet-connection in my student residence is very slow for many tenants. With this tool, tenants can submit their internet speed and sign the petition digitally.
 The solution is a bit quick & dirty, but it works. Maybe I´ll make it better over time.
 
 If you have a similar usecase, feel free to use the source code and modify it to your needs :)
 
 ## Implementing the tool yourself 🚀
 To get started, create a database and put in your credentials into the variables in "mysql.php".
 Then create a table with the neccessary colums, using this SQL-Statement:
 
 ```SQL
 CREATE TABLE `psw` (
  `id` int(11) NOT NULL,
  `room_nr` int(4) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `houseNumber` int(1) NOT NULL,
  `downloadSpeedProblem` tinyint(1) NOT NULL,
  `uploadSpeedProblem` tinyint(1) NOT NULL,
  `disconnectionProblem` tinyint(1) NOT NULL,
  `problemDescription` varchar(700) NOT NULL,
  `ping` float NOT NULL,
  `upload` float NOT NULL,
  `download` float NOT NULL,
  `followUp` tinyint(1) NOT NULL,
  `agreed` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
```

Don´t forget to make "id" the primary key!

## More Information 💭
This site uses the Bootstrap Framework, which is included via CDN.

As a little extra, I´ve added support for device-wide dark mode.
