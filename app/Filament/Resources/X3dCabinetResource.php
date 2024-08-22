<?php

namespace App\Filament\Resources;

use App\Filament\Resources\X3dCabinetResource\Pages;
use App\Models\X3dCabinet;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Tabs;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Wizard;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class X3dCabinetResource extends Resource
{
    protected static ?string $model = X3dCabinet::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Product Configurator';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Group::make()
                    ->schema([
                        Section::make('Status')
                            ->schema([
                                Toggle::make('is_active'),
                            ]),
                        Section::make()
                            ->schema([
                                TextInput::make('name')
                                    ->label('Nama Produk')
                                    ->live(onBlur: true)
                                    ->required()
                                    ->unique(ignoreRecord: true)
                                    ->afterStateUpdated(function (string $operation, $state, Set $set) {
                                        if ($operation !== 'create') {
                                            return;
                                        }

                                        $set('slug', Str::slug($state));
                                    }),
                                TextInput::make('slug')
                                    ->disabled()
                                    ->dehydrated()
                                    ->required()
                                    ->unique(X3dCabinet::class, 'slug', ignoreRecord: true),
                            ])->columns(3),
                        Section::make([
                            FileUpload::make('thumbnail')
                                ->image()
                                ->directory('form-attachment/image/custom-cabinet-thumbnail')
                        ])
                    ]),

                Tabs::make('Part 1')
                    ->tabs([
                        Tabs\Tab::make('Upload Model Part 1')
                            ->icon('heroicon-s-folder-arrow-down')
                            ->schema([
                                FileUpload::make('model1_filepath')
                                    ->directory('form-attachment/x3d/cabinet/model1')
                                    ->multiple()
                                    ->storeFileNamesIn('model1_originalname')
                            ]),
                        Tabs\Tab::make('Upload Texture')
                            ->icon('heroicon-s-folder-arrow-down')
                            ->schema([
                                FileUpload::make('model1_texture_filepath')
                                ->directory('form-attachment/x3d/cabinet/model1')
                                ->multiple()
                                ->preserveFilenames()
                                ]),
                        Tabs\Tab::make('Harga')
                            ->icon('heroicon-s-currency-dollar')
                            ->schema([
                                Repeater::make('price1')
                                    ->schema([
                                        TextInput::make('price1')
                                            ->label('Harga')
                                            ->numeric()
                                            ->required(),
                                    ]),
                        ])
                    ])
                    ->activeTab(1),

                Tabs::make('Part 2')
                    ->tabs([
                        Tabs\Tab::make('Upload Model Part 2')
                            ->icon('heroicon-s-folder-arrow-down')
                            ->schema([
                                FileUpload::make('model2_filepath')
                                    ->directory('form-attachment/x3d/cabinet/model2')
                                    ->multiple()
                                    ->storeFileNamesIn('model2_originalname')
                            ]),
                        Tabs\Tab::make('Upload Texture')
                            ->icon('heroicon-s-folder-arrow-down')
                            ->schema([
                                FileUpload::make('model2_texture_filepath')
                                    ->directory('form-attachment/x3d/cabinet/model2')
                                    ->multiple()
                                    ->preserveFilenames()
                                ]),
                        Tabs\Tab::make('Harga')
                            ->icon('heroicon-s-currency-dollar')
                            ->schema([
                                Repeater::make('price2')
                                    ->schema([
                                        TextInput::make('price2')
                                            ->label('Harga')
                                            ->numeric()
                                            ->required(),
                                    ]),
                        ])
                    ])
                    ->activeTab(1),

                Tabs::make('Part 3')
                    ->tabs([
                        Tabs\Tab::make('Upload Model Part 3')
                            ->icon('heroicon-s-folder-arrow-down')
                            ->schema([
                                FileUpload::make('model3_filepath')
                                    ->directory('form-attachment/x3d/cabinet/model3')
                                    ->multiple()
                                    ->storeFileNamesIn('model3_originalname')
                            ]),
                        Tabs\Tab::make('Upload Texture')
                            ->icon('heroicon-s-folder-arrow-down')
                            ->schema([
                                FileUpload::make('model3_texture_filepath')
                                    ->directory('form-attachment/x3d/cabinet/model3')
                                    ->multiple()
                                    ->preserveFilenames()
                                ]),
                        Tabs\Tab::make('Harga')
                            ->icon('heroicon-s-currency-dollar')
                            ->schema([
                                Repeater::make('price3')
                                    ->schema([
                                        TextInput::make('price3')
                                            ->label('Harga')
                                            ->numeric()
                                            ->required(),
                                    ]),
                        ])
                    ])
                    ->activeTab(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                IconColumn::make('is_active')
                    ->boolean(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListX3dCabinets::route('/'),
            'create' => Pages\CreateX3dCabinet::route('/create'),
            'edit' => Pages\EditX3dCabinet::route('/{record}/edit'),
        ];
    }
}
