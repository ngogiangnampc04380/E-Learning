<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MentorUserResource\Pages;
use App\Filament\Resources\MentorUserResource\RelationManagers;
use App\Models\idCard;
use App\Models\Mentor;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Filters\Filter;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use App\Notifications\UserDisabledNotification;
use App\Notifications\UserRestoredNotification;

class MentorUserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationLabel = 'Giảng viên';
    protected static ?string $modelLabel = 'Giảng viên';
    protected static ?string $navigationGroup = 'Người dùng';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Tên giảng viên')
                    ->searchable(),
                Tables\Columns\TextColumn::make('thumbnail')
                    ->label('Hình ảnh')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
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
                    ->query(fn(Builder $query): Builder => $query->where('role', 2))
                    ->default(2),
            ])

            ->hiddenFilterIndicators()
            ->actions([
                Tables\Actions\ViewAction::make(),
                // Tables\Actions\DeleteAction::make(),
                Tables\Actions\Action::make('disable')
                    ->label('Vô hiệu hóa')
                    ->action(function (User $record) {
                        // Vô hiệu hóa tài khoản
                        $record->is_active = false;
                        $record->save();

                        // Gửi thông báo qua email
                        $record->notify(new UserDisabledNotification($record));
                    })
                    ->requiresConfirmation()
                    ->color('danger')
                    ->visible(fn(User $record) => $record->is_active), // Hiển thị nút nếu tài khoản đang hoạt động

                Tables\Actions\Action::make('restore')
                    ->label('Khôi phục tài khoản')
                    ->action(function (User $record) {
                        // Khôi phục tài khoản
                        $record->is_active = true;
                        $record->save();

                        // Gửi thông báo qua email
                        $record->notify(new UserRestoredNotification($record));
                    })
                    ->requiresConfirmation()
                    ->color('success')
                    ->visible(fn(User $record) => !$record->is_active), // Hiển thị nút nếu tài khoản bị vô hiệu hóa
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListMentorUsers::route('/'),
            // 'create' => Pages\CreateMentorUser::route('/create'),
            // 'edit' => Pages\EditMentorUser::route('/{record}/edit'),
        ];
    }
}
