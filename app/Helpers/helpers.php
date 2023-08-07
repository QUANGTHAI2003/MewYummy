<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Storage;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

if (!function_exists('formatNumber')) {
    /**
     * @param int  $num
     * @param int    $digits
     * @param string $unit
     *
     * @return string
     */
    function formatNumber(int $num, int $digits = 0, string $unit = '₫')
        : string {
        try {
            if ($digits < 0) {
                throw new InvalidArgumentException('Số chữ số thập phân phải lớn hơn hoặc bằng 0');
            }

            return number_format($num, $digits, ',', '.') . $unit;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
if (!function_exists('formatNumberType')) {
    function formatNumberType($number)
    {
        $suffixes    = ['', 'k', 'M', 'B', 'T'];
        $suffixIndex = 0;

        while ($number >= 1000 && $suffixIndex < count($suffixes) - 1) {
            $number /= 1000;
            $suffixIndex++;
        }

        return number_format($number, ($number < 10 ? 1 : 0)) . $suffixes[$suffixIndex];
    }
}

if (!function_exists('formatDate')) {
    /**
     * @param string $date
     * @param string $format
     *
     * @return string
     */
    function formatDate(string $date, string $format = 'd/m/Y')
        : string{
        $dateTime = DateTime::createFromFormat($format, $date);
        if (!$dateTime) {
            throw new InvalidArgumentException('Ngày tháng không hợp lệ: ' . $date);
        }

        return $dateTime->format($format);
    }
}

if (!function_exists('formatDateTime')) {
    /**
     * @param string $date
     * @param string $format
     *
     * @return string
     */
    function formatDateTime(string $date, string $format = 'd/m/Y H:i:s')
        : string{
        $dateTime = DateTime::createFromFormat($format, $date);
        if (!$dateTime) {
            throw new InvalidArgumentException('Ngày tháng không hợp lệ: ' . $date);
        }

        return $dateTime->format($format);
    }
}

// some useful functions for ecommerce website
if (!function_exists('getPrice')) {
    /**
     * @param float      $price
     * @param null|float $sale_price
     *
     * @return string
     */
    function getPrice(float $price, ?float $sale_price = null): string
    {
        if ($price < 0) {
            throw new InvalidArgumentException('Giá sản phẩm phải lớn hơn hoặc bằng 0');
        }

        if ($sale_price !== null && $sale_price < 0) {
            throw new InvalidArgumentException('Giá khuyến mãi phải lớn hơn hoặc bằng 0');
        }

        if ($sale_price == 0 || $sale_price === null) {
            return formatNumber($price);
        } else {
            return formatNumber($sale_price);
        }
    }
}

if (!function_exists('getSalePercent')) {
    /**
     * @param float      $price
     * @param null|float $sale_price
     *
     * @return null|string
     */
    function getSalePercent(float $price, ?float $sale_price = null): ?string
    {
        if ($price <= 0) {
            throw new InvalidArgumentException("Giá sản phẩm phải lớn hơn hoặc bằng 0");
        }

        if ($sale_price !== null && $sale_price >= $price) {
            throw new InvalidArgumentException("Giá khuyến mãi phải nhỏ hơn giá sản phẩm");
        }

        if ($sale_price !== null) {
            $percent = round(($price - $sale_price) / $price * 100);

            if ($percent < 0 || $percent > 100) {
                throw new InvalidArgumentException("Phần trăm khuyến mãi phải nằm trong khoảng từ 0 đến 100");
            }

            if ($percent === 0) {
                return null;
            }

            if ($percent == 100) {
                return null;
            }

            return '- ' . $percent . '%';
        } else {
            return 0;
        }
    }
}

if (!function_exists('generateSKU')) {
    /**
     * @param int $length
     *
     * @return string
     */
    function generateSKU(int $length = 8)
        : string {
        if ($length < 1) {
            throw new InvalidArgumentException("SKU phải có ít nhất 1 ký tự");
        }
        $characters       = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $sku              = '';
        for ($i = 0; $i < $length; $i++) {
            $sku .= $characters[rand(0, $charactersLength - 1)];
        }

        return $sku;
    }
}

if (!function_exists('calculateDiscount')) {
    /**
     * @param float $price
     * @param float $sale_price
     *
     * @return int
     */
    function calculateDiscount(float $price, float $sale_price)
        : int {
        if ($price <= 0 || $sale_price <= 0) {
            throw new InvalidArgumentException("Giá sản phẩm và giá khuyến mãi phải lớn hơn 0");
        }
        $discountAmount  = $price - $sale_price;
        $discountPercent = round($discountAmount / $price * 100);
        if ($discountPercent < 0 || $discountPercent > 100) {
            throw new InvalidArgumentException("Phần trăm khuyến mãi phải nằm trong khoảng từ 0 đến 100");
        }

        return $discountPercent;
    }
}

if (!function_exists('getRatingStar')) {
    /**
     * @param float $rating
     *
     * @return string
     */
    function getRatingStar(float $rating)
        : string {
        if ($rating < 0 || $rating > 5) {
            throw new InvalidArgumentException("Đánh giá phải nằm trong khoảng từ 0 đến 5");
        }
        $rating = round($rating * 2) / 2;

        $fullStars  = floor($rating);
        $halfStars  = ceil($rating - $fullStars);
        $emptyStars = 5 - $fullStars - $halfStars;

        $stars = str_repeat('<i class="fas fa-star fa-fw" style="color: #FBBF24;"></i>',
            $fullStars);

        $stars .= str_repeat('<i class="fas fa-star-half-alt fa-fw" style="color: #FBBF24;"></i>',
            $halfStars);

        $stars .= str_repeat('<i class="far fa-star fa-fw" style="color: #FBBF24;"></i>',
            $emptyStars);

        return '<span class="flex items-center">' . $stars . '</span>';
    }
}

if (!function_exists('convertCurrency')) {
    /**
     * @param float $amount
     *
     * @return string
     */
    function convertCurrency(float $amount)
        : string{
        $locale       = LaravelLocalization::getCurrentLocale();
        $locales      = config('app.locales'); // vi and en
        $exchangeRate = 0.000043; // 1 USD = 23,000 VND

        if ($amount <= 0) {
            throw new InvalidArgumentException('Số tiền phải lớn hơn 0');
        }

        if (!in_array($locale, $locales)) {
            throw new InvalidArgumentException('Ngôn ngữ không hợp lệ');
        }

        if ($locale == 'vi') {
            return formatNumber($amount, 0, '') . '₫';
        } else {
            $amount = $amount * $exchangeRate;

            return '$' . formatNumber($amount, 2, '');
        }
    }
}

if (!function_exists('formatTime')) {
    /**
     * @param $time
     *
     * @return string
     */
    function formatTime($time)
        : string {
        return Carbon::parse($time)->locale(config('app.locale'))->diffForHumans();
    }
}

if (!function_exists('transRoute')) {
    /**
     * @param $route
     *
     * @return string
     */
    function transRoute($route)
        : string{
        $routeKey = explode('.', $route)[1];
        $data     = Lang::get('routes');
        if (!array_key_exists($routeKey, $data)) {
            throw new InvalidArgumentException('Route không tồn tại. Vui lòng kiểm tra lại');
        }

        return LaravelLocalization::transRoute($route);
    }
}

if (!function_exists('getProductImage')) {
    function getProductImage($image)
    {
        $path = 'images/products/' . $image;
        if (!Storage::exists($path)) {
            return asset('storage/' . $image);
        }

        return asset('storage/' . $path);
    }
}

if (!function_exists('avatarUrl')) {
    function avatarUrl($user)
    {
        if (file_exists(public_path('storage/' . ltrim($user->avatar, '/')))) {
            $avatar = asset('storage/' . ltrim($user->avatar, '/'));
            return $avatar;
        }
        $name       = urlencode($user->username ?: $user->name);
        $avatar_api = "https://ui-avatars.com/api/?name=" . urlencode($name);
        return $avatar_api;
    }
}
