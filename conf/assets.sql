[
PROCEDURE

DELIMITER $$

CREATE PROCEDURE getMember()
BEGIN
  SELECT id_member, nama FROM tb_member;
END$$

DELIMITER ;

CALL getMember()
]


[
PROCEDURE dengan parameter

DELIMITER $$

CREATE PROCEDURE getPaket
(
	jenisPaket VARCHAR(100)
)
BEGIN
    SELECT *
    FROM tb_paket
    WHERE jenis = jenisPaket;
END$$

DELIMITER ;

CALL getPaket("kiloan")
]


[
PROCEDURE dengan DML

DELIMITER $$

CREATE PROCEDURE insertMember
(
	nama VARCHAR(100),
	alamat VARCHAR(100),
	jenis_kelamin VARCHAR(100),
	tlp INT(100)
)
BEGIN
    INSERT INTO tb_member
    VALUES (NULL, nama, alamat, jenis_kelamin, tlp);

END$$

DELIMITER ;
]


[
TRIGGER

DELIMITER $$
CREATE TRIGGER update_alamat_member
    BEFORE UPDATE
    ON tb_member
    FOR EACH ROW
BEGIN
    INSERT INTO log_member
    set id_member = OLD.id_member,
    alamat_lama=old.alamat,
    alamat_baru=new.alamat;
END$$
DELIMITER ;
]


[
COMMIT

START TRANSACTION;
INSERT INTO tb_member VALUES (NULL, 'tes', 'tes', 'L', 0);
COMMIT;
SELECT * FROM tb_member;
]

[
ROLLBACK

START TRANSACTION;
SELECT * FROM tb_member;
INSERT INTO tb_member VALUES (NULL, 'tes2', 'tes2', 'P', 0);
SELECT * FROM tb_member;
ROLLBACK;
SELECT * FROM tb_member;
]
