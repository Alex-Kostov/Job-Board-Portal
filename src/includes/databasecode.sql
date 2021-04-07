CREATE TABLE users (
  user_id int(11) AUTO_INCREMENT PRIMARY KEY not null,
  user_username varchar(256) not null,
  user_password varchar(256) not null
);
INSERT INTO users (user_username, user_password)
VALUES ('admin', '123456');

CREATE TABLE offers (
  offers_id int(11) AUTO_INCREMENT PRIMARY KEY not null,
  offers_created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  offers_status varchar(256) DEFAULT 'waiting for approval',
  offers_title varchar(256) not null,
  offers_description varchar(256) not null,
  offers_company varchar(256) not null,
  offers_salary varchar(256) not null,
  offers_imageUrl varchar(256) not null,
  offers_type varchar(256) not null,
  offers_location varchar(256) not null
);

INSERT INTO offers (
    offers_status,
    offers_title,
    offers_description,
    offers_company,
    offers_salary,
    offers_imageUrl,
    offers_type,
    offers_location
  )
VALUES (
    "approved",
    "Pricing Specialist and Market Reasercher",
    "Browse mobile.bg and check the cars prices and then analyze them to forecast the future price.",
    "Ald Automotive",
    "5",
    "https://www.aldautomotive.bg/Portals/bulgaria/xBlog/uploads/2020/6/5/ALD104PNG.png",
    "Full-time",
    "Sofia"
  );

  INSERT INTO offers (
    offers_title,
    offers_description,
    offers_company,
    offers_salary,
    offers_imageUrl,
    offers_type,
    offers_location
  )
VALUES (
    "Front End Developer",
    "Bachelor's degree in computer science, engineering, math, or science discipline and 4+ years of experience in software development OR 6+ years of experience in software development. Development experience in JavaScript. Professional experience in developing software products with frontend or user experience focus.",
    "SpaceX",
    "80",
    "data:image/png;base64,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",
    "Full-time",
    "Hotorn,CA"
  );