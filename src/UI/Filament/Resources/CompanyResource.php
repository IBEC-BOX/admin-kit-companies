<?php

namespace AdminKit\Companies\UI\Filament\Resources;

use AdminKit\Companies\Models\Company;
use AdminKit\Companies\UI\Filament\Resources\CompanyResource\Pages;
use AdminKit\Companies\UI\Filament\Resources\CompanyResource\RelationManagers;
use AdminKit\Core\Forms\Components\TranslatableTabs;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Resources\Resource;
use Filament\Tables;

class CompanyResource extends Resource
{
    protected static ?string $model = Company::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                SpatieMediaLibraryFileUpload::make('background')
                    ->label(__('admin-kit-companies::companies.resource.background'))
                    ->collection('background')
                    ->image()
                    ->columnSpan(2)
                    ->optimize('webp')
                    ->resize(30),

                TranslatableTabs::make(fn ($locale) => Tab::make($locale)->schema([
                    Forms\Components\Section::make(__('admin-kit-companies::companies.resource.general'))->schema([
                        Forms\Components\TextInput::make('title.'.$locale)
                            ->label(__('admin-kit-companies::companies.resource.title'))
                            ->required(),
                        Forms\Components\RichEditor::make('text.'.$locale)
                            ->label(__('admin-kit-companies::companies.resource.description'))
                            ->required(),
                    ]),

                    Forms\Components\Section::make(__('admin-kit-companies::companies.resource.history'))->schema([
                        Forms\Components\TextInput::make('history_title.'.$locale)
                            ->label(__('admin-kit-companies::companies.resource.title')),
                        Forms\Components\RichEditor::make('history_text.'.$locale)
                            ->label(__('admin-kit-companies::companies.resource.description')),
                    ]),

                    Forms\Components\Section::make(__('admin-kit-companies::companies.resource.mission'))->schema([
                        Forms\Components\TextInput::make('mission_title.'.$locale)
                            ->label(__('admin-kit-companies::companies.resource.title')),
                        Forms\Components\RichEditor::make('mission_text.'.$locale)
                            ->label(__('admin-kit-companies::companies.resource.description')),
                        SpatieMediaLibraryFileUpload::make('mission_attachments.'.$locale)
                            ->label(__('admin-kit-companies::companies.resource.attachments'))
                            ->collection('mission_attachments.'.$locale)
                            ->multiple()
                            ->image()
                            ->optimize('webp')
                            ->resize(30),
                        SpatieMediaLibraryFileUpload::make('mission_background.'.$locale)
                            ->label(__('admin-kit-companies::companies.resource.background'))
                            ->collection('mission_background.'.$locale)
                            ->image()
                            ->optimize('webp')
                            ->resize(30),
                    ]),
                ]))->columnSpan(2),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label(__('admin-kit-companies::companies.resource.id'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->label(__('admin-kit-companies::companies.resource.title'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('admin-kit-companies::companies.resource.created_at')),
            ])
            ->defaultSort('id', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->defaultSort('id', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\HistoriesRelationManager::class,
            RelationManagers\ManagersRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCompany::route('/'),
            'create' => Pages\CreateCompany::route('/create'),
            'edit' => Pages\EditCompany::route('/{record}/edit'),
        ];
    }

    public static function getLabel(): ?string
    {
        return __('admin-kit-companies::companies.resource.label');
    }

    public static function getPluralLabel(): ?string
    {
        return __('admin-kit-companies::companies.resource.plural_label');
    }
}
