<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Raks;
use Filament\Forms\Set;
use App\Models\X3dRak;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Raks\Rak;
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
use App\Filament\Resources\X3dRakResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\X3dRakResource\RelationManagers;

class X3dRakResource extends Resource
{
    protected static ?string $model = X3dRak::class;

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
                                    ->unique(X3dRak::class, 'slug', ignoreRecord: true),
                            ])->columns(3),
                        Section::make([
                            FileUpload::make('thumbnail')
                                ->image()
                                ->directory('form-attachment/image/custom-rak-thumbnail')
                        ])
                    ]),

                Group::make()
                    ->schema([
                        Section::make('Status')
                            ->schema([
                                Toggle::make('is_active'),
                            ]),
                        Section::make('Upload 3D Rak Model')
                            ->schema([
                                FileUpload::make('rak_filepath')
                                    ->directory('form-attachment/x3d/rak/rak')
                                    ->multiple()
                                    ->storeFileNamesIn('rak_originalname')
                            ])->collapsible(),
                        Section::make('Upload 3D Laci Model')
                            ->schema([
                                FileUpload::make('laci_filepath')
                                    ->directory('form-attachment/x3d/rak/laci')
                                    ->multiple()
                                    ->storeFileNamesIn('laci_originalname')
                            ])->collapsible(),
                        Section::make('Upload 3D Add 1 Model')
                            ->schema([
                                FileUpload::make('add1_filepath')
                                    ->directory('form-attachment/x3d/rak/add1')
                                    ->multiple()
                                    ->storeFileNamesIn('add1_originalname')
                            ])->collapsible(),
                        Section::make('Upload Image Texture Papan Model')
                            ->schema([
                                FileUpload::make('rak_texture_filepath')
                                    ->directory('form-attachment/x3d/rak/rak')
                                    ->multiple()
                                    ->preserveFilenames()
                            ])->collapsible(),
                        Section::make('Upload Image Texture laci Model')
                            ->schema([
                                FileUpload::make('laci_texture_filepath')
                                    ->directory('form-attachment/x3d/rak/laci')
                                    ->multiple()
                                    ->preserveFilenames()
                            ])->collapsible(),
                        Section::make('Upload Image Texture Add 1 Model')
                            ->schema([
                                FileUpload::make('add1_texture_filepath')
                                    ->directory('form-attachment/x3d/rak/add1')
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
            'index' => Pages\ListX3dRaks::route('/'),
            'create' => Pages\CreateX3dRak::route('/create'),
            'edit' => Pages\EditX3dRak::route('/{record}/edit'),
        ];
    }
}
