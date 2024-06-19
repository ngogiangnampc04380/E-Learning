<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseResource\Pages;
use App\Filament\Forms\Components\Concerns\BelongsToModel;
use App\Filament\Resources\CourseResource\RelationManagers;
use App\Models\Course;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CourseResource extends Resource
{
    protected static ?string $model = Course::class;
    protected static ?string $navigationLabel = 'Khóa học';
    protected static ?string $modelLabel = 'khóa học';
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name')
                    ->label('Mã danh mục')
                    ->required(),
                
                Forms\Components\TextInput::make('name')
                    ->label('Tên khóa học')
                    ->required()
                    ->maxLength(50),
                Forms\Components\FileUpload::make('thumbnail')
                    ->label('Hình ảnh')
                    ->required(),
                Forms\Components\TextInput::make('price')
                    ->label('Giá')
                    ->required()
                    ->numeric()
                    ->prefix('vnđ'),
                Forms\Components\TextInput::make('view')
                    ->label('Lượt xem')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('enrollment')
                    ->label('Số người đăng ký')
                    ->required()
                    ->numeric(),
                    Forms\Components\RichEditor::make('description')
                    ->label('Mô tả')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Danh mục')
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Tên khóa học')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->label('Hình ảnh')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->label('Giá')
                    ->money('VND')
                    ->sortable(),
                Tables\Columns\TextColumn::make('view')
                    ->label('Lượt xem')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('enrollment')
                    ->label('Số người đăng ký')
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
            'index' => Pages\ListCourses::route('/'),
            // 'create' => Pages\CreateCourse::route('/create'),
            'view' => Pages\ViewCourse::route('/{record}'),
            // 'edit' => Pages\EditCourse::route('/{record}/edit'),
        ];
    }
}
