<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use Closure;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Livewire\TemporaryUploadedFile;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

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
                ->unique()
                ->required(),
            TextInput::make('slug')
                ->disabled()
                ->required(),
            TextInput::make('category_code')
            //to generate a custom category code out of the name too
                ->dehydrateStateUsing(fn ($state) => Str::upper($state))
                ->helperText('Code will only use the first 2 characters of the first and last words. Ex: "TC" for test category')
                ->required(),
            FileUpload::make('image')
                //because of livewire
                ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                    $fileName = $file->hashName();
                    $name = explode('.', $fileName);
                    return (string) str('images/categories/images/'.$name[0].'.png');
                })
                ->label('Image')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                    TextColumn::make('name')->sortable(),
                    TextColumn::make('slug')->sortable(),
                    TextColumn::make('created_at')
                        ->dateTime('d-M-Y')
                        ->sortable()
                        ->searchable(),
                        Tables\Columns\TextColumn::make('updated_at')
                        ->dateTime('d-M-Y'),
                    TextColumn::make('category_code')->sortable(),   
                    ImageColumn::make('image'),
                ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }    
}
