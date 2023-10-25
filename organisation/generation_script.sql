USE izoretr;

DROP TABLE IF EXISTS X_SavedUser;
DROP TABLE IF EXISTS X_UserTeam;
DROP TABLE IF EXISTS X_DriverCombo;
DROP TABLE IF EXISTS X_Driver;
DROP TABLE IF EXISTS X_Reaction;
DROP TABLE IF EXISTS X_BladeCombo;
DROP TABLE IF EXISTS X_Weapon;
DROP TABLE IF EXISTS X_UserBlade;
DROP TABLE IF EXISTS X_UserDriver;
DROP TABLE IF EXISTS X_Element;
DROP TABLE IF EXISTS X_Blade;

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
    CONSTRAINT fk_bladecombo_stages FOREIGN KEY (stage1, stage2, stage3) REFERENCES X_Element (name),
    CONSTRAINT pk_blade_combo PRIMARY KEY (stage1, stage2, stage3)
);


CREATE TABLE X_Blade
(
    name        VARCHAR(50) PRIMARY KEY,
    element     VARCHAR(50) NOT NULL,
    weaponClass VARCHAR(50) NOT NULL,
    CONSTRAINT fk_blade_element FOREIGN KEY (element) REFERENCES X_Element (name),
    CONSTRAINT fk_blade_weapon FOREIGN KEY (weaponClass) REFERENCES X_Weapon (name)
);

CREATE TABLE X_DriverCombo
(
    driver      VARCHAR(50),
    reaction    VARCHAR(50),
    weaponClass VARCHAR(50),
    CONSTRAINT fk_combi_driver FOREIGN KEY (driver) REFERENCES X_Driver (name),
    CONSTRAINT fk_combi_react FOREIGN KEY (reaction) REFERENCES X_Reaction (name),
    CONSTRAINT fk_combi_weapon FOREIGN KEY (weaponClass) REFERENCES X_Weapon (name),
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
    CONSTRAINT fk_team_user FOREIGN KEY (login) REFERENCES X_SavedUser (login),
    CONSTRAINT fk_team_drivers FOREIGN KEY (driver1, driver2, driver3) REFERENCES X_UserDriver (id)
);

CREATE TABLE X_UserBlade
(
    id           INT AUTO_INCREMENT PRIMARY KEY,
    loginUser    VARCHAR(50),
    bondedDriver INT         NOT NULL,
    bladeName    VARCHAR(50) NOT NULL,
    CONSTRAINT fk_ublade_user FOREIGN KEY (loginUser) REFERENCES X_SavedUser (login),
    CONSTRAINT fk_ublade_udriver FOREIGN KEY (bondedDriver) REFERENCES X_UserDriver (id),
    CONSTRAINT fk_ublade_rblade FOREIGN KEY (bladeName) REFERENCES X_Blade (name)
);

CREATE TABLE X_UserDriver
(
    id         INT AUTO_INCREMENT PRIMARY KEY,
    driverName VARCHAR(50) NOT NULL,
    blade1     INT         NOT NULL,
    blade2     INT,
    blade3     INT,
    CONSTRAINT fk_udriver_rdriver FOREIGN KEY (driverName) REFERENCES X_Driver (name),
    CONSTRAINT fk_udriver_ublades FOREIGN KEY (blade1, blade2, blade3) REFERENCES X_UserBlade (id)
);

CREATE TABLE X_SavedUser
(
    login VARCHAR(50) PRIMARY KEY
);
