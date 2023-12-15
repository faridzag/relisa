<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages\CreateUser;
use Filament\Forms\Components\DateTimePicker;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Hash;
use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?int $navigationSort = 1;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Manajemen User';

    protected static ?string $modelLabel = 'Pengguna';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                    TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                    //DateTimePicker::make('email_verified_at'),
                    TextInput::make('password')
                    ->visibleOn('create')
                    ->password()
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->dehydrated(fn ($state) => filled($state))
                    ->required(fn (Page $livewire) => ($livewire instanceof CreateUser))
                    ->same('passwordConfirmation')
                    ->minLength(8)
                    ->maxLength(255),
                    TextInput::make('passwordConfirmation')
                    ->label('Konfirmasi Password')
                    ->visibleOn('create')
                    ->password()
                    ->required(fn (Page $livewire) => ($livewire instanceof CreateUser))
                    ->minLength(8)
                    ->dehydrated(false)
                ]),
                Card::make()->schema([
                    Select::make('roles')
                    ->relationship(name: 'roles', titleAttribute: 'name')
                    ->preload(),
                    Select::make('permissions')
                    ->relationship(name: 'permissions', titleAttribute: 'name')
                    ->multiple()
                    ->preload()
                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->dateTime()
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
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->label(''),
                Tables\Actions\EditAction::make()->label(''),
                Tables\Actions\DeleteAction::make()->label(''),
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
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
    // tidak menampilkan user admin
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('id', '!=', '1');
    }
}
