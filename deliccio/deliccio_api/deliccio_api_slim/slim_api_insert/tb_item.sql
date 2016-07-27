CREATE TABLE IF NOT EXISTS `tb_item` (
  `id` int(11) NOT NULL,
  `name` varchar(10000) NOT NULL,
  `avail` varchar(1000) NOT NULL,
  `cost` int(11) NOT NULL,
  `category` varchar(1000) NOT NULL
);
INSERT INTO `tb_item` (`id`, `name`, `avail`, `cost`, `category`) VALUES
(1, 'Lassi', 'Available', 30, 'Beverage'),
(2, 'Coffee', 'Available', 40, 'Beverage'),
(3, 'Dosa', 'Available', 75, 'South_Indian'),
(4, 'Amritsari Naan', 'Available', 100, 'Punjabi'),
(5, 'Pizza', 'Available', 150, 'Italian'),
(6, 'Idli', 'Available', 70, 'South_Indian'),
(7, 'Noodles', 'Available', 100, 'Chinese'),
(8, 'Khakhra', 'Available', 60, 'Gujarati');
