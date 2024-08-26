<?php

namespace App\Filament\Widgets;

// use App\Models\Comment;
use App\Models\Course;
use App\Models\Course_user;
use App\Models\Order;
use App\Models\User;
use Filament\Facades\Filament;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\Summarizers\Count;
use Illuminate\Database\Query\Builder;

class StatsAdminOverview extends BaseWidget
{
    protected static bool $isLazy = false;
    protected function getStats(): array
    {
        $totalRevenue = Order::sum('price_paid');
        $profit = $totalRevenue * 0.1;

        // Định dạng số tiền theo VNĐ
        $formatCurrency = fn($value) => number_format($value, 0, ',', '.') . ' VNĐ';
        return [
            Stat::make('Tổng doanh thu', $formatCurrency($totalRevenue))
                ->icon('heroicon-m-chat-bubble-oval-left')
                ->description('tăng 10% so với tháng trước')
                ->descriptionIcon('heroicon-m-arrow-long-up')
                ->color('success'),

            Stat::make('Lợi nhuận (10%)', $formatCurrency($profit))
                ->icon('heroicon-m-chat-bubble-oval-left')
                ->description('tăng 10% so với tháng trước')
                ->descriptionIcon('heroicon-m-arrow-long-up')
                ->color('success'),

            Stat::make('Lượt đăng ký khóa học', Course_user::query()->count())
                ->icon('heroicon-m-users')
                ->description('Lượt đăng ký khóa học')
                ->descriptionIcon('heroicon-m-users')
                ->color('success'),

            Stat::make('Người dùng', User::query()->count())
                ->icon('heroicon-m-users')
                ->description('Tổng số người dùng')
                ->descriptionIcon('heroicon-m-users')
                ->color('info'),

            Stat::make('Giảng viên', User::where('role', 2)->count())
                ->icon('heroicon-m-user')
                ->description('Đội ngũ giảng viên')
                ->descriptionIcon('heroicon-m-user')
                ->color('info'),
                Stat::make('Học viên', User::where('role', 0)->count())
                ->icon('heroicon-m-user')
                ->description('Người dùng bình thường')
                ->descriptionIcon('heroicon-m-user')
                ->color('info'),



        ];
    }
}
