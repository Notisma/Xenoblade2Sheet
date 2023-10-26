USE izoretr;

DROP TABLE IF EXISTS X_UserTeam;
DROP TABLE IF EXISTS X_DriverCombo;
DROP TABLE IF EXISTS X_Reaction;
DROP TABLE IF EXISTS X_BladeCombo;
ALTER TABLE X_UserBlade
    DROP CONSTRAINT fk_ublade_udriver;
DROP TABLE IF EXISTS X_UserDriver;
DROP TABLE IF EXISTS X_UserBlade;
DROP TABLE IF EXISTS X_SavedUser;
DROP TABLE IF EXISTS X_Driver;
DROP TABLE IF EXISTS X_Blade;
DROP TABLE IF EXISTS X_Element;
DROP TABLE IF EXISTS X_Weapon;

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
    CONSTRAINT fk_bladecombo_stage1 FOREIGN KEY (stage1) REFERENCES X_Element (name),
    CONSTRAINT fk_bladecombo_stage2 FOREIGN KEY (stage2) REFERENCES X_Element (name),
    CONSTRAINT fk_bladecombo_stage3 FOREIGN KEY (stage3) REFERENCES X_Element (name),
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

CREATE TABLE X_SavedUser
(
    login VARCHAR(50) PRIMARY KEY
);
CREATE TABLE X_UserBlade
(
    id           INT AUTO_INCREMENT PRIMARY KEY,
    loginUser    VARCHAR(50),
    bondedDriver INT         NOT NULL,
    bladeName    VARCHAR(50) NOT NULL,
    CONSTRAINT fk_ublade_user FOREIGN KEY (loginUser) REFERENCES X_SavedUser (login),
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
    CONSTRAINT fk_udriver_ublade1 FOREIGN KEY (blade1) REFERENCES X_UserBlade (id),
    CONSTRAINT fk_udriver_ublade2 FOREIGN KEY (blade2) REFERENCES X_UserBlade (id),
    CONSTRAINT fk_udriver_ublade3 FOREIGN KEY (blade3) REFERENCES X_UserBlade (id)
);
ALTER TABLE X_UserBlade
    ADD CONSTRAINT fk_ublade_udriver FOREIGN KEY (bondedDriver) REFERENCES X_UserDriver (id);

CREATE TABLE X_UserTeam
(
    idTeam  INT AUTO_INCREMENT PRIMARY KEY,
    label   VARCHAR(50),
    login   VARCHAR(50) NOT NULL,
    driver1 INT         NOT NULL,
    driver2 INT,
    driver3 INT,
    CONSTRAINT fk_team_user FOREIGN KEY (login) REFERENCES X_SavedUser (login),
    CONSTRAINT fk_team_driver1 FOREIGN KEY (driver1) REFERENCES X_UserDriver (id),
    CONSTRAINT fk_team_driver2 FOREIGN KEY (driver2) REFERENCES X_UserDriver (id),
    CONSTRAINT fk_team_driver3 FOREIGN KEY (driver3) REFERENCES X_UserDriver (id)
);

INSERT INTO X_Driver (name)
VALUES ('Rex'),
       ('Nia'),
       ('Tora'),
       ('Mòrag'),
       ('Zeke');
INSERT INTO X_Reaction (name)
VALUES ('Break'),
       ('Topple'),
       ('Launch'),
       ('Smash');
INSERT INTO X_Weapon (name)
VALUES ('Greataxe'),
       ('Megalance'),
       ('Ether Cannon'),
       ('Shield Hammer'),
       ('Chroma Katana'),
       ('Bitball'),
       ('Knuckle Claws'),
       ('Aegis Sword'),
       ('Catalyst Scimitar'),
       ('Twin Rings'),
       ('Whipswords'),
       ('Big Bang Edge'),
       ('Dual Scythes'),
       ('Drill Shield'),
       ('Mech Arms'),
       ('Variable Saber');
INSERT INTO X_Element (name)
VALUES ('Fire'),
       ('Water'),
       ('Wind'),
       ('Ice'),
       ('Earth'),
       ('Electric'),
       ('Dark'),
       ('Light');
INSERT INTO X_BladeCombo (stage1, stage2, stage3)
VALUES ('Fire', 'Fire', 'Fire'),
       ('Fire', 'Fire', 'Light'),
       ('Fire', 'Water', 'Fire'),
       ('Fire', 'Water', 'Ice'),
       ('Ice', 'Water', 'Wind'),
       ('Ice', 'Ice', 'Earth'),
       ('Ice', 'Ice', 'Dark'),
       ('Earth', 'Fire', 'Wind'),
       ('Earth', 'Fire', 'Earth'),
       ('Earth', 'Earth', 'Electric'),
       ('Wind', 'Wind', 'Earth'),
       ('Wind', 'Wind', 'Electric'),
       ('Wind', 'Ice', 'Ice'),
       ('Water', 'Water', 'Water'),
       ('Water', 'Water', 'Dark'),
       ('Water', 'Earth', 'Wind'),
       ('Electric', 'Fire', 'Wind'),
       ('Electric', 'Fire', 'Ice'),
       ('Electric', 'Electric', 'Water'),
       ('Light', 'Electric', 'Fire'),
       ('Light', 'Light', 'Water'),
       ('Light', 'Light', 'Light'),
       ('Dark', 'Light', 'Electric'),
       ('Dark', 'Dark', 'Dark'),
       ('Dark', 'Dark', 'Earth');
INSERT INTO X_DriverCombo (driver, weaponClass, reaction)
VALUES ('Rex', 'Megalance', 'Break'),
       ('Rex', 'Chroma Katana', 'Break'),
       ('Rex', 'Aegis Sword', 'Topple'),
       ('Rex', 'Greataxe', 'Launch'),
       ('Rex', 'Big Bang Edge', 'Launch'),
       ('Rex', 'Dual Scythes', 'Smash'),
       ('Nia', 'Twin Rings', 'Break'),
       ('Nia', 'Ether Cannon', 'Break'),
       ('Nia', 'Bitball', 'Break'),
       ('Nia', 'Greataxe', 'Topple'),
       ('Nia', 'Knuckle Claws', 'Launch'),
       ('Tora', 'Variable Saber', 'Break'),
       ('Tora', 'Drill Shield', 'Topple'),
       ('Tora', 'Variable Saber', 'Launch'),
       ('Tora', 'Mech Arms', 'Smash'),
       ('Morag', 'Whipswords', 'Break'),
       ('Morag', 'Ether Cannon', 'Break'),
       ('Morag', 'Knuckle Claws', 'Break'),
       ('Morag', 'Shield Hammer', 'Topple'),
       ('Morag', 'Chroma Katana', 'Smash'),
       ('Morag', 'Megalance', 'Smash'),
       ('Zeke', 'Ether Cannon', 'Break'),
       ('Zeke', 'Knuckle Claws', 'Topple'),
       ('Zeke', 'Greataxe', 'Topple'),
       ('Zeke', 'Shield Hammer', 'Launch'),
       ('Zeke', 'Big Bang Edge', 'Launch'),
       ('Zeke', 'Megalance', 'Smash');
INSERT INTO X_Blade (name, element, weaponClass)
VALUES ('Pyra', 'Fire', 'Aegis Sword'),
       ('Corvin', 'Light', 'Chroma Katana'),
       ('Fiora', 'Wind', 'Twin Rings');