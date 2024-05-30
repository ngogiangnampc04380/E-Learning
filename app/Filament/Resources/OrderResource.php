<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use App\Models\Order_detail;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\TextEntry;
use Filament\Tables\Columns\SelectColumn;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;
    protected static ?string $label = 'Danh sách đơn hàng';
    protected static ?string $modelLabel = 'đơn hàng';
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                
            ]);
            
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('order_code')
                    ->label('Mã đơn hàng')

                    ->searchable(),
                Tables\Columns\TextColumn::make('user.name')
                ->label('Người đăng ký khóa học')
                ->sortable()
                ->searchable(),
                Tables\Columns\SelectColumn::make('order_details.status')
                ->options([
                    0 => 'Chưa thanh toán',
                    1 => 'Đã thanh toán',
                ]),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
    public static function infolist(Infolist $infolist): Infolist
{
    return $infolist
        ->schema([
            TextEntry::make('order_code')
            ->label('Mã đơn hàng'),
            TextEntry::make('user.name')
            ->label('Người đăng ký khóa học'),
            TextEntry::make('user.address')
            ->label('Địa chỉ người đăng ký'),
            TextEntry::make('user.phone')
            ->label('Số điện thoại người đăng ký'),
            TextEntry::make('user.email')
            ->label('Email'),
            TextEntry::make('course.price')
            ->label('Đơn giá'),
           
        ]);
}
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            // 'view' => Pages\ViewOrder::route('/{record}'),
            // 'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
