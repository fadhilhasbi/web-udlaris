<?php

namespace App\Filament\Resources;

use App\Filament\Resources\X3dCabinetResource\Pages;
use App\Filament\Resources\X3dCabinetResource\RelationManagers;
use App\Models\X3dCabinet;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
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

                Group::make()
                    ->schema([
                        Section::make('Status')
                            ->schema([
                                Toggle::make('is_active'),
                            ]),
                        Section::make('Upload 3D Model 1 ')
                            ->schema([
                                FileUpload::make('add1_filepath')
                                    ->directory('form-attachment/x3d/cabinet/add1')
                                    ->multiple()
                                    ->storeFileNamesIn('add1_originalname')
                            ])->collapsible(),
                        Section::make('Upload 3D Model 2')
                            ->schema([
                                FileUpload::make('add2_filepath')
                                    ->directory('form-attachment/x3d/cabinet/add2')
                                    ->multiple()
                                    ->storeFileNamesIn('add2_originalname')
                            ])->collapsible(),
                        Section::make('Upload 3D Model 3')
                            ->schema([
                                FileUpload::make('add3_filepath')
                                    ->directory('form-attachment/x3d/cabinet/add3')
                                    ->multiple()
                                    ->storeFileNamesIn('add3_originalname')
                            ])->collapsible(),
                        Section::make('Upload 3D Model 4')
                            ->schema([
                                FileUpload::make('add4_filepath')
                                    ->directory('form-attachment/x3d/cabinet/add4')
                                    ->multiple()
                                    ->storeFileNamesIn('add4_originalname')
                            ])->collapsible(),
                        Section::make('Upload Image Texture Model 1')
                            ->schema([
                                FileUpload::make('add1_texture_filepath')
                                    ->directory('form-attachment/x3d/cabinet/add1')
                                    ->multiple()
                                    ->preserveFilenames()
                            ])->collapsible(),
                        Section::make('Upload Image Texture Model 2')
                            ->schema([
                                FileUpload::make('add2_texture_filepath')
                                    ->directory('form-attachment/x3d/cabinet/add2')
                                    ->multiple()
                                    ->preserveFilenames()
                            ])->collapsible(),
                        Section::make('Upload Image Texture Model 3')
                            ->schema([
                                FileUpload::make('add3_texture_filepath')
                                    ->directory('form-attachment/x3d/cabinet/add3')
                                    ->multiple()
                                    ->preserveFilenames()
                            ])->collapsible(),
                        Section::make('Upload Image Texture Model 4')
                            ->schema([
                                FileUpload::make('add4_texture_filepath')
                                    ->directory('form-attachment/x3d/cabinet/add4')
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
            'index' => Pages\ListX3dCabinets::route('/'),
            'create' => Pages\CreateX3dCabinet::route('/create'),
            'edit' => Pages\EditX3dCabinet::route('/{record}/edit'),
        ];
    }
}
