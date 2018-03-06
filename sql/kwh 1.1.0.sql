--
-- Database: `kwh`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `IDadmin` int(11) NOT NULL,
  `namaAdmin` varchar(50) NOT NULL,
  `IDusers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `app_setting`
--

CREATE TABLE `app_setting` (
  `IDappSetting` int(11) NOT NULL,
  `field` varchar(50) NOT NULL,
  `value` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `IDbuyer` int(11) NOT NULL,
  `IDusers` int(11) NOT NULL,
  `namaBuyer` varchar(50) NOT NULL,
  `fakultas` varchar(50) NOT NULL,
  `prodi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `IDcategory` int(11) NOT NULL,
  `namaCategory` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chart`
--

CREATE TABLE `chart` (
  `IDchart` int(11) NOT NULL,
  `IDinvoice` int(11) NOT NULL,
  `IDproduct` int(11) NOT NULL,
  `jumlahProduct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `IDinvoice` int(11) NOT NULL,
  `besaran` int(11) NOT NULL,
  `alamatKirim` varchar(255) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `IDproduct` int(11) NOT NULL,
  `namaProduct` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsiProduct` varchar(11) DEFAULT NULL,
  `IDseller` int(11) NOT NULL,
  `IDcategory` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `minimum` int(5) NOT NULL,
  `photo1` varchar(255) NOT NULL,
  `photo2` varchar(255) DEFAULT NULL,
  `photo3` varchar(255) DEFAULT NULL,
  `photo4` varchar(255) DEFAULT NULL,
  `photo5` varchar(255) DEFAULT NULL,
  `rate` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_rate`
--

CREATE TABLE `product_rate` (
  `IDproductRate` int(11) NOT NULL,
  `rate` int(5) NOT NULL,
  `IDbuyer` int(11) NOT NULL,
  `IDproduct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `IDseller` int(11) NOT NULL,
  `IDusers` int(11) NOT NULL,
  `namaSeller` varchar(50) NOT NULL,
  `deskripsiSeller` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `rate` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seller_rate`
--

CREATE TABLE `seller_rate` (
  `IDsellerRate` int(11) NOT NULL,
  `rate` int(5) NOT NULL,
  `IDbuyer` int(11) NOT NULL,
  `IDseller` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `IDtransaction` int(11) NOT NULL,
  `IDbuyer` int(11) NOT NULL,
  `IDseller` int(11) NOT NULL,
  `IDinvoice` int(11) NOT NULL,
  `IDkupon` int(11) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `IDusers` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(13) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`IDadmin`),
  ADD KEY `IDusers_users_admin` (`IDusers`);

--
-- Indexes for table `app_setting`
--
ALTER TABLE `app_setting`
  ADD PRIMARY KEY (`IDappSetting`);

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`IDbuyer`),
  ADD KEY `IDusers_users_buyer` (`IDusers`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`IDcategory`);

--
-- Indexes for table `chart`
--
ALTER TABLE `chart`
  ADD PRIMARY KEY (`IDchart`),
  ADD KEY `IDinvoice_invoice_chart` (`IDinvoice`),
  ADD KEY `IDproduct_product_chart` (`IDproduct`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`IDinvoice`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`IDproduct`),
  ADD KEY `IDseller_seller_product` (`IDseller`),
  ADD KEY `IDcategory_category_product` (`IDcategory`);

--
-- Indexes for table `product_rate`
--
ALTER TABLE `product_rate`
  ADD PRIMARY KEY (`IDproductRate`),
  ADD KEY `IDbuyer_buyer_product_rate` (`IDbuyer`),
  ADD KEY `IDproduct_product_product_rate` (`IDproduct`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`IDseller`),
  ADD KEY `IDusers_users_seller` (`IDusers`);

