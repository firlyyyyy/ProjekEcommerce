<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Product;
use Illuminate\Support\Str;
use Carbon\Carbon; // Import Carbon for date formatting
use Filament\Resources\Resource;
use Filament\Forms\Set;
use App\Filament\Resources\ProductResource\Pages;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;
    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';
    protected static ?string $navigationLabel = 'Products';
    protected static ?string $navigationGroup = 'Product';
    protected static ?int $navigationSort = 3;

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\Section::make('Basic Details')
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Product Name')
                        ->required()
                        ->maxLength(255)
                        ->placeholder('Enter product name')
                        ->live(onBlur: true)
                        ->afterStateUpdated(
                            fn($state, Set $set) => $set('slug', Str::slug($state))
                        )
                        ->hint('Make sure the product name is unique and descriptive.'),

                    Forms\Components\TextInput::make('slug')
                        ->label('Product Slug')
                        ->disabled()
                        ->unique(Product::class, 'slug', ignoreRecord: true)
                        ->placeholder('Generated automatically'),

                    Forms\Components\Select::make('brand_id')
                        ->label('Brand')
                        ->relationship('brand', 'name')
                        ->required()
                        ->searchable()
                        ->placeholder('Select a brand'),

                    Forms\Components\Select::make('category_id')
                        ->label('Category')
                        ->relationship('category', 'name')
                        ->required()
                        ->searchable()
                        ->placeholder('Select a category'),
                ])
                ->columns(2),

            Forms\Components\Section::make('Media & Description')
                ->schema([
                    Forms\Components\FileUpload::make('images')
                        ->label('Product Images')
                        ->image()
                        ->multiple()
                        // ->sortable()
                        ->directory('product-images')
                        ->preserveFilenames()
                        ->required()
                        ->hint('Upload high-quality images of the product.'),

                    Forms\Components\Textarea::make('description')
                        ->label('Product Description')
                        ->rows(5)
                        ->required()
                        ->placeholder('Describe the product features and benefits'),
                ]),

            Forms\Components\Section::make('Pricing & Availability')
                ->schema([
                    Forms\Components\TextInput::make('price')
                        ->label('Price')
                        ->required()
                        ->numeric()
                        ->minValue(0)
                        ->prefix('Rp.')
                        ->placeholder('Set the product price'),

                    Forms\Components\Grid::make(2)
                        ->schema([
                            Forms\Components\Toggle::make('is_active')
                                ->label('Active')
                                ->default(true),

                            Forms\Components\Toggle::make('is_featured')
                                ->label('Featured')
                                ->default(false),

                            Forms\Components\Toggle::make('is_stock')
                                ->label('In Stock')
                                ->default(true),

                            Forms\Components\Toggle::make('on_sale')
                                ->label('On Sale')
                                ->default(false),
                        ]),
                ])
                ->columns(2),

            Forms\Components\Section::make('Timestamps')
                ->schema([
                    Forms\Components\TextInput::make('created_at')
                        ->label('Created At')
                        ->disabled()
                        ->visible(fn($record) => $record)
                        ->formatStateUsing(fn($state) => $state ? Carbon::parse($state)->diffForHumans() : ''),

                    Forms\Components\TextInput::make('updated_at')
                        ->label('Last Updated At')
                        ->disabled()
                        ->visible(fn($record) => $record)
                        ->formatStateUsing(fn($state) => $state ? Carbon::parse($state)->diffForHumans() : ''),
                ]),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('name')
                ->label('Name')
                ->searchable()
                ->sortable()
                ->alignment('center'),

            Tables\Columns\TextColumn::make('brand.name')
                ->label('Brand')
                ->searchable()
                ->alignment('center'),

            Tables\Columns\TextColumn::make('category.name')
                ->label('Category')
                ->searchable()
                ->alignment('center'),

            // Tables\Columns\ImageColumn::make('images')
            //     ->label('Images')
            //     ->alignment('center'),

            Tables\Columns\TextColumn::make('price')
                ->label('Price')
                ->alignment('center')
                ->money('IDR', true)
                ->sortable(),

            Tables\Columns\IconColumn::make('is_active')
                ->label('Is Active')
                ->alignment('center')
                ->boolean()
                ->trueIcon('heroicon-o-check-circle')
                ->falseIcon('heroicon-o-x-circle')
                ->trueColor('success')
                ->falseColor('danger'),

            Tables\Columns\IconColumn::make('is_featured')
                ->label('Featured')
                ->alignment('center')
                ->boolean()
                ->trueIcon('heroicon-o-check-circle')
                ->falseIcon('heroicon-o-x-circle')
                ->trueColor('success')
                ->falseColor('danger'),

            Tables\Columns\IconColumn::make('is_stock')
                ->label('In Stock')
                ->alignment('center')
                ->boolean()
                ->trueIcon('heroicon-o-check-circle')
                ->falseIcon('heroicon-o-x-circle')
                ->trueColor('success')
                ->falseColor('danger'),

            Tables\Columns\IconColumn::make('on_sale')
                ->label('On Sale')
                ->alignment('center')
                ->boolean()
                ->trueIcon('heroicon-o-check-circle')
                ->falseIcon('heroicon-o-x-circle')
                ->trueColor('success')
                ->falseColor('danger'),

            Tables\Columns\TextColumn::make('created_at')
                ->label('Created At')
                ->dateTime()
                ->sortable()
                ->alignment('center')
                ->toggleable(isToggledHiddenByDefault: true)
                ->formatStateUsing(fn($state) => Carbon::parse($state)->diffForHumans()),

            Tables\Columns\TextColumn::make('updated_at')
                ->label('Updated At')
                ->dateTime()
                ->sortable()
                ->alignment('center')
                ->toggleable(isToggledHiddenByDefault: true)
                ->formatStateUsing(fn($state) => Carbon::parse($state)->diffForHumans()),
        ])
            ->filters([
                Tables\Filters\SelectFilter::make('is_active')
                    ->label('Active Status')
                    ->options([
                        '1' => 'Active',
                        '0' => 'Inactive',
                    ]),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\ViewAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            // Add relationships if any
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
