<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Post;
use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use League\CommonMark\Input\MarkdownInput;
use Filament\Forms\Components\MarkdownEditor;
use App\Filament\Resources\PostResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PostResource\RelationManagers;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Blog';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                    ->schema([
                        Section::make()
                            ->schema([
                                TextInput::make('title')
                                    ->required()
                                    ->live(debounce: 1000)
                                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', str($state)->slug())),
                                TextInput::make('slug')
                                    ->required(),
                                MarkdownEditor::make('body')
                                    ->columnSpan(2),
                            ]),
                        Section::make('Association')
                            ->schema([
                                Select::make('category_id')
                                    ->relationship('category', 'title')
                            ])->columnSpan(2),
                    ])->columns(2),

                Group::make()
                    ->schema([
                        Section::make('Status')
                            ->schema([
                                Toggle::make('active'),
                                DatePicker::make('published_at'),
                            ]),
                        Section::make('Image')
                            ->schema([
                                FileUpload::make('thumbnail')
                                    ->image()
                                    ->imageResizeTargetWidth('800')
                                    ->imageResizeTargetHeight('514')
                            ])->collapsible(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('thumbnail'),
                TextColumn::make('title'),
                TextColumn::make('category.title'),
                TextColumn::make('user.name'),
                IconColumn::make('active')->boolean(),
                TextColumn::make('published_at'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
