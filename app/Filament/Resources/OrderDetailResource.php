<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderDetailResource\Pages;
use App\Filament\Resources\OrderDetailResource\RelationManagers;
use App\Models\Order_detail;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderDetailResource extends Resource
{
    protected static ?string $model = Order_detail::class;
    protected static ?string $label = 'Chi tiết đơn hàng';
    protected static ?string $modelLabel = 'Chi tiết đơn hàng';
    protected static ?string $navigationIcon = 'heroicon-o-table-cells';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            
                Forms\Components\TextInput::make('status')
                    ->required()
                    ->label('Trạng thái'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('order.order_code')
                    ->label('Đơn hàng')
                    ->searchable(),
                    Tables\Columns\TextColumn::make('order.user.name')
                    ->label('Người đăng ký')
                    ->searchable(),
                    Tables\Columns\TextColumn::make('order.user.address')
                    ->label('Địa chỉ')
                    ->searchable(),
                    Tables\Columns\TextColumn::make('order.user.phone')
                    ->label('Số điện thoại')
                    ->searchable(),
                    Tables\Columns\SelectColumn::make('status')
                    ->label('Trạng thái')
                    ->options([
                        0 => 'Chưa trả phí',
                        1 => 'Đã trả phí',
                        2 => 'Đã hủy'
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrderDetails::route('/'),
            'create' => Pages\CreateOrderDetail::route('/create'),
            'view' => Pages\ViewOrderDetail::route('/{record}'),
            // 'edit' => Pages\EditOrderDetail::route('/{record}/edit'),
        ];
    }
}
