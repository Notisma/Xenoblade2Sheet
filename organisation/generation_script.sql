CREATE TABLE X_Driver
(
    name VARCHAR(50) PRIMARY KEY
);

CREATE TABLE X_Reaction
(
    name VARCHAR(50) PRIMARY KEY
);

CREATE TABLE X_Weapon
(
    name VARCHAR(50) PRIMARY KEY
);

CREATE TABLE X_Element
(
    name VARCHAR(50) PRIMARY KEY
);

CREATE TABLE X_BladeCombo
(
    stage1 VARCHAR(50) NOT NULL,
    stage2 VARCHAR(50) NOT NULL,
    stage3 VARCHAR(50) NOT NULL,
    FOREIGN KEY (stage1) REFERENCES X_Element (name),
    FOREIGN KEY (stage2) REFERENCES X_Element (name),
    FOREIGN KEY (stage3) REFERENCES X_Element (name),
    CONSTRAINT pk_blade_combo PRIMARY KEY (stage1, stage2, stage3)
);


CREATE TABLE X_Blade
(
    name        VARCHAR(50) PRIMARY KEY,
    element     VARCHAR(50) NOT NULL,
    weaponClass VARCHAR(50) NOT NULL,
    FOREIGN KEY (element) REFERENCES X_Element (name),
    FOREIGN KEY (weaponClass) REFERENCES X_Weapon (name)
);

CREATE TABLE X_DriverCombo
(
    driver      VARCHAR(50),
    reaction    VARCHAR(50),
    weaponClass VARCHAR(50),
    FOREIGN KEY (driver) REFERENCES X_Driver (name),
    FOREIGN KEY (reaction) REFERENCES X_Reaction (name),
    FOREIGN KEY (weaponClass) REFERENCES X_Weapon (name),
    CONSTRAINT pk_driver_combo PRIMARY KEY (driver, reaction, weaponClass)
);

CREATE TABLE X_UserTeam
(
    idTeam  INT AUTO_INCREMENT PRIMARY KEY,
    label   VARCHAR(50),
    login   VARCHAR(50) NOT NULL,
    driver1 INT         NOT NULL,
    driver2 INT,
    driver3 INT,
    FOREIGN KEY (login) REFERENCES X_SavedUser (login),
    FOREIGN KEY (driver1, driver2, driver3) REFERENCES X_UserDriver (id),
);

CREATE TABLE X_UserBlade
(
    id           INT AUTO_INCREMENT PRIMARY KEY,
    loginUser    VARCHAR(50),
    bondedDriver INT         NOT NULL,
    bladeName    VARCHAR(50) NOT NULL,
    FOREIGN KEY (loginUser) REFERENCES X_SavedUser (login),
    FOREIGN KEY (bondedDriver) REFERENCES X_UserDriver (id),
    FOREIGN KEY (bladeName) REFERENCES X_Blade (name)
);

CREATE TABLE X_UserDriver
(
    id         INT AUTO_INCREMENT PRIMARY KEY,
    driverName VARCHAR(50) NOT NULL,
    blade1     INT         NOT NULL,
    blade2     INT,
    blade3     INT,
    FOREIGN KEY (driverName) REFERENCES X_Driver (name),
    FOREIGN KEY (blade1, blade2, blade3) REFERENCES X_UserBlade (id)
);

CREATE TABLE X_SavedUser
(
    login VARCHAR(50) PRIMARY KEY
);
