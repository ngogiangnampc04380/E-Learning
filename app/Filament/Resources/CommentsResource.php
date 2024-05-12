<?php

namespace App\Filament\Resources;
use Filament\Tables\Filters\Filter;
use App\Filament\Resources\CommentsResource\Pages;
use App\Filament\Resources\CommentsResource\RelationManagers;
use App\Models\Comment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\SelectFilter;
class CommentsResource extends Resource
{
    protected static ?string $model = Comment::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-oval-left-ellipsis';
    protected static ?string $navigationLabel = 'Bình luận';
    protected static ?string $modelLabel = 'Bình luận';
    protected static ?int $navigationSort = 3;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('content')
                    ->label('Tên bài học'),
            ]);
    }

    public static function table(Table $table): Table
    {
        
        return $table
        
            ->columns([
                
                Tables\Columns\TextColumn::make('lesson.name')
                    ->label('Tên bài học')
                    ->searchable(),
                Tables\Columns\TextColumn::make('content')
                    ->label('Nội dung bình luận')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Tên giảng viên')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.email')
                    ->label('Email')
                    ->searchable(),
                    Tables\Columns\TextColumn::make('lesson.chapter.course.name')
                    ->label('Khóa học')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ngày bình luận')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('status')
                    ->label('Trạng thái')
                    ->searchable(),
            ])
            ->filters([
                SelectFilter::make('user')
                    ->label('giảng viên')
                    ->relationship('user', 'name')
                    ->preload(),
                SelectFilter::make('course')
                    ->label('khóa học')
                    ->relationship('lesson.chapter.course','name')
                    ->preload(),
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
            'index' => Pages\ListComments::route('/'),
            'create' => Pages\CreateComments::route('/create'),
            'view' => Pages\ViewComments::route('/{record}'),
            'edit' => Pages\EditComments::route('/{record}/edit'),
        ];
    }
}
