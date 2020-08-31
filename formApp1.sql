SET NAMES utf8;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

CREATE TABLE news (
        id int(11) NOT NULL AUTO_INCREMENT,
        title varchar(128) NOT NULL,
        slug varchar(128) NOT NULL,
        text text NOT NULL,
        PRIMARY KEY (id),
        KEY slug (slug)
);

INSERT INTO news(title, slug, text) VALUES(
    "Welcome to CodeIgniter",
    "Welcome",
    "CodeIgniter is an Application Development Framework - a toolkit - for people who build web sites using PHP."
);
INSERT INTO news(title, slug, text) VALUES(
    "Tutorial",
    "Tutorial",
    "This tutorial is intended to introduce you to the CodeIgniter framework and the basic principles of MVC architecture."
);