<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CheckCourseResource\Pages;
use App\Filament\Resources\CheckCourseResource\RelationManagers;
use App\Models\Course;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\Filter;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AcceptCourseNotification;
use App\Notifications\DeclineCourseNotification;
use Filament\Tables\Columns\ViewColumn;
use Filament\Infolists\Components\Section;

// use App\Models\User;

use Filament\Infolists\Infolist;
use Filament\Infolists\Components\TextEntry;

class CheckCourseResource extends Resource
{
    protected static ?string $model = Course::class;
    protected static ?string $navigationLabel = 'Khóa học chờ duyệt';
    protected static ?string $modelLabel = 'Khóa học chờ duyệt';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?int $navigationSort = 5;

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
                Tables\Columns\TextColumn::make('mentor.user.name')
                    ->label('Giảng viên')
                    ->sortable(),
                Tables\Columns\ImageColumn::make('video_demo')
                    ->label('Video demo')
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
                Filter::make('status')
                    ->query(fn (Builder $query): Builder => $query->where('status', 1))
                    ->default(),
            ])

            ->hiddenFilterIndicators()
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\Action::make('accept')
                    ->label('Duyệt')
                    ->action(function (Course $record) {
                        // Vô hiệu hóa tài khoản
                        $record->status = 2;
                        $record->save();

                        // Gửi thông báo qua email
                        // Lấy thông tin Mentor
                        $mentor = $record->mentor;

                        if ($mentor) {
                            // Lấy thông tin User từ Mentor
                            $user = $mentor->user;

                            if ($user) {
                                // Gửi thông báo qua email
                                $user->notify(new AcceptCourseNotification($record));
                            }
                        }
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
                    ->action(function (Course $record, $data) {
                        // Vô hiệu hóa tài khoản
                        $record->status = 0;
                        $record->save();

                        // Gửi thông báo qua email
                        // Lấy thông tin Mentor
                        $mentor = $record->mentor;

                        if ($mentor) {
                            // Lấy thông tin User từ Mentor
                            $user = $mentor->user;

                            if ($user) {
                                // Gửi thông báo qua email
                                $user->notify(new DeclineCourseNotification($record, $data['reason']));
                            }
                        }
                    })
                    ->requiresConfirmation()
                    ->color('danger'),
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
            ]);
    }
    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Thông tin khóa học')
                ->schema([
                    

                ]),
                Section::make('Thông tin giảng viên')
                    ->schema([
                       
                        
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
            'index' => Pages\ListCheckCourses::route('/'),
            // 'create' => Pages\CreateCheckCourse::route('/create'),
            'view' => Pages\ViewCheckCourse::route('/{record}'),
            // 'edit' => Pages\EditCheckCourse::route('/{record}/edit'),
        ];
    }
}
