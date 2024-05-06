<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ErollmentResource\Pages;
use App\Filament\Resources\ErollmentResource\RelationManagers;
use Filament\Tables\Filters\SelectFilter;

use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ErollmentResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Học viên';
    protected static ?string $modelLabel = 'Học viên';
    protected static ?int $navigationSort = 2;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Tên người dùng')
                    ->required()
                    ->validationMessages([
                        'required' => 'vui lòng nhập tên người dùng',
                    ])
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->validationMessages([
                        'required' => 'vui lòng nhập địa chỉ email',
                        'email' => 'vui lòng nhập đúng định dạng email',
                    ])
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->label('Số điện thoại')
                    ->tel()
                    ->required()
                    ->minLength(10)
                    ->maxLength(10)
                    ->validationMessages([
                        'required' => 'vui lòng nhập số điện thoại',
                        'regex' => 'vui lòng nhập đúng định dạng số điện thoại',
                        'min' => 'vui lòng nhập đúng độ dài số điện thoại',
                    ]),

                // Forms\Components\TextInput::make('auth')
                //     ->maxLength(255),
                // Forms\Components\DateTimePicker::make('email_verified_at'),
                Forms\Components\TextInput::make('password')
                    ->label('Mật khẩu')
                    ->password()
                    ->required()
                    ->validationMessages([
                        'required' => 'vui lòng nhập mật khẩu',
                    ])
                    ->maxLength(255),
                Forms\Components\FileUpload::make('thumbnail')
                    ->required()
                    ->columnSpanFull()
                    ->validationMessages([
                        'required' => 'vui lòng hình ảnh',
                    ])
                    ->label('Hình ảnh'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Tên người dùng')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label('Số điện thoại')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->label('Hình ảnh')
                    ->searchable(),
                // Tables\Columns\TextColumn::make('auth')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('email_verified_at')
                //     ->dateTime()
                //     ->sortable(),
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
            'index' => Pages\ListErollments::route('/'),
            'create' => Pages\CreateErollment::route('/create'),
            'view' => Pages\ViewErollment::route('/{record}'),
            'edit' => Pages\EditErollment::route('/{record}/edit'),
        ];
    }
}
