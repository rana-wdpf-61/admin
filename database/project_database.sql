-- create database if not exists production_management;
-- use production_management;


CREATE TABLE `core_users` (
  `id` int(10) primary key auto_increment,
  `name` varchar(50) DEFAULT NULL,
  `role_id` int(10) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `photo` varchar(50) DEFAULT NULL,
  `verify_code` varchar(50) DEFAULT NULL,
  `inactive` tinyint(1) UNSIGNED DEFAULT 0,
  `mobile` varchar(50) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `remember_token` varchar(145) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_users`
--

INSERT INTO `core_users` (`id`, `name`, `role_id`, `password`, `email`, `full_name`, `created_at`, `photo`, `verify_code`, `inactive`, `mobile`, `updated_at`, `ip`, `email_verified_at`, `remember_token`) VALUES
(127, 'admin', 1, '$2y$10$zeyUFTm0vqQ0uAUS04kl4ubY6.2Y0zQXqcFC70XvD.8Ot5s3Om5PG', 'towhid1@outlook.com', 'Mohammad Towhidul Islam', '2024-04-29 05:28:06', '127.jpg', '45354353', 0, '34324324', '2022-02-15 21:00:46', '192.168.150.29', NULL, NULL),
(192, 'naeem', 2, '$2y$10$BTQzbrLdYG9/hSfLBf7mzOLzDG1kp6E90OaMh9jEWBafyGkG6oAt6', 'naymur@gmail.com', 'Naymur Rahman', '2024-04-04 05:43:27', NULL, NULL, 0, '01800000000', NULL, '192.168.150.25', NULL, NULL),
(194, 'jakaria', 2, '$2y$10$Zyt3rgYgF9vnDBhNRN/8lO1BirJFCCNr3rhTRiI.7W1aVIuriBJiS', 'jkp.jakaria@gmail.com', 'jkp', '2024-04-15 04:53:54', NULL, NULL, 0, '01642527454', NULL, '192.168.150.47', NULL, NULL),
(196, 'Aminur', 2, '$2y$10$u1Wku9Uh61adCVAPm6ToSOp.8EgdXkiXo/DGp3oD.i/8o9I6a/Dai', 'amiur@gmail.com', 'Aminur Rahman', '2024-04-04 05:45:19', NULL, NULL, 0, '01800000000', NULL, '192.168.150.25', NULL, NULL),
(197, 'Tanim', 2, '$2y$10$NcNFqz1p2N76l4NH96f4Y.KTU8s/e.CqZB.lD7lewc4rcBvMstgaK', 'tanim@gmail.com', 'Rifat Ahammed Tanim', '2024-04-04 05:54:06', NULL, NULL, 0, '01900000000', NULL, '192.168.150.34', NULL, NULL),
(199, 'midul', 2, '$2y$10$sUhLutkkEUOUTWY2yWi.C.B55DFNOhUrbfFnrzcKM2FK7xdDF6Rby', 'midul@yahoo.com', 'Midul Islam', '2024-04-04 05:50:50', NULL, NULL, 0, '0198748343', NULL, '192.168.150.5', NULL, NULL),
(200, 'Jabed ', 2, '$2y$10$mgdw/E0HYncsz1wZaxygKerTF9VAfiPMnq4TSLsscA5CVHSih/RbS', 'olba@gmail.com', 'Javed ', '2024-04-04 05:59:27', NULL, NULL, 0, '01869546555', NULL, '192.168.150.22', NULL, NULL),
(201, 'omar', 2, '$2y$10$GnOgIBKPRsNIeM3OJExotuuBjGqzgcYGnfQeZpz4pug/GNqiLCWwS', 'omar@gmail.com', 'Omar Faruk', '2024-04-15 04:57:44', NULL, NULL, 0, '343434', NULL, '192.168.150.11', NULL, NULL),
(204, 'Anni', 2, '$2y$10$JWg5tGwzGUwnFT/PZBT4wuqIKAw3Vb6X7kWs9zC3ueLSi1RMzi87W', 'jannatulneasa464@gmail.com', 'Jannatul Neasa', '2024-04-04 05:54:32', NULL, NULL, 0, '3254436756', NULL, '192.168.150.29', NULL, NULL),
(206, 'mir3', 4, '$2y$10$wYZrszbJ9LIadOof3PRIzuHQNnjAQuTanA.JBmsreow3nJm04hCRW', 'mir@gmail.com', 'Mizanur Rahman ', '2024-05-15 07:36:41', 'mir3.png', NULL, 0, '', '0000-00-00 00:00:00', '::1', '0000-00-00 00:00:00', ''),
(209, 'abc', 1, '$2y$10$M52jied3IiUeo/ke8QU5SO0tS5IrW3T7aXVEL3a7l7/HN/4l98XKO', 'abc@gmail.com', NULL, '2024-05-15 06:29:14', 'abc-gmail-com.jpg', NULL, 0, NULL, '2024-05-15 12:08:29', '::1', '0000-00-00 00:00:00', ''),
(213, 'sium', 2, '$2y$10$Ziq..GqX0z4Lf2H4tE62VOsSDmyq8BUhESIhHu4BEfLKvrJLUszOS', 'sium@gmail.com', NULL, '2024-05-15 07:43:08', 'sium.jpeg', NULL, 0, NULL, '0000-00-00 00:00:00', '192.168.150.18', '0000-00-00 00:00:00', '');

CREATE TABLE `core_roles` (
 `id` int(10) primary key auto_increment,
  `name` varchar(20) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_roles`
--

INSERT INTO `core_roles` (`id`, `name`, `updated_at`, `created_at`) VALUES
(1, 'Admin', '2024-03-02 04:59:14', '2024-03-02 04:59:14'),
(2, 'Manager', '2024-02-28 12:10:59', '2024-02-28 06:10:59'),
(4, 'Guest', '2024-03-07 10:24:21', '2024-03-07 04:24:21'),
(5, 'Manager', '2024-03-07 12:25:34', '2024-03-07 06:25:34'),
(6, 'Manager', '2024-03-07 12:25:53', '2024-03-07 06:25:53');






create table if not exists `core_products`(
    id int primary key auto_increment,
    name varchar (50),
    price double,
    offer_price double,
    categories_id int,
    uom_id int,
    barcode int, 
    sku int,
    manufacturer_id int,
    star varchar (50),
    photo varchar(100),
    description varchar (200),
    weight int,
    size int,
    is_feature varchar (50),
    is_brand varchar (50),
    created_at datetime default current_timestamp,
    updated_at datetime default current_timestamp
);




create table if not exists `core_manufacturers`(
    id int primary key auto_increment,
    name varchar (50),
    phone varchar(20),
    email varchar(30),
    address varchar (200),
    created_at datetime default current_timestamp,
    updated_at datetime default current_timestamp
);




create table if not exists `core_suppliers`(
    id int primary key auto_increment,
    name varchar (50),
    photo varchar(100),
    phone varchar(20),
    email varchar(30),
    address varchar (200),
    created_at datetime default current_timestamp,
    updated_at datetime default current_timestamp
);




create table if not exists `core_purchases`(
    id int primary key auto_increment,
    supplier_id int,
    product_id int,
    status_id int,
    order_total double,
    paid_amount double,
    discount double,
    vat double,
    photo varchar(100),
    date date,
    shipping_address varchar (150),
    description varchar (150),
    created_at datetime default current_timestamp,
    updated_at datetime default current_timestamp
);




create table if not exists `core_purchases_details`(
    id int primary key auto_increment,
    purchases_id int,
    product_id int,
    qty double,
    price double,
    discount double,
    created_at datetime default current_timestamp,
    updated_at datetime default current_timestamp
);




create table if not exists `core_categories`(
    id int primary key auto_increment,
    name varchar (50),
    created_at datetime default current_timestamp,
    updated_at datetime default current_timestamp
);





create table if not exists `core_uom`(
    id int primary key auto_increment,
    name varchar (50),
    created_at datetime default current_timestamp,
    updated_at datetime default current_timestamp
);




create table if not exists `core_status`(
    id int primary key auto_increment,
    name varchar (50),
    created_at datetime default current_timestamp,
    updated_at datetime default current_timestamp
);




create table if not exists `core_customars`(
    id int primary key auto_increment,
    name varchar (50),
    photo varchar(100),
    phone varchar(20),
    email varchar(30),
    address varchar (200),
    created_at datetime default current_timestamp,
    updated_at datetime default current_timestamp
);




create table if not exists `core_orders`(
    id int primary key auto_increment,
    customer_id int,
    order_total double,
    discount double,
    shipping_address varchar (200),
    paid_amount double,
    status_id int,
    order_date date,
    delivery_date date,
    vat double,
    created_at datetime default current_timestamp,
    updated_at datetime default current_timestamp
);




create table if not exists `core_order_details`(
    id int primary key auto_increment,
    order_id int,
    product_id int,
    qty double,
    price double,
    vat double,
    created_at datetime default current_timestamp,
    updated_at datetime default current_timestamp
);




create table if not exists `core_stock`(
    id int primary key auto_increment,
    product_id int,
    transaction_type_id int,
    warehouse_id int,
    qty double,
    remark varchar (200),
    created_at datetime default current_timestamp,
    updated_at datetime default current_timestamp
);




create table if not exists `core_warehouse`(
    id int primary key auto_increment,
    name varchar (50),
    phone varchar(20),
    location varchar(200),
    address varchar (200),
    created_at datetime default current_timestamp,
    updated_at datetime default current_timestamp
);




create table if not exists `core_transaction_type`(
    id int primary key auto_increment,
    name varchar (50),
    factor float,
    created_at datetime default current_timestamp,
    updated_at datetime default current_timestamp
);



create table if not exists `core_adjustment_type`(
    id int primary key auto_increment,
    name varchar (50),
    factor float,
    created_at datetime default current_timestamp,
    updated_at datetime default current_timestamp
);




create table if not exists `core_stock_adjustment`(
    id int primary key auto_increment,
    user_id int,
    adjustment_type_id int,
    warehouse_id int,
    created_at datetime default current_timestamp,
    updated_at datetime default current_timestamp
);




create table if not exists `core_stock_adjustment_details`(
    id int primary key auto_increment,
    stock_adjustment_id int,
    product_id int,
    qty double,
    price double,
    created_at datetime default current_timestamp,
    updated_at datetime default current_timestamp
);



