<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use App\Models\X3dCabinet;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\X3dCabinetResource\Pages;
use App\Filament\Resources\X3dCabinetResource\RelationManagers;

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
                                Toggle::make('is_active')
                                ->default(true),
                            ]),
                    ]),

                Card::make()
                    ->schema([
                        Section::make('Parts')
                            ->schema([
                                Repeater::make('parts')
                                    ->label('Upload Model')
                                    ->grid(3)
                                    // ->columns(2)
                                    ->relationship()
                                    ->minItems(1)
                                    ->schema([
                                        FileUpload::make('file_path')
                                            ->directory('form-attachment/x3d/cabinet/')
                                            ->storeFileNamesIn('original_name'),
                                        FileUpload::make('texture_file_path')
                                            ->directory('form-attachment/x3d/cabinet/')
                                            ->preserveFilenames(),
                                        Select::make('part_type')
                                            ->options([
                                                'add1' => 'Part 1',
                                                'add2' => 'Part 2',
                                                'add3' => 'Part 3',
                                                'add4' => 'Part 4',
                                            ])
                                            ->required(),
                                        TextInput::make('price')
                                            ->numeric()
                                            ->required(),
                                    ])
                            ])
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
