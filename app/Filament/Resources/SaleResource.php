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
                Forms\Components\TextInput::make('course_id')
                    ->required(),
                Forms\Components\TextInput::make('percent_sale')
                ->rules([
                    'regex:/^[0-9]+%/',
                ])
                    ->required()
                    ->validationMessages([
                        'required' => 'vui lòng nhập percent_sale',
                        'regex' => 'vui lòng nhập đúng định dạng percent_sale',
                        ])
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('start_date')
                    ->required()
                    ->validationMessages([
                        'required' => 'vui lòng để start_date',
                        
                        ]),
                Forms\Components\DateTimePicker::make('end_date')
                    ->required()
                    ->validationMessages([
                        'required' => 'vui lòng để end_date',
                        
                        ]),
                Forms\Components\TextInput::make('amount')
                    ->required()
                    ->rules([
                        'regex:/^[0-9]/',
                    ])
                    ->validationMessages([
                        'required' => 'vui lòng nhập amount',
                        'regex' => 'vui lòng nhập đúng định dạng amount [0-9]',
                        
                        ])
                    ,
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('course_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('percent_sale')
                    ->numeric()
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('start_date')
                ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_date')
                ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('amount')
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
