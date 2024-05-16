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

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'Học viên';
    protected static ?string $modelLabel = 'Học viên';
    protected static ?string $navigationGroup = 'Người dùng';
    protected static ?int $navigationSort = 2;
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
                    ->doesntStartWith(['1','2','4','5','6','7','8','9','3'])
                    ->validationMessages([
                        'doesnt_start_with'=>'Vui lòng nhập đúng định dạng số điện thoại',
                        'required' => 'Vui lòng nhập số điện thoại',
                        'regex' => 'Vui lòng nhập đúng định dạng số điện thoại',
                        'min' => 'Vui lòng nhập đúng độ dài số điện thoại',
                        
                    ]),

                Forms\Components\TextInput::make('address')
                    ->label('Địa chỉ')
                    ->required()
                    
                    ->regex('/^[\p{L}\s]+$/u')
                    ->validationMessages([
                        'required' => 'Vui lòng nhập địa chỉ',
                        'regex'=> 'Chỉ nhập chữ cái',
                        
                    ])
                    ->maxLength(255),

                
                    Forms\Components\TextInput::make('password')
                    ->label('Mật khẩu')
                    ->password()
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
                    ->searchable(),
                    Tables\Columns\TextColumn::make('address')
                    ->label('Địa chỉ')
                    ->searchable(),
                
              
            ])
            ->filters([
                SelectFilter::make('role')
                    ->default('0'),
            ])

            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->hiddenFilterIndicators();

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