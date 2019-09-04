CREATE TABLE `product_` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL
)

INSERT INTO `product_` (`id`, `name`, `code`, `image`, `price`) VALUES
(1, '3D Camera', '3DcAM01', 'product-images/camera.jpg', 250.00),
(2, 'External Hard Drive', 'USB02', 'product-images/external-hard-drive.jpg', 190.00),
(3, 'Wrist Watch', 'wristWear03', 'product-images/watch.jpg', 300.00),
(4, 'Laptop', 'LP#45', 'product-images/laptop.jpg', 700.00);

ALTER TABLE `product_`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`code`);


ALTER TABLE `product_`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;
