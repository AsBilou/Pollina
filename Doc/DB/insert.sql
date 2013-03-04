--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id`, `login`, `password`, `email`) VALUES
(1, 'root', 'root', 'contact@romainbellina.fr'),
(2, 'Array', '123456', 'bilou@pillona.fr'),
(3, 'Bilou', '12345', 'bilou@pillona.fr'),
(4, 'Thomas', '1234567890', 'thomas@pollina.fr'),
(10, 'test', '827ccb0eea8a706c4c34a16891f84e7b', 'test@test.test');

--
-- Contenu de la table `configuration`
--

INSERT INTO `configuration` (`key`, `value`) VALUES
('adress', 'ZI de Chasnais'),
('zip_code', '85407'),
('city', 'LuÃ§on Cedex'),
('phone', '0251280808'),
('fax', '0251977701'),
('facebook', 'https://www.facebook.com/legorafi'),
('twitter', 'https://twitter.com/le_gorafi'),
('gplus', 'https://plus.google.com/100292362665761057279'),
('rss', 'https://legorafi.wordpress.com/feed/'),
('carousel', 'image2.jpg,image3.jpg,image4.jpg'),
('description_fr', '<p>La maitrise compl&egrave;te de l''impression &agrave; la finition sur un m&ecirc;me site !</p>\r\n<p>Nous sommes l&agrave; pour r&eacute;pondre &agrave; toutes vos demandes et assurer vos produits en qualit&eacute; et d&eacute;lais.</p>'),
('description_en', '<p>The complete mastery of print finishing on one site!</p>\r\n<p>We''re here to answer all your questions and ensure your products quality and deadlines.</p>'),
('description_de', '<p>Die vollst&auml;ndige Beherrschung der Druckveredelung auf einer Website!</p>\r\n<p>Wir sind hier, um alle Ihre Fragen zu beantworten und sicherzustellen, dass Ihre Produkte Qualit&auml;t und Termintreue.</p>');

--
-- Contenu de la table `menu`
--

INSERT INTO `menu` (`id`, `name`, `parent`, `lang`) VALUES
(1, 'L''entreprise', NULL, 'fr'),
(2, 'Nos Métiers', NULL, 'fr'),
(3, 'Contact', NULL, 'fr'),
(4, 'Espace Client', NULL, 'fr'),
(5, 'The Company', NULL, 'en'),
(6, 'Our Business', NULL, 'en'),
(7, 'Contact', NULL, 'en'),
(8, 'Client Area', NULL, 'en'),
(9, 'Die Firma', NULL, 'de'),
(10, 'Unser Business', NULL, 'de'),
(11, 'Kontakt', NULL, 'de'),
(12, 'Kundendienst', NULL, 'de'),
(13, 'Métiers 01', 2, 'fr'),
(14, 'Métiers 02', 2, 'fr'),
(15, 'Métiers 03', 2, 'fr'),
(16, 'Détail 01', 14, 'fr');

--
-- Contenu de la table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`) VALUES
(1, 'contact@romainbellina.fr'),
(2, 't.sire41@gmail.com');
