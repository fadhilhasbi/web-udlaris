<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Set;
use App\Models\X3dTable;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\X3dTableResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\X3dTableResource\RelationManagers;

class X3dTableResource extends Resource
{
    protected static ?string $model = X3dTable::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Product Configurator';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Group::make()
                    ->schema([
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
                                    ->unique(X3dTable::class, 'slug', ignoreRecord: true),
                            ])->columns(3),
                        Section::make([
                            FileUpload::make('thumbnail')
                                ->image()
                                ->directory('form-attachment/image/custom-table-thumbnail')
                        ])
                    ]),

                Group::make()
                    ->schema([
                        Section::make('Status')
                            ->schema([
                                Toggle::make('is_active'),
                            ]),
                        Section::make('Upload 3D Papan Model')
                            ->schema([
                                FileUpload::make('papan_filepath')
                                    ->directory('form-attachment/x3d/meja/papan')
                                    ->multiple()
                                    ->storeFileNamesIn('papan_originalname')
                            ])->collapsible(),
                        Section::make('Upload 3D Kaki Model')
                            ->schema([
                                FileUpload::make('kaki_filepath')
                                    ->directory('form-attachment/x3d/meja/kaki')
                                    ->multiple()
                                    ->storeFileNamesIn('kaki_originalname')
                            ])->collapsible(),
                        Section::make('Upload Image Texture Papan Model')
                            ->schema([
                                FileUpload::make('papan_texture_filepath')
                                    ->directory('form-attachment/x3d/meja/papan')
                                    ->multiple()
                                    ->preserveFilenames()
                            ])->collapsible(),
                        Section::make('Upload Image Texture Kaki Model')
                            ->schema([
                                FileUpload::make('kaki_texture_filepath')
                                    ->directory('form-attachment/x3d/meja/kaki')
                                    ->multiple()
                                    ->preserveFilenames()
                            ])->collapsible(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListX3dTables::route('/'),
            'create' => Pages\CreateX3dTable::route('/create'),
            'edit' => Pages\EditX3dTable::route('/{record}/edit'),
        ];
    }
}
