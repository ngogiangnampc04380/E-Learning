<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseCategoriesResource\Pages;
use App\Filament\Resources\CourseCategoriesResource\RelationManagers;
use App\Models\Course_category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CourseCategoriesResource extends Resource
{
    protected static ?string $model = Course_category::class;
    protected static ?string $navigationLabel = 'Danh mục khóa học';
    protected static ?string $modelLabel = 'danh mục khóa học';
    protected static ?string $navigationIcon = 'heroicon-o-paper-clip';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->rules([
                    'regex:/^[a-zA-Z0-9]+$/'
                    ])
                    ->validationMessages([
                        'required' => 'vui lòng nhập name',
                        'regex'=>'name không chứa ký tự đặc biệt'
                        ]),
                    
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->rules([
                        'regex:/^\S+$/',
                        
                    ])
                    ->validationMessages([
                        'required' => 'vui lòng nhập slug!!!!',
                        'regex'=>'vui lòng không để khoản trống!',
                        

                        ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                
                ->sortable(),
                Tables\Columns\TextColumn::make('slug')
                
                ->sortable(),
                
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
            'index' => Pages\ListCourseCategories::route('/'),
            'create' => Pages\CreateCourseCategories::route('/create'),
            'view' => Pages\ViewCourseCategories::route('/{record}'),
            'edit' => Pages\EditCourseCategories::route('/{record}/edit'),
        ];
    }
}
