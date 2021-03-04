CREATE TABLE `address_book` (
  `id` bigint(20) NOT NULL,
  `name_first` varchar(255) NOT NULL,
  `name_last` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tel_work` varchar(32) DEFAULT NULL,
  `tel_home` varchar(64) DEFAULT NULL,
  `tel_mob` varchar(64) DEFAULT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `address_book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name_first` (`name_first`),
  ADD KEY `name_last` (`name_last`),
  ADD KEY `email` (`email`);

ALTER TABLE `address_book`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
COMMIT;