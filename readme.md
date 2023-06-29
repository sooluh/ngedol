# Ngedol 🛒

Only `Pemrograman Web Lanjut` task fulfillment.

## Requirements

- PHP >= 7.4
- Composer v2

## Getting Started

1. Bismillaah
2. Clone or download this repository

   ```bash
   git clone https://github.com/sooluh/ngedol.git
   ```

3. Change current directoy to repository directory

   ```bash
   cd ngedol
   ```

4. Install composer dependencies

   ```bash
   composer install
   ```

5. Go to (probably `http://localhost/ngedol`), and **MasyaAllah**!
6. You will get an error, hehe..
7. Create one database, whatever. I suggest with name `ngedol`.

8. Copy `.env.example` file to `.env` and customize contents!
   Just focus on this 👇🏻

   ```bash
   DB_HOSTNAME=localhost
   DB_USERNAME=root
   DB_PASSWORD=
   DB_DATABASE=ngedol
   DB_DRIVER=mysqli
   ```

9. Export (or `copy paste` contents into SQL tab) `ngedol.db` file
   in `database` directory to your own database.
10. Sleep tightly!

## Features

1. Authentication
2. Products Management
   1. Products List
   2. Add Product w/ Image
   3. Update Product
   4. Delete Product (Soft Delete)
   5. Product Detail
   6. Export `pdf`
   7. Export `xlsx`

## To-Do

- [x] Print Products List (PDF)
- [x] Export to Excel

## License

Code licensed under [Apache 2.0 License](./LICENSE.md).

## Links

- [PHP](https://www.php.net/)
- [MySQL](https://www.mysql.com/)
- [Composer](https://getcomposer.org/)
- [AdminKit](https://adminkit.io/)
- [PHP dotenv](https://github.com/vlucas/phpdotenv)
- [PhpSpreadsheet](https://github.com/PHPOffice/PhpSpreadsheet)
- [Dompdf](https://github.com/dompdf/dompdf)
