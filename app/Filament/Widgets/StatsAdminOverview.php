<?php

namespace App\Filament\Widgets;

use App\Models\Comment;
use App\Models\Course;
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
        
        return [
            Stat::make('Người dùng', User::query()->count())
            ->icon('heroicon-m-user'),
                        
            Stat::make('Đánh giá',Comment::query()->count() )
            ->icon('heroicon-m-chat-bubble-oval-left'),

            Stat::make('Giảng viên',User::where('role',2)->count())
            ->icon('heroicon-m-users'),
            
            Stat::make('Học viên',User::where('role',0)->count())
            ->icon('heroicon-m-user-group'),
            
            Stat::make('Khóa học', Course::query()->count())
            ->icon('heroicon-m-book-open'),
        ];
        
    }
}
