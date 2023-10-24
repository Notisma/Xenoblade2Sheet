CREATE TABLE Driver
(
    name VARCHAR(50),
    PRIMARY KEY (name)
);

CREATE TABLE Reaction
(
    name VARCHAR(50),
    PRIMARY KEY (name)
);

CREATE TABLE Weapon
(
    name VARCHAR(50),
    PRIMARY KEY (name)
);

CREATE TABLE Element
(
    name VARCHAR(50),
    PRIMARY KEY (name)
);

CREATE TABLE BladeCombo
(
    id     INT,
    name   VARCHAR(50) NOT NULL,
    name_1 VARCHAR(50) NOT NULL,
    name_2 VARCHAR(50) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (name) REFERENCES Element (name),
    FOREIGN KEY (name_1) REFERENCES Element (name),
    FOREIGN KEY (name_2) REFERENCES Element (name)
);

CREATE TABLE UserDriver
(
    id   INT AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (name) REFERENCES Driver (name)
);

CREATE TABLE SavedUser
(
    login VARCHAR(50),
    PRIMARY KEY (login)
);

CREATE TABLE Blade
(
    name   VARCHAR(50),
    name_1 VARCHAR(50) NOT NULL,
    name_2 VARCHAR(50) NOT NULL,
    PRIMARY KEY (name),
    FOREIGN KEY (name_1) REFERENCES Element (name),
    FOREIGN KEY (name_2) REFERENCES Weapon (name)
);

CREATE TABLE UserTeam
(
    idTeam INT AUTO_INCREMENT,
    label  VARCHAR(50),
    login  VARCHAR(50) NOT NULL,
    PRIMARY KEY (idTeam),
    FOREIGN KEY (login) REFERENCES SavedUser (login)
);

CREATE TABLE UserBlade
(
    id   INT AUTO_INCREMENT,
    id_1 INT         NOT NULL,
    name VARCHAR(50) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (id_1) REFERENCES UserDriver (id),
    FOREIGN KEY (name) REFERENCES Blade (name)
);

CREATE TABLE DriverCombo
(
    name   VARCHAR(50),
    name_1 VARCHAR(50),
    name_2 VARCHAR(50),
    PRIMARY KEY (name, name_1, name_2),
    FOREIGN KEY (name) REFERENCES Driver (name),
    FOREIGN KEY (name_1) REFERENCES Reaction (name),
    FOREIGN KEY (name_2) REFERENCES Weapon (name)
);

CREATE TABLE Contains
(
    idTeam INT,
    id     INT,
    PRIMARY KEY (idTeam, id),
    FOREIGN KEY (idTeam) REFERENCES UserTeam (idTeam),
    FOREIGN KEY (id) REFERENCES UserDriver (id)
);
