-- INSERT
INSERT INTO `page`(`slug`, `nav_title`, `H1`, `paragraphe`, `img`, `alt`) VALUES ('slug', 'nav_title', 'H1', 'paragraphe', 'img', 'alt');

-- UPDATE
UPDATE `page` SET `slug`="toto",`nav_title`="toto",`H1`="toto",`paragraphe`="<p>toto</p>" WHERE `id` = 1;

-- SELECT (LISTE)
SELECT `id`, `slug`, `nav_title`, `H1`, `paragraphe`, `img`, `alt` FROM `page`;

-- SELECT (UN SEUL)
SELECT `id`, `slug`, `nav_title`, `H1`, `paragraphe`, `img`, `alt` FROM `page` WHERE `id` = 1;

-- DELETE (DONT YOU WANNA DELETE DELETE)
DELETE FROM `page` WHERE `id` = 1;

-- + ajouter 2 pages dans la table
