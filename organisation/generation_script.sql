SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

SET foreign_key_checks = 0;
DROP TABLE IF EXISTS `X_Blade`, `X_BladeCombo`, `X_Driver`, `X_DriverCombo`, `X_Element`, `X_Reaction`, `X_SavedUser`, `X_UserBlade`, `X_UserDriver`, `X_UserTeam`, `X_Weapon`;
SET foreign_key_checks = 1;

CREATE TABLE `X_Blade`
(
    `name`        varchar(50) COLLATE utf8_bin NOT NULL,
    `element`     varchar(50) COLLATE utf8_bin NOT NULL,
    `weaponClass` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_bin;

CREATE TABLE `X_BladeCombo`
(
    `stage1` varchar(50) COLLATE utf8_bin NOT NULL,
    `stage2` varchar(50) COLLATE utf8_bin NOT NULL,
    `stage3` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_bin;

INSERT INTO `X_BladeCombo` (`stage1`, `stage2`, `stage3`)
VALUES ('Dark', 'Dark', 'Dark'),
       ('Dark', 'Dark', 'Earth'),
       ('Dark', 'Light', 'Electric'),
       ('Earth', 'Earth', 'Electric'),
       ('Earth', 'Fire', 'Earth'),
       ('Earth', 'Fire', 'Wind'),
       ('Electric', 'Electric', 'Water'),
       ('Electric', 'Fire', 'Ice'),
       ('Electric', 'Fire', 'Wind'),
       ('Fire', 'Fire', 'Fire'),
       ('Fire', 'Fire', 'Light'),
       ('Fire', 'Water', 'Fire'),
       ('Fire', 'Water', 'Ice'),
       ('Ice', 'Ice', 'Dark'),
       ('Ice', 'Ice', 'Earth'),
       ('Ice', 'Water', 'Wind'),
       ('Light', 'Electric', 'Fire'),
       ('Light', 'Light', 'Light'),
       ('Light', 'Light', 'Water'),
       ('Water', 'Earth', 'Wind'),
       ('Water', 'Water', 'Dark'),
       ('Water', 'Water', 'Water'),
       ('Wind', 'Ice', 'Ice'),
       ('Wind', 'Wind', 'Earth'),
       ('Wind', 'Wind', 'Electric');

CREATE TABLE `X_Driver`
(
    `name` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_bin;

INSERT INTO `X_Driver` (`name`)
VALUES ('Mòrag'),
       ('Nia'),
       ('Rex'),
       ('Tora'),
       ('Zeke');

CREATE TABLE `X_DriverCombo`
(
    `driver`      varchar(50) COLLATE utf8_bin NOT NULL,
    `reaction`    varchar(50) COLLATE utf8_bin NOT NULL,
    `weaponClass` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_bin;

INSERT INTO `X_DriverCombo` (`driver`, `reaction`, `weaponClass`)
VALUES ('Mòrag', 'Break', 'Ether Cannon'),
       ('Mòrag', 'Break', 'Knuckle Claws'),
       ('Mòrag', 'Break', 'Whipswords'),
       ('Mòrag', 'Smash', 'Chroma Katana'),
       ('Mòrag', 'Smash', 'Megalance'),
       ('Mòrag', 'Topple', 'Shield Hammer'),
       ('Nia', 'Break', 'Bitball'),
       ('Nia', 'Break', 'Ether Cannon'),
       ('Nia', 'Break', 'Twin Rings'),
       ('Nia', 'Launch', 'Knuckle Claws'),
       ('Nia', 'Topple', 'Greataxe'),
       ('Rex', 'Break', 'Chroma Katana'),
       ('Rex', 'Break', 'Megalance'),
       ('Rex', 'Launch', 'Big Bang Edge'),
       ('Rex', 'Launch', 'Greataxe'),
       ('Rex', 'Smash', 'Dual Scythes'),
       ('Rex', 'Topple', 'Aegis Sword'),
       ('Tora', 'Break', 'Variable Saber'),
       ('Tora', 'Launch', 'Variable Saber'),
       ('Tora', 'Smash', 'Mech Arms'),
       ('Tora', 'Topple', 'Drill Shield'),
       ('Zeke', 'Break', 'Ether Cannon'),
       ('Zeke', 'Launch', 'Big Bang Edge'),
       ('Zeke', 'Launch', 'Shield Hammer'),
       ('Zeke', 'Smash', 'Megalance'),
       ('Zeke', 'Topple', 'Greataxe'),
       ('Zeke', 'Topple', 'Knuckle Claws');


CREATE TABLE `X_Element`
(
    `name` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_bin;

INSERT INTO `X_Element` (`name`)
VALUES ('Dark'),
       ('Earth'),
       ('Electric'),
       ('Fire'),
       ('Ice'),
       ('Light'),
       ('Water'),
       ('Wind');


CREATE TABLE `X_Reaction`
(
    `name` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_bin;

INSERT INTO `X_Reaction` (`name`)
VALUES ('Break'),
       ('Launch'),
       ('Smash'),
       ('Topple');


CREATE TABLE `X_SavedUser`
(
    `login` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_bin;


CREATE TABLE `X_UserBlade`
(
    `id`           int(11)                      NOT NULL,
    `loginUser`    varchar(50) COLLATE utf8_bin DEFAULT NULL,
    `bondedDriver` varchar(50) COLLATE utf8_bin DEFAULT NULL,
    `bladeName`    varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_bin;


CREATE TABLE `X_UserDriver`
(
    `id`         int(11)                      NOT NULL,
    `driverName` varchar(50) COLLATE utf8_bin NOT NULL,
    `blade1`     int(11)                      NOT NULL,
    `blade2`     int(11) DEFAULT NULL,
    `blade3`     int(11) DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_bin;


CREATE TABLE `X_UserTeam`
(
    `idTeam`  int(11)                      NOT NULL,
    `label`   varchar(50) COLLATE utf8_bin DEFAULT NULL,
    `login`   varchar(50) COLLATE utf8_bin NOT NULL,
    `driver1` int(11)                      NOT NULL,
    `driver2` int(11)                      DEFAULT NULL,
    `driver3` int(11)                      DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_bin;


CREATE TABLE `X_Weapon`
(
    `name` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_bin;

INSERT INTO `X_Weapon` (`name`)
VALUES ('Aegis Sword'),
       ('Big Bang Edge'),
       ('Bitball'),
       ('Catalyst Scimitar'),
       ('Chroma Katana'),
       ('Drill Shield'),
       ('Dual Scythes'),
       ('Ether Cannon'),
       ('Greataxe'),
       ('Knuckle Claws'),
       ('Mech Arms'),
       ('Megalance'),
       ('Shield Hammer'),
       ('Twin Rings'),
       ('Variable Saber'),
       ('Whipswords');


ALTER TABLE `X_Blade`
    ADD PRIMARY KEY (`name`),
    ADD KEY `fk_blade_element` (`element`),
    ADD KEY `fk_blade_weapon` (`weaponClass`);

ALTER TABLE `X_BladeCombo`
    ADD PRIMARY KEY (`stage1`, `stage2`, `stage3`),
    ADD KEY `fk_bladecombo_stage2` (`stage2`),
    ADD KEY `fk_bladecombo_stage3` (`stage3`);

ALTER TABLE `X_Driver`
    ADD PRIMARY KEY (`name`);

ALTER TABLE `X_DriverCombo`
    ADD PRIMARY KEY (`driver`, `reaction`, `weaponClass`),
    ADD KEY `fk_combi_react` (`reaction`),
    ADD KEY `fk_combi_weapon` (`weaponClass`);

ALTER TABLE `X_Element`
    ADD PRIMARY KEY (`name`);

ALTER TABLE `X_Reaction`
    ADD PRIMARY KEY (`name`);

ALTER TABLE `X_SavedUser`
    ADD PRIMARY KEY (`login`);

ALTER TABLE `X_UserBlade`
    ADD PRIMARY KEY (`id`),
    ADD KEY `fk_ublade_user` (`loginUser`),
    ADD KEY `fk_ublade_rblade` (`bladeName`),
    ADD KEY `fk_ublade_driver` (`bondedDriver`);

ALTER TABLE `X_UserDriver`
    ADD PRIMARY KEY (`id`),
    ADD KEY `fk_udriver_rdriver` (`driverName`),
    ADD KEY `fk_udriver_ublade1` (`blade1`),
    ADD KEY `fk_udriver_ublade2` (`blade2`),
    ADD KEY `fk_udriver_ublade3` (`blade3`);

ALTER TABLE `X_UserTeam`
    ADD PRIMARY KEY (`idTeam`),
    ADD KEY `fk_team_user` (`login`),
    ADD KEY `fk_team_driver1` (`driver1`),
    ADD KEY `fk_team_driver2` (`driver2`),
    ADD KEY `fk_team_driver3` (`driver3`);

ALTER TABLE `X_Weapon`
    ADD PRIMARY KEY (`name`);

ALTER TABLE `X_UserBlade`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `X_UserDriver`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `X_UserTeam`
    MODIFY `idTeam` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `X_Blade`
    ADD CONSTRAINT `fk_blade_element` FOREIGN KEY (`element`) REFERENCES `X_Element` (`name`),
    ADD CONSTRAINT `fk_blade_weapon` FOREIGN KEY (`weaponClass`) REFERENCES `X_Weapon` (`name`);

ALTER TABLE `X_BladeCombo`
    ADD CONSTRAINT `fk_bladecombo_stage1` FOREIGN KEY (`stage1`) REFERENCES `X_Element` (`name`),
    ADD CONSTRAINT `fk_bladecombo_stage2` FOREIGN KEY (`stage2`) REFERENCES `X_Element` (`name`),
    ADD CONSTRAINT `fk_bladecombo_stage3` FOREIGN KEY (`stage3`) REFERENCES `X_Element` (`name`);

ALTER TABLE `X_DriverCombo`
    ADD CONSTRAINT `fk_combi_driver` FOREIGN KEY (`driver`) REFERENCES `X_Driver` (`name`),
    ADD CONSTRAINT `fk_combi_react` FOREIGN KEY (`reaction`) REFERENCES `X_Reaction` (`name`),
    ADD CONSTRAINT `fk_combi_weapon` FOREIGN KEY (`weaponClass`) REFERENCES `X_Weapon` (`name`);

ALTER TABLE `X_UserBlade`
    ADD CONSTRAINT `fk_ublade_driver` FOREIGN KEY (`bondedDriver`) REFERENCES `X_Driver` (`name`),
    ADD CONSTRAINT `fk_ublade_rblade` FOREIGN KEY (`bladeName`) REFERENCES `X_Blade` (`name`),
    ADD CONSTRAINT `fk_ublade_user` FOREIGN KEY (`loginUser`) REFERENCES `X_SavedUser` (`login`);

ALTER TABLE `X_UserDriver`
    ADD CONSTRAINT `fk_udriver_rdriver` FOREIGN KEY (`driverName`) REFERENCES `X_Driver` (`name`),
    ADD CONSTRAINT `fk_udriver_ublade1` FOREIGN KEY (`blade1`) REFERENCES `X_UserBlade` (`id`),
    ADD CONSTRAINT `fk_udriver_ublade2` FOREIGN KEY (`blade2`) REFERENCES `X_UserBlade` (`id`),
    ADD CONSTRAINT `fk_udriver_ublade3` FOREIGN KEY (`blade3`) REFERENCES `X_UserBlade` (`id`);

ALTER TABLE `X_UserTeam`
    ADD CONSTRAINT `fk_team_driver1` FOREIGN KEY (`driver1`) REFERENCES `X_UserDriver` (`id`),
    ADD CONSTRAINT `fk_team_driver2` FOREIGN KEY (`driver2`) REFERENCES `X_UserDriver` (`id`),
    ADD CONSTRAINT `fk_team_driver3` FOREIGN KEY (`driver3`) REFERENCES `X_UserDriver` (`id`),
    ADD CONSTRAINT `fk_team_user` FOREIGN KEY (`login`) REFERENCES `X_SavedUser` (`login`);


COMMIT;
