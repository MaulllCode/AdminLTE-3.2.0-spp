[
PROCEDURE

DELIMITER $$

CREATE PROCEDURE getSPP()
BEGIN
  SELECT id_spp, tahun, nominal FROM spp;
END$$

DELIMITER ;

CALL getSPP()
]


[
PROCEDURE dengan parameter

DELIMITER $$

DELIMITER $$

CREATE PROCEDURE getPetugas
(
	level VARCHAR(100)
)
BEGIN
    SELECT *
    FROM petugas
    WHERE level = level;
END$$

DELIMITER ;

CALL getPetugas("petugas")
]


[
PROCEDURE dengan DML

DELIMITER $$

CREATE PROCEDURE insertKelas
(
	nama_kelas VARCHAR(100),
	kompetensi_keahlian VARCHAR(100)
)
BEGIN
    INSERT INTO kelas
    VALUES (NULL, nama_kelas, kompetensi_keahlian);

END$$

DELIMITER ;

CALL insertKelas("petugas", "petugas")
]


[
TRIGGER

DELIMITER $$
CREATE TRIGGER update_kelas
    BEFORE UPDATE
    ON kelas
    FOR EACH ROW
BEGIN
    INSERT INTO log_kelas
    set id_kelas = OLD.id_kelas,
    nama_kelas_lama=old.nama_kelas,
    nama_kelas_baru=new.nama_kelas;
END$$
DELIMITER ;

]


[
COMMIT

START TRANSACTION;
INSERT INTO spp VALUES (NULL, 'tes', 2000);
COMMIT;
SELECT * FROM spp;
]

[
ROLLBACK

START TRANSACTION;
INSERT INTO spp VALUES (NULL, 'tes', 2000);
COMMIT;
SELECT * FROM spp;
ROLLBACK;
SELECT * FROM spp;
]
