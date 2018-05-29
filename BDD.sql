CREATE DATABASE IF NOT EXISTS IndecieBis character set 'utf8';
USE IndecieBis;

CREATE TABLE IF NOT EXISTS Abonne(
	IDAbonne int UNSIGNED NOT NULL AUTO_INCREMENT,
	ADMIN tinyint(1) NOT NULL,
	Pseudo VARCHAR(25) NOT NULL,
	Password VARCHAR(40) NOT NULL,
	Nom VARCHAR(25) NOT NULL,
	Prenom VARCHAR(25) NOT NULL,
	DateNaissance Date NOT NULL,
	Email VARCHAR(100) NOT NULL,
	Sexe ENUM('F', 'M', 'A') NOT NULL,
	Pays VARCHAR(50),
	Avatar text,
	TempsEcoute TIME NOT NULL DEFAULT '00:00:00',
	CONSTRAINT pk_abonne PRIMARY KEY (IDAbonne),
	UNIQUE (Pseudo),
	UNIQUE (Email)
	) ENGINE=INNODB DEFAULT CHARSET=UTF8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS Auteur(
	IDAuteur int UNSIGNED NOT NULL AUTO_INCREMENT,
	Nom VARCHAR(100) NOT NULL,
	Pays VARCHAR(50),
	NombreEcoute int unsigned NOT NULL DEFAULT 0,
	CONSTRAINT pk_auteur primary key (IDAuteur),
	UNIQUE (Nom)
	) ENGINE=INNODB DEFAULT CHARSET=UTF8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS Album(
	IDAlbum int UNSIGNED NOT NULL AUTO_INCREMENT,
	IDAuteur int UNSIGNED NOT NULL,
	Nom VARCHAR(100) NOT NULL,
	Cover VARCHAR(255),
	Genre VARCHAR(50) NOT NULL,
	NombreEcoute int unsigned NOT NULL DEFAULT 0,
	CONSTRAINT pk_album primary key (IDAlbum)
	) ENGINE=INNODB DEFAULT CHARSET=UTF8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS Musique(
	IDMusique int UNSIGNED NOT NULL AUTO_INCREMENT,
	IDAlbum int UNSIGNED NOT NULL,
	Titre VARCHAR(255) NOT NULL,
	NombreEcoute int unsigned NOT NULL DEFAULT 0,
	LienAudio VARCHAR(255) NOT NULL,
	CONSTRAINT pk_musique primary key (IDMusique)
	) ENGINE=INNODB DEFAULT CHARSET=UTF8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS Playlist(
	IDPlaylist int UNSIGNED NOT NULL AUTO_INCREMENT,
	IDAbonne int UNSIGNED NOT NULL,
	NomPlaylist VARCHAR(255) NOT NULL,
	CONSTRAINT pk_playlist primary key (IDPlaylist)
	) ENGINE=INNODB DEFAULT CHARSET=UTF8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS LienPlaylistMusique(
	IDLien int UNSIGNED NOT NULL AUTO_INCREMENT,
	IDPlaylist int UNSIGNED NOT NULL,
	IDMusique int UNSIGNED NOT NULL,
	CONSTRAINT pk_lienplaylistmusique primary key (IDLien)
	) ENGINE=INNODB DEFAULT CHARSET=UTF8 AUTO_INCREMENT=1;

ALTER TABLE Musique ADD CONSTRAINT fk_musique_album
	FOREIGN KEY (IDAlbum) REFERENCES Album (IDAlbum);

ALTER TABLE Album ADD CONSTRAINT fk_album_auteur
	FOREIGN KEY (IDAuteur) REFERENCES Auteur (IDAuteur);

ALTER TABLE Playlist ADD CONSTRAINT fk_playlist_abonne
	FOREIGN KEY (IDAbonne) REFERENCES Abonne (IDAbonne);

