<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\RelationManagers\CategoriesRelationManager;
use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Livewire\TemporaryUploadedFile;
use Symfony\Component\HttpFoundation\Request;


class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('name')
                ->reactive()
                //to create a slug out of the naame
                ->afterStateUpdated(function (Closure $set, $state) {
                    $set('slug', Str::slug($state));
                    $nameParts = explode(' ', trim($state));
                    $firstWord = array_shift($nameParts);
                    $secondWord = array_pop($nameParts);
                    $set('category_code', Str::substr($firstWord,0,1).Str::substr($secondWord, 0, 1));
                })
                ->autofocus()
                ->unique(ignoreRecord: true)
                ->required(),
            TextInput::make('slug')
                ->disabled()
                ->required(),
                Forms\Components\TextInput::make('details')
                ->rules(['min:10', 'max:20'])
                ->required(),
            Forms\Components\TextInput::make('product_code')
                ->dehydrateStateUsing(fn ($state) => Str::upper($state))
                ->helperText('Code will only use the first 2 characters of the first and last words. Ex: "TC" for test category')
                ->required(),
            Forms\Components\TextInput::make('price')
                ->numeric()
                ->integer()
                //greater then 5$
                ->rules(['gte:500'])
                ->required(),
            Forms\Components\TextInput::make('quantity')
                ->numeric()
                ->integer()
                //greater then 1
                ->rules(['gte:1'])
                ->required(),
            Forms\Components\TextArea::make('description')
                ->rows(5)
                ->cols(20)
                ->minLength(10)
                ->maxLength(300)
                ->required(),
            CheckboxList::make('categories')
                ->relationship('categories', 'name')
                ->required(),
            FileUpload::make('main_image')
            //because of livewire
            ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                $fileName = $file->hashName();
                $name = explode('.', $fileName);
                return (string) str('images/products/main_image/'.$name[0].'.png');
            })
            ->label('Main Image')
            ->required(),
            FileUpload::make('alt_images')
            ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                $fileName = $file->hashName();
                $name = explode('.', $fileName);
                return (string) str('images/products/alt_images/'.$name[0].'.png');
            })
            ->label('Alternate Images')
            ->maxSize(1024)
            ->image()
            ->nullable()
            ->multiple()
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('main_image')->sortable(),
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('product_code')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('price')->sortable(),
            ])->defaultSort(column: 'price', direction: 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            CategoriesRelationManager::class
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
