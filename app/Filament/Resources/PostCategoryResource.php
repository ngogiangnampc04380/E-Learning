<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostCategoryResource\Pages;
use App\Filament\Resources\PostCategoryResource\RelationManagers;
use App\Models\Post_category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PostCategoryResource extends Resource
{
    protected static ?string $model = Post_category::class;
    protected static ?string $navigationLabel = 'Danh mục bài viết';
    protected static ?string $modelLabel = 'danh mục bài viết';
    protected static ?string $navigationIcon = 'heroicon-o-bookmark-square';

    protected static ?string $navigationGroup = 'Bài viết';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Danh mục')
                    ->unique(ignoreRecord: true)
                    ->validationMessages([
                        'required' => 'vui lòng nhập tên danh mục',
                        'unique' =>'Danh mục đã tồn tại'

                        ])
                    ->maxLength(100),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->label('Đường dẫn')
                    ->unique(ignoreRecord: true)
                    ->regex('/^[a-z0-9]+(-[a-z0-9]+)+$/')

                    ->validationMessages([
                        'required' => 'vui lòng nhập đường dẫn',
                        'unique'=> 'đường dẫn đã tồn tại',
                        'regex' => 'đường dẫn không hợp lệ (ví dụ dẫn hợp lệ là: abc-abc)'
                        ])
                    ->maxLength(100),
                    Forms\Components\TextInput::make('description')
                    ->required()
                    ->label('Mô tả')
                    
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Danh mục')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->label('Đường dẫn')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListPostCategories::route('/'),
            'create' => Pages\CreatePostCategory::route('/create'),
            'view' => Pages\ViewPostCategory::route('/{record}'),
            'edit' => Pages\EditPostCategory::route('/{record}/edit'),
        ];
    }
}