ALTER TABLE LienPlaylistMusique ADD CONSTRAINT fk_lienplaylistmusique_musique
	FOREIGN KEY (IDMusique) REFERENCES Musique (IDMusique);

ALTER TABLE LienPlaylistMusique ADD CONSTRAINT fk_lienplaylistmusique_playlist
	FOREIGN KEY (IDPlaylist) REFERENCES Playlist (IDPlaylist);

INSERT INTO Abonne (ADMIN, Pseudo, Password, Nom, Prenom, DateNaissance, Email, Sexe, pays, Avatar) VALUES
	(0, 'Admin2.0', 'Retainers2', 'Wolfson', 'Reiner', '1993-10-10', 'reiner.wolfson@voltage.com', 'M','Nouvelle Zelande', 'https://vignette.wikia.nocookie.net/english-otome-games/images/7/73/Rw.jpg/revision/latest/scale-to-width-down/250?cb=20171130090950'),
	(1, 'SuperHuman', '1BetaGamma', 'Nova', 'Nova', '1993-02-18', 'nova.nova@voltage.com', 'F', NULL, 'https://vignette.wikia.nocookie.net/english-otome-games/images/6/67/7451c3f44f1751ccfa65887dea128bb41771cf33_hq.jpg/revision/latest/scale-to-width-down/250?cb=20171129132733'),
	(1, 'Demon', 'JDJersey666', 'Davies', 'Jordan', '1993-10-30', 'Jordan.davies@voltage.com', 'A', 'USA', 'https://vignette.wikia.nocookie.net/english-otome-games/images/b/be/Jordan_Davies.jpg/revision/latest/scale-to-width-down/250?cb=20171221232906'),
	(1, 'Werewolf', 'She-wolf3287', 'Hunt', 'Mackenzie', '1991-12-28', 'Mackenzie.hunt@voltage.com', 'F', 'USA', 'https://vignette.wikia.nocookie.net/english-otome-games/images/0/00/Mackenzie_Hunt.png/revision/latest/scale-to-width-down/250?cb=20171221232200'),
	(1, 'DemiGod', 'MyLucie33', 'Cyprin', 'Alex', '1995-05-21', 'Alex.cyprin@voltage.com', 'A', 'Angleterre', NULL),
	(1, 'Doc', 'Acido-Reduction88', 'Zhang', 'Serena', '1989-12-19', 'Serena.zhang@voltage.com', 'F', 'Madagascar', NULL),
	(1, 'Frozen', '4EverYours', 'Klein', 'Helena', '1988-01-27', 'Helena.klein@voltage.com', 'F', 'Nouvelle Zelande', 'https://vignette.wikia.nocookie.net/english-otome-games/images/3/31/Helena_Klein.jpg/revision/latest/scale-to-width-down/250?cb=20171221010358');


INSERT INTO Auteur (Nom, Pays) VALUES
	('Naheulband', 'France'),
	('Michael Jackson', 'USA'),
	('James Horner', 'USA'),
	('Linkin Park', 'USA');

INSERT INTO Album (IDAuteur, Nom, Cover, Genre) VALUES
	(1, 'Anthologie Numérique Naheulband, Vol.1', 'http://www.penofchaos.com/warham/visuel-web-mdt.jpg', 'Rolistichaotique'),
	(3, 'Titanic', 'http://www.le-titanic.fr/wp-content/uploads/2013/06/5651-01.jpg', 'film'),
	(3, 'Braveheart', NULL, 'film'),
	(4, 'Hybrid Theory', 'https://images-na.ssl-images-amazon.com/images/I/81iC%2BO0ec2L._SL1448_.jpg', 'rock'),
	(4, 'Meteora', 'https://img.discogs.com/MjJJEB8cRkjbLK688DUMVFMcPG4=/fit-in/600x600/filters:strip_icc():format(jpeg):mode_rgb():quality(90)/discogs-images/R-5239714-1388448279-7596.jpeg.jpg', 'rock');

