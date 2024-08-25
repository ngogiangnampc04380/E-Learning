<?php

namespace App\Filament\Resources;

use Filament\Tables\Filters\Filter;
use App\Filament\Resources\CommentsResource\Pages;
use App\Filament\Resources\CommentsResource\RelationManagers;
use App\Models\CommentCourse;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\SelectFilter;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\TextEntry;
use Filament\Tables\Columns\SelectColumn;

class CommentsResource extends Resource
{
    protected static ?string $model = CommentCourse::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-oval-left-ellipsis';
    protected static ?string $navigationLabel = 'Bình luận';
    protected static ?string $modelLabel = 'Bình luận';
    // protected static ?int $navigationSort = 3;

    protected static ?string $navigationGroup = 'Bình luận';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([]);
    }

    public static function table(Table $table): Table
    {

        return $table

            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Tên người bình luận')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('content')
                    ->label('Nội dung bình luận')
                    ->limit(30)
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ViewColumn::make('stars')
                    ->label('Đánh giá')
                    ->view('components.stars')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('status')
                    ->label('Trạng thái')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([])
            ->actions([
                // Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
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
    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListComments::route('/'),
            // 'create' => Pages\CreateComments::route('/create'),
            // 'view' => Pages\ViewComments::route('/{record}'),
            // 'edit' => Pages\EditComments::route('/{record}/edit'),
        ];
    }
}
