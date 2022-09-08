CREATE TABLE `t_product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT 'product name',
  `sku` varchar(35) NOT NULL DEFAULT '' COMMENT 'sku',
  `description` text COMMENT 'product description',
  `sale_price` decimal(8,2) NOT NULL DEFAULT '0.00' COMMENT 'sale_price',
  `status` tinyint(3) NOT NULL DEFAULT '10' COMMENT 'status:1 enable,2 disabled,3 deleted',
  `created_at` datetime DEFAULT '0000-00-00 00:00:00' COMMENT 'create_at',
  `updated_at` datetime DEFAULT '0000-00-00 00:00:00' COMMENT 'update_at',
  PRIMARY KEY (`product_id`),
  KEY `title` (`title`) USING BTREE,
  KEY `sku` (`sku`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='product';

CREATE TABLE `t_bom` (
  `bom_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT 'product name',
  `description` text COMMENT 'product description',
  `price` decimal(8,2) NOT NULL DEFAULT '0.00' COMMENT 'price',
  `costs` decimal(8,2) NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT '0' COMMENT 'category_id',
  `quantity` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'quantity',
  `main_img` varchar(255) NOT NULL DEFAULT '' COMMENT 'main image',
  `main_img_thumb` varchar(255) NOT NULL DEFAULT '' COMMENT 'thumb image',
  `length` decimal(8,2) NOT NULL DEFAULT '0.00' COMMENT 'product length',
  `width` decimal(8,2) NOT NULL DEFAULT '0.00' COMMENT 'product width',
  `height` decimal(8,2) NOT NULL DEFAULT '0.00' COMMENT 'product height',
  `is_top` tinyint(3) NOT NULL DEFAULT '0' COMMENT 'is top bom',
  `status` tinyint(3) NOT NULL DEFAULT '0' COMMENT 'status:1 enable,2 disabled,3 deleted',
  `created_at` datetime DEFAULT '0000-00-00 00:00:00' COMMENT 'create_at',
  `updated_at` datetime DEFAULT '0000-00-00 00:00:00' COMMENT 'update_at',
  PRIMARY KEY (`bom_id`),
  KEY `name` (`name`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='bom';

CREATE TABLE `t_product_bom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL DEFAULT '0' COMMENT 'product_id',
  `bom_id` int(11) NOT NULL DEFAULT '0' COMMENT 'bom_id',
  `bom_quantity` int(11) NOT NULL DEFAULT '10' COMMENT 'the quantity of BOM required to compose this product',
  `created_at` datetime DEFAULT '0000-00-00 00:00:00' COMMENT 'create_at',
  `updated_at` datetime DEFAULT '0000-00-00 00:00:00' COMMENT 'update_at',
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`) USING BTREE,
  KEY `bom_id` (`bom_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='product_bom';

CREATE TABLE `t_bom_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bom_id` int(11) NOT NULL DEFAULT '0' COMMENT 'bom_id; table bom primary key',
  `child_bom_id` int(11) NOT NULL DEFAULT '0' COMMENT 'child bom id required by bom',
  `child_bom_quantity` int(11) NOT NULL DEFAULT '10' COMMENT 'child bom quantity',
  `created_at` datetime DEFAULT '0000-00-00 00:00:00' COMMENT 'create_at',
  `updated_at` datetime DEFAULT '0000-00-00 00:00:00' COMMENT 'update_at',
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`) USING BTREE,
  KEY `bom_id` (`bom_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='bom_item';
