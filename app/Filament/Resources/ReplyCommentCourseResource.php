<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReplyCommentCourseResource\Pages;
use App\Filament\Resources\ReplyCommentCourseResource\RelationManagers;
use App\Models\ReplyCommentCourse;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReplyCommentCourseResource extends Resource
{
    protected static ?string $model = ReplyCommentCourse::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-oval-left-ellipsis';
    protected static ?string $navigationLabel = 'Trả lời bình luận';
    protected static ?string $modelLabel = 'Trả lời bình luận';
    protected static ?string $navigationGroup = 'Bình luận';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Người trả lời')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('content')
                    ->label('Nội dung')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('status')
                    ->label('Trạng thái')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListReplyCommentCourses::route('/'),
            // 'create' => Pages\CreateReplyCommentCourse::route('/create'),
            // 'edit' => Pages\EditReplyCommentCourse::route('/{record}/edit'),
        ];
    }
}
