<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseResource\Pages;
use App\Filament\Forms\Components\Concerns\BelongsToModel;
use App\Filament\Resources\CourseResource\RelationManagers;
use App\Models\Course;
use Filament\Forms;
// use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\SelectFilter;
use League\Flysystem\Visibility;

use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\Split;
use Filament\Infolists\Components\ViewEntry;
use Filament\Support\Enums\FontWeight;

class CourseResource extends Resource
{
    protected static ?string $model = Course::class;
    protected static ?string $navigationLabel = 'Khóa học';
    protected static ?string $modelLabel = 'khóa học';
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    // public static function form(Form $form): Form
    // {
    //     return $form
    //         ->schema([
    //             Forms\Components\Select::make('category_id')
    //                 ->relationship('category', 'name')
    //                 ->label('Mã danh mục')
    //                 ->required(),

    //             Forms\Components\TextInput::make('name')
    //                 ->label('Tên khóa học')
    //                 ->required()
    //                 ->maxLength(50),
    //             Forms\Components\FileUpload::make('thumbnail')
    //                 ->label('Hình ảnh')
    //                 ->required(),
    //             Forms\Components\TextInput::make('price')
    //                 ->label('Giá')
    //                 ->required()
    //                 ->numeric()
    //                 ->prefix('vnđ'),
    //             Forms\Components\TextInput::make('view')
    //                 ->label('Lượt xem')
    //                 ->required()
    //                 ->numeric(),
    //             Forms\Components\TextInput::make('enrollment')
    //                 ->label('Số người đăng ký')
    //                 ->required()
    //                 ->numeric(),
    //                 Forms\Components\RichEditor::make('description')
    //                 ->label('Mô tả')
    //                 ->required()
    //                 ->maxLength(65535)
    //                 ->columnSpanFull(),
    //         ]);
    // }

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
                SelectFilter::make('status')
                    ->label('Học viên')
                    ->default('2'),
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

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Split::make([
                    Section::make('Khóa học')
                        ->schema([
                            TextEntry::make('name')
                                ->label('Tên khóa học'),
                            TextEntry::make('price')
                                ->label('Giá'),
                            TextEntry::make('enrollment')
                                ->label('Lượt đăng ký'),
                            ImageEntry::make('thumbnail')
                                ->label('Hình ảnh')
                                ->columnSpan(1),
                                ViewEntry::make('video_demo')
                                ->columnSpan(2)
                                ->view('components.video-entry', [
                                    'label' => 'Video demo',
                                    'value' => $infolist->getRecord()->video_demo,
                                ]),
                            ViewEntry::make('description')
                                ->label('Mô tả')
                                ->view('components.textarea-entry', [
                                    'label' => 'Mô tả',
                                    'value' => $infolist->getRecord()->description,
                                ])
                                ->columnSpanFull(),
                            Section::make('Chương')
                                ->schema([
                                    RepeatableEntry::make('chapters')
                                        ->label('Chương')
                                        ->schema([
                                            TextEntry::make('name')
                                                ->label('Tên chương'),
                                            RepeatableEntry::make('lessons')
                                                ->label('Bài học')
                                                ->schema([
                                                    TextEntry::make('name')
                                                        ->label('Tên Bài học'),
                                                        ViewEntry::make('path_video')
                                                        ->view('components.video-entry', [
                                                            'label' => 'Video bài học',
                                                            'value' => $infolist->getRecord()->path_video,
                                                        ]),
                                                ])->grid(),
                                        ])->grid(),
                                ])->collapsed()

                        ])->collapsed()->columns(3),


                ])->columnSpanFull()->from('md'),
                Section::make('Giảng viên')
                    ->schema([
                        TextEntry::make('mentor.user.name')
                            ->label('Tên Giảng viên'),
                            TextEntry::make('mentor.user.email')
                            ->label('Email'),
                            TextEntry::make('mentor.user.address')
                            ->label('Địa chỉ'),
                            TextEntry::make('mentor.user.phone')
                            ->label('Số điện thoại'),
                            ImageEntry::make('mentor.user.thumbnail')
                            ->label('Ảnh đại diện')
                            ->columnSpanFull(),
                    ])->collapsed()->columns(2),
            ]);
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
