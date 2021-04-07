DROP TABLE offers;

CREATE TABLE `offers` (
  `offers_id` int(11) NOT NULL AUTO_INCREMENT,
  `offers_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `offers_title` varchar(256) NOT NULL,
  `offers_description` varchar(256) NOT NULL,
  `offers_company` varchar(256) NOT NULL,
  `offers_salary` varchar(256) NOT NULL,
  `offers_imageUrl` varchar(256) NOT NULL,
  `offers_type` varchar(256) NOT NULL,
  `offers_location` varchar(256) NOT NULL,
  PRIMARY KEY (`offers_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO offers VALUES("1","2021-04-05 13:00:41","Pricing Specialist and Market Reasercher","Browse mobile.bg and check the cars prices and then analyze them to forecast the future price.","Ald Automotive","5","https://www.aldautomotive.bg/Portals/bulgaria/xBlog/uploads/2020/6/5/ALD104PNG.png","Full-time","Sofia");
INSERT INTO offers VALUES("2","2021-04-05 13:00:41","Front End Developer","Bachelor\'s degree in computer science, engineering, math, or science discipline and 4+ years of experience in software development OR 6+ years of experience in software development. Development experience in JavaScript. Professional experience in developin","SpaceX","80","data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAlgAAABRCAMAAAA5KCgPAAAAgVBMVEX///8AAADMzMylpaWEhISVlZVra2t+fn60tLT19fXZ2dkwMDDo6Oj8/Pzx8fEhISHf398ICAjGxsaKiorT09O+vr5UVFRlZWVbW1u2trbr6+uhoaGsrKyvr69zc3MlJSU3NzcZGRlAQEBISEhLS0uJiYkSEhIcHBxoaGiampozMzNtkHnMAA","Full-time","Hotorn,CA");



DROP TABLE users;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_username` varchar(256) NOT NULL,
  `user_password` varchar(256) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO users VALUES("1","admin","123456");



