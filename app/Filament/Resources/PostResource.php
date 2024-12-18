<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Components\Tables\CuratorColumn;
use Filament\Forms;
use Filament\Forms\Components\Builder;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class PostResource extends Resource
{
    /**
     * The resource record title.
     */
    protected static ?string $recordTitleAttribute = 'title';

    /**
     * The resource model.
     */
    protected static ?string $model = Post::class;

    /**
     * The resource icon.
     */
    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    /**
     * The resource navigation group.
     */
    protected static ?string $navigationGroup = 'Collections';

    /**
     * The resource navigation sort order.
     */
    protected static ?int $navigationSort = 0;

    /**
     * Get the navigation badge for the resource.
     */
    public static function getNavigationBadge(): ?string
    {
        return number_format(static::getModel()::count());
    }

    /**
     * Get the form for the resource.
     */
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make()
                    ->columns(3)
                    ->schema([
                        Forms\Components\Section::make()
                            ->columnSpan(2)
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->placeholder('Enter a title')
                                    ->live()
                                    ->afterStateUpdated(function (Get $get, Set $set, string $operation, ?string $old, ?string $state) {
                                        if (($get('slug') ?? '') !== Str::slug($old) || $operation !== 'create') {
                                            return;
                                        }

                                        $set('slug', Str::slug($state));
                                    })
                                    ->required()
                                    ->maxLength(255)
                                    ->autofocus(),

                                Forms\Components\TextInput::make('post_type')
                                    ->label('Post Type')
                                    ->helperText('This tag appears on the right side of the homepage.')
                                    ->placeholder('Enter a custom post type')
                                    ->required()
                                    ->maxLength(255),
                                
                                Forms\Components\Textarea::make('description')
                                    ->label('Description')
                                    ->rows(2)
                                    ->placeholder('Enter a description for this post')
                                    ->helperText('Displayed after the title on the show page, keep it short.')
                                    ->nullable()
                                    ->columnSpanFull()
                                    ->maxLength(255),
                                
                                Forms\Components\TextInput::make('services')
                                    ->label('Services')
                                    ->placeholder('Enter the services')
                                    ->nullable()
                                    ->maxLength(255)
                                    ->columnSpanFull(),

                                Forms\Components\MarkdownEditor::make(name: 'content')
                                    ->label('Content')
                                    ->columnSpanFull(),

                                Forms\Components\Repeater::make('attachments')
                                    ->label('Attachments')
                                    ->schema([
                                        Forms\Components\FileUpload::make('file')
                                            ->label('File')
                                            ->maxSize(51200)
                                            ->rules('file|max:51200')
                                            ->acceptedFileTypes(['video/mp4', 'video/avi', 'video/mkv', 'image/*'])
                                            ->directory('attachments')
                                            ->enableReordering(),
                                        Forms\Components\Toggle::make('full_width')
                                            ->label('Full Width')
                                            ->default(false),
                                    ])
                                    ->addable()
                                    ->reorderable()
                                    ->deletable()
                                    ->collapsible()
                                    ->columnSpanFull(),
                            ]),

                        Forms\Components\Section::make()
                            ->columnSpan(1)
                            ->schema([
                            Forms\Components\Toggle::make('full_width')
                                    ->label('Full Width')
                                    ->helperText('Set the post to full width layout.')
                                    ->default(false),

                            Forms\Components\TextInput::make('slug')
                                    ->placeholder('Enter a slug')
                                    ->alphaDash()
                                    ->required()
                                    ->unique(ignoreRecord: true)
                                    ->maxLength(255),

                            Forms\Components\Select::make('user_id')
                                    ->label('Author')
                                    ->relationship('user', 'name')
                                    ->default(fn () => auth()->id())
                                    ->searchable()
                                    ->required(),

                            CuratorPicker::make('image_id')
                                    ->label('Featured Media')
                                    ->rules('file|max:51200')
                                    ->maxSize(51200)
                                    ->acceptedFileTypes(['image/*', 'video/mp4', 'video/avi', 'video/mkv'])
                                    ->helperText('Upload an image or a video.')
                                    ->required(),      

                            Forms\Components\DatePicker::make('published_at')
                                    ->label('Publish Date')
                                    ->default(now())
                                    ->required(),

                            Forms\Components\Toggle::make('is_published')
                                    ->label('Published')
                                    ->default(true)
                                    ->required(),
                        ]),
                    ]),
            ]);
    }

    /**
     * Get the table for the resource.
     */
    public static function table(Table $table): Table
    {
        return $table
            ->reorderable('sort_order')
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('post_type')
                    ->label('Post Type')
                    ->sortable()
                    ->searchable(),

                CuratorColumn::make('image')
                    ->circular()
                    ->size(32),

                Tables\Columns\IconColumn::make('is_published')
                    ->label('Published')
                    ->boolean()
                    ->sortable(),

                Tables\Columns\TextColumn::make('published_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->defaultSort('sort_order')
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    /**
     * Get the relationships for the resource.
     */
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    /**
     * Get the pages for the resource.
     */
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
