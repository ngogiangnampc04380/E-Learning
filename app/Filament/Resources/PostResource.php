<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;
    protected static ?string $navigationLabel = 'Bài viết';
    protected static ?string $modelLabel = 'bài viết';
    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->label('Tiêu đề')
                    ->unique(ignoreRecord: true)
                    ->validationMessages([
                        'required' => 'vui lòng nhập tiêu đề',
                        'unique'=> 'tiêu đề đã tồn tại',
                        ])
                    ->maxLength(100),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->regex('/^[a-z0-9]+(?:-[a-z0-9]+)*$/')
                    ->validationMessages([
                        'required' => 'vui lòng nhập đường dẫn',
                        'unique'=> 'đường dẫn đã tồn tại',
                        'regex' => 'đường dẫn không hợp lệ (ví dụ dẫn hợp lệ là: abc-abc)'
                        ])
                    ->label('Đường dẫn')
                    ->maxLength(100),
                Forms\Components\FileUpload::make('thumbnail')
                    ->required()
                    ->validationMessages([
                        'required' => 'vui lòng nhập hình ảnh',
                        ])
                    ->label('Hình ảnh'),

                Forms\Components\Select::make('post_category')
                    ->relationship('post_pivots', 'name')
                    ->preload()
                    ->label('Danh mục bài viết')
                    ->multiple(),

                Forms\Components\RichEditor::make('content')
                    ->required()
                    ->validationMessages([
                        'required' => 'vui lòng nhập nội dung bài viết',
                        ])
                    ->label('Nội dung')
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Tiêu đề')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->label('Đường dẫn')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->label('Hình ảnh')
                    ->searchable(),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'view' => Pages\ViewPost::route('/{record}'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