INSERT INTO Musique (IDAlbum, Titre, LienAudio) VALUES
	(1, 'Crom', 'Crom-Anthologie_Numerique-Naheulband.mp3'),
	(1, 'Laridé Du Poulet', 'Laride_Du_Poulet-Anthologie_Numerique-Naheulband.mp3'),
	(1, 'Massacrons-nous dans la Taverne', 'Massacrons_Nous_Dans_La_Taverne-Anthologie_Numerique-Naheulband.mp3'),
	(1, 'Nanana de l\'Elfe', 'Nanana-Anthologie_Numerique-Naheulband.mp3'),
	(1, 'Tralala du Nain', 'Tralala-Anthologie_Numerique-Naheulband.mp3'),
	(2, 'Death of the Titanic', 'Death_Of_Titanic-Titanic-James_Horner.mp3'),
	(2, 'Hymn To The Sea', 'Hymn_To_The_Sea-Titanic-James_Horner.mp3'),
	(2, 'Leaving Port', 'Leaving_Port-Titanic-James_Horner.mp3'),
	(2, 'My Heart Will Go On', 'My_Heart_Will_Go_On-Titanic-James_Horner.mp3'),
	(3, 'Theme Braveheart', 'Theme-Braveheart-James_Horner.mp3'),
	(4, 'From the Inside', 'From_The_Inside-Hybrid_Theory-Linkin_Park.mp3'),
	(5, 'Breaking the Habit', 'Breaking_The_Habit-Meteora-Linkin_Park.mp3');

INSERT INTO Playlist (IDAbonne, NomPlaylist) VALUES
	(1, 'Toutes Les Musiques'),
	(4, 'Mac Titanic'),
	(3, 'DemonRock'),
	(7, 'HI'),
	(2, 'Films'),
	(2, 'Naheulbeuck');

INSERT INTO LienPlaylistMusique(IDPlaylist, IDMusique) VALUES
	(1, 1),
	(1, 2),
	(1, 3),
	(1, 4),
	(1, 5),
	(1, 6),
	(1, 7),
	(1, 8),
	(1, 9),
	(1, 10),
	(1, 11),
	(1, 12),
	(2, 6),
	(2, 7),
	(2, 8),
	(2, 9),
	(3, 11),
	(3, 12),
	(4, 8),
	(4, 3),
	(4, 6),
	(5, 6),
	(5, 7),
	(5, 8),
	(5, 9),
	(5, 10),
	(6, 1),
	(6, 2),
	(6, 3),
	(6, 4),
	(6, 5);

SELECT p.NomPlaylist, m.Titre FROM Abonne a, Playlist p, Musique m, LienPlaylistMusique l 
	WHERE a.Prenom="Nova" AND a.IDAbonne=p.IDAbonne AND p.IDPlaylist=l.IDPlaylist AND l.IDMusique=m.IDMusique;


SELECT al.cover AS Cover, au.Nom AS Auteur, m.Titre AS Titre, m.LienAudio AS Audio
	FROM Musique m, Auteur au, Album al 
	WHERE m.IDAlbum=al.IDAlbum AND al.IDAuteur=au.IDAuteur 
	ORDER BY m.NombreEcoute DESC;

SELECT al.cover AS Cover, au.Nom AS Auteur, m.Titre AS Titre, m.LienAudio AS Audio
	FROM Musique m, Auteur au, Album al 
	WHERE m.IDAlbum=al.IDAlbum AND al.IDAuteur=au.IDAuteur AND au.pays='France'
	ORDER BY m.NombreEcoute DESC;

SELECT p.Nom AS NomPlaylist, m.Titre AS Titre, m.LienAudio AS Audio, au.Nom AS Auteur, al.Nom AS Album, al.cover AS Cover
	FROM Musique m, Auteur au, Album al, Playlist p, Abonne a, LienPlaylistMusique l
	WHERE 