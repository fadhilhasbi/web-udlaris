<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Tables;
use App\Models\Product;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProductResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProductResource\RelationManagers;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Content Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
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
                                    ->unique(Product::class, 'slug', ignoreRecord: true),
                                RichEditor::make('description')
                                    ->label('Deskripsi')
                                    ->columnSpan('full'),
                                TextInput::make('weight')
                                    ->label('Berat (kg)')
                                    ->required(),
                                TextInput::make('length')
                                    ->label('Panjang (cm)')
                                    ->required(),
                                TextInput::make('width')
                                    ->label('Lebar (cm)')
                                    ->required(),
                                TextInput::make('height')
                                    ->label('Tinggi (cm)')
                                    ->required()
                            ])->columns(2),
                        Section::make('Gudang dan Harga')
                            ->schema([
                                TextInput::make('price')
                                    ->label('Harga Barang')
                                    ->numeric()
                                    ->required(),
                                TextInput::make('sku')
                                    ->label('Kode Barang (SKU)')
                                    ->required()
                                    ->unique(ignoreRecord: true),
                                TextInput::make('quantity')
                                    ->label('Jumlah Tersedia')
                                    ->required()
                                    ->minValue(0)
                            ])->columns(3),
                    ]),

                Group::make()
                    ->schema([
                        Section::make('Status')
                            ->schema([
                                Toggle::make('is_active')
                                ->default(true),
                                Toggle::make('is_featured'),
                                Toggle::make('in_stock')
                                ->default(true),
                                Toggle::make('on_sale'),
                                DatePicker::make('published_at')
                                    ->columnSpan('full')
                                    ->default(now())
                                    ->columnSpan('full'),
                            ])->columns(2),
                        Section::make('Type')
                            ->schema([
                                Select::make('categories')
                                ->helperText('Sesuaikan produk dengan kategori')
                                ->multiple()
                                ->preload()
                                ->relationship('categories', 'name')
                                ->required()
                            ]),
                        Section::make('Gambar Produk')
                            ->schema([
                                FileUpload::make('image')
                                    ->directory('form-attachments/product-images')
                                    ->image()
                                    ->multiple()
                            ])->collapsible(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image'),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('sku')
                    ->searchable(),
                TextColumn::make('price')
                    ->searchable()
                    ->sortable(),
                IconColumn::make('is_active')
                    ->boolean(),
                IconColumn::make('is_featured')
                    ->boolean(),
                IconColumn::make('in_stock')
                    ->boolean(),
                IconColumn::make('on_sale')
                    ->boolean(),
                TextColumn::make('published_at')
                    ->sortable()
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                ActionGroup::make([
                    ViewAction::make(),
                    DeleteAction::make(),
                ])
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
