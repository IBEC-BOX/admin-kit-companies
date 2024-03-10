<?php

namespace AdminKit\Companies\UI\Filament\Resources\CompanyResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Model;
use AdminKit\Core\Forms\Components\TranslatableTabs;
use Filament\Resources\RelationManagers\RelationManager;

class ManagersRelationManager extends RelationManager
{
    protected static string $relationship = 'managers';

    protected static ?string $recordTitleAttribute = 'name';

    public function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\SpatieMediaLibraryFileUpload::make('image')
                    ->label(__('admin-kit-companies::companies.relations.managers.photo'))
                    ->required()
                    ->columnSpan(2),
                TranslatableTabs::make(fn ($locale) => Tab::make($locale)->schema([
                    Forms\Components\TextInput::make('name.'.$locale)
                        ->label(__('admin-kit-companies::companies.relations.managers.name'))
                        ->required(),
                    Forms\Components\TextInput::make('bio.'.$locale)
                        ->label(__('admin-kit-companies::companies.relations.managers.bio')),
                    Forms\Components\RichEditor::make('text.'.$locale)
                        ->label(__('admin-kit-companies::companies.relations.managers.about_me')),
                ]))->columnSpan(2),
            ]);
    }

    public function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('image')
                    ->label(__('admin-kit-companies::companies.relations.managers.photo'))
                    ->width(50)
                    ->height(50)
                    ->circular(),
                Tables\Columns\TextColumn::make('name')
                    ->label(__('admin-kit-companies::companies.relations.managers.name'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('admin-kit-companies::companies.relations.managers.created_at')),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->reorderable('sort')
            ->defaultSort('sort');
    }

    public static function getTitle(Model $ownerRecord, string $pageClass): string
    {
        return __('admin-kit-companies::companies.relations.managers.plural_label');
    }

    public static function getLabel(): ?string
    {
        return __('admin-kit-companies::companies.relations.managers.label');
    }

    protected static function getPluralModelLabel(): ?string
    {
        return __('admin-kit-companies::companies.relations.managers.plural_label');
    }
}
