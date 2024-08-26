<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MentorResource\Pages;
use App\Filament\Resources\MentorResource\RelationManagers;
use App\Models\idCard;
use App\Models\Mentor;
use App\Models\User;
use App\Notifications\DeclineMentorNotification;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\Filter;

use Illuminate\Support\Facades\Notification;
use App\Notifications\AcceptMentorNotification;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;

class MentorResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationLabel = 'Duyệt giảng viên';
    protected static ?string $modelLabel = 'Giảng viên chờ duyệt';
    protected static ?string $navigationGroup = 'Người dùng';
    // protected static ?int $navigationSort = 2;

    // public static function form(Form $form): Form
    // {
    //     return $form
    //         ->schema([
    //             Forms\Components\Select::make('name')
    //                 ->required()
    //                 ->relationship('user', 'name')
    //                 ->label('Tên giảng viên'),
    //         ]);
    // }

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
                Filter::make('status')
                    ->query(fn(Builder $query): Builder => $query->where('role', 3))
                    ->default(3),
            ])
            ->hiddenFilterIndicators()
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\Action::make('accept')
                    ->label('Duyệt')
                    ->action(function (User $record) {
                        // Cập nhật vai trò của người dùng
                        $record->role = 2;
                        $record->save();

                        // Gửi thông báo email
$record->notify(new AcceptMentorNotification($record));
                    })
                    ->requiresConfirmation()
                    ->color('success'),

                Tables\Actions\Action::make('decline')
                    ->label('Không Duyệt')
                    ->form([
                        Forms\Components\TextInput::make('reason')
                            ->label('Lý do không duyệt')
                            ->required(),
                    ])
                    ->action(function (User $record, $data) {
                        // Vô hiệu hóa tài khoản
                        $record->role = 0;
                        $record->save();
                        $mentor = $record->mentor;
                        $mentor->delete();
                        // $idcard = $mentor->idcard;
                        // $idcard->delete();
                        $record->notify(new DeclineMentorNotification($record, $data['reason']));
                    })
                    ->requiresConfirmation()
                    ->color('danger'),
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
                TextEntry::make('name')
                    ->label('Tên giảng viên'),
                TextEntry::make('email')
                    ->label('Email'),
                TextEntry::make('phone')
                    ->label('Số điện thoại'),
                TextEntry::make('address')
                    ->label('Địa chỉ'),
                TextEntry::make('mentor.name_banking')
                    ->label('Tên ngân hàng'),
                TextEntry::make('mentor.id_banking')
                    ->label('Số tài khoản'),
                ImageEntry::make('mentor.front_card')
                    ->label('CCCD mặt trước'),
                ImageEntry::make('mentor.back_card')
                    ->label('CCCD mặt sau'),
            ]);
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMentors::route('/'),
            // 'create' => Pages\CreateMentor::route('/create'),
            'view' => Pages\ViewMentor::route('/{record}'),
            // 'edit' => Pages\EditMentor::route('/{record}/edit'),
        ];
    }
}