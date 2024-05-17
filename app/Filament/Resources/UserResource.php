<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Enum\RoleUsers;
use Closure;
use Filament\Forms\FormsComponent;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationLabel = 'Người dùng';
    protected static ?string $modelLabel = 'người dùng';
    protected static ?string $navigationGroup = 'Người dùng';
    protected static ?string $navigationIcon = 'heroicon-o-user';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Tên người dùng')
                    ->required()
                    ->regex('/^[\p{L}\s]+$/u')
                    ->validationMessages([
                        'required' => 'Vui lòng nhập tên người dùng',
                        'regex'=> 'Chỉ nhập chữ cái', 
                    ])
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->validationMessages([
                        'required' => 'Vui lòng nhập địa chỉ email',
                        'email' => 'Vui lòng nhập đúng định dạng email',
                        'unique' =>'Email đã tồn tại'
                    ])
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->label('Số điện thoại')
                    ->tel()
                    ->required()
                    ->minLength(10)
                    ->maxLength(10)
                    ->startsWith(['0'])
                    ->validationMessages([
                        'start_with'=>'Vui lòng nhập đúng định dạng số điện thoại',
                        'required' => 'Vui lòng nhập số điện thoại',
                        'regex' => 'Vui lòng nhập đúng định dạng số điện thoại',
                        'min' => 'Vui lòng nhập đúng độ dài số điện thoại',
                        'max' => 'Vui lòng nhập đúng độ dài số điện thoại',
                        
                    ]),

                    Forms\Components\TextInput::make('address')
                    ->label('Địa chỉ')
                    ->required()
                    ->validationMessages([
                        'required' => 'Vui lòng nhập địa chỉ',
                    ])
                    ->maxLength(255),
                Forms\Components\Select::make('role')
                    ->label('Vai trò')
                    ->options([
                        0 => 'Học viên',
                        1 => 'ADMIN',
                        2 => 'MENTOR'
                    ])
                    ->default('0'),
                Forms\Components\TextInput::make('password')
                    ->label('Mật khẩu')
                    ->password()
                    ->revealable()
                    ->required()
                    ->minLength(6)
                    ->alphaNum()
                    ->validationMessages([
                        'required' => 'vui lòng nhập mật khẩu',
                        'min'=>'Mật khẩu phải từ 6 kí tự bao gồm chữ và số ',
                        'alpha_num'=>'Mật khẩu phải từ 6 kí tự bao gồm chữ và số '
                    ])
                    ->maxLength(255),
                    Forms\Components\FileUpload::make('thumbnail')
                    ->required()
                    ->columnSpanFull()
                    ->image()
                    ->validationMessages([
                        'required' => 'Vui lòng chọn file hình ảnh',
                        'image'=> 'File tải lên phải là các file JPG, JPEG, PNG và SVG'
                    ])
                    ->label('Hình ảnh'),
            ]);
    }
    public static function table(Table $table): Table
    {

        return $table
            
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->label('Hình ảnh')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Tên người dùng')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label('Số điện thoại')
                    // ->value(fn ($record) => match ($record->status) {
                    //     '123' => 'Draft',
                    //     '0703374380' => 'Reviewing',
                    //     default => $record->status,
                    // })
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->label('Địa chỉ')
                    ->searchable(),
                Tables\Columns\SelectColumn::make('role')
                ->label('Vai trò')
                ->options([
                    0 => 'Học viên',
                    1 => 'Admin',
                    2 => 'Giảng viên'
                ]),
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
            'index' => Pages\ListUsers::route('/'),
            // 'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
