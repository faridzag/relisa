<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Models\Category;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\StatsOverviewWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Filament\Forms\Set;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationGroup = 'Kegiatan Relawan';
    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $modelLabel = 'Kegiatan';
    protected static ?string $recordTitleAttribute = 'name';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('name')
                    ->columnSpan(3)
                    ->label('nama')
                    ->required()
                    ->maxLength(255)
                    ->live()
                    ->afterStateUpdated(function (string $operation, string $state, Set $set){
                        if ($operation === 'edit') {
                            return;
                        }
                        $set('slug', Str::slug($state));
                    }),
                    TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true),
                    TextInput::make('ketentuan')
                    ->columnSpan(3)
                    ->required()
                    ->maxLength(255),
                    Select::make('category_id')
                    ->label('kategori')
                    ->options(Category::all()->pluck('name', 'id'))
                    ->searchable(),
                    MarkdownEditor::make('deskripsi')
                    ->columnSpan(3),
                    DatePicker::make('tanggal')
                    ->native(false)
                    ->displayFormat('d/m/Y')
                    ->minDate(now()),
                    FileUpload::make('poster')
                    ->columnSpan(3)
                    ->image()
                    ->maxSize(250)
                    ->disk('public')
                    ->directory('posters')
                    ->downloadable()
                    ->openable(),
                    /*->imagePreviewHeight('200')
                    ->loadingIndicatorPosition('left')
                    ->panelAspectRatio('2:1')
                    ->panelLayout('integrated')
                    ->removeUploadedFileButtonPosition('right')
                    ->uploadButtonPosition('left')
                    ->uploadProgressIndicatorPosition('left'),*/
                ])->columns(4)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('poster'),
                TextColumn::make('name')
                ->label('Nama')
                ->searchable()
                ->sortable(),
                TextColumn::make('category.name')
                ->label('Kategori')
                ->searchable()
                ->sortable(),
                TextColumn::make('tanggal')
                ->searchable()
                ->sortable()
                ->date('d/m/Y'),
                TextColumn::make('ketentuan')
                ->searchable(),
                TextColumn::make('deskripsi'),
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
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
    public static function getWidgets(): array
    {
        return [
            EventResource\Widgets\StatsOverview::class,
        ];
    }
}
