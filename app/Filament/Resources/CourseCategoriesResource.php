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
use Illuminate\Validation\Rule;

use Closure;



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
                    ->label('Tên danh mục')
                    ->required()
                    // ->rules('regex:/^[a-zA-Z]+$/')

                    ->validationMessages([
                        'required' => 'vui lòng nhập Tên danh mục',
                        // 'regex'=>'Tên danh mục không chứa ký tự đặc biệt'
                        ]),
                    
                Forms\Components\TextInput::make('slug')
                    ->label('Đường dẫn')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->regex('/^[a-z0-9]+(-[a-z0-9]+)+$/') //bắt thiếu dấu -
                    ->validationMessages([
                        'required' => 'vui lòng nhập đường dẫn',
                        'unique'=> 'đường dẫn đã tồn tại',
                        'regex' => 'đường dẫn không hợp lệ (ví dụ dẫn hợp lệ là: abc-abc)'
                        ]),
                Forms\Components\TextInput::make('description')
                ->label('Mô tả')
                ->required()
                // ->rules('regex:/^[a-zA-Z]+$/')

                ->validationMessages([
                    'required' => 'vui lòng nhập mô tả',
                    // 'regex'=>'Tên danh mục không chứa ký tự đặc biệt'
                    ]),        
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->label('Tên danh mục')
                ->sortable(),
                Tables\Columns\TextColumn::make('slug')
                ->label('Đường dẫn')
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
