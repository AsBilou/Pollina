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
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `title`, `contenu_fr`, `contenu_en`, `contenu_de`) VALUES
(1, 'Article 1', '<p><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eget lacus eget erat luctus semper ut quis eros. Curabitur lacus turpis, adipiscing nec tincidunt quis, egestas ut enim. Duis pretium, lectus suscipit adipiscing fringilla, mi nisi dignissim est, sed faucibus mi risus ac arcu. Ut a erat nec tellus rhoncus semper non sed massa. Etiam euismod rhoncus elit non sodales. Maecenas posuere, arcu in pharetra porta, sem nulla interdum nisl, a cursus diam sem vel erat. Sed bibendum pulvinar ligula, interdum egestas sem blandit vitae. Quisque a tellus est. Cras blandit ligula eu libero placerat pharetra. Etiam malesuada interdum risus eu aliquam. Integer feugiat nisi tincidunt diam adipiscing a cursus ligula gravida. Integer vestibulum congue vestibulum. Proin ut dui ante, id sagittis neque. Nulla pulvinar, nisl at condimentum porta, tellus risus dignissim erat, quis sodales augue purus vel orci. Phasellus vel ante sit amet ipsum tristique pellentesque vel ac orci.</strong', '<p>Quisque ut pulvinar ipsum. Duis nec purus ac nibh molestie porttitor. Nulla facilisi. Vivamus condimentum fermentum augue, non vehicula ante vestibulum eu. Nulla facilisi. Mauris hendrerit vulputate felis, quis auctor lectus feugiat quis. Maecenas ullamcorper condimentum pretium. Donec vel elit sed eros pharetra viverra. In hac habitasse platea dictumst. Maecenas eu magna at mauris hendrerit consequat. Duis ullamcorper, leo vitae mattis tristique, leo felis condimentum felis, malesuada dignissim nisi lorem at augue. Etiam dapibus, metus sed fringilla ornare, neque diam rhoncus purus, quis egestas urna mi id nisi.</p>', '<p>Curabitur nec odio ac mi euismod fermentum eu eu velit. Donec consectetur fermentum odio eu viverra. Suspendisse at magna vel diam sagittis iaculis quis malesuada enim. Curabitur mi massa, mattis in luctus eu, commodo a lacus. Pellentesque ac massa est, a convallis ligula. Vivamus interdum, purus sit amet interdum malesuada, neque tortor consectetur dui, vel feugiat ligula sem ut nibh. Pellentesque ut quam justo, eget malesuada mauris. Integer nec enim dapibus neque auctor volutpat iaculis sit amet est. Cras quis venenatis ligula. Donec ultricies tortor ac nibh faucibus non consequat urna vehicula. Integer id tristique neque. Quisque mollis volutpat magna vel euismod. Nulla et nisi sed est aliquam interdum. Aliquam porttitor, turpis vitae posuere pretium, turpis massa ornare ligula, in gravida purus turpis ac libero.</p>'),
(2, '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eget lacus eget erat luctus semper ut quis eros. Curabitur lacus turpis, adipiscing nec tincidunt quis, egestas ut enim. Duis pretium, lectus suscipit adipiscing fringilla, mi nisi dignissim est, sed faucibus mi risus ac arcu. Ut a erat nec tellus rhoncus semper non sed massa. Etiam euismod rhoncus elit non sodales. Maecenas posuere, arcu in pharetra porta, sem nulla interdum nisl, a cursus diam sem vel erat. Sed bibendum pulvinar ligula, interdum egestas sem blandit vitae. Quisque a tellus est. Cras blandit ligula eu libero placerat pharetra. Etiam malesuada interdum risus eu aliquam. Integer feugiat nisi tincidunt diam adipiscing a cursus ligula gravida. Integer vestibulum congue vestibulum. Proin ut dui ante, id sagittis neque. Nulla pulvinar, nisl at condimentum porta, tellus risus dignissim erat, quis sodales augue purus vel orci. Phasellus vel ante sit amet ipsum tristique pellentesque vel ac orci.', 'Quisque ut pulvinar ipsum. Duis nec purus ac nibh molestie porttitor. Nulla facilisi. Vivamus condimentum fermentum augue, non vehicula ante vestibulum eu. Nulla facilisi. Mauris hendrerit vulputate felis, quis auctor lectus feugiat quis. Maecenas ullamcorper condimentum pretium. Donec vel elit sed eros pharetra viverra. In hac habitasse platea dictumst. Maecenas eu magna at mauris hendrerit consequat. Duis ullamcorper, leo vitae mattis tristique, leo felis condimentum felis, malesuada dignissim nisi lorem at augue. Etiam dapibus, metus sed fringilla ornare, neque diam rhoncus purus, quis egestas urna mi id nisi.', 'Curabitur nec odio ac mi euismod fermentum eu eu velit. Donec consectetur fermentum odio eu viverra. Suspendisse at magna vel diam sagittis iaculis quis malesuada enim. Curabitur mi massa, mattis in luctus eu, commodo a lacus. Pellentesque ac massa est, a convallis ligula. Vivamus interdum, purus sit amet interdum malesuada, neque tortor consectetur dui, vel feugiat ligula sem ut nibh. Pellentesque ut quam justo, eget malesuada mauris. Integer nec enim dapibus neque auctor volutpat iaculis sit amet est. Cras quis venenatis ligula. Donec ultricies tortor ac nibh faucibus non consequat urna vehicula. Integer id tristique neque. Quisque mollis volutpat magna vel euismod. Nulla et nisi sed est aliquam interdum. Aliquam porttitor, turpis vitae posuere pretium, turpis massa ornare ligula, in gravida purus turpis ac libero.'),
(3, '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eget lacus eget erat luctus semper ut quis eros. Curabitur lacus turpis, adipiscing nec tincidunt quis, egestas ut enim. Duis pretium, lectus suscipit adipiscing fringilla, mi nisi dignissim est, sed faucibus mi risus ac arcu. Ut a erat nec tellus rhoncus semper non sed massa. Etiam euismod rhoncus elit non sodales. Maecenas posuere, arcu in pharetra porta, sem nulla interdum nisl, a cursus diam sem vel erat. Sed bibendum pulvinar ligula, interdum egestas sem blandit vitae. Quisque a tellus est. Cras blandit ligula eu libero placerat pharetra. Etiam malesuada interdum risus eu aliquam. Integer feugiat nisi tincidunt diam adipiscing a cursus ligula gravida. Integer vestibulum congue vestibulum. Proin ut dui ante, id sagittis neque. Nulla pulvinar, nisl at condimentum porta, tellus risus dignissim erat, quis sodales augue purus vel orci. Phasellus vel ante sit amet ipsum tristique pellentesque vel ac orci.', 'Quisque ut pulvinar ipsum. Duis nec purus ac nibh molestie porttitor. Nulla facilisi. Vivamus condimentum fermentum augue, non vehicula ante vestibulum eu. Nulla facilisi. Mauris hendrerit vulputate felis, quis auctor lectus feugiat quis. Maecenas ullamcorper condimentum pretium. Donec vel elit sed eros pharetra viverra. In hac habitasse platea dictumst. Maecenas eu magna at mauris hendrerit consequat. Duis ullamcorper, leo vitae mattis tristique, leo felis condimentum felis, malesuada dignissim nisi lorem at augue. Etiam dapibus, metus sed fringilla ornare, neque diam rhoncus purus, quis egestas urna mi id nisi.', 'Curabitur nec odio ac mi euismod fermentum eu eu velit. Donec consectetur fermentum odio eu viverra. Suspendisse at magna vel diam sagittis iaculis quis malesuada enim. Curabitur mi massa, mattis in luctus eu, commodo a lacus. Pellentesque ac massa est, a convallis ligula. Vivamus interdum, purus sit amet interdum malesuada, neque tortor consectetur dui, vel feugiat ligula sem ut nibh. Pellentesque ut quam justo, eget malesuada mauris. Integer nec enim dapibus neque auctor volutpat iaculis sit amet est. Cras quis venenatis ligula. Donec ultricies tortor ac nibh faucibus non consequat urna vehicula. Integer id tristique neque. Quisque mollis volutpat magna vel euismod. Nulla et nisi sed est aliquam interdum. Aliquam porttitor, turpis vitae posuere pretium, turpis massa ornare ligula, in gravida purus turpis ac libero.'),
(4, '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eget lacus eget erat luctus semper ut quis eros. Curabitur lacus turpis, adipiscing nec tincidunt quis, egestas ut enim. Duis pretium, lectus suscipit adipiscing fringilla, mi nisi dignissim est, sed faucibus mi risus ac arcu. Ut a erat nec tellus rhoncus semper non sed massa. Etiam euismod rhoncus elit non sodales. Maecenas posuere, arcu in pharetra porta, sem nulla interdum nisl, a cursus diam sem vel erat. Sed bibendum pulvinar ligula, interdum egestas sem blandit vitae. Quisque a tellus est. Cras blandit ligula eu libero placerat pharetra. Etiam malesuada interdum risus eu aliquam. Integer feugiat nisi tincidunt diam adipiscing a cursus ligula gravida. Integer vestibulum congue vestibulum. Proin ut dui ante, id sagittis neque. Nulla pulvinar, nisl at condimentum porta, tellus risus dignissim erat, quis sodales augue purus vel orci. Phasellus vel ante sit amet ipsum tristique pellentesque vel ac orci.', 'Quisque ut pulvinar ipsum. Duis nec purus ac nibh molestie porttitor. Nulla facilisi. Vivamus condimentum fermentum augue, non vehicula ante vestibulum eu. Nulla facilisi. Mauris hendrerit vulputate felis, quis auctor lectus feugiat quis. Maecenas ullamcorper condimentum pretium. Donec vel elit sed eros pharetra viverra. In hac habitasse platea dictumst. Maecenas eu magna at mauris hendrerit consequat. Duis ullamcorper, leo vitae mattis tristique, leo felis condimentum felis, malesuada dignissim nisi lorem at augue. Etiam dapibus, metus sed fringilla ornare, neque diam rhoncus purus, quis egestas urna mi id nisi.', 'Curabitur nec odio ac mi euismod fermentum eu eu velit. Donec consectetur fermentum odio eu viverra. Suspendisse at magna vel diam sagittis iaculis quis malesuada enim. Curabitur mi massa, mattis in luctus eu, commodo a lacus. Pellentesque ac massa est, a convallis ligula. Vivamus interdum, purus sit amet interdum malesuada, neque tortor consectetur dui, vel feugiat ligula sem ut nibh. Pellentesque ut quam justo, eget malesuada mauris. Integer nec enim dapibus neque auctor volutpat iaculis sit amet est. Cras quis venenatis ligula. Donec ultricies tortor ac nibh faucibus non consequat urna vehicula. Integer id tristique neque. Quisque mollis volutpat magna vel euismod. Nulla et nisi sed est aliquam interdum. Aliquam porttitor, turpis vitae posuere pretium, turpis massa ornare ligula, in gravida purus turpis ac libero.');

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
