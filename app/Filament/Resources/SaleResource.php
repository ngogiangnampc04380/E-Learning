<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SaleResource\Pages;
use App\Filament\Resources\SaleResource\RelationManagers;
use App\Models\Sale;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SaleResource extends Resource
{
    protected static ?string $model = Sale::class;

    protected static ?string $navigationLabel = 'Giảm giá';

    protected static ?string $modelLabel = 'giảm giá';

    protected static ?string $navigationIcon = 'heroicon-o-receipt-percent';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('percent_sale')
                ->rules('regex:/^[0-9]+%/')
                    ->required()
                    ->label('Giảm giá')
                    ->validationMessages([
                        'required' => 'vui lòng nhập phần trăm giảm giá',
                        'regex' => 'vui lòng nhập đúng định dạng phần trăm giảm giá',
                        ])
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('start_date')
                    ->required()
                    ->label('Ngày bắt đầu')
                    ->validationMessages([
                        'required' => 'vui lòng để ngày bắt đầu',
                        
                        ]),
                Forms\Components\DateTimePicker::make('end_date')
                    ->required()
                    ->label('Ngày kết thúc')
                    ->after('start_date')
                    ->validationMessages([
                        'required' => 'vui lòng để ngày kết thúc',
                        'after' => 'ngày kết thúc không thể trước ngày bắt đầu',
                        ]),
                Forms\Components\TextInput::make('amount')
                    ->required()
                    ->label('Số lượng')
                    ->rules('regex:/^[0-9]/',)
                    ->validationMessages([
                        'required' => 'vui lòng nhập số lượng',
                        'regex' => 'vui lòng nhập đúng định dạng số lượng',
                        
                        ])
                    ,
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Tables\Columns\TextColumn::make('cours.name')
                //     ->sortable(),
                Tables\Columns\TextColumn::make('percent_sale')
                ->label('Giảm giá')
                    ->numeric()
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('start_date')
                ->label('Ngày bắt đầu')
                ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_date')
                ->label('Ngày kết thúc')
                ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('amount')
                ->label('Số lượng')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListSales::route('/'),
            'create' => Pages\CreateSale::route('/create'),
            'view' => Pages\ViewSale::route('/{record}'),
            'edit' => Pages\EditSale::route('/{record}/edit'),
        ];
    }
}
