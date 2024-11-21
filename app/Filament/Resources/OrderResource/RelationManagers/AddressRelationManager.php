<?php

namespace App\Filament\Resources\OrderResource\RelationManagers;

use Filament\Actions\ViewAction;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use function Laravel\Prompts\textarea;

class AddressRelationManager extends RelationManager
{
    protected static string $relationship = 'address';

    public function form(Form $form): Form
    {
        return $form
            ->schema([

                TextInput::make('first_name')
                    ->label('First Name')
                    ->required()
                    ->maxLength(50),

                TextInput::make('last_name')
                    ->label('Last Name')
                    ->required()
                    ->maxLength(50),

                TextInput::make('phone')
                    ->label('Phone Number')
                    ->required()
                    ->maxLength(20),

                Textarea::make('street_address')
                    ->label('Street Address')
                    ->required()
                    ->maxLength(255),

                TextInput::make('city')
                    ->label('City')
                    ->required()
                    ->maxLength(100),

                TextInput::make('state')
                    ->label('State')
                    ->maxLength(100),

                TextInput::make('zip_code')
                    ->label('Zip Code')
                    ->required()
                    ->maxLength(10),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('street_address')
            ->columns([
                TextColumn::make('full_name')
                    ->label('Full Name')
                    ->sortable()
                    ->alignCenter()
                    ->searchable(),

                TextColumn::make('phone')
                    ->label('Phone')
                    ->sortable()
                    ->alignCenter()
                    ->searchable(),

                TextColumn::make('street_address')
                    ->label('Street Address')
                    ->sortable()
                    ->alignCenter()
                    ->searchable(),

                TextColumn::make('city')
                    ->label('City')
                    ->sortable()
                    ->alignCenter()
                    ->searchable(),

                TextColumn::make('state')
                    ->label('State')
                    ->sortable()
                    ->alignCenter()
                    ->searchable(),

                TextColumn::make('zip_code')
                    ->label('Zip Code')
                    ->sortable()
                    ->alignCenter()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\ViewAction::make(),
                ])

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
