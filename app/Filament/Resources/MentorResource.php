<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MentorResource\Pages;
use App\Filament\Resources\MentorResource\RelationManagers;
use App\Models\Mentor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MentorResource extends Resource
{
    protected static ?string $model = Mentor::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationLabel = 'Mentor';
    protected static ?string $modelLabel = 'Mentor';
    protected static ?string $navigationGroup = 'Người dùng';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('name')
                    ->required()
                    ->relationship('user', 'name')
                    ->label('Tên giảng viên'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table

            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->numeric()
                    ->sortable()
                    ->label('id'),
                Tables\Columns\ImageColumn::make('user.thumbnail')
                    ->label('Hình ảnh')

                    ->searchable(),

                Tables\Columns\TextColumn::make('user.name')
                ->label('Tên Mentor')
                ->searchable(),
                Tables\Columns\TextColumn::make('user.email')
                ->label('Email')
                ->searchable(),
                Tables\Columns\TextColumn::make('user.phone')
                ->label('Số điện thoại')
                ->searchable(),
                Tables\Columns\TextColumn::make('user.address')
                ->label('Địa chỉ')
                ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
            ])
            ->filters([
                
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
            'index' => Pages\ListMentors::route('/'),
            // 'create' => Pages\CreateMentor::route('/create'),
            'view' => Pages\ViewMentor::route('/{record}'),
            // 'edit' => Pages\EditMentor::route('/{record}/edit'),
        ];
    }
}
