CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nav_title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `H1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paragraphe` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `page`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nav_title` (`nav_title`);

ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
  
