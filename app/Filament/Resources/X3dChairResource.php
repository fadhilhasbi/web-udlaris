<?php

namespace App\Filament\Resources;

use App\Filament\Resources\X3dChairResource\Pages;
use App\Filament\Resources\X3dChairResource\RelationManagers;
use App\Models\X3dChair;
use Filament\Forms\Set;
use Filament\Forms;
use Filament\Forms\Form;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class X3dChairResource extends Resource
{
    protected static ?string $model = X3dChair::class;

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
                                    ->unique(X3dChair::class, 'slug', ignoreRecord: true),
                            ])->columns(3),
                        Section::make([
                            FileUpload::make('thumbnail')
                                ->image()
                                ->directory('form-attachment/image/custom-chair-thumbnail')
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
                                    ->directory('form-attachment/x3d/chair/papan')
                                    ->multiple()
                                    ->storeFileNamesIn('papan_originalname')
                            ])->collapsible(),
                        Section::make('Upload 3D Kaki Model')
                            ->schema([
                                FileUpload::make('kaki_filepath')
                                    ->directory('form-attachment/x3d/chair/kaki')
                                    ->multiple()
                                    ->storeFileNamesIn('kaki_originalname')
                            ])->collapsible(),
                        Section::make('Upload 3D Senderan Model')
                            ->schema([
                                FileUpload::make('senderan_filepath')
                                    ->directory('form-attachment/x3d/chair/senderan')
                                    ->multiple()
                                    ->storeFileNamesIn('senderan_originalname')
                            ])->collapsible(),
                        Section::make('Upload 3D Add 1 Model')
                            ->schema([
                                FileUpload::make('add1_filepath')
                                    ->directory('form-attachment/x3d/chair/add1')
                                    ->multiple()
                                    ->storeFileNamesIn('add1_originalname')
                            ])->collapsible(),
                        Section::make('Upload Image Texture Papan Model')
                            ->schema([
                                FileUpload::make('papan_texture_filepath')
                                    ->directory('form-attachment/x3d/chair/papan')
                                    ->multiple()
                                    ->preserveFilenames()
                            ])->collapsible(),
                        Section::make('Upload Image Texture Kaki Model')
                            ->schema([
                                FileUpload::make('kaki_texture_filepath')
                                    ->directory('form-attachment/x3d/chair/kaki')
                                    ->multiple()
                                    ->preserveFilenames()
                            ])->collapsible(),
                        Section::make('Upload Image Texture Senderan Model')
                            ->schema([
                                FileUpload::make('senderan_texture_filepath')
                                    ->directory('form-attachment/x3d/chair/senderan')
                                    ->multiple()
                                    ->preserveFilenames()
                            ])->collapsible(),
                        Section::make('Upload Image Texture Add 1 Model')
                            ->schema([
                                FileUpload::make('add1_texture_filepath')
                                    ->directory('form-attachment/x3d/chair/add1')
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
            'index' => Pages\ListX3dChairs::route('/'),
            'create' => Pages\CreateX3dChair::route('/create'),
            'edit' => Pages\EditX3dChair::route('/{record}/edit'),
        ];
    }
}