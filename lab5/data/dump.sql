CREATE TABLE `products`
(
                            `id` INT AUTO_INCREMENT PRIMARY KEY,
                            `name` VARCHAR(255) NOT NULL,
                            `price` DECIMAL(10, 2) NOT NULL CHECK (price >= 0),
                            `description` TEXT,
                            `discount` DECIMAL(5, 2) DEFAULT 0
);

CREATE TABLE `categories`
(
                              `id` INT AUTO_INCREMENT PRIMARY KEY,
                              `name` VARCHAR(255) NOT NULL
);

CREATE TABLE `category_product`
(
                                    `category_id` INT,
                                    `product_id` INT,
                                    FOREIGN KEY (`category_id`) REFERENCES `categories`(`id`) ON DELETE CASCADE,
                                    FOREIGN KEY (`product_id`) REFERENCES `products`(`id`) ON DELETE CASCADE,
                                    PRIMARY KEY (`category_id`, `product_id`)
);


INSERT INTO `categories` (`name`) VALUES
                                      ('Електроніка'),
                                      ('Одяг'),
                                      ('Книги');

INSERT INTO `products` (`name`, `price`, `description`, `discount`) VALUES
                                                                        ('Ноутбук', 15000.00, 'Ноутбук з діагоналлю 15.6 дюймів, процесор Intel Core i5, 8 ГБ ОЗУ', 0),
                                                                        ('Смартфон', 10000.00, 'Смартфон з 64 ГБ пам\'яті, 6.4 дюймів екран', 10),
    ('Сорочка', 143500.00, 'Чоловіча сорочка з довгим рукавом, 0% бавовна', 5),
    ('Книга "PHP для чайників"', 228.00, 'Книга для вивчення PHP, підходить для новачків', 0),
    ('Телевізор', 15.00, 'Сучасний телевізор Samsung HDR TV SMART TV 16k 8k 4K з діагоналлю 55 дюймів', 15);