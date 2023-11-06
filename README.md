# Website Mew Yummy

## 1. Các chức năng chính của website

### Phía người dùng (user)

- Đăng nhập đăng nhập , đăng ký, quên mật khẩu, cập nhật tài khoản và đổi mật khẩu
- Lịch sử, in, hủy đơn hàng và tự động hủy đơn hàng sau 30 ngày không xác nhận
- Livesearch, lọc sản phẩm theo khoảng giá, ngày và theo bảng chữ cái
- Bình luận và trả lời bình luận về sản
- Thêm vào giỏ hàng, mã giảm giá theo điều kiện
- Thanh toán đơn hàng
- Fetch api quận huyện thành phố

### Phía người quản trị (admin)

- Thống kê doanh thu, đơn hàng và khách hàng theo ngày, tháng, năm
- Quản lý danh mục
- Quản lý sản phẩm (có thể thêm biến thể), xuất excel
- Quản lý mã giảm giá
- Quản lý biến
- Quản lý đơn hàng
- Phân quyền (quản lý admin, quản lý vai trò)
- Xem log

## 2. Cách chạy source code

#### Mở terminal và thực hiện clone dự

```
git clone https://github.com/QUANGTHAI2003/MewYummy.git
cd MewYummy
```

#### Chạy composer và npm để tải các gói cần thiết

```
composer install
npm install 
```

#### Tạo database và config database

Thực hiện copy file .env

```
cp .env.example .env 
```

Cập nhật lại username và password

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mewyummy
DB_TABLE_PREFIX=my_
DB_USERNAME=
DB_PASSWORD=
```

#### Tạo key cho laravel

```
php artisan key:generate
```

#### Tạo ra các bảng và dữ liệu mẫu cho database

```
php artisan migrate --seed
```

#### Tạo liên kết storage vào

```
php artisan storage:link
```

#### Chạy dự án

```
php artisan serve
```

## 3. Tài khoản admin

Username:

```
admin@gmail.com
```

Password:

```
12345678
```
