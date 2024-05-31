

CREATE TABLE Users (
    id VARCHAR(36) NOT NULL PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    login VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    userRole VARCHAR(30),
    pass VARCHAR(255),
    inactive BOOLEAN DEFAULT FALSE,
    lastlogin timestamp NULL DEFAULT NULL,
    description VARCHAR(150) NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

CREATE TABLE Events (
    id VARCHAR(36) NOT NULL PRIMARY KEY,
    targetDate date NOT NULL,
    title VARCHAR(50) NOT NULL,
    subtitle VARCHAR(50),
    description TEXT,
    eventUrl VARCHAR(300),
    eventOrganizer VARCHAR(50),
    eventLocation VARCHAR(40),
    inactive BOOLEAN DEFAULT FALSE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;


/* Event Specific */
CREATE TABLE Tasks (
    id VARCHAR(36) NOT NULL  PRIMARY KEY,
    eventId VARCHAR(36) NOT NULL,
    name VARCHAR(40) NOT NULL,
    description VARCHAR(150),
    daytime VARCHAR(20),
    volunteer VARCHAR(50),
    inactive BOOLEAN DEFAULT FALSE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

/* Allgemein */
CREATE TABLE FoodCategories (
    id VARCHAR(36) NOT NULL PRIMARY KEY,
    name VARCHAR(40) NOT NULL,
    inactive BOOLEAN DEFAULT FALSE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

/* Event Specific */
CREATE TABLE Food (
    id VARCHAR(36) NOT NULL PRIMARY KEY,
    categoryId VARCHAR(36) NOT NULL,
    eventId VARCHAR(36) NOT NULL,
    name VARCHAR(50) NOT NULL,
    note VARCHAR(60),
    volunteer VARCHAR(50),
    inactive BOOLEAN DEFAULT FALSE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

CREATE TABLE SystemConfiguration (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ckey VARCHAR(30) NOT NULL,
    cvalue VARCHAR(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;
