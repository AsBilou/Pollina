--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id`, `login`, `password`, `email`, `role`) VALUES
(1, 'root', '5FZ2Z8QIkA7UTZ4BYkoC+GsReLf569mSKDsfods6LYQ8t+a8EW9oaircfMpmaLbPBh4FOBiiFyLfuZmTSUwzZg==', 'contact@romainbellina.fr','a:1:{i:0;s:10:"ROLE_ADMIN";}'),
(2, 'Array', '5FZ2Z8QIkA7UTZ4BYkoC+GsReLf569mSKDsfods6LYQ8t+a8EW9oaircfMpmaLbPBh4FOBiiFyLfuZmTSUwzZg==', 'bilou@pillona.fr','a:1:{i:0;s:10:"ROLE_ADMIN";}'),
(3, 'Bilou', '5FZ2Z8QIkA7UTZ4BYkoC+GsReLf569mSKDsfods6LYQ8t+a8EW9oaircfMpmaLbPBh4FOBiiFyLfuZmTSUwzZg==', 'bilou@pillona.fr','a:1:{i:0;s:10:"ROLE_ADMIN";}'),
(4, 'Thomas', '5FZ2Z8QIkA7UTZ4BYkoC+GsReLf569mSKDsfods6LYQ8t+a8EW9oaircfMpmaLbPBh4FOBiiFyLfuZmTSUwzZg==', 'thomas@pollina.fr','a:1:{i:0;s:10:"ROLE_ADMIN";}'),
(10, 'test', '5FZ2Z8QIkA7UTZ4BYkoC+GsReLf569mSKDsfods6LYQ8t+a8EW9oaircfMpmaLbPBh4FOBiiFyLfuZmTSUwzZg==', 'test@test.test','a:1:{i:0;s:10:"ROLE_ADMIN";}');

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

INSERT INTO `newsletter` (`id`, `email`,`state`) VALUES
(1, 'contact@romainbellina.fr','actif'),
(2, 't.sire41@gmail.com','actif');

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `lang`, `title`, `contenu`) VALUES
(0, 'fr', 'Lorem ipsum 2', '<p><span style="font-family: Arial, Helvetica, sans; font-size: 11px; line-height: 14px; text-align: justify;"><img style="vertical-align: middle;" src="../../../../img/button_newsletter.png" alt="test 2" width="20" height="20" />Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi venenatis laoreet nulla, eu semper <strong>magna</strong> mattis ut. Sed mollis interdum egestas. Cras et justo ultricies massa ullamcorper facilisis quis eget nulla. Duis nec leo vel velit gravida accumsan. Mauris elementum tristique sceler</span><span style="font-family: Arial, Helvetica, sans; font-size: 11px; line-height: 14px; text-align: justify;">isque.&nbsp;</span><img style="vertical-align: middle; margin-left: 10px; margin-right: 10px;" src="../../../../img/en_true.png" alt="Drapeau" width="30" height="31" /><span style="font-family: Arial, Helvetica, sans; font-size: 11px; line-height: 14px; text-align: justify;">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eu sapien vitae anteultricies porttitor et nec nulla. Curabitur vel rhoncus massa. Cras dictum, mi eget vestibulum eleifend, lectus dolor congue libero, sed sagittis diam dolor quis metus. Duis molestie posuere turpi</span><span style="font-family: Arial, Helvetica, sans; font-size: 11px; line-height: 14px; text-align: justify;">s</span><span style="font-family: Arial, Helvetica, sans; font-size: 11px; line-height: 14px; text-align: justify;">non faucibus. Cras pulvinar odio suscipit nunc sollicitudin imperdiet. Proin nec ante nisi. Sed sodales massa vel est euismod in iaculis quam rutrum. Aenean malesuada fermentum orci, interdum molestie lectus ultricies vel.</span></p>'),
(0, 'en', 'Lorem ipsum', '<p><span style="font-family: Arial, Helvetica, sans; font-size: 11px; line-height: 14px; text-align: justify;">Sed adipiscing feugiat nulla, vitae facilisis nisl eleifend eu. Cras sed massa at mi lobortis pellentesque. Nulla eu nulla est. Donec sed purus arcu, nec pharetra tortor. Donec sagittis augue vitae odio pretium nec tristique ipsum tempus. Curabitur blandit, felis sed scelerisque porta, metus ipsum suscipit arcu, eu bibendum lorem massa sed erat. Proin lectus arcu, gravida ut semper id, cursus ultrices arcu. Phasellus nisl lorem, luctus vitae malesuada euismod, faucibus ut turpis. Integer vel blandit ante. Sed convallis venenatis ipsum, a tempus urna viverra at. Nulla interdum, ligula eget aliquet condimentum, est metus adipiscing purus, in placerat urna est auctor nisi. Etiam nunc tortor, fermentum at malesuada nec, volutpat eu orci. Mauris a eros et dolor porta semper. Nam sagittis ante eu augue sagittis at auctor purus blandit. Vivamus a neque non ligula tempor dignissim.</span></p>'),
(0, 'de', 'Lorem ipsum', '<p><span style="font-family: Arial, Helvetica, sans; font-size: 11px; line-height: 14px; text-align: justify;">Sed hendrerit, diam non tristique ultrices, nibh metus elementum diam, ut placerat odio est vel nibh. Proin ante enim, pellentesque a vehicula vitae, consectetur a augue. Vivamus molestie ante sed magna tempus hendrerit. Praesent sapien turpis, euismod rutrum auctor in, molestie vel nisi. Quisque id euismod augue. In porta vehicula odio sit amet vestibulum. Morbi ipsum libero, molestie nec pulvinar id, posuere ut augue. Nullam nec quam vitae eros egestas volutpat. Quisque bibendum diam ut mi adipiscing in porttitor erat iaculis. Pellentesque accumsan magna vitae nulla rhoncus vestibulum. Praesent risus nisl, commodo at lobortis vulputate, volutpat vitae augue. Phasellus molestie libero in massa vehicula eleifend. Quisque molestie interdum semper. Suspendisse vitae nibh vitae purus molestie mattis.</span></p>'),
(4, 'fr', 'Premier article', '<p><span style="font-family: Arial, Verdana, sans-serif;"><span style="font-size: 14px; line-height: 18px;">L''ami Biiitor (alias Btor) a trouv&eacute; une petite astuce pour contourner les probl&egrave;mes de peering entre Free et Google qui provoquent de gros probl&egrave;mes au niveau de YouTube. Il faut comprendre que pour distribuer ses vid&eacute;os (et le reste de son contenu), Google utilise des serveurs de cache. Apparemment, c''est la connexion avec ces serveurs qui est sous-dimensionn&eacute;e par Free.</span></span></p>'),
(4, 'en', 'Premier article', '<p>The friend Biiitor (aka btor) found a little trick to circumvent the problems of peering between Free and Google causing big problems at YouTube. We must understand that to distribute its videos (and the rest of its contents), uses Google cache servers. Apparently, this is the connection with the server is undersized Free.</p>'),
(4, 'de', 'Premier article', '<p>Der Freund Biiitor (aka btor) fanden einen kleinen Trick, um die Probleme der Peering zwischen Freier und Google verursacht gro&szlig;e Probleme bei YouTube zu umgehen. Wir m&uuml;ssen verstehen, dass seine Videos (und der Rest des Inhalts) zu verteilen, nutzt Google Cache-Servern. Offenbar ist dies die Verbindung mit dem Server unterdimensioniert ist frei.</p>'),
(7, 'fr', 'DeuxiÃ¨me article', '<p style="margin: 0px 0px 15px; padding: 0px; color: #333b43; font-family: Arial, Verdana, sans-serif; font-size: 14px; line-height: 18px;">Pour d&eacute;montrer par A+B que le concept m&ecirc;me du DRM est une h&eacute;r&eacute;sie, le sp&eacute;cialiste de l''open source, Simon Phipps s''est amus&eacute; &agrave; poser un DRM sur un objet.</p>\r\n<p style="margin: 0px 0px 15px; padding: 0px; color: #333b43; font-family: Arial, Verdana, sans-serif; font-size: 14px; line-height: 18px;">Pour cela, il a install&eacute; un petit Arduino sur une chaine afin de d&eacute;tecter combien de fois celle-ci a &eacute;t&eacute; utilis&eacute;e. Comme un DRM donc... Et que se passe-t-il au bout de ces 8 utilisations ? Je vous laisse deviner ...</p>'),
(7, 'en', 'DeuxiÃ¨me article', '<p>To demonstrate by A + B that the concept of DRM is a heresy, open source specialist, Simon Phipps had fun pose a DRM object.</p>\r\n<p>&nbsp;</p>\r\n<p>For this, he installed a small Arduino on a chain to detect how many times it was used. DRM as a so ... And what happens after he uses those 8? I''ll let you guess ...</p>'),
(7, 'de', 'DeuxiÃ¨me article', '<p>Um von A + B zeigen, dass das Konzept der DRM eine H&auml;resie, Open-Source-Spezialist ist, hatte Simon Phipps Spa&szlig; stellen eine DRM-Objekt.</p>\r\n<p>&nbsp;</p>\r\n<p>Dazu installiert er eine kleine Arduino an einer Kette zu erfassen, wie oft sie verwendet wurde. DRM als so ... Und was geschieht, nachdem er jene 8 verwendet? Ich lasse Sie raten ...</p>');

