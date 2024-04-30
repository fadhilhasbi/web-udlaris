<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Components\ToggleButtons;
use Filament\Tables;
use App\Models\Order;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\OrderResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\OrderResource\RelationManagers;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $navigationGroup = 'Content Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make('Order Information')->schema([
                        Select::make('user_id')
                        ->label('Customer')
                        ->preload()
                        ->relationship('user', 'name')
                        ->required()
                        ->searchable(),
                        Select::make('payment_method')
                        ->options([
                            'midtrans' => 'Midtrans',
                            'cod' => 'Cash on Delivery'
                        ])
                        ->required(),
                        Select::make('payment_status')
                        ->options([
                            'pending' => 'Pending',
                            'paid' => 'Paid',
                            'failed' => 'Failed'
                        ])
                        ->default('pending')
                        ->required(),
                        ToggleButtons::make('status')
                        ->inline()
                        ->options([
                            'new' => 'New',
                            'processing'=> 'Processing',
                            'shipped'=> 'Shipped',
                            'delivered'=> 'Delivered',
                            'completed'=> 'Completed',
                            'canceled'=> 'Canceled'
                        ])
                        ->default('new')
                        ->colors([
                            'new'=> 'info',
                            'processing'=> 'warning',
                            'shipped'=> 'success',
                            'delivered'=> 'success',
                            'completed'=> 'success',
                            'canceled'=> 'danger'
                        ])
                        ->required(),
                    ])
                ])->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'view' => Pages\ViewOrder::route('/{record}'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
