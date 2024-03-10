<?php

namespace AdminKit\Companies\UI\Filament\Resources\CompanyResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Model;
use AdminKit\Core\Forms\Components\TranslatableTabs;
use Filament\Resources\RelationManagers\RelationManager;

class HistoriesRelationManager extends RelationManager
{
    protected static string $relationship = 'histories';

    protected static ?string $recordTitleAttribute = 'name';

    public function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TranslatableTabs::make(fn ($locale) => Tab::make($locale)->schema([
                    Forms\Components\TextInput::make('title.'.$locale)
                        ->label(__('admin-kit-companies::companies.relations.histories.title')),
                    Forms\Components\Textarea::make('text.'.$locale)
                        ->label(__('admin-kit-companies::companies.relations.histories.description'))
                        ->rows(8)
                        ->maxLength(445),
                ]))->columnSpan(2),
            ]);
    }

    public function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label(__('admin-kit-companies::companies.relations.histories.title')),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('admin-kit-companies::companies.relations.histories.created_at')),
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
        return __('admin-kit-companies::companies.relations.histories.plural_label');
    }

    public static function getLabel(): ?string
    {
        return __('admin-kit-companies::companies.relations.histories.label');
    }

    protected static function getPluralModelLabel(): ?string
    {
        return __('admin-kit-companies::companies.relations.histories.plural_label');
    }
}