--
-- Indexes for table `seller_rate`
--
ALTER TABLE `seller_rate`
  ADD PRIMARY KEY (`IDsellerRate`),
  ADD KEY `IDbuyer_buyer_seller_rate` (`IDbuyer`),
  ADD KEY `IDseller_seller_seller_rate` (`IDseller`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`IDtransaction`),
  ADD KEY `IDbuyer_buyer_transaction` (`IDbuyer`),
  ADD KEY `IDseller_seller_transaction` (`IDseller`),
  ADD KEY `IDinvoice_invoice_transaction` (`IDinvoice`),
  ADD KEY `IDkupon_kupon_transaction` (`IDkupon`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`IDusers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `IDadmin` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `app_setting`
--
ALTER TABLE `app_setting`
  MODIFY `IDappSetting` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `buyer`
--
ALTER TABLE `buyer`
  MODIFY `IDbuyer` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `IDcategory` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `chart`
--
ALTER TABLE `chart`
  MODIFY `IDchart` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `IDinvoice` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `IDproduct` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_rate`
--
ALTER TABLE `product_rate`
  MODIFY `IDproductRate` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `IDseller` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `seller_rate`
--
ALTER TABLE `seller_rate`
  MODIFY `IDsellerRate` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `IDtransaction` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `IDusers` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `IDusers_users_admin` FOREIGN KEY (`IDusers`) REFERENCES `users` (`IDusers`);

--
-- Constraints for table `buyer`
--
ALTER TABLE `buyer`
  ADD CONSTRAINT `IDusers_users_buyer` FOREIGN KEY (`IDusers`) REFERENCES `users` (`IDusers`);

--
-- Constraints for table `chart`
--
ALTER TABLE `chart`
  ADD CONSTRAINT `IDinvoice_invoice_chart` FOREIGN KEY (`IDinvoice`) REFERENCES `invoice` (`IDinvoice`),
  ADD CONSTRAINT `IDproduct_product_chart` FOREIGN KEY (`IDproduct`) REFERENCES `product` (`IDproduct`) ON DELETE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `IDcategory_category_product` FOREIGN KEY (`IDcategory`) REFERENCES `category` (`IDcategory`) ON DELETE CASCADE,
  ADD CONSTRAINT `IDseller_seller_product` FOREIGN KEY (`IDseller`) REFERENCES `seller` (`IDseller`) ON DELETE CASCADE;

--
-- Constraints for table `product_rate`
--
ALTER TABLE `product_rate`
  ADD CONSTRAINT `IDbuyer_buyer_product_rate` FOREIGN KEY (`IDbuyer`) REFERENCES `buyer` (`IDbuyer`) ON DELETE CASCADE,
  ADD CONSTRAINT `IDproduct_product_product_rate` FOREIGN KEY (`IDproduct`) REFERENCES `product` (`IDproduct`) ON DELETE CASCADE;

--
-- Constraints for table `seller`
--
ALTER TABLE `seller`
  ADD CONSTRAINT `IDusers_users_seller` FOREIGN KEY (`IDusers`) REFERENCES `users` (`IDusers`);

--
-- Constraints for table `seller_rate`
--
ALTER TABLE `seller_rate`
  ADD CONSTRAINT `IDbuyer_buyer_seller_rate` FOREIGN KEY (`IDbuyer`) REFERENCES `buyer` (`IDbuyer`) ON DELETE CASCADE,
  ADD CONSTRAINT `IDseller_seller_seller_rate` FOREIGN KEY (`IDseller`) REFERENCES `seller` (`IDseller`) ON DELETE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `IDbuyer_buyer_transaction` FOREIGN KEY (`IDbuyer`) REFERENCES `buyer` (`IDbuyer`) ON DELETE CASCADE,
  ADD CONSTRAINT `IDinvoice_invoice_transaction` FOREIGN KEY (`IDinvoice`) REFERENCES `invoice` (`IDinvoice`),
  ADD CONSTRAINT `IDkupon_kupon_transaction` FOREIGN KEY (`IDkupon`) REFERENCES `kupon` (`IDkupon`) ON DELETE CASCADE,
  ADD CONSTRAINT `IDseller_seller_transaction` FOREIGN KEY (`IDseller`) REFERENCES `seller` (`IDseller`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
