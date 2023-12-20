CREATE TABLE IF NOT EXISTS 'order' (
  id int PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(100) NULL,
  email VARCHAR(100) NULL,
  phone VARCHAR(100) NULL,
  address VARCHAR(255) NULL,
  note text,
  status tinyint(1) DEFAULT '1',
  account_id int NOT NULL,
  created_at date DEFAULT current_timestamp(),
  updated_at date DEFAULT NOW(),
  FOREIGN KEY (account_id) REFERENCES account(id)
  ) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS order_detail (
  order_id int NOT NULL,
  product_id int NOT NULL,
  quantity int NOT NULL,
  price float NOT NULL,
  FOREIGN KEY (order_id) REFERENCES 'order' (id),
  FOREIGN KEY (product_id) REFERENCES product(id)
  ) ENGINE = InnoDB;