BEGIN TRANSACTION;
CREATE TABLE IF NOT EXISTS "migrations" (
	"id"	integer NOT NULL,
	"migration"	varchar NOT NULL,
	"batch"	integer NOT NULL,
	PRIMARY KEY("id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "users" (
	"id"	integer NOT NULL,
	"name"	varchar NOT NULL,
	"email"	varchar NOT NULL,
	"email_verified_at"	datetime,
	"password"	varchar NOT NULL,
	"remember_token"	varchar,
	"created_at"	datetime,
	"updated_at"	datetime,
	PRIMARY KEY("id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "password_resets" (
	"email"	varchar NOT NULL,
	"token"	varchar NOT NULL,
	"created_at"	datetime
);
CREATE TABLE IF NOT EXISTS "failed_jobs" (
	"id"	integer NOT NULL,
	"connection"	text NOT NULL,
	"queue"	text NOT NULL,
	"payload"	text NOT NULL,
	"exception"	text NOT NULL,
	"failed_at"	datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY("id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "barangs" (
	"id"	integer NOT NULL,
	"nama"	varchar NOT NULL,
	"keterangan"	varchar NOT NULL,
	"kategori_id"	integer NOT NULL,
	"created_at"	datetime,
	"updated_at"	datetime,
	PRIMARY KEY("id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "kategori_barangs" (
	"id"	integer NOT NULL,
	"nama"	varchar NOT NULL,
	"created_at"	datetime,
	"updated_at"	datetime,
	PRIMARY KEY("id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "jenis_persediaans" (
	"id"	integer NOT NULL,
	"nama"	varchar NOT NULL,
	"created_at"	datetime,
	"updated_at"	datetime,
	PRIMARY KEY("id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "pembukuans" (
	"id"	integer NOT NULL,
	"no_dokumen"	integer NOT NULL,
	"no_bukti"	integer NOT NULL,
	"tgl_pembukuan"	date NOT NULL,
	"tgl_dokumen"	date NOT NULL,
	"created_at"	datetime,
	"updated_at"	datetime,
	PRIMARY KEY("id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "persediaans" (
	"id"	integer NOT NULL,
	"barang_id"	integer NOT NULL,
	"jumlah"	integer NOT NULL,
	"harga_satuan"	integer NOT NULL,
	"pembukuan_id"	integer NOT NULL,
	"jenis_persediaan_id"	integer NOT NULL,
	"total"	integer NOT NULL,
	"keterangan"	TEXT,
	"created_at"	datetime,
	"updated_at"	datetime,
	PRIMARY KEY("id" AUTOINCREMENT)
);
INSERT INTO "migrations" VALUES (1,'2014_10_12_000000_create_users_table',1);
INSERT INTO "migrations" VALUES (2,'2014_10_12_100000_create_password_resets_table',1);
INSERT INTO "migrations" VALUES (3,'2019_08_19_000000_create_failed_jobs_table',1);
INSERT INTO "migrations" VALUES (4,'2019_11_18_064633_create_barangs_table',1);
INSERT INTO "migrations" VALUES (5,'2020_11_19_081117_create_kategori_barangs_table',1);
INSERT INTO "migrations" VALUES (6,'2020_11_19_081221_create_jenis_persediaans_table',1);
INSERT INTO "migrations" VALUES (7,'2020_11_19_081312_create_pembukuans_table',1);
INSERT INTO "migrations" VALUES (8,'2020_11_19_081418_create_persediaans_table',1);
INSERT INTO "barangs" VALUES (1,'Pulpen','box',1,'2020-11-20 12:25:48','2020-11-20 12:25:48');
INSERT INTO "barangs" VALUES (2,'Nasi Box','box',3,'2020-11-20 12:26:01','2020-11-20 12:26:01');
INSERT INTO "barangs" VALUES (3,'HVS Merah','rim',2,'2020-11-20 12:26:13','2020-11-20 12:26:13');
INSERT INTO "barangs" VALUES (4,'HVS Putih','rim',2,'2020-11-20 12:26:19','2020-11-20 12:26:19');
INSERT INTO "kategori_barangs" VALUES (1,'Alat Tulis Menulis','2020-11-20 12:24:51','2020-11-20 12:24:51');
INSERT INTO "kategori_barangs" VALUES (2,'Kertas HVS','2020-11-20 12:24:57','2020-11-20 12:24:57');
INSERT INTO "kategori_barangs" VALUES (3,'Bahan Habis Pakai','2020-11-20 12:25:09','2020-11-20 12:25:09');
INSERT INTO "jenis_persediaans" VALUES (1,'Persediaan Masuk - Saldo Awal','2020-11-20 12:25:18','2020-11-20 12:25:18');
INSERT INTO "jenis_persediaans" VALUES (2,'Persediaan Masuk - Pembelian','2020-11-20 12:25:25','2020-11-20 12:25:25');
INSERT INTO "jenis_persediaans" VALUES (3,'Persediaan Masuk - Transfer Masuk','2020-11-20 12:25:30','2020-11-20 12:25:30');
INSERT INTO "jenis_persediaans" VALUES (4,'Persediaan Keluar - Transfer Keluar','2020-11-20 12:25:35','2020-11-20 12:25:35');
INSERT INTO "pembukuans" VALUES (1,10011,'001/BA/2010','2019-12-31','2020-01-02','2020-11-20 12:26:45','2020-11-20 12:26:45');
INSERT INTO "pembukuans" VALUES (2,10012,'002/BA/2010','2020-11-19','2020-11-26','2020-11-20 14:20:31','2020-11-20 14:20:31');
INSERT INTO "pembukuans" VALUES (3,1100101,'001/BA/2020','2020-11-01','2020-11-10','2020-11-21 16:57:08','2020-11-21 16:57:08');
INSERT INTO "persediaans" VALUES (1,1,10,20000,1,1,200000,NULL,'2020-11-20 12:27:02','2020-11-20 12:27:02');
INSERT INTO "persediaans" VALUES (2,2,200,10000,1,1,2000000,NULL,'2020-11-20 12:27:14','2020-11-20 12:27:14');
INSERT INTO "persediaans" VALUES (3,3,5,53200,1,1,266000,NULL,'2020-11-20 12:27:35','2020-11-20 12:27:35');
INSERT INTO "persediaans" VALUES (4,4,5,65200,1,1,326000,NULL,'2020-11-20 12:27:46','2020-11-20 12:27:46');
INSERT INTO "persediaans" VALUES (5,1,100,23000,2,2,2300000,NULL,'2020-11-20 14:20:59','2020-11-20 14:20:59');
INSERT INTO "persediaans" VALUES (6,2,125,12300,2,2,1537500,NULL,'2020-11-20 14:22:59','2020-11-20 14:22:59');
INSERT INTO "persediaans" VALUES (7,2,10,10000,3,4,100000,'Untuk ini','2020-11-21 16:57:42','2020-11-21 16:57:42');
CREATE UNIQUE INDEX IF NOT EXISTS "users_email_unique" ON "users" (
	"email"
);
CREATE INDEX IF NOT EXISTS "password_resets_email_index" ON "password_resets" (
	"email"
);
COMMIT;
