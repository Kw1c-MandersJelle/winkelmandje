<?php

namespace App\Filament\Resources\CustomerResource\RelationManagers;

use App\Filament\Resources\OrderResource;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrdersRelationManager extends RelationManager
{
    protected static string $relationship = 'orders';

    public function form(Form $form): Form
    {
        return OrderResource::form($form);
//        return $form
//            ->schema([
//                Forms\Components\TextInput::make('')
//                    ->required()
//                    ->maxLength(255),
//            ]);
    }

    public function table(Table $table): Table
    {
        return OrderResource::table($table);
//        return $table
//            ->recordTitleAttribute('order_id')
//            ->columns([
//                Tables\Columns\TextColumn::make('order_id'),
//
//            ])
//            ->filters([
//                //
//            ])
//            ->headerActions([
//                Tables\Actions\CreateAction::make(),
//            ])
//            ->actions([
//                Tables\Actions\EditAction::make(),
//                Tables\Actions\DeleteAction::make(),
//            ])
//            ->bulkActions([
//                Tables\Actions\BulkActionGroup::make([
//                    Tables\Actions\DeleteBulkAction::make(),
//                ]),
//            ]);
    }
}
